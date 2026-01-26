@extends('layouts.app')
@section('content')

<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Daily Time Record</h1>
            <ul>
                <li><a href=""> Workforce </a></li>
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

        @php
    $currentYear = now()->year;
    $currentMonth = now()->month;
@endphp

<form method="GET" action="{{ route('dtr.index') }}" class="mb-4">
    <div class="row">
        {{-- YEAR --}}
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text">Select Year</span>
                <select name="year" class="form-control" onchange="this.form.submit()">
                    @for ($y = now()->year; $y >= 2020; $y--)
                        <option value="{{ $y }}" {{ request('year', $currentYear) == $y ? 'selected' : '' }}>
                            {{ $y }}
                        </option>
                    @endfor
                </select>
            </div>

        {{-- MONTH --}}
        <div class="input-group">
                <span class="input-group-text">Select Month</span>
                <select name="month" class="form-control" onchange="this.form.submit()">
                    @foreach ([
                        1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                        5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                        9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
                    ] as $num => $name)
                        <option value="{{ $num }}" {{ request('month', $currentMonth) == $num ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- DEFAULT ROWS PER PAGE --}}
        <input type="hidden" name="per_page" value="{{ request('per_page', 50) }}">
    </div>
</form>

    <div class="card wrapper">
        <div class="card-body">

            <div class="vgt-wrap">
                <div class="vgt-inner-wrap">

                    <!-- GLOBAL SEARCH + ACTION BAR -->
                    <div class="vgt-global-search vgt-clearfix">
                        <div class="vgt-global-search__input vgt-pull-left">
                            <form role="search" method="GET" action="{{ route('dtr.index') }}">
                                <label for="vgt-search-dtr">
                                    <span aria-hidden="true" class="input__icon">
                                        <div class="magnifying-glass"></div>
                                    </span>
                                    <span class="sr-only">Search</span>
                                </label>
                                <input id="vgt-search-dtr" type="text" name="search" placeholder="Search this table" class="vgt-input vgt-pull-left" value="{{ request('search') }}">
                            </form>
                        </div>

                        <div class="vgt-global-search__actions vgt-pull-right">
                            <div class="mt-2 mb-3 d-flex align-items-center flex-wrap gap-2">

                                <!-- SETTINGS / FILTER / EXPORT -->
                                <button id="dropdown-form__BV_toggle_" type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret">
                                    <i class="i-Gear"></i>
                                </button>
                                <button type="button" class="btn btn-outline-info ripple btn-sm">
                                    <i class="i-Filter-2"></i> Filter
                                </button>
                                <button type="button" class="btn btn-outline-success ripple btn-sm">
                                    <i class="i-File-Copy"></i> PDF
                                </button>
                                <button class="btn btn-sm btn-outline-danger ripple">
                                    <i class="i-File-Excel"></i> EXCEL
                                </button>

                                <!-- ADD BUTTON -->
                                <button type="button" class="btn btn-rounded btn-btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#Add_DTR">
                                    <i class="i-Add"></i> Add
                                </button>

                            </div>
                        </div>
                    </div>

                    <div class="vgt-fixed-header"></div>

                    <!-- TABLE -->
                    <div class="vgt-responsive">
                        <table id="vgt-table" class="table-hover tableOne vgt-table">
                            <thead>
                                <tr>
                                    <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                    <th scope="col" class="vgt-left-align text-left">Date</th>
                                    <th scope="col" class="vgt-left-align text-left">Employee #</th>
                                    <th scope="col" class="vgt-left-align text-left">Employee Name</th>
                                    <th scope="col" class="vgt-left-align text-left">Shift</th>
                                    <th scope="col" class="vgt-left-align text-left">Time of Shift</th>
                                    <th scope="col" class="vgt-left-align text-left">Time In Reports</th>
                                    <th scope="col" class="vgt-left-align text-left">Other Reports</th>
                                    <th scope="col" class="vgt-left-align text-left">Time Out Reports</th>
                                    <th scope="col" class="vgt-left-align text-left">Status</th>
                                    <th scope="col" class="vgt-left-align text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $record)
                                <tr>
                                    <td class="vgt-checkbox-col"><input type="checkbox"></td>
                                    <td class="vgt-left-align text-left">{{ $record->date->format('Y-m-d') }}</td>
                                    <td class="vgt-left-align text-left">RF{{ $record->user->id ?? '' }}</td>
                                    <td class="vgt-left-align text-left">{{ $record->user->username ?? $record->user->name ?? '' }}</td>
                                    <td class="vgt-left-align text-left">
                                        {{ $record->salaryMethod?->shift?->name ?? ($record->salaryMethod?->shift_id ? 'Shift #'.$record->salaryMethod->shift_id : '-') }}
                                    </td>
                                    <td class="vgt-left-align text-left">
                                    @if($record->salaryMethod)
                                        {{ \Carbon\Carbon::parse($record->salaryMethod->effective_time_start ?? $record->salaryMethod->custom_time_start)->format('gA') }}
                                        -
                                        {{ \Carbon\Carbon::parse($record->salaryMethod->effective_time_end ?? $record->salaryMethod->custom_time_end)->format('gA') }}
                                    @else
                                        -
                                    @endif
                                    </td>
                                    <td class="vgt-left-align text-left">
                                        {{ $record->time_in_reports ? implode(', ', $record->time_in_reports) : '-' }}
                                    </td>
                                    <td class="vgt-left-align text-left">
                                        {{ $record->other_reports ? implode(', ', $record->other_reports) : '-' }}
                                    </td>
                                    <td class="vgt-left-align text-left">
                                        {{ $record->time_out_reports ? implode(', ', $record->time_out_reports) : '-' }}
                                    </td>
                                    <td class="vgt-left-align text-left">
                                        {{ ucfirst(str_replace('_',' ', $record->status)) }}
                                    </td>
                                    <td class="vgt-left-align text-right">
                                        <div class="dropdown b-dropdown btn-group">
                                            <button id="dropdownMenu{{ $record->id }}"
                                                type="button"
                                                class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false">
                                                <span class="_dot _r_block-dot bg-dark"></span>
                                                <span class="_dot _r_block-dot bg-dark"></span>
                                                <span class="_dot _r_block-dot bg-dark"></span>
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu{{ $record->id }}">
                                                <li role="presentation">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editDTRModal{{ $record->id }}">
                                                        <i class="nav-icon i-Edit font-weight-bold mr-2"></i> Edit
                                                    </a>
                                                </li>

                                                <li role="presentation">
                                                    <form action="{{ route('dtr.destroy', $record) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editDTRModal{{ $record->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Time Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="POST" action="{{ route('dtr.update', $record) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label>Date</label>
                                                        <input type="date" name="date" class="form-control" value="{{ $record->date->format('Y-m-d') }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Employee</label>
                                                        <select name="user_id" class="form-control" required>
                                                            @foreach($employees as $e)
                                                                <option value="{{ $e->id }}" {{ $e->id == $record->user_id ? 'selected' : '' }}>
                                                                    {{ $e->username }} - {{ $e->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Salary Method (Shift)</label>
                                                        <select name="salary_method_id" class="form-control">
                                                            <option value="">-- none --</option>
                                                            @foreach($salaryMethods as $sm)
                                                                <option value="{{ $sm->id }}" {{ $sm->id == $record->salary_method_id ? 'selected' : '' }}>
                                                                    {{ $sm->shift?->name ?? 'Shift #'.$sm->shift_id }}
                                                                    ({{ $sm->custom_time_start }} - {{ $sm->custom_time_end }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Activity</label>
                                                        <select name="activity" class="form-control" required>
                                                            <option value="time_in" {{ $record->activity == 'time_in' ? 'selected' : '' }}>Time In</option>
                                                            <option value="time_out" {{ $record->activity == 'time_out' ? 'selected' : '' }}>Time Out</option>
                                                            <option value="manual" {{ $record->activity == 'manual' ? 'selected' : '' }}>Manual</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Time</label>
                                                        <input type="time" name="time" class="form-control" value="{{ $record->time }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control">
                                                            <option value="worked" {{ $record->status == 'worked' ? 'selected' : '' }}>Worked</option>
                                                            <option value="rest_day" {{ $record->status == 'rest_day' ? 'selected' : '' }}>Rest Day</option>
                                                            <option value="absent" {{ $record->status == 'absent' ? 'selected' : '' }}>Absent</option>
                                                            <option value="late" {{ $record->status == 'late' ? 'selected' : '' }}>Late</option>
                                                            <option value="under_time" {{ $record->status == 'under_time' ? 'selected' : '' }}>Under Time</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">No records found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- FOOTER -->
                    <div class="vgt-wrap__footer vgt-clearfix">
                        <div class="footer__row-count vgt-pull-left">
                            <form>
                                <label class="footer__row-count__label">Rows per page:</label>
                                <select class="footer__row-count__select" name="perPage">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50" selected>50</option>
                                    <option value="-1">All</option>
                                </select>
                            </form>
                        </div>

                        <div class="footer__navigation vgt-pull-right">
                            <div class="footer__navigation__page-info">
                                1 - {{ $records->count() }} of {{ $records->count() }}
                            </div>
                            <button type="button" class="footer__navigation__page-btn disabled">
                                <span class="chevron left"></span> <span>prev</span>
                            </button>
                            <button type="button" class="footer__navigation__page-btn disabled">
                                <span>next</span> <span class="chevron right"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="Add_DTR" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Time Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('dtr.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Employee</label>
                        <select name="user_id" class="form-control" required>
                            @foreach($employees as $e)
                                <option value="{{ $e->id }}">{{ $e->username }} - {{ $e->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Salary Method (Shift)</label>
                        <select name="salary_method_id" class="form-control">
                            <option value="">-- none --</option>
                            @foreach($salaryMethods as $sm)
                                <option value="{{ $sm->id }}">
                                    {{ $sm->shift?->name ?? 'Shift #'.$sm->shift_id }}
                                    ({{ $sm->custom_time_start }} - {{ $sm->custom_time_end }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Activity</label>
                        <select name="activity" class="form-control" required>
                            <option value="time_in">Time In</option>
                            <option value="time_out">Time Out</option>
                            <option value="manual">Manual</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Time</label>
                        <input type="time" name="time" class="form-control" value="{{ now()->format('H:i') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="worked">Worked</option>
                            <option value="rest_day">Rest Day</option>
                            <option value="absent">Absent</option>
                            <option value="late">Late</option>
                            <option value="under_time">Under Time</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
