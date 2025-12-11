@extends('layouts.app')
@section('content')

<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Benefits</h1>
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
                        <a href="{{ route('benefits.index', ['status' => 'active']) }}" class="nav-link {{ $status === 'active' ? 'active' : '' }}">Active</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('benefits.index', ['status' => 'archived']) }}" class="nav-link {{ $status === 'archived' ? 'active' : '' }}">Archived</a>
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
                                <button type="button" class="btn btn-primary btn-rounded btn-icon m-1" data-bs-toggle="modal" data-bs-target="#New_Benefit">
                                    <i class="i-Add"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Add Benefit Modal -->
                    <div class="modal fade" id="New_Benefit" tabindex="-1" role="dialog" aria-labelledby="New_BenefitLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Benefit</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="{{ route('benefits.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label>Date and Time Created</label>
                                                <input type="datetime-local" name="created_at"
                                                    class="form-control"
                                                    value="{{ now()->timezone('Asia/Manila')->format('Y-m-d\TH:i') }}">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label>Benefit Name *</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- Date removed per UI request --}}

                                            <div class="col-md-12 mb-3">
                                                <label>Details</label>
                                                <div id="benefit-details">
                                                    {{-- <div class="benefit-detail card p-3 mb-2"> --}}
                                                        <div class="benefit-detail card p-3 mb-2 position-relative">
    <!-- REMOVE BUTTON HERE (centered) -->
    <button type="button" class="remove-detail"
        style="position:absolute; top:-12px; left:50%; transform:translateX(-50%);
               background:#fff; border:1px solid #dc3545;
               width:28px; height:28px; border-radius:50%;
               color:#dc3545; font-size:16px; line-height:1;
               display:flex; justify-content:center; align-items:center;">
        <i class="i-Close font-weight-bold"></i>
    </button>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label>Salary Rate (From) *</label>
                                                                <input type="number" name="details[0][salary_rate_from]" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Salary Rate (To) *</label>
                                                                <input type="number" name="details[0][salary_rate_to]" class="form-control" required>
                                                            </div>

                                                            <div class="col-md-6 mb-2">
                                                                <label>Select Type of Computation(Monthly Employer Share) *</label>
                                                                <select name="details[0][employer_share_type]" class="form-control" required>
                                                                    <option value="fixed">Fixed Amount</option>
                                                                    <option value="percentage">Percentage</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Monthly Employer Share *</label>
                                                                <input type="number" name="details[0][employer_share]" class="form-control" required>
                                                            </div>

                                                            <div class="col-md-6 mb-2">
                                                                <label>Select Type of Computation(Monthly Employee Share) *</label>
                                                                <select name="details[0][employee_share_type]" class="form-control" required>
                                                                    <option value="fixed">Fixed Amount</option>
                                                                    <option value="percentage">Percentage</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Monthly Employee Share *</label>
                                                                <input type="number" name="details[0][employee_share]" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                         <!-- Replace your current Add Detail button with this -->
<div class="text-center mt-3">
    <button type="button" id="add-detail" 
        style="background:none;border:none;font-size:28px;color:#dc3545;cursor:pointer;">
        <i class="i-Add font-weight-bold"></i>
    </button>
    
</div>
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

                    <div class="vgt-responsive">
                        <table class="table-hover vgt-table tableOne">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Date and Time Created</th>
                                    <th>Created By</th>
                                    <th>Benefit Name</th>
                                    <th>Salary Rate (From)</th>
                                    <th>Salary Rate (To)</th>
                                    <th>Employer Share</th>
                                    <th>Employee Share</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($benefits as $benefit)
                                    @foreach($benefit->details as $detail)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $benefit->created_at->timezone('Asia/Manila')->format('Y-m-d H:i') }}</td>
                                        <td>{{ $benefit->creator?->username ?? 'N/A' }}</td>
                                        <td>{{ $benefit->name }}</td>
                                        <td>{{ number_format($detail->salary_rate_from, 2) }}</td>
                                        <td>{{ number_format($detail->salary_rate_to, 2) }}</td>
                                        <td>{{ number_format($detail->employer_share, 2) }} ({{ $detail->employer_share_type }})</td>
                                        <td>{{ number_format($detail->employee_share, 2) }} ({{ $detail->employee_share_type }})</td>
                                        <td class="text-right">
                                            <div class="dropdown b-dropdown btn-group">
                                                <button class="btn dropdown-toggle btn-link btn-lg dropdown-toggle-no-caret" data-bs-toggle="dropdown">
                                                    <span class="_dot _r_block-dot bg-dark"></span>
                                                    <span class="_dot _r_block-dot bg-dark"></span>
                                                    <span class="_dot _r_block-dot bg-dark"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right">

                                                    @if($benefit->status === 'active')
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editBenefitModal{{ $benefit->id }}">
                                                            <i class="nav-icon i-Edit mr-2"></i> Edit
                                                        </a>
                                                    </li>
                                                    @endif

                                                    @if($benefit->status === 'archived')
                                                    <li>
                                                        <form action="{{ route('benefits.destroy', $benefit) }}" method="POST" onsubmit="return confirm('Permanently delete this benefit?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="nav-icon i-Letter-Close mr-2"></i> Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                    @endif

                                                    @if($benefit->status === 'active')
                                                    <li>
                                                        <form action="{{ route('benefits.archive', $benefit) }}" method="POST" onsubmit="return confirm('Move to archive?');">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="nav-icon i-Letter-Close mr-2"></i> Move to Archive
                                                            </button>
                                                        </form>
                                                    </li>
                                                    @endif

                                                    @if($benefit->status === 'archived')
                                                    <li>
                                                        <form action="{{ route('benefits.restore', $benefit) }}" method="POST" onsubmit="return confirm('Restore as active?');">
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

                                    <!-- Edit Benefit Modal -->
                                    <div class="modal fade" id="editBenefitModal{{ $benefit->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form action="{{ route('benefits.update', $benefit) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5>Edit</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                                                            {{-- Date removed per UI request --}}

                                                            <div class="col-md-6 mb-3">
                                                                <label>Name *</label>
                                                                <input type="text" name="name" value="{{ $benefit->name }}" class="form-control" required>
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label>Details</label>
                                                                <div id="edit-benefit-details-{{ $benefit->id }}">
                                                                                                        @foreach($benefit->details as $i => $d)
                                                                                                        <div class="benefit-detail card p-3 mb-2 position-relative">
                                                                                                            <button type="button" class="remove-detail"
                                                                                                                    style="position:absolute; top:-12px; left:50%; transform:translateX(-50%);
                                                                                                                                 background:#fff; border:1px solid #dc3545;
                                                                                                                                 width:28px; height:28px; border-radius:50%;
                                                                                                                                 color:#dc3545; font-size:16px; line-height:1;
                                                                                                                                 display:flex; justify-content:center; align-items:center;">
                                                                                                                    <i class="i-Close font-weight-bold"></i>
                                                                                                            </button>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-2">
                                                                                <label>Salary Rate (From) *</label>
                                                                                <input type="number" name="details[{{ $i }}][salary_rate_from]" value="{{ $d->salary_rate_from }}" class="form-control" required>
                                                                            </div>
                                                                            <div class="col-md-6 mb-2">
                                                                                <label>Salary Rate (To) *</label>
                                                                                <input type="number" name="details[{{ $i }}][salary_rate_to]" value="{{ $d->salary_rate_to }}" class="form-control" required>
                                                                            </div>

                                                                            <div class="col-md-6 mb-2">
                                                                                <label>Select Type of Computation(Monthly Employer Share) *</label>
                                                                                <select name="details[{{ $i }}][employer_share_type]" class="form-control" required>
                                                                                    <option value="fixed" {{ $d->employer_share_type === 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                                                                    <option value="percentage" {{ $d->employer_share_type === 'percentage' ? 'selected' : '' }}>Percentage</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6 mb-2">
                                                                                <label>Monthly Employer Share *</label>
                                                                                <input type="number" name="details[{{ $i }}][employer_share]" value="{{ $d->employer_share }}" class="form-control" required>
                                                                            </div>

                                                                            <div class="col-md-6 mb-2">
                                                                                <label>Select Type of Computation(Monthly Employee Share) *</label>
                                                                                <select name="details[{{ $i }}][employee_share_type]" class="form-control" required>
                                                                                    <option value="fixed" {{ $d->employee_share_type === 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                                                                    <option value="percentage" {{ $d->employee_share_type === 'percentage' ? 'selected' : '' }}>Percentage</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6 mb-2">
                                                                                <label>Monthly Employee Share *</label>
                                                                                <input type="number" name="details[{{ $i }}][employee_share]" value="{{ $d->employee_share }}" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="text-center mt-3">
                                                                    <button type="button" class="btn btn-light btn-add-detail" data-target="#edit-benefit-details-{{ $benefit->id }}" style="background:none;border:none;font-size:28px;color:#dc3545;cursor:pointer;">
                                                                        <i class="i-Add font-weight-bold"></i>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No benefits found.</td>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    let detailIndex = 1; // start from 1 because default block uses [0]

    // ADD NEW DETAIL BLOCK
    document.getElementById('add-detail').addEventListener('click', function () {

        const container = document.getElementById('benefit-details');

        const html = `
        <div class="benefit-detail card p-3 mb-2 position-relative">

            <button type="button" class="remove-detail"
                style="position:absolute; top:-12px; left:50%; transform:translateX(-50%);
                       background:#fff; border:1px solid #dc3545;
                       width:28px; height:28px; border-radius:50%;
                       color:#dc3545; font-size:16px; line-height:1;
                       display:flex; justify-content:center; align-items:center;">
                <i class="i-Close font-weight-bold"></i>
            </button>

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Salary Rate (From) *</label>
                    <input type="number" name="details[${detailIndex}][salary_rate_from]" class="form-control" required>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Salary Rate (To) *</label>
                    <input type="number" name="details[${detailIndex}][salary_rate_to]" class="form-control" required>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Select Type of Computation(Monthly Employer Share) *</label>
                    <select name="details[${detailIndex}][employer_share_type]" class="form-control" required>
                        <option value="fixed">Fixed Amount</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Monthly Employer Share *</label>
                    <input type="number" name="details[${detailIndex}][employer_share]" class="form-control" required>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Select Type of Computation(Monthly Employee Share) *</label>
                    <select name="details[${detailIndex}][employee_share_type]" class="form-control" required>
                        <option value="fixed">Fixed Amount</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Monthly Employee Share *</label>
                    <input type="number" name="details[${detailIndex}][employee_share]" class="form-control" required>
                </div>
            </div>
        </div>`;

        container.insertAdjacentHTML('beforeend', html);
        detailIndex++;

        attachRemoveEvents();
    });

    // EDIT-MODAL: add detail button handler (multiple modals)
    document.querySelectorAll('.btn-add-detail').forEach(btn => {
        btn.addEventListener('click', function () {
            const target = document.querySelector(this.getAttribute('data-target'));
            if (!target) return;
            const idx = target.querySelectorAll('.benefit-detail').length;
            const html = `\n        <div class="benefit-detail card p-3 mb-2 position-relative">\n\n            <button type="button" class="remove-detail"\n                style="position:absolute; top:-12px; left:50%; transform:translateX(-50%);\n                       background:#fff; border:1px solid #dc3545;\n                       width:28px; height:28px; border-radius:50%;\n                       color:#dc3545; font-size:16px; line-height:1;\n                       display:flex; justify-content:center; align-items:center;">\n                <i class="i-Close font-weight-bold"></i>\n            </button>\n\n            <div class="row">\n                <div class="col-md-6 mb-2">\n                    <label>Salary Rate (From) *</label>\n                    <input type="number" name="details[${idx}][salary_rate_from]" class="form-control" required>\n                </div>\n\n                <div class="col-md-6 mb-2">\n                    <label>Salary Rate (To) *</label>\n                    <input type="number" name="details[${idx}][salary_rate_to]" class="form-control" required>\n                </div>\n\n                <div class="col-md-6 mb-2">\n                    <label>Select Type of Computation(Monthly Employer Share) *</label>\n                    <select name="details[${idx}][employer_share_type]" class="form-control" required>\n                        <option value="fixed">Fixed Amount</option>\n                        <option value="percentage">Percentage</option>\n                    </select>\n                </div>\n\n                <div class="col-md-6 mb-2">\n                    <label>Monthly Employer Share *</label>\n                    <input type="number" name="details[${idx}][employer_share]" class="form-control" required>\n                </div>\n\n                <div class="col-md-6 mb-2">\n                    <label>Select Type of Computation(Monthly Employee Share) *</label>\n                    <select name="details[${idx}][employee_share_type]" class="form-control" required>\n                        <option value="fixed">Fixed Amount</option>\n                        <option value="percentage">Percentage</option>\n                    </select>\n                </div>\n\n                <div class="col-md-6 mb-2">\n                    <label>Monthly Employee Share *</label>\n                    <input type="number" name="details[${idx}][employee_share]" class="form-control" required>\n                </div>\n            </div>\n        </div>`;
            target.insertAdjacentHTML('beforeend', html);
            attachRemoveEvents();
        });
    });

    // REMOVE BUTTON FUNCTION
    function attachRemoveEvents() {
        document.querySelectorAll('.remove-detail').forEach(btn => {
            btn.onclick = function () {
                this.closest('.benefit-detail').remove();
            };
        });
    }

    attachRemoveEvents();
});


</script>
@endpush
