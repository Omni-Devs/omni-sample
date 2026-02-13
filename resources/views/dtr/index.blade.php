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
                <div class="input-group mt-2">
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
                            <span aria-hidden="true" class="input__icon">
                                <div class="magnifying-glass"></div>
                            </span>
                            <form role="search" method="GET" action="{{ route('dtr.index') }}">
                                <input type="text" name="search" placeholder="Search this table" class="vgt-input vgt-pull-left" value="{{ request('search') }}">
                            </form>
                        </div>

                        <div class="vgt-global-search__actions vgt-pull-right">
                            <div class="mt-2 mb-3 d-flex align-items-center flex-wrap gap-2">
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
                                <button type="button" class="btn btn-info m-1 btn-sm">
                                    <i class="i-Upload"></i> Import
                                </button>

                                <!-- ADD BUTTON -->
                                <button type="button" class="btn btn-rounded btn-btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#Add_DTR">
                                    <i class="i-Add"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- TABLE -->
                    <div class="vgt-responsive">
                        <table id="vgt-table" class="table-hover tableOne vgt-table">
                            <thead>
                                <tr>
                                    <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                    <th>Date</th>
                                    <th>Employee #</th>
                                    <th>Employee Name</th>
                                    <th>Shift</th>
                                    <th>Time of Shift</th>
                                    <th>Time In Reports</th>
                                    <th>Other Reports</th>
                                    <th>Time Out Reports</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $record)
                                    @php
                                        // generate unique ID to avoid conflicts in modals
                                        $uid = $record->user_id.'-'.$record->date->format('Ymd');
                                    @endphp
                                    <tr>
                                        <td class="vgt-checkbox-col"><input type="checkbox"></td>
                                        <td>{{ $record->date->format('Y-m-d') }}</td>
                                        <td>RF{{ $record->user_id }}</td>
                                        <td>{{ $record->user_name }}</td>
                                        <td>{{ $record->salary_method_name ?? 'Shift #' . ($record->shift_id ?? '-') }}</td>
                                        <td>
                                        @php
                                            $timeStr = $record->time_of_shift ?? '--:----:--';

                                            // Split and clean
                                            $parts = array_map('trim', explode('-', $timeStr, 2));
                                            $startRaw = $parts[0] ?? '--:--';
                                            $endRaw   = $parts[1] ?? '--:--';

                                            // Format to 12-hour with AM/PM if valid time
                                            $start = $startRaw !== '--:--' && preg_match('/^\d{2}:\d{2}$/', $startRaw)
                                                ? \Carbon\Carbon::createFromFormat('H:i', $startRaw)->format('g:i A')
                                                : $startRaw;

                                            $end = $endRaw !== '--:--' && preg_match('/^\d{2}:\d{2}$/', $endRaw)
                                                ? \Carbon\Carbon::createFromFormat('H:i', $endRaw)->format('g:i A')
                                                : $endRaw;
                                        @endphp

                                            {{ $start }} - {{ $end }}
                                        </td>
                                        <td>{{ $record->time_in_reports ?? '-' }}</td>
                                        <td>{{ $record->other_reports ?? '-' }}</td>
                                        <td>{{ $record->time_out_reports ?? '-' }}</td>
                                        <td>{{ ucfirst(str_replace('_',' ', $record->status)) }}</td>
                                        <td class="text-right">
    <div class="dropdown b-dropdown btn-group">
        <button id="dropdownMenu{{ $uid }}" type="button" class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret" data-bs-toggle="dropdown">
            <span class="_dot _r_block-dot bg-dark"></span>
            <span class="_dot _r_block-dot bg-dark"></span>
            <span class="_dot _r_block-dot bg-dark"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu{{ $uid }}">
            <li>
                <a class="dropdown-item" href="#" 
                   data-bs-toggle="modal" 
                   data-bs-target="#editDTRModal-{{ $record->user_id }}-{{ $record->date->format('Ymd') }}"
                   data-virtual="{{ $record->is_virtual ? 'true' : 'false' }}"
                   data-time-shift="{{ is_string($record->time_of_shift) ? $record->time_of_shift : '' }}">
                    <i class="nav-icon i-Receipt font-weight-bold mr-2"></i> Add Time Record
                </a>
            </li>
            <li>
                @if(!$record->is_virtual && $record->id)
                    <form action="{{ route('dtr.destroy', $record->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Delete this record?')">
                            <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> Delete
                        </button>
                    </form>
                @else
                    <span class="dropdown-item text-muted disabled">
                        <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> Delete (scheduled)
                    </span>
                @endif
            </li>
        </ul>
    </div>
</td>
                                    </tr>

  <!-- Edit Modal -->
<div class="modal fade" id="editDTRModal-{{ $record->user_id }}-{{ $record->date->format('Ymd') }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add Time Record - {{ $record->date->format('M d, Y') }}</h5>
            </div>

            <form method="POST" 
                  action="{{ $record->is_virtual ? route('dtr.store') : route('dtr.update', $record->id) }}"
                  id="form-{{ $record->user_id }}-{{ $record->date->format('Ymd') }}"
                  class="dtr-form">

                @csrf
                @if(!$record->is_virtual) @method('PUT') @endif

                <input type="hidden" name="user_id" value="{{ $record->user_id }}">
                <input type="hidden" name="date" value="{{ $record->date->format('Y-m-d') }}">
                <input type="hidden" name="salary_method_id" value="{{ $record->salary_method_id ?? '' }}">
                
                {{-- Hidden status field that will be auto-calculated --}}
                @php
                    // If there is already a reported time in, default status should be 'worked',
                    // otherwise default to 'absent'. Use '-' as placeholder for no value.
                    $defaultStatus = (isset($record->time_in_reports) && $record->time_in_reports !== '-' && $record->time_in_reports !== null) ? 'worked' : 'absent';
                @endphp
                <input type="hidden" name="status" class="calculated-status" value="{{ old('status', $defaultStatus) }}">

                {{-- Store shift times as data attributes for calculation --}}
                @php
                    $timeStr = $record->time_of_shift ?? '--:----:--';
                    $parts = array_map('trim', explode('-', $timeStr, 2));
                    $shiftStart = $parts[0] ?? '--:--';
                    $shiftEnd = $parts[1] ?? '--:--';
                @endphp

                <div class="modal-body">

                        <div class="col-md-6 mb-3">
                            <label>Select Activity <span class="text-danger">*</span></label>
                            <select name="activity" class="form-control activity-select" required>
                                <option value="">Select Activity</option>
                                <option value="time_in" {{ old('activity', $record->activity ?? '') == 'time_in' ? 'selected' : '' }}>Time In</option>
                                <option value="time_out" {{ old('activity', $record->activity ?? '') == 'time_out' ? 'selected' : '' }}>Time Out</option>
                                <option value="start_lunch" {{ old('activity', $record->activity ?? '') == 'start_lunch' ? 'selected' : '' }}>Start Lunch</option>
                                <option value="end_lunch" {{ old('activity', $record->activity ?? '') == 'end_lunch' ? 'selected' : '' }}>End Lunch</option>
                                <option value="start_break" {{ old('activity', $record->activity ?? '') == 'start_break' ? 'selected' : '' }}>Start Break</option>
                                <option value="end_break" {{ old('activity', $record->activity ?? '') == 'end_break' ? 'selected' : '' }}>End Break</option>
                                <option value="start_overtime" {{ old('activity', $record->activity ?? '') == 'start_overtime' ? 'selected' : '' }}>Start Overtime</option>
                                <option value="end_overtime" {{ old('activity', $record->activity ?? '') == 'end_overtime' ? 'selected' : '' }}>End Overtime</option>
                                <option value="start_field_work" {{ old('activity', $record->activity ?? '') == 'start_field_work' ? 'selected' : '' }}>Start Field Work</option>
                                <option value="end_field_work" {{ old('activity', $record->activity ?? '') == 'end_field_work' ? 'selected' : '' }}>End Field Work</option>
                                <option value="arrived_at_location" {{ old('activity', $record->activity ?? '') == 'arrived_at_location' ? 'selected' : '' }}>Arrived at Location</option>
                                <option value="left_location" {{ old('activity', $record->activity ?? '') == 'left_location' ? 'selected' : '' }}>Left Location</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Select Time <span class="text-danger">*</span></label>
                            <input type="time" name="time" class="form-control activity-time" 
                                   value="{{ old('time', $record->time ?? '') }}" required>
                        </div>

                </div>

                                     <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
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

                    <!-- ✅ PAGINATION -->
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="d-flex align-items-center gap-2">
                            <span>Rows per page:</span>
                            <form method="GET" class="mb-0">
                                <select name="perPage" onchange="this.form.submit()" class="form-select form-select-sm d-inline-block w-auto">
                                    @foreach([50,100] as $size)
                                        <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>{{ $size }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="search" value="{{ $search }}">
                                <input type="hidden" name="year" value="{{ $year }}">
                                <input type="hidden" name="month" value="{{ $month }}">
                            </form>
                        </div>

                        <div>
                            <p class="mb-0 small text-muted">
                                Showing {{ $records->firstItem() }} to {{ $records->lastItem() }} of {{ $records->total() }} results
                            </p>
                            <nav class="d-inline-block">
                                {{ $records->onEachSide(1)->links('pagination::simple-bootstrap-5') }}
                            </nav>
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

<script>
document.querySelectorAll('[data-virtual="true"]').forEach(link => {
    link.addEventListener('click', function() {
        const modalId = this.getAttribute('data-bs-target');
        const shift = this.getAttribute('data-time-shift') || '';
        
        if (!shift) return;
        
        const [start, end] = shift.split('-').map(t => t.trim());
        
        const modal = document.querySelector(modalId);
        if (!modal) return;
        
        modal.querySelector('[name="time_in_reports"]').value = start || '';
        modal.querySelector('[name="time_out_reports"]').value = end || '';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Auto-populate time when activity is selected
    document.querySelectorAll('.activity-select').forEach(select => {
        select.addEventListener('change', function() {
            const form = this.closest('form');
            const timeInput = form.querySelector('.activity-time');
            const activity = this.value;
            
            // Auto-set current time if no time is set
            if (!timeInput.value) {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                timeInput.value = `${hours}:${minutes}`;
            }
        });
    });

    // Calculate status based on time in/out reports
    document.querySelectorAll('.dtr-form').forEach(form => {
        const timeInInput = form.querySelector('.time-in-input');
        const timeOutInput = form.querySelector('.time-out-input');
        const statusField = form.querySelector('.calculated-status');
        const statusDisplay = form.querySelector('.status-text');
        const modalBody = form.querySelector('.modal-body .row');
        
        const shiftStart = modalBody.dataset.shiftStart;
        const shiftEnd = modalBody.dataset.shiftEnd;

        function calculateStatus() {
            const timeIn = timeInInput.value;
            const timeOut = timeOutInput.value;
            
            let status = 'absent'; // Default
            let statusClass = 'alert-danger';
            
            // If both time in and time out are present
            if (timeIn && timeOut) {
                const isLate = isTimeLate(timeIn, shiftStart);
                const isUndertime = isTimeEarly(timeOut, shiftEnd);
                
                if (isLate && isUndertime) {
                    status = 'late'; // Could also be "late_and_undertime" if you want
                    statusClass = 'alert-warning';
                } else if (isLate) {
                    status = 'late';
                    statusClass = 'alert-warning';
                } else if (isUndertime) {
                    status = 'under_time';
                    statusClass = 'alert-warning';
                } else {
                    status = 'worked';
                    statusClass = 'alert-success';
                }
            } 
            // If only time in is present
            else if (timeIn) {
                status = 'worked'; // Partial work day
                statusClass = 'alert-info';
            }
            // If neither is present, remains 'absent'
            
            // Update hidden field and display
            statusField.value = status;
            statusDisplay.textContent = formatStatus(status);
            
            // Update alert styling
            const alertDiv = form.querySelector('.status-display');
            alertDiv.className = 'alert ' + statusClass + ' status-display';
        }

        function isTimeLate(actualTime, scheduledTime) {
            if (!actualTime || !scheduledTime || scheduledTime === '--:--') return false;
            return timeToMinutes(actualTime) > timeToMinutes(scheduledTime);
        }

        function isTimeEarly(actualTime, scheduledTime) {
            if (!actualTime || !scheduledTime || scheduledTime === '--:--') return false;
            return timeToMinutes(actualTime) < timeToMinutes(scheduledTime);
        }

        function timeToMinutes(time) {
            const [hours, minutes] = time.split(':').map(Number);
            return hours * 60 + minutes;
        }

        function formatStatus(status) {
            return status.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
        }

        // Attach event listeners
        timeInInput.addEventListener('change', calculateStatus);
        timeOutInput.addEventListener('change', calculateStatus);
        
        // Calculate on modal open
        calculateStatus();
    });

    // Pre-fill shift times for virtual records
    document.querySelectorAll('[data-virtual="true"]').forEach(link => {
        link.addEventListener('click', function() {
            const modalId = this.getAttribute('data-bs-target');
            const shift = this.getAttribute('data-time-shift') || '';
            
            if (!shift) return;
            
            const [start, end] = shift.split('-').map(t => t.trim());
            
            const modal = document.querySelector(modalId);
            if (!modal) return;
            
            // Convert 12-hour format back to 24-hour for input fields
            const startTime = convertTo24Hour(start);
            const endTime = convertTo24Hour(end);
            
            modal.querySelector('[name="time_in_reports"]').value = startTime || '';
            modal.querySelector('[name="time_out_reports"]').value = endTime || '';
            
            // Trigger status calculation
            const form = modal.querySelector('form');
            if (form) {
                const event = new Event('change');
                form.querySelector('.time-in-input').dispatchEvent(event);
            }
        });
    });

    function convertTo24Hour(time12h) {
        if (!time12h || time12h === '--:--') return '';
        
        const [time, modifier] = time12h.split(' ');
        let [hours, minutes] = time.split(':');
        
        if (hours === '12') {
            hours = '00';
        }
        
        if (modifier === 'PM') {
            hours = parseInt(hours, 10) + 12;
        }
        
        return `${String(hours).padStart(2, '0')}:${minutes}`;
    }
});
</script>

@endsection
