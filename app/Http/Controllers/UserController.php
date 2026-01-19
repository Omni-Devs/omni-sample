<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
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

        // list of users for selects (supervisor etc.)
        $users = User::orderBy('username')->get();

        return view('users.form', compact('roles', 'branches', 'permissions', 'shifts', 'allowances', 'leaves', 'designations', 'departments', 'salaryMethods', 'users'));
    }

    // Store a newly created user
    public function store(Request $request)
    {
        // Normal processing: handle incoming request and create user
            // Determine if this is an Access-only submission (credentials + branch permissions)
            // Previous heuristic treated any request with a username or the allow_db_user checkbox
            // as access-only which made full "basic" fields (first_name/last_name/email) get
            // ignored and stored as null. Instead, only treat the request as access-only when
            // admin explicitly provided DB credentials but did NOT supply any basic identity
            // fields. This covers the UI where the Access tab may be used standalone.
            $hasBasicIdentity = $request->filled('name') || $request->filled('first_name') || $request->filled('last_name') || $request->filled('email');
            $isAccessOnly = ($request->has('allow_db_user') || $request->filled('username')) && !$hasBasicIdentity;

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
                    'last_name' => 'nullable|string|max:255',
                    'first_name' => 'nullable|string|max:255',
                    'middle_name' => 'nullable|string|max:255',
                    // 'name' is not required; we build a display name from first/last if absent
                    'username' => 'nullable|string|max:255|unique:users,username',
                    'email' => 'nullable|string|email|max:255|unique:users,email',
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

                    // 'salary_method' => 'nullable|array',
                    // 'salary_method.shift_id' => 'nullable|exists:workforce_shifts,id',

                    // === SALARY METHOD VALIDATION ===
                    'salary_method' => 'nullable|array',
                    'salary_method.method_id' => 'nullable|string|in:cash,bank,check,agency',
                    'salary_method.period_id' => 'nullable|string|in:bi-monthly,monthly,weekly,daily',
                    'salary_method.account' => 'nullable|string|max:255',
                    'salary_method.shift_id' => 'nullable|exists:workforce_shifts,id',
                    'salary_method.custom_time_start' => 'nullable|date_format:H:i',
                    'salary_method.custom_time_end' => 'nullable|date_format:H:i',
                    'salary_method.custom_break_start' => 'nullable|date_format:H:i',
                    'salary_method.custom_break_end' => 'nullable|date_format:H:i',
                    'salary_method.custom_work_days' => 'nullable|string', // JSON string from JS
                    'salary_method.custom_rest_days' => 'nullable|string',
                    'salary_method.custom_open_time' => 'nullable|string',

                    // === ALLOWANCES & LEAVES ===
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
                            // normalize permissions: accept either an array or a comma-separated string
                            $permsRaw = $row['permissions'] ?? [];
                            if (!is_array($permsRaw)) {
                                // might be a comma-separated string from the JS widget
                                if (is_string($permsRaw)) {
                                    $permsArr = array_filter(array_map('trim', explode(',', $permsRaw)), function($v){ return $v !== null && $v !== ''; });
                                } else {
                                    $permsArr = [];
                                }
                            } else {
                                $permsArr = array_filter($permsRaw, function($v){ return $v !== null && $v !== ''; });
                            }
                            $row['permissions'] = array_values($permsArr);
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
        // Also collect permission ids so we can assign those permissions to the user
        if (!empty($validated['branch_permissions'])) {
            $collectedPermIds = [];
            foreach ($validated['branch_permissions'] as $row) {
                $branchId = $row['branch_id'] ?? null;
                $perms = $row['permissions'] ?? [];
                if (empty($branchId) || !is_array($perms) || empty($perms)) continue;
                foreach ($perms as $permId) {
                    if (empty($permId)) continue;
                    $collectedPermIds[] = $permId;
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

            // Assign collected permissions to the user so global permission checks (e.g. sidebar @can / ->can)
            // succeed. This is a pragmatic short-term fix: it grants the selected permissions directly
            // to the user (not scoped by branch). For branch-scoped enforcement, implement branch-aware
            // middleware or adjust view checks to consult branch_permission.
            $collectedPermIds = array_values(array_unique(array_filter($collectedPermIds)));
            if (!empty($collectedPermIds)) {
                try {
                    $permNames = Permission::whereIn('id', $collectedPermIds)->pluck('name')->toArray();
                    if (!empty($permNames)) {
                        // givePermissionTo accepts names or Permission models
                        $user->givePermissionTo($permNames);
                    }
                } catch (\Throwable $e) {
                    // log but don't break user creation
                    try { Log::warning('users.store - givePermissionTo failed', ['error' => $e->getMessage()]); } catch (\Throwable $_) {}
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

 // === SALARY METHOD WITH CUSTOM SHIFT & WEEKLY SCHEDULE ===
if (!empty($validated['salary_method'])) {
    $sm = $validated['salary_method'];

    // Decode JSON strings from hidden inputs (or null if empty)
    $customWorkDays = !empty($sm['custom_work_days'])
        ? json_decode($sm['custom_work_days'], true)
        : null;

    $customRestDays = !empty($sm['custom_rest_days'])
        ? json_decode($sm['custom_rest_days'], true)
        : null;

    $customOpenTime = !empty($sm['custom_open_time'])
        ? json_decode($sm['custom_open_time'], true)
        : null;

    // Now re-encode them as JSON strings for DB storage
    SalaryMethod::updateOrCreate(
        ['user_id' => $user->id],
        [
            'method_id'   => $sm['method_id'] ?? null,
            'period_id'   => $sm['period_id'] ?? null,
            'account'     => $sm['account'] ?? null,
            'shift_id'    => $sm['shift_id'] ?? null,

            'custom_time_start'   => $sm['custom_time_start'] ?? null,
            'custom_time_end'     => $sm['custom_time_end'] ?? null,
            'custom_break_start'  => $sm['custom_break_start'] ?? null,
            'custom_break_end'    => $sm['custom_break_end'] ?? null,

            // Encode arrays → JSON strings
            'custom_work_days' => $customWorkDays ? json_encode($customWorkDays) : null,
            'custom_rest_days' => $customRestDays ? json_encode($customRestDays) : null,
            'custom_open_time' => $customOpenTime ? json_encode($customOpenTime) : null,
        ]
    );
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

        // First delete old attachments if needed (or keep them and just add new)
        $user->attachments()->delete(); // optional: replace all on update

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $index => $file) {
                $attachmentName = $request->input("attachment_names.$index");

                if ($file->isValid() && !empty($attachmentName)) {
                    $filename = $file->getClientOriginalName();
                    $path = $file->storeAs('attachments', $user->id . '_' . time() . '_' . $filename, 'public');

                    Attachment::create([
                        'user_id'    => $user->id,
                        'name'       => $attachmentName,
                        'file_path'  => $path,
                        'file_name'  => $filename,
                        'mime_type'  => $file->getMimeType(),
                    ]);
                }
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

            $statusMap = [
                'probationary' => 1,
                'regular'      => 2,
                'promotion'    => 3,
                'contractual'  => 4,
                'resigned'     => 5,
            ];
            foreach ($validated['employee_work_informations'] as $wi) {

                $employmentStatusId = $statusMap[$wi['employment_status_id']] ?? null;

                if (empty(array_filter($wi))) continue;
                EmployeeWorkInformation::create([
                    'user_id' => $user->id,
                    'hire_date' => $wi['hire_date'] ?? null,
                    'employment_status_id' => $employmentStatusId,
                    'regularization' => $wi['regularization'] ?? null,
                    'designation_id' => $wi['designation_id'] ?? null,
                    'department_id' => $wi['department_id'] ?? null,
                    'direct_supervisor' => $wi['direct_supervisor'] ?? null,
                    'monthly_rate' => $wi['monthly_rate'] ?? null,
                    'daily_rate' => $wi['daily_rate'] ?? null,
                    'hourly_rate' => $wi['hourly_rate'] ?? null,
                    'position' => $wi['position'] ?? null,
                ]);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
    
    // GET: Show the full edit page
    public function edit($id)
    {
        $user = User::with([
            'spouseDetail',
            'contactPerson',
            'salaryMethod',
            'dependents',
            'educationalBackgrounds',
            'employeeWorkInformations',
            'branches',
            'allowances',
            'leaves'
        ])->findOrFail($id);

        // Same data as create()
        $branches = Branch::all();
        $permissions = Permission::all();
        $shifts = WorkforceShift::all();
        $allowances = WorkforceAllowance::all();
        $leaves = WorkLeave::all();
        $salaryMethods = [
            'cash' => 'Cash',
            'bank' => 'Bank Transfer',
            'check' => 'Check',
            'agency' => 'Agency',
        ];
        $designations = Designation::all();
        $departments = Department::all();
        $users = User::orderBy('username')->get();

        // Extract related data for the view
        $spouse = $user->spouseDetail;
        $contactPerson = $user->contactPerson;
        $dependents = $user->dependents;
        $educationalBackgrounds = $user->educationalBackgrounds;
        $workInformations = $user->employeeWorkInformations;

        // entries for the branch and the user's direct permissions.
        $userPermissionIds = $user->getDirectPermissions()->pluck('id')->toArray();
        $userBranchPermissions = [];
        foreach ($user->branches as $b) {
            $bpIds = DB::table('branch_permission')->where('branch_id', $b->id)->pluck('permission_id')->toArray();
            $userBranchPermissions[$b->id] = array_values(array_intersect($bpIds, $userPermissionIds));
        }
        
        // (no work info creation should happen in edit() — it's handled on store/update flows)

        return view('users.edit', [
            'user' => $user,
            'branches' => $branches,
            'permissions' => $permissions,
            'shifts' => $shifts,
            'allowances' => $allowances,
            'leaves' => $leaves,
            'salaryMethods' => $salaryMethods,
            'designations' => $designations,
            'departments' => $departments,
            'users' => $users,
            'spouse' => $spouse,
            'contactPerson' => $contactPerson,
            'dependents' => $dependents,
            'educationalBackgrounds' => $educationalBackgrounds,
            'workInformations' => $workInformations,
            'userBranchPermissions' => $userBranchPermissions,
        ]);
    }

    // PUT/PATCH: Save the updated data
    public function update(Request $request, $id)
    {
        // Reuse almost the same logic as your store() method
        // Just change create() → update(), and use updateOrCreate for related models

        $user = User::findOrFail($id);

        // Validation rules (same as store, but add unique ignore for email/username)
        // Make basic identity fields nullable on update so users who were
        // created via access-only flows (or missing name/email) can still
        // update other tabs (like Work Information) without being blocked
        // by strict validation here.
        $rules = [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'username' => 'nullable|unique:users,username,' . $id,
            // ... add other rules like in store() if needed
        ];

        $request->validate($rules);

        // Update user fields
        $user->update($request->only([
            'first_name', 'last_name', 'middle_name', 'email', 'mobile_number',
            'biometric_number', 'id_number', 'date_of_birth', 'gender_id',
            'tin', 'phil_health_number', 'pag_ibig_number', 'blood_type_id',
            'civil_status_id', 'address'
        ]));


        // Employee work informations are handled later in the update() flow using
        // a delete + recreate strategy to ensure the DB matches the submitted
        // indexed inputs from the form. This avoids duplicate/contradictory
        // update logic.

        // Handle image
        if ($request->hasFile('image')) {
            // Optional: delete old image
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $user->image = $request->file('image')->store('users', 'public');
            $user->save();
        }

        // Update username & password if provided
        if ($request->filled('username')) {
            $user->username = $request->username;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Update related models (same logic as store, but use updateOrCreate)
        // Spouse
        if ($request->has('spouse')) {
            SpouseDetail::updateOrCreate(
                ['user_id' => $user->id],
                $request->input('spouse')
            );
        }

        // Contact Person
        if ($request->has('contact_person')) {
            ContactPerson::updateOrCreate(
                ['user_id' => $user->id],
                $request->input('contact_person')
            );
        }

        // Dependents: delete old, create new
        $user->dependents()->delete();
        if ($request->has('dependents')) {
            foreach ($request->input('dependents') as $dep) {
                if (array_filter($dep)) {
                    $user->dependents()->create($dep);
                }
            }
        }

        // Educational Backgrounds
        $user->educationalBackgrounds()->delete();
        if ($request->has('educational_backgrounds')) {
            foreach ($request->input('educational_backgrounds') as $eb) {
                if (array_filter($eb)) {
                    $user->educationalBackgrounds()->create($eb);
                }
            }
        }

        // Work Informations
        $user->employeeWorkInformations()->delete();
        if ($request->has('employee_work_informations')) {
            foreach ($request->input('employee_work_informations') as $wi) {
                if (array_filter($wi)) {
                    $user->employeeWorkInformations()->create($wi);
                }
            }
        }

        // === Branch Permissions (update) ===
        // Normalize branch_permissions: drop entries that are completely empty
        $input = $request->all();
        $bpFiltered = [];
        if (!empty($input['branch_permissions']) && is_array($input['branch_permissions'])) {
            foreach ($input['branch_permissions'] as $row) {
                $hasBranch = isset($row['branch_id']) && $row['branch_id'] !== '' && $row['branch_id'] !== null;
                $hasPerms = false;
                // permissions may be provided as an array or as a comma-separated string
                if (isset($row['permissions'])) {
                    if (is_array($row['permissions'])) {
                        $hasPerms = count(array_filter($row['permissions'], function($v){ return $v !== null && $v !== ''; })) > 0;
                    } elseif (is_string($row['permissions'])) {
                        $tmp = array_filter(array_map('trim', explode(',', $row['permissions'])), function($v){ return $v !== null && $v !== ''; });
                        $hasPerms = count($tmp) > 0;
                    }
                }

                if ($hasBranch || $hasPerms) {
                    // normalize permissions into an array of non-empty values
                    $permsRaw = $row['permissions'] ?? [];
                    if (!is_array($permsRaw)) {
                        if (is_string($permsRaw)) {
                            $permsArr = array_filter(array_map('trim', explode(',', $permsRaw)), function($v){ return $v !== null && $v !== ''; });
                        } else {
                            $permsArr = [];
                        }
                    } else {
                        $permsArr = array_filter($permsRaw, function($v){ return $v !== null && $v !== ''; });
                    }
                    $row['permissions'] = array_values($permsArr);
                    $bpFiltered[] = $row;
                }
            }
        }

        // If branch_permissions were provided, sync branches and permissions
        if ($request->has('branch_permissions')) {
            if (!empty($bpFiltered)) {
                $branchIds = [];
                $collectedPermIds = [];
                foreach ($bpFiltered as $row) {
                    if (!empty($row['branch_id'])) {
                        $branchIds[] = $row['branch_id'];
                    }
                    $perms = $row['permissions'] ?? [];
                    if (!empty($perms) && is_array($perms)) {
                        foreach ($perms as $permId) {
                            if (empty($permId)) continue;
                            $collectedPermIds[] = $permId;
                            $exists = DB::table('branch_permission')
                                ->where('branch_id', $row['branch_id'])
                                ->where('permission_id', $permId)
                                ->exists();
                            if (!$exists) {
                                DB::table('branch_permission')->insert([
                                    'branch_id' => $row['branch_id'],
                                    'permission_id' => $permId,
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            }
                        }
                    }
                }

                // sync branches for the user
                if (!empty($branchIds)) {
                    $user->branches()->sync(array_values(array_unique($branchIds)));
                } else {
                    $user->branches()->sync([]);
                }

                // sync direct permissions for the user to match the selected ones
                $collectedPermIds = array_values(array_unique(array_filter($collectedPermIds)));
                if (!empty($collectedPermIds)) {
                    $permNames = Permission::whereIn('id', $collectedPermIds)->pluck('name')->toArray();
                    // replace user's direct permissions with the selected ones
                    try {
                        $user->syncPermissions($permNames);
                    } catch (\Throwable $e) {
                        try { Log::warning('users.update - syncPermissions failed', ['error' => $e->getMessage()]); } catch (\Throwable $_) {}
                    }
                } else {
                    // no permissions selected for branches: remove any direct permissions granted via branch selection
                    try { $user->syncPermissions([]); } catch (\Throwable $_) {}
                }
            } else {
                // branch_permissions submitted but empty -> clear branches and branch-scoped permissions
                $user->branches()->sync([]);
                try { $user->syncPermissions([]); } catch (\Throwable $_) {}
            }
        } elseif ($request->has('branches')) {
            // fallback: sync raw branches[] input if provided
            $user->branches()->sync($request->input('branches', []));
        }
        return redirect()->route('users.index')->with('success', 'Employee updated successfully!');
    }

    // Display the specified user
    public function show($id)
    {
    $user = User::findOrFail($id);

    return view('users.show', compact('user'));
    }

    // // Update the specified user
    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);

    //     $validated = $request->validate([
    //         'last_name' => 'required|string|max:255',
    //         'first_name' => 'required|string|max:255',
    //         'middle_name' => 'nullable|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'username' => 'required|string|max:255|unique:users,username,' . $id,
    //         'email' => 'required|email|max:255|unique:users,email,' . $id,
    //         'mobile_number' => 'nullable|string|max:20',
    //         'address' => 'nullable|string|max:255',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    //         'branches' => 'nullable|array',
    //         'branches.*' => 'exists:branches,id',
    //     ]);

    //     // Handle image upload if new one is uploaded
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('users', 'public');
    //         $validated['image'] = $imagePath;
    //     }

    //     $user->update($validated);

    //     // Update roles using pivot sync so numeric IDs are handled correctly
    //     if ($request->has('roles')) {
    //         $user->roles()->sync($request->input('roles', []));
    //     }

    //     // Update branches (pivot)
    //     if ($request->has('branches')) {
    //         $user->branches()->sync($request->input('branches', []));
    //     }

    //     return redirect()->back()->with('success', 'User updated successfully.');
    // }

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
