@extends('layouts.app')
@section('content')

<div class="main-content">
  <div>
    <div class="breadcrumb">
      <h1 class="mr-3">Holidays</h1>
      <ul>
        <li><a href=""> Workforce Settings </a></li>
      </ul>
      <div class="breadcrumb-action"></div>
    </div>
    <div class="separator-breadcrumb border-top"></div>
  </div>
    
  <div class="card wrapper">
    <div class="card-body">
      <nav class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a href="{{ route('holidays.index', ['status' => 'active']) }}" class="nav-link {{ $status === 'active' ? 'active' : '' }}">Active</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('holidays.index', ['status' => 'archived']) }}" class="nav-link {{ $status === 'archived' ? 'active' : '' }}">Archived</a>
          </li>
        </ul>
      </nav>
            
      <div class="vgt-wrap">
        <div class="vgt-inner-wrap">
          <div class="vgt-global-search vgt-clearfix">
            <div class="vgt-global-search__input vgt-pull-left">
              <form role="search">
                <label>
                  <span aria-hidden="true" class="input__icon">
                    <div class="magnifying-glass"></div>
                  </span>
                  <span class="sr-only">Search</span>
                </label>
                <input type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
              </form>
            </div>
            <div class="vgt-global-search__actions vgt-pull-right">
              <div class="mt-2 mb-3">
                <button class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"><i class="i-Gear"></i></button>
                <button type="button" class="btn btn-outline-info ripple m-1 btn-sm"><i class="i-Filter-2"></i>Filter</button>
                <button type="button" class="btn btn-outline-success ripple m-1 btn-sm"><i class="i-File-Copy"></i> PDF</button>
                <button class="btn btn-sm btn-outline-danger ripple m-1"><i class="i-File-Excel"></i> EXCEL</button>
                <button type="button" class="btn btn-primary btn-rounded btn-icon m-1" data-bs-toggle="modal" data-bs-target="#New_Holiday">
                  <i class="i-Add"></i> Add
                </button>

                <!-- Add Holiday Modal -->
                <div class="modal fade" id="New_Holiday" tabindex="-1" role="dialog" aria-labelledby="New_HolidayLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Add Holiday</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="{{ route('holidays.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                          <div class="row">
                            <!-- Date Created -->
                            <div class="col-md-12 mb-3">
                              <label>Date and Time Created</label>
                              <input type="datetime-local" name="created_at"
                                class="form-control"
                                value="{{ now()->timezone('Asia/Manila')->format('Y-m-d\TH:i') }}">
                            </div>

                            <!-- Holiday Name -->
                            <div class="col-md-12 mb-3">
                              <label>Holiday Name *</label>
                              <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                required>
                              @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>

                            <!-- Holiday Date -->
                            <div class="col-md-6 mb-3">
                              <label>Date *</label>
                              <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" required>
                              @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>

                            <!-- Type -->
                            <div class="col-md-6 mb-3">
                              <label>Type *</label>
                              <select name="type" class="form-control @error('type') is-invalid @enderror" required>
                                <option value="">Select Type</option>
                                <option>Regular Holiday</option>
                                <option>Special (Non-working) holiday</option>
                                <option>Special (Working) holiday</option>
                              </select>
                              @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>

                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary">
                                <i class="i-Yes me-2"></i> Submit
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="vgt-responsive">
            <table class="table-hover vgt-table tableOne">
              <thead>
                <tr>
                  <th><input type="checkbox"></th>
                  <th>Date and Time Created</th>
                  <th>Holiday Name</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Created By</th>
                  <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($holidays as $holiday)
                <tr>
                  <td><input type="checkbox"></td>
                  <td>{{ $holiday->created_at->timezone('Asia/Manila')->format('Y-m-d H:i') }}</td>
                  <td>{{ $holiday->name }}</td>
                  <td>{{ $holiday->date }}</td>
                  <td>{{ $holiday->type }}</td>
                  <td>{{ $holiday->creator?->username ?? 'N/A' }}</td>
                  <td class="text-right">
                    <div class="dropdown b-dropdown btn-group">
                      <button class="btn dropdown-toggle btn-link btn-lg dropdown-toggle-no-caret"
                        data-bs-toggle="dropdown">
                        <span class="_dot _r_block-dot bg-dark"></span>
                        <span class="_dot _r_block-dot bg-dark"></span>
                        <span class="_dot _r_block-dot bg-dark"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-right">

                        @if($holiday->status === 'active')
                        <li>
                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editHolidayModal{{ $holiday->id }}">
                            <i class="nav-icon i-Edit mr-2"></i> Edit
                          </a>
                        </li>
                        @endif

                        @if($holiday->status === 'archived')
                        <li>
                          <form action="{{ route('holidays.destroy', $holiday) }}"
                              method="POST"
                              onsubmit="return confirm('Permanently delete this holiday?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">
                              <i class="nav-icon i-Letter-Close mr-2"></i> Delete
                            </button>
                          </form>
                        </li>
                        @endif

                        @if($holiday->status === 'active')
                        <li>
                          <form action="{{ route('holidays.archive', $holiday) }}"
                              method="POST"
                              onsubmit="return confirm('Move to archive?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="dropdown-item">
                              <i class="nav-icon i-Letter-Close mr-2"></i> Move to Archive
                            </button>
                          </form>
                        </li>
                        @endif

                        @if($holiday->status === 'archived')
                        <li>
                          <form action="{{ route('holidays.restore', $holiday) }}"
                              method="POST"
                              onsubmit="return confirm('Restore as active?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="dropdown-item">
                              <i class="nav-icon i-Eye mr-2"></i> Restore as Active
                            </button>
                          </form>
                        </li>
                        @endif

                        {{-- Logs --}}
                        <li>
                          <a class="dropdown-item" href="#">
                            <i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i> Logs
                          </a>
                        </li>

                        {{-- Remarks --}}
                        <li>
                          <a class="dropdown-item" href="#">
                            <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i> Remarks
                          </a>
                        </li>


                      </ul>
                    </div>
                  </td>
                </tr>

                <!-- Edit Holiday Modal -->
                <div class="modal fade" id="editHolidayModal{{ $holiday->id }}" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="{{ route('holidays.update', $holiday) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                          <h5>Edit Holiday</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <label>Holiday Name *</label>
                          <input type="text" name="name"
                               value="{{ $holiday->name }}"
                               class="form-control" required>

                          <div class="row mt-3">
                            <div class="col-md-6">
                              <label>Date *</label>
                              <input type="date" name="date" value="{{ $holiday->date }}" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                              <label>Type *</label>
                              <select name="type" class="form-control" required>
                                <option {{ $holiday->type === 'Regular Holiday' ? 'selected' : '' }}>Regular Holiday</option>
                                <option {{ $holiday->type === 'Special (Non-working) holiday' ? 'selected' : '' }}>Special (Non-working) holiday</option>
                                <option {{ $holiday->type === 'Special (Working) holiday' ? 'selected' : '' }}>Special (Working) holiday</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                @empty
                <tr>
                  <td colspan="7" class="text-center">No holidays found.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
