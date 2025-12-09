@extends('layouts.app')
@section('content')

<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Statuses</h1>
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
                        <a href="{{ route('statuses.index', ['status' => 'active']) }}" class="nav-link {{ $status === 'active' ? 'active' : '' }}">Active</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('statuses.index', ['status' => 'archived']) }}" class="nav-link {{ $status === 'archived' ? 'active' : '' }}">Archived</a>
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
                                <button type="button" class="btn btn-primary btn-rounded btn-icon m-1" data-bs-toggle="modal" data-bs-target="#New_Status">
                                    <i class="i-Add"></i> Add
                                </button>

                                <!-- Add Status Modal -->
                                <div class="modal fade" id="New_Status" tabindex="-1" role="dialog" aria-labelledby="New_StatusLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Status</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{ route('statuses.store') }}" method="POST">
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

                                                        <!-- Status Name -->
                                                        <div class="col-md-12 mb-3">
                                                            <label>Status Name *</label>
                                                            <input type="text" name="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                required>
                                                            @error('name')
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
                                    <th>Status Name</th>
                                    <th>Created By</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($statuses as $statusItem)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{ $statusItem->created_at->timezone('Asia/Manila')->format('Y-m-d H:i') }}</td>
                                    <td>{{ $statusItem->name }}</td>
                                    <td>{{ $statusItem->creator?->username ?? 'N/A' }}</td>
                                    <td class="text-right">
                                        <div class="dropdown b-dropdown btn-group">
                                            <button class="btn dropdown-toggle btn-link btn-lg dropdown-toggle-no-caret"
                                                data-bs-toggle="dropdown">
                                                <span class="_dot _r_block-dot bg-dark"></span>
                                                <span class="_dot _r_block-dot bg-dark"></span>
                                                <span class="_dot _r_block-dot bg-dark"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">

                                                @if($statusItem->status === 'active')
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $statusItem->id }}">
                                                        <i class="nav-icon i-Edit mr-2"></i> Edit
                                                    </a>
                                                </li>
                                                @endif

                                                @if($statusItem->status === 'archived')
                                                <li>
                                                    <form action="{{ route('statuses.destroy', $statusItem) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Permanently delete this status?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="nav-icon i-Letter-Close mr-2"></i> Delete
                                                        </button>
                                                    </form>
                                                </li>
                                                @endif

                                                @if($statusItem->status === 'active')
                                                <li>
                                                    <form action="{{ route('statuses.archive', $statusItem) }}"
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

                                                @if($statusItem->status === 'archived')
                                                <li>
                                                    <form action="{{ route('statuses.restore', $statusItem) }}"
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


                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit Status Modal -->
                                <div class="modal fade" id="editStatusModal{{ $statusItem->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('statuses.update', $statusItem) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5>Edit Status</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Status Name *</label>
                                                    <input type="text" name="name"
                                                           value="{{ $statusItem->name }}"
                                                           class="form-control" required>
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
                                    <td colspan="5" class="text-center">No statuses found.</td>
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
