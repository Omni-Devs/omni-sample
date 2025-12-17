<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Branch;
use Spatie\Permission\Models\Permission;
use App\Models\SpouseDetail;
use App\Models\ContactPerson;
use App\Models\SalaryMethod;
use App\Models\EducationalBackground;
use App\Models\Dependent;
use App\Models\EmployeeWorkInformation;
use App\Models\WorkforceShift;
use App\Models\WorkforceAllowance;
use App\Models\WorkLeave;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'active'); // default to active
        $perPage = $request->get('per_page', 10);

        $validStatuses = ['active', 'resigned', 'terminated'];
        if (!in_array($status, $validStatuses)) {
            $status = 'active';
        }

        $users = User::with(['roles:id,name', 'branches:id,name'])
            ->where('status', $status)
            ->paginate($perPage)
            ->appends(['status' => $status]);

        $nextUserId = User::max('id') + 1;
        $roles = Role::all();
        $branches = Branch::all();

        return view('users.index', compact('users', 'nextUserId', 'roles', 'branches', 'status', 'perPage'));
    }


    public function create()
    {
        // Pass roles and branches so the form can render selects
        $roles = Role::all();
        $branches = Branch::all();

        // Pass permissions so the form can show per-branch permission multiselects
        $permissions = Permission::all();
        // workforce reference data for salary method, allowances and leaves
        $shifts = WorkforceShift::all();
        $allowances = WorkforceAllowance::all();
        $leaves = WorkLeave::all();
        // Salary method options (no dedicated table currently)
        $salaryMethods = [
            'cash' => 'Cash',
            'bank' => 'Bank Transfer',
            'check' => 'Check',
            'agency' => 'Agency',
        ];
        // HR reference data
        $designations = Designation::all();
        $departments = Department::all();

        return view('users.form', compact('roles', 'branches', 'permissions', 'shifts', 'allowances', 'leaves', 'designations', 'departments', 'salaryMethods'));
    }

    // Store a newly created user
    public function store(Request $request)
    {
        // Normal processing: handle incoming request and create user
            // Determine if this is an Access-only submission (credentials + branch permissions)
            $isAccessOnly = $request->has('allow_db_user') || $request->filled('username');

            if ($isAccessOnly) {
                // minimal rules for creating DB credentials independently
                $rules = [
                    'username' => 'required|string|max:255|unique:users,username',
                    'password' => 'required|string|min:4',
                    'branch_permissions' => 'nullable|array',
                    'branch_permissions.*.branch_id' => 'required_with:branch_permissions|exists:branches,id',
                    'branch_permissions.*.permissions' => 'nullable|array',
                    'branch_permissions.*.permissions.*' => 'exists:permissions,id',
                    'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                    'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                ];
            } else {
                // Build validation rules for full/basic creation
                $rules = [
                    'last_name' => 'required|string|max:255',
                    'first_name' => 'required|string|max:255',
                    'middle_name' => 'nullable|string|max:255',
                    // 'name' is not required; we build a display name from first/last if absent
                    'username' => 'nullable|string|max:255|unique:users,username',
                    'email' => 'required|string|email|max:255|unique:users,email',
                    'password' => 'nullable|string|min:4',
                    'mobile_number' => 'nullable|string|max:20',
                    'roles' => 'nullable|array',
                    'roles.*' => 'exists:roles,id',
                    'branches' => 'nullable|array',
                    'branches.*' => 'exists:branches,id',
                    'branch_permissions' => 'nullable|array',
                    'branch_permissions.*.branch_id' => 'required_with:branch_permissions|exists:branches,id',
                    'branch_permissions.*.permissions' => 'nullable|array',
                    'branch_permissions.*.permissions.*' => 'exists:permissions,id',
                    'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                    'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                    'biometric_number' => 'nullable|string|max:255',
                    'id_number' => 'nullable|string|max:255',
                    'date_of_birth' => 'nullable|date',
                    'age' => 'nullable|integer',
                    // after change: these will store string values
                    'gender_id' => 'nullable|string',
                    'tin' => 'nullable|string|max:255',
                    'sss_number' => 'nullable|string|max:255',
                    'phil_health_number' => 'nullable|string|max:255',
                    'pag_ibig_number' => 'nullable|string|max:255',
                    'blood_type_id' => 'nullable|string',
                    'civil_status_id' => 'nullable|string',
                    'landline_number' => 'nullable|string|max:50',
                    'allow_timekeeper_access' => 'nullable|boolean',
                    'allow_prf_access' => 'nullable|boolean',
                    'allow_inventory_request' => 'nullable|boolean',
                    'allow_processed_goods_logging' => 'nullable|boolean',
                    'allow_sales_report' => 'nullable|boolean',
                    'allow_fund_transfer' => 'nullable|boolean',
                    'allow_liquidation' => 'nullable|boolean',
                    'address' => 'nullable|string|max:255',
                    'spouse' => 'nullable|array',
                    'contact_person' => 'nullable|array',
                    'salary_method' => 'nullable|array',
                    'salary_method.shift_id' => 'nullable|exists:workforce_shifts,id',
                    'allowances' => 'nullable|array',
                    'allowances.*.allowance_id' => 'required_with:allowances|exists:workforce_allowances,id',
                    'allowances.*.amount' => 'nullable|numeric',
                    'allowances.*.monthly_count' => 'nullable|integer',
                    'leaves' => 'nullable|array',
                    'leaves.*.leave_id' => 'nullable|exists:workforce_leaves,id',
                    'leaves.*.days' => 'nullable|integer',
                    'leaves.*.effective_date' => 'nullable|date',
                    'educational_backgrounds' => 'nullable|array',
                    'dependents' => 'nullable|array',
                    'employee_work_informations' => 'nullable|array',
                ];
            }

            // log incoming request keys for debugging (will go to storage/logs/laravel.log)
            try {
                Log::info('users.store - incoming', $request->except(['password']));
            } catch (\Throwable $e) {
                // ignore logging errors
            }

            // Pre-filter arrays that the UI renders with an initial empty row so empty rows
            // don't trigger "required_with" / "exists" validation rules.
            $input = $request->all();

            // Normalize branch_permissions: drop entries that are completely empty
            if (!empty($input['branch_permissions']) && is_array($input['branch_permissions'])) {
                $bpFiltered = [];
                foreach ($input['branch_permissions'] as $row) {
                    $hasBranch = isset($row['branch_id']) && $row['branch_id'] !== '' && $row['branch_id'] !== null;
                    $hasPerms = isset($row['permissions']) && is_array($row['permissions']) && count(array_filter($row['permissions'], function($v){ return $v !== null && $v !== ''; })) > 0;
                    if ($hasBranch || $hasPerms) {
                        // remove empty permission values
                        $row['permissions'] = array_values(array_filter($row['permissions'] ?? [], function($v){ return $v !== null && $v !== ''; }));
                        $bpFiltered[] = $row;
                    }
                }
                $input['branch_permissions'] = $bpFiltered;
            }

            // Normalize allowances: drop empty rows
            if (!empty($input['allowances']) && is_array($input['allowances'])) {
                $alFiltered = [];
                foreach ($input['allowances'] as $al) {
                    $hasAllowance = isset($al['allowance_id']) && $al['allowance_id'] !== '' && $al['allowance_id'] !== null;
                    $hasAmount = isset($al['amount']) && $al['amount'] !== '';
                    $hasMonthly = isset($al['monthly_count']) && $al['monthly_count'] !== '';
                    if ($hasAllowance || $hasAmount || $hasMonthly) {
                        $alFiltered[] = $al;
                    }
                }
                $input['allowances'] = $alFiltered;
            }

            // Normalize leaves: drop rows where leave_id is empty (checkbox not checked)
            if (!empty($input['leaves']) && is_array($input['leaves'])) {
                $lvFiltered = [];
                foreach ($input['leaves'] as $lv) {
                    $hasLeave = isset($lv['leave_id']) && $lv['leave_id'] !== '' && $lv['leave_id'] !== null;
                    $hasDays = isset($lv['days']) && $lv['days'] !== '';
                    $hasEffective = isset($lv['effective_date']) && $lv['effective_date'] !== '';
                    if ($hasLeave || $hasDays || $hasEffective) {
                        // if leave_id empty but days/effective set, we still keep the row so validation can catch it
                        $lvFiltered[] = $lv;
                    }
                }
                $input['leaves'] = $lvFiltered;
            }

            // You can add similar filters for dependents/leaves/educational_backgrounds if needed.

            // Validate using the cleaned input so blank UI rows are ignored
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $errors = array_keys($validator->errors()->toArray());
                // decide which tab to show based on error keys
                $tab = 'basic';
                foreach ($errors as $k) {
                    if (Str::startsWith($k, 'branch_permissions') || Str::startsWith($k, 'username') || Str::startsWith($k, 'password')) {
                        $tab = 'access';
                        break;
                    }
                }
                try { Log::warning('users.store - validation_failed', ['errors' => $validator->errors()->toArray()]); } catch (\Throwable $ex) {}
                return redirect()->back()->withErrors($validator)->withInput()->with('active_tab', $tab);
            }

            $validated = $validator->validated();

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
        }

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('users', 'public');
        }

        // Create user
        // Determine username and password to save
        $usernameToSave = $validated['username'] ?? null;
        if (!$usernameToSave) {
            // create a unique fallback username
            $base = Str::slug($validated['name'] ?? ($validated['first_name'] ?? 'user'));
            $candidate = $base ?: 'user';
            $i = 0;
            while (User::where('username', $candidate . ($i ? "-{$i}" : ''))->exists()) {
                $i++;
            }
            $usernameToSave = $candidate . ($i ? "-{$i}" : '');
        }

        $passwordToSave = isset($validated['password']) ? Hash::make($validated['password']) : Hash::make(Str::random(12));

        // Build a display name: prefer provided name, else first+last, else username
        $nameToSave = $validated['name'] ?? null;
        if (empty($nameToSave)) {
            $parts = [];
            if (!empty($validated['first_name'])) $parts[] = $validated['first_name'];
            if (!empty($validated['last_name'])) $parts[] = $validated['last_name'];
            $nameToSave = count($parts) ? implode(' ', $parts) : $usernameToSave;
        }

        // ensure we have an email value to avoid DB NOT NULL constraint
        $emailToSave = $validated['email'] ?? ($usernameToSave . '@gmail.com');

        $user = User::create([
            'last_name' => $validated['last_name'] ?? null,
            'first_name' => $validated['first_name'] ?? null,
            'middle_name' => $validated['middle_name'] ?? null,
            'name' => $nameToSave,
            'username' => $usernameToSave,
            'email' => $emailToSave,
            'password' => $passwordToSave,
            'mobile_number' => $validated['mobile_number'] ?? null,
            'address' => $validated['address'] ?? null,
            'image' => $imagePath,
            'avatar' => $avatarPath,
            'biometric_number' => $validated['biometric_number'] ?? null,
            'id_number' => $validated['id_number'] ?? null,
            'date_of_birth' => $validated['date_of_birth'] ?? null,
            'age' => $validated['age'] ?? null,
            'gender_id' => $validated['gender_id'] ?? null,
            'tin' => $validated['tin'] ?? null,
            'sss_number' => $validated['sss_number'] ?? null,
            'phil_health_number' => $validated['phil_health_number'] ?? null,
            'pag_ibig_number' => $validated['pag_ibig_number'] ?? null,
            'blood_type_id' => $validated['blood_type_id'] ?? null,
            'civil_status_id' => $validated['civil_status_id'] ?? null,
            'landline_number' => $validated['landline_number'] ?? null,
            'allow_timekeeper_access' => $request->has('allow_timekeeper_access'),
            'allow_prf_access' => $request->has('allow_prf_access'),
            'allow_inventory_request' => $request->has('allow_inventory_request'),
            'allow_processed_goods_logging' => $request->has('allow_processed_goods_logging'),
            'allow_sales_report' => $request->has('allow_sales_report'),
            'allow_fund_transfer' => $request->has('allow_fund_transfer'),
            'allow_liquidation' => $request->has('allow_liquidation'),
            'status' => 'active', // default status
        ]);

        try {
            Log::info('users.store - created_user', ['id' => $user->id, 'username' => $user->username]);
        } catch (\Throwable $e) {}

        // Sync roles only if provided
        if (!empty($validated['roles'])) {
            $user->roles()->sync($validated['roles']);
        }

        // Sync branches either from the new branch_permissions rows or from the legacy branches[] input
        if (!empty($validated['branch_permissions'])) {
            $bp = $validated['branch_permissions'];
            $branchIds = [];
            foreach ($bp as $row) {
                if (!empty($row['branch_id'])) {
                    $branchIds[] = $row['branch_id'];
                }
            }
            $user->branches()->sync(array_values(array_unique($branchIds)));
        } elseif (!empty($validated['branches'])) {
            $user->branches()->sync($validated['branches']);
        }

        // Persist branch -> permission assignments into branch_permission pivot table
        if (!empty($validated['branch_permissions'])) {
            foreach ($validated['branch_permissions'] as $row) {
                $branchId = $row['branch_id'] ?? null;
                $perms = $row['permissions'] ?? [];
                if (empty($branchId) || !is_array($perms) || empty($perms)) continue;
                foreach ($perms as $permId) {
                    if (empty($permId)) continue;
                    $exists = DB::table('branch_permission')
                        ->where('branch_id', $branchId)
                        ->where('permission_id', $permId)
                        ->exists();
                    if (!$exists) {
                        DB::table('branch_permission')->insert([
                            'branch_id' => $branchId,
                            'permission_id' => $permId,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }

        // Spouse: only create if there is meaningful data
        $s = $validated['spouse'] ?? [];
        if (is_array($s) && array_filter($s)) {
            $spouseModel = SpouseDetail::updateOrCreate(['user_id' => $user->id], [
                'name' => $s['name'] ?? null,
                'date_of_birth' => $s['date_of_birth'] ?? null,
                'age' => $s['age'] ?? null,
            ]);
            try { Log::info('users.store - spouse_saved', ['user_id' => $user->id, 'spouse_id' => $spouseModel->id]); } catch (\Throwable $e) {}
        }

        // Contact person: only create if there is meaningful data
        $c = $validated['contact_person'] ?? [];
        if (is_array($c) && array_filter($c)) {
            $contactModel = ContactPerson::updateOrCreate(['user_id' => $user->id], [
                'name' => $c['name'] ?? null,
                'contact_number' => $c['contact_number'] ?? null,
                'address' => $c['address'] ?? null,
            ]);
            try { Log::info('users.store - contact_saved', ['user_id' => $user->id, 'contact_id' => $contactModel->id]); } catch (\Throwable $e) {}
        }

        // Salary method
        if (!empty($validated['salary_method'])) {
            $sm = $validated['salary_method'];
            SalaryMethod::updateOrCreate(['user_id' => $user->id], [
                'method_id' => $sm['method_id'] ?? null,
                'period_id' => $sm['period_id'] ?? null,
                'account' => $sm['account'] ?? null,
                'shift_id' => $sm['shift_id'] ?? null,
            ]);
        }

        // Allowances (pivot)
        if (!empty($validated['allowances'])) {
            $syncAllowances = [];
            foreach ($validated['allowances'] as $al) {
                if (empty($al['allowance_id'])) continue;
                $syncAllowances[$al['allowance_id']] = [
                    'amount' => isset($al['amount']) ? $al['amount'] : null,
                    'monthly_count' => isset($al['monthly_count']) ? $al['monthly_count'] : null,
                ];
            }
            $user->allowances()->sync($syncAllowances);
        }

        // Leaves (pivot)
        if (!empty($validated['leaves'])) {
            $syncLeaves = [];
            foreach ($validated['leaves'] as $lv) {
                if (empty($lv['leave_id'])) continue;
                $syncLeaves[$lv['leave_id']] = [
                    'days' => isset($lv['days']) ? $lv['days'] : null,
                    'effective_date' => isset($lv['effective_date']) ? $lv['effective_date'] : null,
                ];
            }
            $user->leaves()->sync($syncLeaves);
        }

        // Educational backgrounds
        if (!empty($validated['educational_backgrounds'])) {
            foreach ($validated['educational_backgrounds'] as $eb) {
                if (empty(array_filter($eb))) continue;
                EducationalBackground::create([
                    'user_id' => $user->id,
                    'name_of_school' => $eb['name_of_school'] ?? null,
                    'level_id' => $eb['level_id'] ?? null,
                    'tenure_start' => $eb['tenure_start'] ?? null,
                    'tenure_end' => $eb['tenure_end'] ?? null,
                ]);
            }
        }

        // Dependents
        if (!empty($validated['dependents'])) {
            foreach ($validated['dependents'] as $dep) {
                if (empty(array_filter($dep))) continue;
                $depModel = Dependent::create([
                    'user_id' => $user->id,
                    'name' => $dep['name'] ?? null,
                    'birthdate' => $dep['birthdate'] ?? null,
                    'age' => $dep['age'] ?? null,
                    'gender' => $dep['gender'] ?? null,
                    'relationship' => $dep['relationship'] ?? null,
                ]);
                try { Log::info('users.store - dependent_saved', ['user_id' => $user->id, 'dependent_id' => $depModel->id]); } catch (\Throwable $e) {}
            }
        }

        // Employee work informations
        if (!empty($validated['employee_work_informations'])) {
            foreach ($validated['employee_work_informations'] as $wi) {
                if (empty(array_filter($wi))) continue;
                EmployeeWorkInformation::create([
                    'user_id' => $user->id,
                    'hire_date' => $wi['hire_date'] ?? null,
                    'employment_status_id' => $wi['employment_status_id'] ?? null,
                    'regularization' => $wi['regularization'] ?? null,
                    'designation_id' => $wi['designation_id'] ?? null,
                    'department_id' => $wi['department_id'] ?? null,
                    'direct_supervisor' => $wi['direct_supervisor'] ?? null,
                    'monthly_rate' => $wi['monthly_rate'] ?? null,
                    'daily_rate' => $wi['daily_rate'] ?? null,
                    'hourly_rate' => $wi['hourly_rate'] ?? null,
                ]);
            }
        }

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        // Include branches so modal can pre-select user's branches
        $user = User::with(['roles', 'branches'])->findOrFail($id);
        return response()->json($user);
    }

    // Display the specified user
    public function show($id)
    {
    $user = User::findOrFail($id);

    return view('users.show', compact('user'));
    }

    // Update the specified user
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $id,
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'mobile_number' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'branches' => 'nullable|array',
        'branches.*' => 'exists:branches,id',
    ]);

    // Handle image upload if new one is uploaded
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('users', 'public');
        $validated['image'] = $imagePath;
    }

    $user->update($validated);

    // Update roles using pivot sync so numeric IDs are handled correctly
    if ($request->has('roles')) {
        $user->roles()->sync($request->input('roles', []));
    }

    // Update branches (pivot)
    if ($request->has('branches')) {
        $user->branches()->sync($request->input('branches', []));
    }

    return redirect()->back()->with('success', 'User updated successfully.');
}



    // Remove the specified user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
            return redirect()
        ->route('users.index') 
        ->with('success', 'User deleted successfully.');
    }

    public function viewProfile($id)
    {
        $user = User::findOrFail($id);

        // Load a Blade view and pass user data to it
        $pdf = Pdf::loadView('users.profile-pdf', compact('user'));

        // Download directly
        return $pdf->download($user->name . '.pdf');
    }

    public function archive(User $user)
    {
        $user->update(['status' => 'archived']);
        return redirect()->route('users.index', ['status' => 'active'])
                        ->with('success', 'User moved to archive.');
    }

    public function restore(User $user)
    {
        $user->update(['status' => 'active']);
        return redirect()->route('users.index', ['status' => 'archived'])
                        ->with('success', 'User restored successfully.');
    }

    public function updateStatus(User $user, $status)
    {
        $validStatuses = ['active', 'resigned', 'terminated'];

        if (!in_array($status, $validStatuses)) {
            return back()->with('error', 'Invalid status');
        }

        $user->status = $status;
        $user->save();

        return back()->with('success', 'User status updated to ' . ucfirst($status));
    }

}
