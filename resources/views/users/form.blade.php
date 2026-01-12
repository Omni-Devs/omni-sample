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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="biometric_number">Biometric Number</label>
                                            <input type="text" name="biometric_number" id="biometric_number" class="form-control" value="{{ old('biometric_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="id_number">ID Number</label>
                                            <input type="text" name="id_number" id="id_number" class="form-control" value="{{ old('id_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ old('middle_name') }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                    </div> --}}
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
                                            <label for="tin">TIN #</label>
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
                                            <label for="pag_ibig_number">PhilHealth #</label>
                                            <input type="text" name="phil_health_number" id="phil_health_number" class="form-control" value="{{ old('phil_health_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pag_ibig_number">PAG-IBIG #</label>
                                            <input type="text" name="pag_ibig_number" id="pag_ibig_number" class="form-control" value="{{ old('pag_ibig_number') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
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
                                                <div class="col-md-3">
                                                    <select name="dependents[0][gender]" class="form-control">
                                                        <option value="">-- Select Gender --</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name="dependents[0][relationship]" class="form-control">
                                                        <option value="">-- Relationship --</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Parent">Parent</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
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

                                    <label 
                                for="image"
                                id="drop-area"
                                class="upload-box text-center p-3 border rounded d-block"
                                style="cursor:pointer;"
                            >
                                <i class="fas fa-cloud-upload-alt fa-2x mb-2 text-muted"></i>
                                <p class="text-muted">
                                    Drag & Drop an image<br>
                                    <strong>or click to select</strong>
                                </p>

                                <input 
                                    type="file" 
                                    id="image" 
                                    name="image" 
                                    class="d-none" 
                                    accept="image/*"
                                >

                                <div id="preview-container" class="mt-3"></div>
                            </label>
                                </div>
                            </div>
                    </div>
                </div>

                    <!-- Access Credentials -->
                    <div class="tab-pane fade" id="access" role="tabpanel" aria-labelledby="access-tab">
                        <div class="row">
                            <div class="col-md-6">
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
                                            <select name="branch_permissions[0][permissions][]" class="form-control" multiple>
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
                                                <th>Date</th>
                                                <th>Employment Type</th>
                                                <th>Regularization</th>
                                                <th>Position</th>
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
                                        {{-- <div class="col-md-3 form-group"><label>Hire Date</label><input type="date" id="wi_hire_date" class="form-control"></div>
                                        <div class="col-md-2 form-group"><label>Status</label><input type="text" id="wi_status" class="form-control" placeholder="Status"></div> --}}

                                        <div class="col-md-3 form-group"><label>Date</label><input type="date" id="wi_hire_date" class="form-control"></div>
                                        <div class="col-md-2 form-group">
                                            <label>Employment Type</label>
                                            <select id="wi_status" class="form-control">
                                                <option value="">Select Employment Type</option>
                                                <option value="probationary">Probationary Period</option>
                                                <option value="regularization">Regularization</option>
                                                <option value="promotion">Promotion</option>
                                                <option value="contractual">Contractual</option>
                                                <option value="resigned">Resigned</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2 form-group"><label>Regularization</label><input type="date" id="wi_regularization" class="form-control"></div>
                                        <div class="col-md-2 form-group"><label>Position</label>
                                            <select id="wi_designation" class="form-control">
                                                <option value="">Select Position</option>
                                                @foreach($designations as $des)
                                                    <option value="{{ $des->id }}">{{ $des->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group"><label>Department</label>
                                            <select id="wi_department" class="form-control">
                                                <option value="">Select Department</option>
                                                @foreach($departments as $d)
                                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- <div class="col-md-3 form-group"><label>Supervisor (user id)</label><input type="number" id="wi_supervisor" class="form-control" placeholder="Supervisor id"></div> --}}
                                        <div class="col-md-3 form-group">
    <label>Supervisor</label>
    <select id="wi_supervisor" class="form-control">
        <option value="">Select Supervisor</option>
        @foreach($users as $u)
            <option value="{{ $u->username }}">
                {{ $u->username }}
            </option>
        @endforeach
    </select>
</div>
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
                                    <div class="col-md-2 form-group">
                                            <label>Salary Method</label>
                                            <select name="salary_method[method_id]" class="form-control">
                                                <option value="">Select Method</option>
                                                @foreach($salaryMethods as $key => $label)
                                                    <option value="{{ $key }}">{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <div class="col-md-2 form-group">
                                        <label>Salary Period</label>
                                        <select name="salary_method[period_id]" class="form-control">
                                            <option value="bi-monthly">Bi-Monthly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="daily">Daily</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Account Name / Number</label>
                                        <input type="text" name="salary_method[account]" class="form-control">
                                    </div>

<!-- Shift Template Selector (remains outside the modal) -->
<div class="col-md-6 form-group">
    <label class="fw-bold">Shift Template (Optional)</label>
    <select id="shift_select" class="form-control mb-2">
        <option value="">No template / Custom only</option>
        @foreach($shifts as $shift)
            <option value="{{ $shift->id }}"
                    data-shift='@json($shift)'
                    {{ old('salary_method.shift_id', $user->salaryMethod->shift_id ?? null) == $shift->id ? 'selected' : '' }}>
                {{ $shift->name }}
            </option>
        @endforeach
    </select>

    <!-- Hidden field to submit the selected template -->
    <input type="hidden" name="salary_method[shift_id]" id="assigned_shift_id"
           value="{{ old('salary_method.shift_id', $user->salaryMethod->shift_id ?? null) }}">

    <!-- Small helper text -->
    <small class="text-muted">Select a template to customize times and view schedule.</small>
</div>

<!-- Custom Shift Modal -->
<div class="modal fade" id="shiftModal" tabindex="-1" role="dialog" aria-labelledby="shiftModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="shiftModalLabel">
                    <span id="modal-shift-name">Custom Shift Settings</span>
                </h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Custom Times (Override Template) -->
                <h6 class="fw-bold mb-3">Custom Shift Schedule (Overrides Template)</h6>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <label>Time Start</label>
                        <input type="time" name="salary_method[custom_time_start]"
                               class="form-control"
                               value="{{ old('salary_method.custom_time_start', $user->salaryMethod->custom_time_start ?? '') }}">
                    </div>
                    <div class="col-md-3">
                        <label>Time End</label>
                        <input type="time" name="salary_method[custom_time_end]"
                               class="form-control"
                               value="{{ old('salary_method.custom_time_end', $user->salaryMethod->custom_time_end ?? '') }}">
                    </div>
                    <div class="col-md-3">
                        <label>Break Start</label>
                        <input type="time" name="salary_method[custom_break_start]"
                               class="form-control"
                               value="{{ old('salary_method.custom_break_start', $user->salaryMethod->custom_break_start ?? '') }}">
                    </div>
                    <div class="col-md-3">
                        <label>Break End</label>
                        <input type="time" name="salary_method[custom_break_end]"
                               class="form-control"
                               value="{{ old('salary_method.custom_break_end', $user->salaryMethod->custom_break_end ?? '') }}">
                    </div>
                </div>

                <!-- Preview Card -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-4">Current Shift Preview</h6>

                        <!-- Time Preview -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong>Start:</strong> <span id="pv-start" class="text-primary fw-bold">-</span>
                            </div>
                            <div class="col-md-3">
                                <strong>End:</strong> <span id="pv-end" class="text-primary fw-bold">-</span>
                            </div>
                            <div class="col-md-3">
                                <strong>Break Start:</strong> <span id="pv-break-start" class="text-primary fw-bold">-</span>
                            </div>
                            <div class="col-md-3">
                                <strong>Break End:</strong> <span id="pv-break-end" class="text-primary fw-bold">-</span>
                            </div>
                        </div>

                        <!-- Weekly Schedule Table with Radio Buttons -->
                   <h6 class="fw-bold mb-3">Weekly Schedule (Customizable)</h6>
<div class="table-responsive">
    <table class="table table-bordered text-center align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th scope="col" class="fw-bold">Day</th>
                <th scope="col" class="fw-bold">Work Day</th>
                <th scope="col" class="fw-bold">Rest Day</th>
                <th scope="col" class="fw-bold">Open Time</th>
            </tr>
        </thead>
        <tbody id="weekly-schedule-table">
            <!-- Filled by JavaScript -->
        </tbody>
    </table>
</div>

<!-- Hidden inputs to submit custom weekly schedule -->
<input type="hidden" name="salary_method[custom_work_days]" id="custom_work_days_input" value="">
<input type="hidden" name="salary_method[custom_rest_days]" id="custom_rest_days_input" value="">
<input type="hidden" name="salary_method[custom_open_time]" id="custom_open_time_input" value="">

<small class="text-muted d-block mt-3">
    <strong>You can override the template schedule here.</strong><br>
    Changes apply only to this employee and do not affect the original shift template.
</small>

                        <style>
                        /* Red filled radio buttons when checked */
                        #weekly-schedule-table .form-check-input:checked {
                            background-color: #dc3545 !important;
                            border-color: #dc3545 !important;
                            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
                        }

                        /* Make disabled radios look clean */
                        #weekly-schedule-table .form-check-input {
                            cursor: not-allowed;
                            opacity: 0.9;
                        }

                        /* Optional: subtle hover effect on rows */
                        #weekly-schedule-table tbody tr:hover {
                            background-color: #f8f9fa;
                        }

                        .btn-orange {
                            background-color: #fd7e14; /* Vibrant orange */
                            border-color: #fd7e14;
                            color: white;
                            transition: background-color 0.2s ease;
                        }

                        .btn-orange:hover {
                            background-color: #e06b00; /* Slightly darker on hover */
                            border-color: #e06b00;
                            color: white;
                        }

                        .btn-orange:active {
                            background-color: #c85f00 !important; /* Even darker when clicked */
                            border-color: #c85f00 !important;
                        }

                        /* Ensure buttons look good when disabled */
                        .btn-orange:disabled {
                            opacity: 0.6;
                            cursor: not-allowed;
                        }

                        .border-orange {
                            border-left: 4px solid #fd7e14 !important;
                        }
                        .text-orange {
                            color: #fd7e14;
                        }
                        </style>


                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
            </div>
        </div>
    </div>
</div>

                                </div>

                      <h6 class="mt-3">Allowances</h6>
<div id="allowances-list">
    @foreach($allowances as $i => $al)
    <div class="form-row align-items-center mb-2 allowance-row">
        <!-- Checkbox + Allowance name -->
        <div class="col-md-5">
            <div class="form-check">
                <input
                    class="form-check-input allowance-checkbox"
                    type="checkbox"
                    name="allowances[{{ $i }}][allowance_id]"
                    value="{{ $al->id }}"
                    id="allowance_{{ $al->id }}"
                >
                <label class="form-check-label" for="allowance_{{ $al->id }}">
                    {{ $al->name }}
                </label>
            </div>
        </div>

        <!-- Amount -->
        {{-- <div class="col-md-2">
            <input
                type="number"
                name="allowances[{{ $i }}][amount]"
                class="form-control allowance-amount"
                placeholder="Amount"
                disabled
            >
        </div>

        <!-- Monthly count -->
        <div class="col-md-3">
            <input
                type="number"
                name="allowances[{{ $i }}][monthly_count]"
                class="form-control allowance-count"
                placeholder="Monthly count"
                disabled
            >
        </div> --}}

        {{-- <!-- Amount with + / - buttons -->
    <div class="col-md-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-outline-secondary btn-sm decrement-amount" tabindex="-1">-</button>
            </div>
            <input
                type="number"
                name="allowances[{{ $i }}][amount]"
                class="form-control allowance-amount text-center"
                placeholder="Amount"
                step="100"
                min="0"
                value="{{ old("allowances.$i.amount") }}"
                disabled
            >
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary btn-sm increment-amount" tabindex="-1">+</button>
            </div>
        </div>
    </div>

    <!-- Monthly count with + / - buttons -->
    <div class="col-md-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-outline-secondary btn-sm decrement-count" tabindex="-1">-</button>
            </div>
            <input
                type="number"
                name="allowances[{{ $i }}][monthly_count]"
                class="form-control allowance-count text-center"
                placeholder="Count"
                step="1"
                min="0"
                value="{{ old("allowances.$i.monthly_count") }}"
                disabled
            >
            <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary btn-sm increment-count" tabindex="-1">+</button>
            </div>
        </div>
    </div> --}}

     <!-- Amount with + / - buttons (orange background) -->
    <div class="col-md-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-sm btn-orange decrement-amount" tabindex="-1">-</button>
            </div>
            <input
                type="number"
                name="allowances[{{ $i }}][amount]"
                class="form-control allowance-amount text-center"
                placeholder="Amount"
                step="100"
                min="0"
                value="{{ old("allowances.$i.amount") }}"
                disabled
            >
            <div class="input-group-append">
                <button type="button" class="btn btn-sm btn-orange increment-amount" tabindex="-1">+</button>
            </div>
        </div>
    </div>

    <!-- Monthly count with + / - buttons (orange background) -->
    <div class="col-md-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-sm btn-orange decrement-count" tabindex="-1">-</button>
            </div>
            <input
                type="number"
                name="allowances[{{ $i }}][monthly_count]"
                class="form-control allowance-count text-center"
                placeholder="Count"
                step="1"
                min="0"
                value="{{ old("allowances.$i.monthly_count") }}"
                disabled
            >
            <div class="input-group-append">
                <button type="button" class="btn btn-sm btn-orange increment-count" tabindex="-1">+</button>
            </div>
        </div>
    </div>

        <!-- Remove -->
        <div class="col-md-1">
            <button type="button" class="btn btn-sm btn-outline-danger remove-allowance">
                Remove
            </button>
        </div>
    </div>
    @endforeach
</div>

                                <h6 class="mt-5">Leaves</h6>
                                <div id="leaves-list">
                                    @foreach($leaves as $i => $lv)
                                    <div class="form-row align-items-center mb-2 leave-row">
                                        <div class="col-md-5">
                                            <div class="form-check">
                                                <input class="form-check-input leave-checkbox" type="checkbox" name="leaves[{{ $i }}][leave_id]" value="{{ $lv->id }}" id="leave_{{ $lv->id }}">
                                                <label class="form-check-label" for="leave_{{ $lv->id }}">{{ $lv->name }}</label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-2"><input type="number" name="leaves[{{ $i }}][days]" class="form-control leave-days" placeholder="Days" disabled></div>
                                        <div class="col-md-3"><input type="date" name="leaves[{{ $i }}][effective_date]" class="form-control leave-effective" disabled></div> --}}

                                        <!-- Days with + / - buttons (orange) -->
        <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="btn btn-sm btn-orange decrement-days" tabindex="-1">-</button>
                </div>
                <input 
                    type="number" 
                    name="leaves[{{ $i }}][days]" 
                    class="form-control leave-days text-center" 
                    placeholder="Days" 
                    step="1" 
                    min="0" 
                    value="{{ old("leaves.$i.days") }}"
                    disabled
                >
                <div class="input-group-append">
                    <button type="button" class="btn btn-sm btn-orange increment-days" tabindex="-1">+</button>
                </div>
            </div>
        </div>

        <!-- Effective Date (no +/– buttons since it's a date picker, but kept clean) -->
        <div class="col-md-3">
            <input 
                type="date" 
                name="leaves[{{ $i }}][effective_date]" 
                class="form-control leave-effective" 
                value="{{ old("leaves.$i.effective_date") }}"
                disabled
            >
        </div>
        
                                        <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger remove-leave">Remove</button></div>
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
                    <div class="col-md-2">
                        <select name="educational_backgrounds[0][level_id]" class="form-control">
                            <option value="">Select Level</option>
                            <option value="Elementary">Elementary</option>
                            <option value="High School">High School</option>
                            <option value="Vocational">Vocational</option>
                            <option value="College">College</option>
                            <option value="Graduate">Graduate</option>
                            <option value="Post Graduate">Post Graduate</option>
                        </select>
                    </div>
                    <div class="col-md-2"><input type="date" name="educational_backgrounds[0][tenure_start]" class="form-control" placeholder="From"></div>
                    <div class="col-md-2"><input type="date" name="educational_backgrounds[0][tenure_end]" class="form-control" placeholder="To"></div>
                    <div class="col-md-1"><button type="button" class="btn btn-sm btn-outline-danger remove-educ">-</button></div>
                </div>
            </div>
            <button type="button" id="add-educ" class="btn btn-sm btn-outline-primary mb-4">Add education</button>

            <!-- Attachments - ONLY IN EDUCATIONAL BACKGROUND TAB -->
            <div class="card mt-4 border-orange">
                <div class="card-body">
                    <h6 class="mb-4 text-orange">Attachments</h6>
                    <div id="attachments-list">
                        @php
                            $commonAttachments = [
                                'Birth Certificate',
                                'Valid ID',
                                'Marriage Contract',
                                'Health Card',
                                'NBI',
                                'Resume',
                                'Location Sketch',
                                '2x2',
                                'Police Clearance',
                                'police clearance',
                                'NBI',
                                'GSIS',
                                'HMO',
                            ];
                        @endphp

                        @foreach($commonAttachments as $index => $name)
                        <div class="attachment-row row align-items-center mb-3">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input 
                                        class="form-check-input attachment-checkbox" 
                                        type="checkbox" 
                                        id="attach_{{ $index }}"
                                        value="{{ $name }}"
                                    >
                                    <label class="form-check-label" for="attach_{{ $index }}">
                                        {{ $name }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input 
                                            type="file" 
                                            class="custom-file-input attachment-file" 
                                            name="attachments[{{ $index }}]"
                                            id="file_{{ $index }}"
                                            accept=".pdf,.jpg,.jpeg,.png"
                                            disabled
                                        >
                                        <label class="custom-file-label text-truncate" for="file_{{ $index }}">
                                            Choose file...
                                        </label>
                                    </div>
                                </div>
                                <!-- Hidden input to store the name -->
                                <input type="hidden" name="attachment_names[{{ $index }}]" class="attachment-name" value="{{ $name }}" disabled>
                            </div>
                            <div class="col-md-2 text-right">
                                <button type="button" class="btn btn-sm btn-danger remove-attachment" disabled>
                                    Remove
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End of Attachments -->
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

// Allowances add/remove and conditional inputs
(() => {
    let aIndex = 1;
    const addAllowanceBtn = document.getElementById('add-allowance');
    const allowancesContainer = document.getElementById('allowances-list');

    // show/hide amount inputs when select changes
    allowancesContainer?.addEventListener('change', function(e){
        if(e.target && e.target.classList.contains('allowance-select')){
            const sel = e.target;
            const row = sel.closest('.allowance-row');
            if(!row) return;
            const amt = row.querySelector('.allowance-amount');
            const cnt = row.querySelector('.allowance-count');
            if(sel.value){
                if(amt){ amt.style.display=''; amt.disabled = false; }
                if(cnt){ cnt.style.display=''; cnt.disabled = false; }
            } else {
                if(amt){ amt.style.display='none'; amt.disabled = true; amt.value = ''; }
                if(cnt){ cnt.style.display='none'; cnt.disabled = true; cnt.value = ''; }
            }
        }
    });

    addAllowanceBtn?.addEventListener('click', function(){
        const row = document.createElement('div');
        row.className = 'allowance-row d-flex mb-2 align-items-center';
        let options = `\n                                            <option value="">-- Select allowance --</option>`;
        @foreach($allowances as $al)
            options += `\n                                                <option value="{{ $al->id }}">{{ addslashes($al->name) }}</option>`;
        @endforeach
        row.innerHTML = `\n            <select name="allowances[${aIndex}][allowance_id]" class="form-control mr-2 allowance-select" style="width:40%">${options}</select>\n            <input type="number" name="allowances[${aIndex}][amount]" class="form-control mr-2 allowance-amount" placeholder="Amount" style="display:none;" disabled>\n            <input type="number" name="allowances[${aIndex}][monthly_count]" class="form-control mr-2 allowance-count" placeholder="Monthly count" style="display:none;" disabled>\n            <button type="button" class="btn btn-sm btn-outline-danger remove-allowance">Remove</button>`;
        allowancesContainer.appendChild(row);
        aIndex++;
    });

    allowancesContainer?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-allowance')){
            e.target.closest('.allowance-row').remove();
        }
    });

    // initialize existing rows visibility
    document.querySelectorAll('#allowances-list .allowance-row').forEach(function(row){
        const sel = row.querySelector('.allowance-select');
        if(sel){
            sel.dispatchEvent(new Event('change'));
        }
    });
})();

let wiIndex = 0;

document.getElementById('save-workinfo').addEventListener('click', function () {
    const tbody = document.querySelector('#workinfo-table tbody');

    const hireDate = document.getElementById('wi_hire_date').value;
    if (!hireDate) return alert('Hire date required');

    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${hireDate}
            <input type="hidden" name="employee_work_informations[${wiIndex}][hire_date]" value="${hireDate}">
        </td>
        <td>${wi_status.value}
            <input type="hidden" name="employee_work_informations[${wiIndex}][employment_status_id]" value="${wi_status.value}">
        </td>
        <td>${wi_regularization.value}
            <input type="hidden" name="employee_work_informations[${wiIndex}][regularization]" value="${wi_regularization.value}">
        </td>
        <td>${wi_designation.options[wi_designation.selectedIndex].text}
            <input type="hidden" name="employee_work_informations[${wiIndex}][designation_id]" value="${wi_designation.value}">
        </td>
        <td>${wi_department.options[wi_department.selectedIndex].text}
            <input type="hidden" name="employee_work_informations[${wiIndex}][department_id]" value="${wi_department.value}">
        </td>
        <td>${wi_supervisor.value}
            <input type="hidden" name="employee_work_informations[${wiIndex}][direct_supervisor]" value="${wi_supervisor.value}">
        </td>
        <td>${wi_monthly_rate.value}
            <input type="hidden" name="employee_work_informations[${wiIndex}][monthly_rate]" value="${wi_monthly_rate.value}">
        </td>
        <td>${wi_daily_rate.value}
            <input type="hidden" name="employee_work_informations[${wiIndex}][daily_rate]" value="${wi_daily_rate.value}">
        </td>
        <td>${wi_hourly_rate.value}
            <input type="hidden" name="employee_work_informations[${wiIndex}][hourly_rate]" value="${wi_hourly_rate.value}">
        </td>
        <td><button type="button" class="btn btn-sm btn-danger remove-wi">Remove</button></td>
    `;

    tbody.appendChild(row);
    wiIndex++;
});

document.querySelector('form').addEventListener('submit', function () {

    document.querySelectorAll('.allowance-checkbox:checked').forEach(cb => {
        const row = cb.closest('.allowance-row');
        row.querySelector('.allowance-amount').disabled = false;
        row.querySelector('.allowance-count').disabled = false;
    });

    document.querySelectorAll('.leave-checkbox:checked').forEach(cb => {
        const row = cb.closest('.leave-row');
        row.querySelector('.leave-days').disabled = false;
        row.querySelector('.leave-effective').disabled = false;
    });

});

(function(){
    const container = document.getElementById('allowances-list');

    // enable / disable inputs on checkbox toggle
    container?.addEventListener('change', function(e){
        if(e.target.classList.contains('allowance-checkbox')){
            const row = e.target.closest('.allowance-row');
            if(!row) return;

            const amount = row.querySelector('.allowance-amount');
            const count  = row.querySelector('.allowance-count');

            if(e.target.checked){
                amount.disabled = false;
                count.disabled  = false;
            } else {
                amount.disabled = true;
                count.disabled  = true;
                amount.value = '';
                count.value  = '';
            }
        }
    });

    // remove row
    container?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-allowance')){
            e.target.closest('.allowance-row')?.remove();
        }
    });
})();

(function(){
    // Leaves toggle enable/disable and remove
    const leavesContainer = document.getElementById('leaves-list');
    leavesContainer?.addEventListener('change', function(e){
        if(e.target && e.target.classList.contains('leave-checkbox')){
            const cb = e.target;
            const row = cb.closest('.leave-row');
            if(!row) return;
            const days = row.querySelector('.leave-days');
            const eff = row.querySelector('.leave-effective');
            if(cb.checked){
                if(days){ days.disabled = false; }
                if(eff){ eff.disabled = false; }
            } else {
                if(days){ days.disabled = true; days.value = ''; }
                if(eff){ eff.disabled = true; eff.value = ''; }
            }
        }
    });
    leavesContainer?.addEventListener('click', function(e){
        if(e.target && e.target.classList.contains('remove-leave')){
            const row = e.target.closest('.leave-row');
            if(row) row.remove();
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

    // track editing state
    let editingRow = null;
    saveBtn?.addEventListener('click', function(){
        // read values
        const data = {
            hire_date: document.getElementById('wi_hire_date')?.value || '',
            employment_status: document.getElementById('wi_status')?.value || '',
            regularization: document.getElementById('wi_regularization')?.value || '',
            designation_id: document.getElementById('wi_designation')?.value || '',
            designation_text: document.getElementById('wi_designation')?.selectedOptions?.[0]?.text || '',
            department_id: document.getElementById('wi_department')?.value || '',
            department_text: document.getElementById('wi_department')?.selectedOptions?.[0]?.text || '',
            supervisor: document.getElementById('wi_supervisor')?.value || '',
            monthly_rate: document.getElementById('wi_monthly_rate')?.value || '',
            daily_rate: document.getElementById('wi_daily_rate')?.value || '',
            hourly_rate: document.getElementById('wi_hourly_rate')?.value || '',
        };

        // simple validation: require hire_date
        if(!data.hire_date){ alert('Please enter Date'); return; }

        // create or update table row with visible text and hidden inputs
        const renderRow = (index) => {
            return `
            <td>${data.hire_date}<input type="hidden" name="employee_work_informations[${index}][hire_date]" value="${data.hire_date}"></td>
            <td>${data.employment_status}<input type="hidden" name="employee_work_informations[${index}][employment_status_id]" value="${data.employment_status}"></td>
            <td>${data.regularization}<input type="hidden" name="employee_work_informations[${index}][regularization]" value="${data.regularization}"></td>
            <td>${data.designation_text}<input type="hidden" name="employee_work_informations[${index}][designation_id]" value="${data.designation_id}"></td>
            <td>${data.department_text}<input type="hidden" name="employee_work_informations[${index}][department_id]" value="${data.department_id}"></td>
            <td>${data.supervisor}<input type="hidden" name="employee_work_informations[${index}][direct_supervisor]" value="${data.supervisor}"></td>
            <td>${data.monthly_rate}<input type="hidden" name="employee_work_informations[${index}][monthly_rate]" value="${data.monthly_rate}"></td>
            <td>${data.daily_rate}<input type="hidden" name="employee_work_informations[${index}][daily_rate]" value="${data.daily_rate}"></td>
            <td>${data.hourly_rate}<input type="hidden" name="employee_work_informations[${index}][hourly_rate]" value="${data.hourly_rate}"></td>
            <td>
                <button type="button" class="btn btn-sm btn-outline-secondary edit-workinfo-row">Edit</button>
                <button type="button" class="btn btn-sm btn-outline-danger remove-workinfo-row">Remove</button>
            </td>
        `;
        };

        if (editingRow) {
            // replace existing
            const idx = editingRow.getAttribute('data-wi-index');
            editingRow.innerHTML = renderRow(idx);
            editingRow.removeAttribute('data-editing');
            editingRow = null;
        } else {
            const tr = document.createElement('tr');
            tr.innerHTML = renderRow(wiIndex);
            tr.setAttribute('data-wi-index', wiIndex);
            tableBody.appendChild(tr);
            wiIndex++;
        }

        // hide form and clear
        cancelBtn.click();
    });

    // remove row
    document.querySelector('#workinfo-table')?.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-workinfo-row')){
            e.target.closest('tr').remove();
        }
        if(e.target.classList.contains('edit-workinfo-row')){
            // populate form with values from the row for editing
            const tr = e.target.closest('tr');
            if(!tr) return;
            const inputs = tr.querySelectorAll('input[type="hidden"]');
            // helper to find hidden input for a given suffix name
            const getVal = (suffix) => {
                for(const inp of inputs){
                    if(inp.name && inp.name.endsWith(suffix)) return inp.value;
                }
                return '';
            };
            document.getElementById('wi_hire_date').value = getVal('[hire_date]') || '';
            document.getElementById('wi_status').value = getVal('[employment_status_id]') || '';
            document.getElementById('wi_regularization').value = getVal('[regularization]') || '';
            const desId = getVal('[designation_id]') || '';
            const depId = getVal('[department_id]') || '';
            if(document.getElementById('wi_designation')) document.getElementById('wi_designation').value = desId;
            if(document.getElementById('wi_department')) document.getElementById('wi_department').value = depId;
            document.getElementById('wi_supervisor').value = getVal('[direct_supervisor]') || '';
            document.getElementById('wi_monthly_rate').value = getVal('[monthly_rate]') || '';
            document.getElementById('wi_daily_rate').value = getVal('[daily_rate]') || '';
            document.getElementById('wi_hourly_rate').value = getVal('[hourly_rate]') || '';
            // set editing marker
            tr.setAttribute('data-editing', '1');
            editingRow = tr;
            // show the form
            document.getElementById('workinfo-form').style.display = '';
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
        // server can request an active tab after validation via session('active_tab')
        try {
            var serverTab = "{{ session('active_tab', '') }}";
            if(serverTab) activateTabFromHash('#' + serverTab);
        } catch(e){}
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
            <div class="col-md-3">\
                <select name="dependents[${depIndex}][gender]" class="form-control">\
                    <option value="">-- Select Gender --</option>\
                    <option value="Male">Male</option>\
                    <option value="Female">Female</option>\
                    <option value="Other">Other</option>\
                </select>\
            </div>\
            <div class="col-md-2">\
                <select name="dependents[${depIndex}][relationship]" class="form-control">\
                    <option value="">-- Relationship --</option>\
                    <option value="Son">Son</option>\
                    <option value="Daughter">Daughter</option>\
                    <option value="Parent">Parent</option>\
                    <option value="Spouse">Spouse</option>\
                    <option value="Other">Other</option>\
                </select>\
            </div>\
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


<script>

let customWorkDays = [];
let customRestDays = [];
let customOpenTime = [];

// Load existing custom values on page load (for edit mode)
@php
    $sm = $user->salaryMethod ?? null;
@endphp
@if($sm)
    customWorkDays = @json($sm->custom_work_days ?? []);
    customRestDays = @json($sm->custom_rest_days ?? []);
    customOpenTime = @json($sm->custom_open_time ?? []);
@endif
// Also respect old() input on validation error
@if(old('salary_method.custom_work_days'))
    customWorkDays = @json(old('salary_method.custom_work_days'));
    customRestDays = @json(old('salary_method.custom_rest_days'));
    customOpenTime = @json(old('salary_method.custom_open_time'));
@endif

function updateHiddenInputs() {
    document.getElementById('custom_work_days_input').value = JSON.stringify(customWorkDays);
    document.getElementById('custom_rest_days_input').value = JSON.stringify(customRestDays);
    document.getElementById('custom_open_time_input').value = JSON.stringify(customOpenTime);
}

document.getElementById('shift_select').addEventListener('change', function () {
    const option = this.options[this.selectedIndex];
    const modal = $('#shiftModal');
    const shiftId = option.value;

    document.getElementById('assigned_shift_id').value = shiftId || '';

    if (!shiftId) {
        modal.modal('hide');
        return;
    }

    const shift = JSON.parse(option.dataset.shift);

    // Update modal title
    document.getElementById('modal-shift-name').textContent = shift.name + ' - Customize';

    // Reset preview times from template
    document.getElementById('pv-start').textContent = shift.time_start?.slice(0,5) || 'N/A';
    document.getElementById('pv-end').textContent = shift.time_end?.slice(0,5) || 'N/A';
    document.getElementById('pv-break-start').textContent = shift.break_start?.slice(0,5) || 'N/A';
    document.getElementById('pv-break-end').textContent = shift.break_end?.slice(0,5) || 'N/A';

    // === Build Editable Weekly Schedule Table ===
    const tableBody = document.getElementById('weekly-schedule-table');
    tableBody.innerHTML = '';

    const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    days.forEach(day => {
        // Use custom values if exist, otherwise fall back to template
        const isWork = customWorkDays.includes(day) || (!customWorkDays.length && shift.work_days?.includes(day));
        const isRest = customRestDays.includes(day) || (!customRestDays.length && shift.rest_days?.includes(day));
        const isOpen = customOpenTime.includes(day) || (!customOpenTime.length && shift.open_time?.includes(day));

        const checkedWork = isWork ? 'checked' : '';
        const checkedRest = isRest ? 'checked' : '';
        const checkedOpen = isOpen ? 'checked' : '';

        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="fw-bold py-3">${day}</td>
            <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="weekly_${day}" value="work" ${checkedWork}>
                </div>
            </td>
            <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="weekly_${day}" value="rest" ${checkedRest}>
                </div>
            </td>
            <td>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="weekly_${day}" value="open" ${checkedOpen}>
                </div>
            </td>
        `;
        tableBody.appendChild(row);
    });

    // Attach event listeners to radios
    tableBody.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function () {
            const day = this.name.replace('weekly_', '');
            const value = this.value;

            // Clear day from all arrays first
            customWorkDays = customWorkDays.filter(d => d !== day);
            customRestDays = customRestDays.filter(d => d !== day);
            customOpenTime = customOpenTime.filter(d => d !== day);

            // Add to correct array
            if (value === 'work') customWorkDays.push(day);
            else if (value === 'rest') customRestDays.push(day);
            else if (value === 'open') customOpenTime.push(day);

            updateHiddenInputs();
        });
    });

    modal.modal('show');
});

// Live update time preview from custom inputs
document.querySelectorAll('#shiftModal input[type="time"]').forEach(input => {
    input.addEventListener('input', function () {
        const map = {
            'salary_method[custom_time_start]': 'pv-start',
            'salary_method[custom_time_end]': 'pv-end',
            'salary_method[custom_break_start]': 'pv-break-start',
            'salary_method[custom_break_end]': 'pv-break-end',
        };
        const targetId = map[this.name];
        if (targetId) {
            document.getElementById(targetId).textContent = this.value || '-';
        }
    });
});

// Auto-open modal + load existing custom data on edit/validation
$(document).ready(function () {
    const hasShift = {{ old('salary_method.shift_id') ? 'true' : ($user->salaryMethod->shift_id ?? null ? 'true' : 'false') }};

    if (hasShift) {
        $('#shift_select').trigger('change');

        // Trigger input events to update preview from existing custom times
        $('#shiftModal input[type="time"]').each(function() {
            if (this.value) $(this).trigger('input');
        });
    }

    // Initialize hidden inputs with current custom weekly data
    updateHiddenInputs();
});

// Enable/disable inputs when checkbox is toggled
document.getElementById('allowances-list').addEventListener('change', function(e) {
    if (e.target.classList.contains('allowance-checkbox')) {
        const row = e.target.closest('.allowance-row');
        const amountInput = row.querySelector('.allowance-amount');
        const countInput = row.querySelector('.allowance-count');
        const buttons = row.querySelectorAll('button.increment-amount, button.decrement-amount, button.increment-count, button.decrement-count');

        if (e.target.checked) {
            amountInput.disabled = false;
            countInput.disabled = false;
            buttons.forEach(btn => btn.disabled = false);
        } else {
            amountInput.disabled = true;
            countInput.disabled = true;
            buttons.forEach(btn => btn.disabled = true);
            amountInput.value = '';
            countInput.value = '';
        }
    }
});

// + / - buttons for Amount
document.getElementById('allowances-list').addEventListener('click', function(e) {
    if (e.target.classList.contains('increment-amount') || e.target.classList.contains('decrement-amount')) {
        const input = e.target.closest('.input-group').querySelector('.allowance-amount');
        if (input.disabled) return;

        let value = parseFloat(input.value) || 0;
        const step = parseFloat(input.step) || 100;

        if (e.target.classList.contains('increment-amount')) {
            value += step;
        } else if (e.target.classList.contains('decrement-amount') && value > 0) {
            value = Math.max(0, value - step);
        }

        input.value = value;
    }

    // + / - buttons for Monthly Count
    if (e.target.classList.contains('increment-count') || e.target.classList.contains('decrement-count')) {
        const input = e.target.closest('.input-group').querySelector('.allowance-count');
        if (input.disabled) return;

        let value = parseInt(input.value) || 0;
        const step = parseInt(input.step) || 1;

        if (e.target.classList.contains('increment-count')) {
            value += step;
        } else if (e.target.classList.contains('decrement-count') && value > 0) {
            value = Math.max(0, value - step);
        }

        input.value = value;
    }
});

// Initialize state on page load (important for validation errors with old input)
document.querySelectorAll('.allowance-checkbox').forEach(checkbox => {
    if (checkbox.checked) {
        const row = checkbox.closest('.allowance-row');
        row.querySelectorAll('.allowance-amount, .allowance-count').forEach(input => input.disabled = false);
        row.querySelectorAll('button.increment-amount, button.decrement-amount, button.increment-count, button.decrement-count')
            .forEach(btn => btn.disabled = false);
    }
});

// Leaves: Enable/disable + button handling
document.getElementById('leaves-list').addEventListener('change', function(e) {
    if (e.target.classList.contains('leave-checkbox')) {
        const row = e.target.closest('.leave-row');
        const daysInput = row.querySelector('.leave-days');
        const dateInput = row.querySelector('.leave-effective');
        const buttons = row.querySelectorAll('.increment-days, .decrement-days');

        if (e.target.checked) {
            daysInput.disabled = false;
            dateInput.disabled = false;
            buttons.forEach(btn => btn.disabled = false);
        } else {
            daysInput.disabled = true;
            dateInput.disabled = true;
            buttons.forEach(btn => btn.disabled = true);
            daysInput.value = '';
            dateInput.value = '';
        }
    }
});

// + / - buttons for Days
document.getElementById('leaves-list').addEventListener('click', function(e) {
    if (e.target.classList.contains('increment-days') || e.target.classList.contains('decrement-days')) {
        const input = e.target.closest('.input-group').querySelector('.leave-days');
        if (input.disabled) return;

        let value = parseInt(input.value) || 0;
        const step = parseInt(input.step) || 1;

        if (e.target.classList.contains('increment-days')) {
            value += step;
        } else if (e.target.classList.contains('decrement-days') && value > 0) {
            value = Math.max(0, value - step);
        }

        input.value = value;
    }
});

// Initialize on page load (for old input / validation errors)
document.querySelectorAll('.leave-checkbox').forEach(checkbox => {
    if (checkbox.checked) {
        const row = checkbox.closest('.leave-row');
        row.querySelectorAll('.leave-days, .leave-effective').forEach(input => input.disabled = false);
        row.querySelectorAll('.increment-days, .decrement-days').forEach(btn => btn.disabled = false);
    }
});

// Attachments: checkbox → enable file input + remove button
document.getElementById('attachments-list').addEventListener('change', function(e) {
    if (e.target.classList.contains('attachment-checkbox')) {
        const row = e.target.closest('.attachment-row');
        const fileInput = row.querySelector('.attachment-file');
        const fileLabel = row.querySelector('.custom-file-label');
        const removeBtn = row.querySelector('.remove-attachment');
        const nameInput = row.querySelector('.attachment-name');

        if (e.target.checked) {
            fileInput.disabled = false;
            removeBtn.disabled = false;
            nameInput.disabled = false;
        } else {
            fileInput.disabled = true;
            fileInput.value = '';
            fileLabel.textContent = 'Choose file...';
            removeBtn.disabled = true;
            nameInput.disabled = true;
        }
    }
});

// Update file label when file selected
document.getElementById('attachments-list').addEventListener('change', function(e) {
    if (e.target.classList.contains('attachment-file')) {
        const label = e.target.closest('.input-group').querySelector('.custom-file-label');
        if (e.target.files.length > 0) {
            label.textContent = e.target.files[0].name;
        } else {
            label.textContent = 'Choose file...';
        }
    }
});

// Remove button (clears checkbox and file)
document.getElementById('attachments-list').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-attachment')) {
        const row = e.target.closest('.attachment-row');
        const checkbox = row.querySelector('.attachment-checkbox');
        const fileInput = row.querySelector('.attachment-file');
        const label = row.querySelector('.custom-file-label');

        checkbox.checked = false;
        fileInput.value = '';
        label.textContent = 'Choose file...';
        fileInput.disabled = true;
        e.target.disabled = true;
    }
});

// Initialize on load (for edit form with old values)
document.querySelectorAll('.attachment-checkbox').forEach(cb => {
    if (cb.checked) {
        const row = cb.closest('.attachment-row');
        row.querySelectorAll('.attachment-file, .remove-attachment').forEach(el => el.disabled = false);
    }
});
</script>
@endsection

