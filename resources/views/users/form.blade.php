@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-3">Create Employee</h1>
        <ul>
            <li><a href="{{ route('users.index') }}">People</a></li>
            <li>Employees</li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="card">
        <div class="card-header p-0">
            <ul class="nav nav-tabs card-header-tabs" id="userCreateTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true">Basic Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="access-tab" data-toggle="tab" href="#access" role="tab" aria-controls="access" aria-selected="false">Access Credentials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="false">Work Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="educ-tab" data-toggle="tab" href="#educ" role="tab" aria-controls="educ" aria-selected="false">Educational Background</a>
                </li>
            </ul>
        </div>

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- show validation / session messages so basic-tab-only submissions surface errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="tab-content" id="userCreateTabContent">
                    <!-- Basic Information -->
                    <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="biometric_number">Biometric Number</label>
                                            <input type="text" name="biometric_number" id="biometric_number" class="form-control" value="{{ old('biometric_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_number">ID Number</label>
                                            <input type="text" name="id_number" id="id_number" class="form-control" value="{{ old('id_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tin">TIN</label>
                                            <input type="text" name="tin" id="tin" class="form-control" value="{{ old('tin') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender_id">Gender</label>
                                            <select name="gender_id" id="gender_id" class="form-control">
                                                <option value="">-- Select Gender --</option>
                                                <option value="Male" {{ old('gender_id') == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender_id') == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ old('gender_id') == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="blood_type_id">Blood Type</label>
                                            <select name="blood_type_id" id="blood_type_id" class="form-control">
                                                <option value="">-- Select Blood Type --</option>
                                                <option value="A+" {{ old('blood_type_id') == 'A+' ? 'selected' : '' }}>A+</option>
                                                <option value="A-" {{ old('blood_type_id') == 'A-' ? 'selected' : '' }}>A-</option>
                                                <option value="B+" {{ old('blood_type_id') == 'B+' ? 'selected' : '' }}>B+</option>
                                                <option value="B-" {{ old('blood_type_id') == 'B-' ? 'selected' : '' }}>B-</option>
                                                <option value="AB+" {{ old('blood_type_id') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                                <option value="AB-" {{ old('blood_type_id') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                                <option value="O+" {{ old('blood_type_id') == 'O+' ? 'selected' : '' }}>O+</option>
                                                <option value="O-" {{ old('blood_type_id') == 'O-' ? 'selected' : '' }}>O-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile_number">Mobile #</label>
                                            <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ old('mobile_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pag_ibig_number">PAG-IBIG</label>
                                            <input type="text" name="pag_ibig_number" id="pag_ibig_number" class="form-control" value="{{ old('pag_ibig_number') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="civil_status_id">Civil Status</label>
                                            <select name="civil_status_id" id="civil_status_id" class="form-control">
                                                <option value="">-- Select Civil Status --</option>
                                                <option value="Single" {{ old('civil_status_id') == 'Single' ? 'selected' : '' }}>Single</option>
                                                <option value="Married" {{ old('civil_status_id') == 'Married' ? 'selected' : '' }}>Married</option>
                                                <option value="Widowed" {{ old('civil_status_id') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                                <option value="Separated" {{ old('civil_status_id') == 'Separated' ? 'selected' : '' }}>Separated</option>
                                                <option value="Divorced" {{ old('civil_status_id') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Spouse details (inline compact form) -->
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h6 class="mb-3">Spouse Details</h6>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="spouse[name]" class="form-control" placeholder="Full Name" value="{{ old('spouse.name') }}">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="date" name="spouse[date_of_birth]" class="form-control" value="{{ old('spouse.date_of_birth') }}">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="number" name="spouse[age]" class="form-control" placeholder="Age" value="{{ old('spouse.age') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Dependents table -->
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h6 class="mb-3">Dependents (Optional)</h6>
                                        <div id="dependents-list">
                                            <div class="dependent-row row mb-2">
                                                <div class="col-md-3"><input type="text" name="dependents[0][name]" class="form-control" placeholder="Name"></div>
                                                <div class="col-md-2"><input type="date" name="dependents[0][birthdate]" class="form-control" placeholder="Birthdate"></div>
                                                <div class="col-md-1"><input type="number" name="dependents[0][age]" class="form-control" placeholder="Age"></div>
                                                <div class="col-md-3"><input type="text" name="dependents[0][gender]" class="form-control" placeholder="Gender"></div>
                                                <div class="col-md-2"><input type="text" name="dependents[0][relationship]" class="form-control" placeholder="Relationship"></div>
                                                <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger remove-dependent">-</button></div>
                                            </div>
                                        </div>
                                        <button type="button" id="add-dependent" class="btn btn-sm btn-outline-primary">Add dependent</button>
                                    </div>
                                </div>

                                <!-- Emergency contact -->
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h6 class="mb-3">Contact Information In Case of Emergency</h6>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="contact_person[name]" class="form-control" placeholder="Full Name" value="{{ old('contact_person.name') }}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="contact_person[contact_number]" class="form-control" placeholder="Contact Number" value="{{ old('contact_person.contact_number') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contact_person[address]" class="form-control" placeholder="Address" value="{{ old('contact_person.address') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <label>Photo</label>
                                    <div class="border rounded p-3" style="position:relative;min-height:160px;">
                                        <input type="file" name="image" id="image" class="form-control-file mb-2">
                                        <input type="file" name="avatar" id="avatar" class="form-control-file mb-2">
                                        <div id="create-user-image-preview"></div>
                                        <div id="create-user-avatar-preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Access Credentials -->
                    <div class="tab-pane fade" id="access" role="tabpanel" aria-labelledby="access-tab">
                        <div class="row">
                            <div class="col-md-6">
                                {{-- <div class="form-group">
                                    <label for="roles">Roles</label>
                                    <select name="roles[]" id="roles" class="form-control" multiple required>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">Hold Ctrl (Windows) / Cmd (Mac) to select multiple.</small>
                                </div> --}}

                                <div class="form-group form-check">
                                    <input type="checkbox" name="allow_db_user" id="allow_db_user" class="form-check-input" value="1" {{ old('allow_db_user') ? 'checked' : '' }}>
                                    <label for="allow_db_user" class="form-check-label">Allow employee to be Database User</label>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <h6>Branch Permissions</h6>
                                <p class="text-muted">Assign permissions per branch. Add multiple branch rows.</p>
                                <div id="branch-permissions-list">
                                    <div class="branch-permission-row form-row align-items-center mb-2">
                                        <div class="col-md-5">
                                            <label class="sr-only">Branch</label>
                                            <select name="branch_permissions[0][branch_id]" class="form-control">
                                                <option value="">Select branch</option>
                                                @foreach($branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="sr-only">Permissions</label>
                                            <select name="branch_permissions[0][permissions][]" class="form-control">
                                                <option value="">Select permissions</option>
                                                @foreach($permissions as $perm)
                                                    <option value="{{ $perm->id }}">{{ $perm->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-sm btn-outline-danger remove-branch">-</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add-branch-permission" class="btn btn-sm btn-outline-primary">Add branch</button>
                            </div>
                        </div>
                    </div>

                    <!-- Work Information -->
                    <div class="tab-pane fade" id="work" role="tabpanel" aria-labelledby="work-tab">
                        <div class="card">
                            <div class="card-body">
                                <h6>Work Informations</h6>

                                <!-- Table of work information entries -->
                                <div class="table-responsive mb-3">
                                    <table class="table table-bordered" id="workinfo-table">
                                        <thead>
                                            <tr>
                                                <th>Hire Date</th>
                                                <th>Status</th>
                                                <th>Regularization</th>
                                                <th>Designation</th>
                                                <th>Department</th>
                                                <th>Supervisor</th>
                                                <th>Monthly Rate</th>
                                                <th>Daily Rate</th>
                                                <th>Hourly Rate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- JS will append rows from form inputs -->
                                        </tbody>
                                    </table>
                                </div>

                                <button type="button" id="open-workinfo-form" class="btn btn-sm btn-outline-primary mb-3">Add Work Info</button>

                                <div id="workinfo-form" style="display:none;" class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3 form-group"><label>Hire Date</label><input type="date" id="wi_hire_date" class="form-control"></div>
                                        <div class="col-md-2 form-group"><label>Status</label><input type="text" id="wi_status" class="form-control" placeholder="Status"></div>
                                        <div class="col-md-2 form-group"><label>Regularization</label><input type="date" id="wi_regularization" class="form-control"></div>
                                        <div class="col-md-2 form-group"><label>Designation</label><input type="text" id="wi_designation" class="form-control" placeholder="Designation"></div>
                                        <div class="col-md-2 form-group"><label>Department</label><input type="text" id="wi_department" class="form-control" placeholder="Department"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 form-group"><label>Supervisor (user id)</label><input type="number" id="wi_supervisor" class="form-control" placeholder="Supervisor id"></div>
                                        <div class="col-md-3 form-group"><label>Monthly Rate</label><input type="number" step="0.01" id="wi_monthly_rate" class="form-control"></div>
                                        <div class="col-md-3 form-group"><label>Daily Rate</label><input type="number" step="0.01" id="wi_daily_rate" class="form-control"></div>
                                        <div class="col-md-3 form-group"><label>Hourly Rate</label><input type="number" step="0.01" id="wi_hourly_rate" class="form-control"></div>
                                    </div>
                                    <div>
                                        <button type="button" id="save-workinfo" class="btn btn-primary btn-sm">Save</button>
                                        <button type="button" id="cancel-workinfo" class="btn btn-secondary btn-sm">Cancel</button>
                                    </div>
                                </div>

                                <hr>

                                <h6>Salary Method</h6>
                                <div class="row mb-3">
                                    <div class="col-md-3 form-group">
                                        <label>Salary Method</label>
                                        <select name="salary_method[method_id]" class="form-control">
                                            <option value="">-- Select Method --</option>
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank Transfer</option>
                                            <option value="check">Check</option>
                                            <option value="agency">Agency</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Salary Period</label>
                                        <select name="salary_method[period_id]" class="form-control">
                                            <option value="bi-monthly">Bi-Monthly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="daily">Daily</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Account Name / Number</label>
                                        <input type="text" name="salary_method[account]" class="form-control">
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Shift</label>
                                        <select name="salary_method[shift_id]" class="form-control">
                                            <option value="">-- Select Shift --</option>
                                            @foreach($shifts as $shift)
                                                <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <h6 class="mt-3">Allowances</h6>
                                <div id="allowances-list">
                                    <div class="allowance-row d-flex mb-2 align-items-center">
                                        <select name="allowances[0][allowance_id]" class="form-control mr-2" style="width:40%">
                                            <option value="">-- Select allowance --</option>
                                            @foreach($allowances as $al)
                                                <option value="{{ $al->id }}">{{ $al->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="number" name="allowances[0][amount]" class="form-control mr-2 allowance-amount" placeholder="Amount">
                                        <input type="number" name="allowances[0][monthly_count]" class="form-control mr-2 allowance-count" placeholder="Monthly count">
                                        <button type="button" class="btn btn-sm btn-outline-danger remove-allowance">Remove</button>
                                    </div>
                                </div>
                                <button type="button" id="add-allowance" class="btn btn-sm btn-outline-primary">Add allowance</button>

                                <h6 class="mt-3">Leaves</h6>
                                <div id="leaves-list">
                                    @foreach($leaves as $i => $lv)
                                    <div class="form-row align-items-center mb-2">
                                        <div class="col-md-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="leaves[{{ $i }}][leave_id]" value="{{ $lv->id }}" id="leave_{{ $lv->id }}">
                                                <label class="form-check-label" for="leave_{{ $lv->id }}">{{ $lv->name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2"><input type="number" name="leaves[{{ $i }}][days]" class="form-control" placeholder="Days"></div>
                                        <div class="col-md-3"><input type="date" name="leaves[{{ $i }}][effective_date]" class="form-control"></div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Educational Background -->
                    <div class="tab-pane fade" id="educ" role="tabpanel" aria-labelledby="educ-tab">
                        <div class="card">
                            <div class="card-body">
                                <h6>Educational Background</h6>
                                <div id="educ-bg-list">
                                    <div class="educ-row row mb-2">
                                        <div class="col-md-5"><input type="text" name="educational_backgrounds[0][name_of_school]" class="form-control" placeholder="Name of school"></div>
                                        <div class="col-md-2"><input type="number" name="educational_backgrounds[0][level_id]" class="form-control" placeholder="Level id"></div>
                                        <div class="col-md-2"><input type="date" name="educational_backgrounds[0][tenure_start]" class="form-control"></div>
                                        <div class="col-md-2"><input type="date" name="educational_backgrounds[0][tenure_end]" class="form-control"></div>
                                        <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger remove-educ">-</button></div>
                                    </div>
                                </div>
                                <button type="button" id="add-educ" class="btn btn-sm btn-outline-primary">Add education</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <div>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
// Image previews
document.getElementById('image')?.addEventListener('change', function(e){
    const file = e.target.files && e.target.files[0];
    if(!file) return;
    if(!file.type.startsWith('image/')) return;
    const reader = new FileReader();
    reader.onload = function(ev){
        let img = document.getElementById('create-user-image-preview');
        if(!img){
            img = document.createElement('img');
            img.id = 'create-user-image-preview';
            img.className = 'img-thumbnail mt-2';
            img.style.maxWidth = '190px';
            document.getElementById('image').parentNode.appendChild(img);
        }
        img.src = ev.target.result;
    }
    reader.readAsDataURL(file);
});
document.getElementById('avatar')?.addEventListener('change', function(e){
    const file = e.target.files && e.target.files[0];
    if(!file) return;
    if(!file.type.startsWith('image/')) return;
    const reader = new FileReader();
    reader.onload = function(ev){
        let img = document.getElementById('create-user-avatar-preview');
        if(!img){
            img = document.createElement('img');
            img.id = 'create-user-avatar-preview';
            img.className = 'img-thumbnail mt-2';
            img.style.maxWidth = '190px';
            document.getElementById('avatar').parentNode.appendChild(img);
        }
        img.src = ev.target.result;
    }
    reader.readAsDataURL(file);
});

// Repeatable educational backgrounds
(() => {
    let educIndex = 1;
    document.getElementById('add-educ')?.addEventListener('click', function(){
        const container = document.getElementById('educ-bg-list');
        const row = document.createElement('div');
        row.className = 'educ-row row mb-2';
        row.innerHTML = `\
            <div class="col-md-5"><input type="text" name="educational_backgrounds[${educIndex}][name_of_school]" class="form-control" placeholder="Name of school"></div>\
            <div class="col-md-2"><input type="number" name="educational_backgrounds[${educIndex}][level_id]" class="form-control" placeholder="Level id"></div>\
            <div class="col-md-2"><input type="date" name="educational_backgrounds[${educIndex}][tenure_start]" class="form-control"></div>\
            <div class="col-md-2"><input type="date" name="educational_backgrounds[${educIndex}][tenure_end]" class="form-control"></div>\
            <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger remove-educ">-</button></div>`;
        container.appendChild(row);
        educIndex++;
    });
    document.getElementById('educ-bg-list')?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-educ')){
            e.target.closest('.educ-row').remove();
        }
    });
})();

// Allowances add/remove
(() => {
    let aIndex = 1;
    const addAllowanceBtn = document.getElementById('add-allowance');
    const allowancesContainer = document.getElementById('allowances-list');
    addAllowanceBtn?.addEventListener('click', function(){
        const row = document.createElement('div');
        row.className = 'allowance-row d-flex mb-2 align-items-center';
        let options = `\n                                            <option value="">-- Select allowance --</option>`;
        @foreach($allowances as $al)
            options += `\n                                                <option value="{{ $al->id }}">{{ addslashes($al->name) }}</option>`;
        @endforeach
        row.innerHTML = `\n            <select name="allowances[${aIndex}][allowance_id]" class="form-control mr-2" style="width:40%">${options}</select>\n            <input type="number" name="allowances[${aIndex}][amount]" class="form-control mr-2 allowance-amount" placeholder="Amount">\n            <input type="number" name="allowances[${aIndex}][monthly_count]" class="form-control mr-2 allowance-count" placeholder="Monthly count">\n            <button type="button" class="btn btn-sm btn-outline-danger remove-allowance">Remove</button>`;
        allowancesContainer.appendChild(row);
        aIndex++;
    });

    allowancesContainer?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-allowance')){
            e.target.closest('.allowance-row').remove();
        }
    });
})();

// Work info add/edit (table + hidden inputs)
(function(){
    let wiIndex = 0;
    const openBtn = document.getElementById('open-workinfo-form');
    const formPane = document.getElementById('workinfo-form');
    const cancelBtn = document.getElementById('cancel-workinfo');
    const saveBtn = document.getElementById('save-workinfo');
    const tableBody = document.querySelector('#workinfo-table tbody');

    openBtn?.addEventListener('click', function(){
        formPane.style.display = '';
    });
    cancelBtn?.addEventListener('click', function(){
        formPane.style.display = 'none';
        // clear inputs
        ['wi_hire_date','wi_status','wi_regularization','wi_designation','wi_department','wi_supervisor','wi_monthly_rate','wi_daily_rate','wi_hourly_rate'].forEach(id=>{ const el=document.getElementById(id); if(el) el.value=''; });
    });

    saveBtn?.addEventListener('click', function(){
        // read values
        const data = {
            hire_date: document.getElementById('wi_hire_date')?.value || '',
            employment_status: document.getElementById('wi_status')?.value || '',
            regularization: document.getElementById('wi_regularization')?.value || '',
            designation: document.getElementById('wi_designation')?.value || '',
            department: document.getElementById('wi_department')?.value || '',
            supervisor: document.getElementById('wi_supervisor')?.value || '',
            monthly_rate: document.getElementById('wi_monthly_rate')?.value || '',
            daily_rate: document.getElementById('wi_daily_rate')?.value || '',
            hourly_rate: document.getElementById('wi_hourly_rate')?.value || '',
        };

        // simple validation: require hire_date
        if(!data.hire_date){ alert('Please enter Hire Date'); return; }

        // create table row with visible text and hidden inputs
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${data.hire_date}<input type="hidden" name="employee_work_informations[${wiIndex}][hire_date]" value="${data.hire_date}"></td>
            <td>${data.employment_status}<input type="hidden" name="employee_work_informations[${wiIndex}][employment_status_id]" value="${data.employment_status}"></td>
            <td>${data.regularization}<input type="hidden" name="employee_work_informations[${wiIndex}][regularization]" value="${data.regularization}"></td>
            <td>${data.designation}<input type="hidden" name="employee_work_informations[${wiIndex}][designation_id]" value="${data.designation}"></td>
            <td>${data.department}<input type="hidden" name="employee_work_informations[${wiIndex}][department_id]" value="${data.department}"></td>
            <td>${data.supervisor}<input type="hidden" name="employee_work_informations[${wiIndex}][direct_supervisor]" value="${data.supervisor}"></td>
            <td>${data.monthly_rate}<input type="hidden" name="employee_work_informations[${wiIndex}][monthly_rate]" value="${data.monthly_rate}"></td>
            <td>${data.daily_rate}<input type="hidden" name="employee_work_informations[${wiIndex}][daily_rate]" value="${data.daily_rate}"></td>
            <td>${data.hourly_rate}<input type="hidden" name="employee_work_informations[${wiIndex}][hourly_rate]" value="${data.hourly_rate}"></td>
            <td><button type="button" class="btn btn-sm btn-outline-danger remove-workinfo-row">Remove</button></td>
        `;
        tableBody.appendChild(tr);
        wiIndex++;

        // hide form and clear
        cancelBtn.click();
    });

    // remove row
    document.querySelector('#workinfo-table')?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-workinfo-row')){
            e.target.closest('tr').remove();
        }
    });
})();

// Activate tab from URL hash (e.g. /users/create#access)
(function(){
    function activateTabFromHash(hash){
        if(!hash) return;
        try{
            // prefer selector matching the tab href
            var selector = 'a.nav-link[href="' + hash + '"]';
            var tabLink = document.querySelector(selector);
            if(tabLink){
                // If jQuery + bootstrap tab plugin available (Bootstrap 4)
                if(window.jQuery && typeof window.jQuery.fn.tab === 'function'){
                    window.jQuery(selector).tab('show');
                    return;
                }
                // Bootstrap 5: use the JS API
                if(window.bootstrap && typeof window.bootstrap.Tab === 'function'){
                    var tab = new window.bootstrap.Tab(tabLink);
                    tab.show();
                    return;
                }
                // Fallback: manually activate classes
                // deactivate active links/panes
                document.querySelectorAll('.nav-link').forEach(function(el){ el.classList.remove('active'); el.setAttribute('aria-selected','false'); });
                document.querySelectorAll('.tab-pane').forEach(function(p){ p.classList.remove('show','active'); });
                tabLink.classList.add('active');
                tabLink.setAttribute('aria-selected','true');
                var targetId = tabLink.getAttribute('href');
                var pane = document.querySelector(targetId);
                if(pane){ pane.classList.add('show','active'); }
            }
        }catch(e){ console.error('activateTabFromHash error', e); }
    }

    // on load
    document.addEventListener('DOMContentLoaded', function(){
        activateTabFromHash(window.location.hash);
    });

    // when the hash changes (back/forward or link click)
    window.addEventListener('hashchange', function(){
        activateTabFromHash(window.location.hash);
    });
})();

// Repeatable dependents
(() => {
    let depIndex = 1;
    document.getElementById('add-dependent')?.addEventListener('click', function(){
        const container = document.getElementById('dependents-list');
        const row = document.createElement('div');
        row.className = 'dependent-row row mb-2';
        row.innerHTML = `\
            <div class="col-md-3"><input type="text" name="dependents[${depIndex}][name]" class="form-control" placeholder="Name"></div>\
            <div class="col-md-2"><input type="date" name="dependents[${depIndex}][birthdate]" class="form-control"></div>\
            <div class="col-md-1"><input type="number" name="dependents[${depIndex}][age]" class="form-control" placeholder="Age"></div>\
            <div class="col-md-3"><input type="text" name="dependents[${depIndex}][gender]" class="form-control" placeholder="Gender"></div>\
            <div class="col-md-2"><input type="text" name="dependents[${depIndex}][relationship]" class="form-control" placeholder="Relationship"></div>\
            <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger remove-dependent">-</button></div>`;
        container.appendChild(row);
        depIndex++;
    });
    document.getElementById('dependents-list')?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-dependent')){
            e.target.closest('.dependent-row').remove();
        }
    });
})();

// Repeatable work info
(() => {
    let wIndex = 1;
    document.getElementById('add-workinfo')?.addEventListener('click', function(){
        const container = document.getElementById('workinfo-list');
        const row = document.createElement('div');
        row.className = 'workinfo-row row mb-2';
        row.innerHTML = `\
            <div class="col-md-3"><input type="date" name="employee_work_informations[${wIndex}][hire_date]" class="form-control"></div>\
            <div class="col-md-2"><input type="number" name="employee_work_informations[${wIndex}][employment_status_id]" class="form-control"></div>\
            <div class="col-md-2"><input type="date" name="employee_work_informations[${wIndex}][regularization]" class="form-control"></div>\
            <div class="col-md-2"><input type="number" name="employee_work_informations[${wIndex}][designation_id]" class="form-control"></div>\
            <div class="col-md-2"><input type="number" name="employee_work_informations[${wIndex}][department_id]" class="form-control"></div>\
            <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger remove-workinfo">-</button></div>\
            <div class="col-12 mt-2">\
                <div class="row">\
                    <div class="col-md-4"><input type="number" step="0.01" name="employee_work_informations[${wIndex}][monthly_rate]" class="form-control" placeholder="Monthly rate"></div>\
                    <div class="col-md-4"><input type="number" step="0.01" name="employee_work_informations[${wIndex}][daily_rate]" class="form-control" placeholder="Daily rate"></div>\
                    <div class="col-md-4"><input type="number" step="0.01" name="employee_work_informations[${wIndex}][hourly_rate]" class="form-control" placeholder="Hourly rate"></div>\
                </div>\
            </div>`;
        container.appendChild(row);
        wIndex++;
    });
    document.getElementById('workinfo-list')?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-workinfo')){
            e.target.closest('.workinfo-row').remove();
        }
    });
})();

// Repeatable branch-permissions rows
(() => {
    let bpIndex = 1; // starting from 1 since initial row is 0
    const container = document.getElementById('branch-permissions-list');
    const addBtn = document.getElementById('add-branch-permission');
    addBtn?.addEventListener('click', function(){
        const row = document.createElement('div');
        row.className = 'branch-permission-row form-row align-items-center mb-2';
        // build branch select options (serialize from server-side values)
        let branchOptions = `\n                                                <option value="">-- Select branch --</option>`;
        @foreach($branches as $branch)
            branchOptions += `\n                                                <option value="{{ $branch->id }}">{{ addslashes($branch->name) }}</option>`;
        @endforeach

        let permOptions = ``;
        @foreach($permissions as $perm)
            permOptions += `\n                                                    <option value="{{ $perm->id }}">{{ addslashes($perm->name) }}</option>`;
        @endforeach

        row.innerHTML = `\n                <div class="col-md-5">\n                    <select name="branch_permissions[${bpIndex}][branch_id]" class="form-control">${branchOptions}\n                    </select>\n                </div>\n                <div class="col-md-6">\n                    <select name="branch_permissions[${bpIndex}][permissions][]" class="form-control" multiple>\n                        ${permOptions}\n                    </select>\n                </div>\n                <div class="col-md-1">\n                    <button type="button" class="btn btn-sm btn-outline-danger remove-branch">-</button>\n                </div>`;

        container.appendChild(row);
        bpIndex++;
    });

    container?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-branch')){
            const row = e.target.closest('.branch-permission-row');
            if(row) row.remove();
        }
    });
})();
</script>
@endsection

