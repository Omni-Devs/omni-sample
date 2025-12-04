@extends('layouts.app')
@section('content')

<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Taxes</h1>
            <ul>
                <li><a href=""> Workforce Settings </a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

    <div class="card wrapper">
        <div class="card-body">

            <!-- Tabs -->
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="{{ route('taxes.index', ['status' => 'active']) }}" class="nav-link {{ $status === 'active' ? 'active' : '' }}">Active</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('taxes.index', ['status' => 'archived']) }}" class="nav-link {{ $status === 'archived' ? 'active' : '' }}">Archived</a>
                    </li>
                </ul>
            </nav>

            <!-- Add button -->
            <div class="vgt-global-search__actions vgt-pull-right mt-3 mb-3">
                <button class="btn btn-rounded btn-primary btn-icon m-1"
                        data-bs-toggle="modal" data-bs-target="#AddTaxModal">
                    <i class="i-Add"></i> Add
                </button>
            </div>

            <div class="vgt-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date and Time Created</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Type</th>
                            <th>Created By</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($taxes as $tax)
                        <tr>
                            <td>{{ $tax->created_at->timezone('Asia/Manila')->format('Y-m-d H:i') }}</td>
                            <td>{{ $tax->name }}</td>
                            <td>{{ $tax->value }}%</td>
                            <td>{{ ucfirst($tax->type) }}</td>
                            <td>{{ $tax->creator?->username ?? 'N/A' }}</td>
                            <td class="text-right">

                                <div class="dropdown">
                                    <button class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                    <span class="_dot _r_block-dot bg-dark"></span>
                                    <span class="_dot _r_block-dot bg-dark"></span>
                                    <span class="_dot _r_block-dot bg-dark"></span>
                                </button>

                                    <ul class="dropdown-menu dropdown-menu-right">

                                        @if($tax->status === 'active')
                                        <li>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                               data-bs-target="#EditTaxModal{{ $tax->id }}">
                                               <i class="i-Edit mr-2"></i> Edit
                                            </a>
                                        </li>
                                        @endif

                                        @if($tax->status === 'active')
                                        <li>
                                            <form action="{{ route('taxes.archive', $tax) }}" method="POST"
                                                onsubmit="return confirm('Move to archive?')">
                                                @csrf @method('PUT')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="i-Letter-Close mr-2"></i> Move to Archive
                                                </button>
                                            </form>
                                        </li>
                                        @endif

                                        @if($tax->status === 'archived')
                                        <li>
                                            <form action="{{ route('taxes.restore', $tax) }}" method="POST"
                                                onsubmit="return confirm('Restore this tax?')">
                                                @csrf @method('PUT')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="i-Eye mr-2"></i> Restore
                                                </button>
                                            </form>
                                        </li>

                                        <li>
                                            <form action="{{ route('taxes.destroy', $tax) }}" method="POST"
                                                onsubmit="return confirm('Delete permanently?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="i-Close-Window mr-2"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="EditTaxModal{{ $tax->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('taxes.update', $tax) }}" method="POST">
                                        @csrf @method('PUT')

                                        <div class="modal-header">
                                            <h5>Edit Tax</h5>
                                            <button class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <label>Name *</label>
                                            <input type="text" name="name" value="{{ $tax->name }}" class="form-control mb-3" required>

                                            <label>Value *</label>
                                            <input type="number" step="0.01" name="value" value="{{ $tax->value }}" class="form-control mb-3" required>

                                            <label>Type *</label>
                                            <select name="type" class="form-control mb-3" required>
                                                <option value="percentage" {{ $tax->type === 'percentage' ? 'selected' : '' }}>Percentage</option>
                                                <option value="fixed" {{ $tax->type === 'fixed' ? 'selected' : '' }}>Fixed</option>
                                            </select>

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No taxes found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- ADD TAX MODAL -->
<div class="modal fade" id="AddTaxModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('taxes.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5>Add Tax</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    {{-- DATE AND TIME CREATED --}}
                    <div class="col-md-14 mb-3">
                        <label for="created_at">Date and Time Created</label>
                        <div class="d-flex">
                            <input type="datetime-local" 
                                id="created_at" 
                                name="created_at" 
                                class="form-control @error('created_at') is-invalid @enderror" 
                                value="{{ old('created_at', now()->timezone('Asia/Manila')->format('Y-m-d\TH:i')) }}">
                            
                            <button type="button" 
                                class="btn btn-secondary ml-2"
                                onclick="document.getElementById('created_at').value = ''">
                                Clear
                            </button>
                        </div>
                        @error('created_at')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Defaults to current date and time. Clear if you want the system to use the exact submission time.
                        </small>
                    </div>


                    <label>Name *</label>
                    <input type="text" name="name" class="form-control mb-3" required>

                    <label>Value *</label>
                    <input type="number" step="0.01" name="value" class="form-control mb-3" required>

                    <label>Type *</label>
                    <select name="type" class="form-control mb-3" required>
                        <option value="percentage">Percentage</option>
                        <option value="fixed">Fixed</option>
                    </select>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
