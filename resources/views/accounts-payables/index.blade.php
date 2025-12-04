@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Accounts Payable</h1>
            <ul>
                <li><a href="#">Accounting</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

        <div class="card-body">
            <!-- Tabs for Status -->
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    @foreach (['pending','approved','completed','disapproved','archived'] as $s)
                        <li class="nav-item">
                            <a href="{{ route('accounts-payables.index', ['status' => $s]) }}"
                               class="nav-link {{ $status == $s ? 'active' : '' }}">
                                {{ ucfirst($s) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="card-body">
                <!-- Search & Actions -->
                <div class="vgt-wrap">
                    <div class="vgt-inner-wrap">
                        <div class="vgt-global-search vgt-clearfix">
                            <div class="vgt-global-search__input vgt-pull-left">
                                <form role="search">
                                    <label for="vgt-search">
                                        <span aria-hidden="true" class="input_icon">
                                            <div class="magnifying-glass"></div>
                                        </span>
                                        <span class="sr-only">Search:</span>
                                    </label>
                                    <input id="vgt-search" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                                </form>
                            </div>

                            <div class="vgt-global-search__actions vgt-pull-right">
                                <div class="mt-2 mb-3">
                                    <!-- Columns Dropdown -->
                                    <div id="dropdown-form" class="dropdown b-dropdown m-2 btn-group">
                                        <button type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret">
                                            <i class="i-Gear"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><header class="dropdown-header">Columns</header></li>
                                            <li>
                                                <form class="b-dropdown-form p-0">
                                                    <div class="px-4" style="max-height: 400px; overflow-y: auto;">
                                                        <ul class="list-unstyled">
                                                            <li class="my-1"><input type="checkbox"> Date and Time of Transaction</li>
                                                            <li class="my-1"><input type="checkbox"> Reference Number</li>
                                                            <li class="my-1"><input type="checkbox"> Payor Name</li>
                                                            <li class="my-1"><input type="checkbox"> Company</li>
                                                            <li class="my-1"><input type="checkbox"> Address</li>
                                                            <li class="my-1"><input type="checkbox"> Mobile Number</li>
                                                            <li class="my-1"><input type="checkbox"> Email</li>
                                                            <li class="my-1"><input type="checkbox"> TIN</li>
                                                            <li class="my-1"><input type="checkbox"> Due Date</li>
                                                            <li class="my-1"><input type="checkbox"> Status</li>
                                                            <li class="my-1"><input type="checkbox"> Action</li>
                                                        </ul>
                                                        <button type="button" class="btn btn-primary btn-sm mt-2 mb-3">Save</button>
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Action Buttons -->
                                    <button type="button" class="btn btn-outline-info ripple m-1 btn-sm"><i class="i-Filter-2"></i> Filter</button>
                                    <button type="button" class="btn btn-outline-success ripple m-1 btn-sm"><i class="i-File-Copy"></i> PDF</button>
                                    <button class="btn btn-sm btn-outline-danger ripple m-1"><i class="i-File-Excel"></i> EXCEL</button>
                                    <button type="button" class="btn btn-info m-1 btn-sm"><i class="i-Upload"></i> Import</button>
                                    <a href="{{ route('accounts-payables.create') }}" class="btn btn-primary btn-icon m-1"><i class="i-Add"></i> Add</a>
                                </div>
                            </div>
                        </div>

                        <!-- 🏦 Make Payment Modal -->
<div class="modal fade" id="makePaymentModal" tabindex="-1" role="dialog" aria-labelledby="makePaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow-sm">
            <div class="modal-header bg-white">
                <h5 class="modal-title fw-bold" id="makePaymentModalLabel">Make Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('accounts-payables.makePayment') }}" method="POST">
                @csrf
                <input type="hidden" name="account_payable_id" id="ap_id">
                <div class="modal-body">
                    <div class="row">

                        <!-- Date and Time -->
                        <div class="col-md-6">
                            <label for="payment_date">Date and Time of Transaction *</label>
                            <input type="datetime-local" 
                                    id="payment_date" 
                                    name="payment_date" 
                                    class="form-control" 
                                    value="{{ now()->format('Y-m-d\TH:i') }}" 
                                    required>
                        </div>

                        <!-- Amount to be Paid -->
                        <div class="col-md-6">
                            <label for="amount_to_pay">Amount *</label>
                            <input type="number" step="0.01" name="amount_to_pay" class="form-control" required>
                        </div>

                        <!-- Cash Equivalent Dropdown -->
                        <div class="col-md-6 mt-3">
                            <label for="cash_equivalent_id">Cash Equivalent *</label>
                            <select name="cash_equivalent_id" id="cash_equivalent_id" class="form-control" required>
                                <option value="">Select Destination</option>
                                @foreach(\App\Models\CashEquivalent::where('status','active')->get() as $ce)
                                    <option value="{{ $ce->id }}">{{ $ce->name }} - {{ $ce->account_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Method of Payment Dropdown -->
                        <div class="col-md-6 mt-3">
                            <label for="payment_id">Method of Payment *</label>
                            <select name="payment_id" id="payment_id" class="form-control" required>
                                <option value="">Select Method of Payment</option>
                                @foreach(\App\Models\Payment::where('status','active')->get() as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="i-Yes me-2"></i>Submit Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

                        <!-- Amount Details Modal -->
<div class="modal fade" id="amountDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Amount Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="amountDetailsContent">
                <p>Loading...</p>
            </div>
        </div>
    </div>
</div>

<!-- ❌ DISAPPROVE MODAL -->
<div class="modal fade" id="disapproveModal" tabindex="-1" aria-labelledby="disapproveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-body text-center p-4">
        <div class="mb-3">
          <i class="i-Close text-danger" style="font-size: 48px;"></i>
        </div>
        <h5 class="fw-bold">Are you sure?</h5>
        <p class="text-muted mb-4">Click continue to disapprove request.</p>

        <form id="disapproveForm" method="POST">
          @csrf
          @method('PUT')
          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-danger text-white px-4">Continue</button>
            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- 🧾 VIEW PO INVOICE MODAL -->
<div class="modal fade" id="viewAmountDetailsModal" tabindex="-1" aria-labelledby="viewAmountDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-sm">
            <div class="modal-header bg-white">
                <h5 class="modal-title fw-semibold" id="viewAmountDetailsLabel">Amount Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="poInvoiceContent">
                <div class="text-center text-muted py-5">
                    <div class="spinner-border text-warning" role="status"></div>
                    <p class="mt-3">Loading Purchase Order...</p>
                </div>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-warning px-4" onclick="window.print()">Print</button>
            </div>
        </div>
    </div>
</div>

<!-- ✅ APPROVE MODAL -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-body text-center p-4">
        <div class="mb-3">
          <i class="i-Information text-warning" style="font-size: 48px;"></i>
        </div>
        <h5 class="fw-bold">Are you sure?</h5>
        <p class="text-muted mb-4">Click continue to approve request.</p>

        <form id="approveForm" method="POST">
          @csrf
          @method('PUT')
          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-warning text-white px-4">Continue</button>
            <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


                        <!-- Table -->
                        <div class="vgt-responsive">
                            <table id="vgt-table" class="table table-hover tableOne vgt-table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="vgt-left-align text-left">Date and Time of Transaction</th>
                                        <th scope="col" class="vgt-left-align text-left">Reference Number</th>
                                        <th scope="col" class="vgt-left-align text-left">Payor Name</th>
                                        <th scope="col" class="vgt-left-align text-left">Company</th>
                                        <th scope="col" class="vgt-left-align text-left">Address</th>
                                        <th scope="col" class="vgt-left-align text-left">Mobile Number</th>
                                        <th scope="col" class="vgt-left-align text-left">Email</th>
                                        <th scope="col" class="vgt-left-align text-left">TIN</th>
                                        <th scope="col" class="vgt-left-align text-left">Due Date</th>
                                        <th scope="col" class="vgt-left-align text-left">Status</th>
                                        <th scope="col" class="vgt-left-align text-left">Amount Due</th>
                                        <th scope="col" class="vgt-left-align text-left">Amount Details</th>
                                        <th scope="col" class="vgt-left-align text-left">Total Paid</th>
                                        <th scope="col" class="vgt-left-align text-left">Balance</th>
                                        <th scope="col" class="vgt-left-align text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($accountPayables as $ap)
                                    <tr>
                                        <td>{{ $ap->created_at->format('Y-m-d H:i') }}</td>
                                        <td>{{ $ap->reference_number }}</td>
                                        <td>{{ $ap->payer_name }}</td>
                                        <td>{{ $ap->payer_company }}</td>
                                        <td>{{ $ap->payer_address }}</td>
                                        <td>{{ $ap->payer_mobile_number }}</td>
                                        <td>{{ $ap->payer_email_address }}</td>
                                        <td>{{ $ap->payer_tin }}</td>
                                        <td>{{ $ap->due_date }}</td>
                                        
                            

        {{-- ===== Approved Extra Columns ===== --}}
        {{-- @if($status === 'approved')
            <td>{{ $ap->approvedBy?->name ?? 'NA' }}</td>
            <td>
                {{ $ap->approved_at
                    ? \Carbon\Carbon::parse($ap->approved_at)->format('Y-m-d H:i A')
                    : '' }}
            </td>
        @endif --}}

        {{-- ===== Status Badge ===== --}}
        <td>
            <span class="badge 
                {{ $ap->status === 'pending' ? 'badge-warning' :
                    ($ap->status === 'approved' ? 'badge-success' :
                    ($ap->status === 'completed' ? 'badge-primary' :
                    ($ap->status === 'disapproved' ? 'badge-danger' : 'badge-secondary'))) }}">
                {{ ucfirst($ap->status) }}
            </span>
        </td>

                <td class="text-left">
    ₱{{ number_format($ap->details->sum('total_amount'), 2) }}
</td>

        <td class="text-right">
            <button type="button" 
                    class="btn btn-sm btn-outline-info"
                    onclick="viewAmountDetails({{ $ap->id }})">
                <i class="i-Eye"></i> View
            </button>
        </td>

        <td class="text-left">
    ₱{{ number_format($ap->details->sum('amount_to_pay'), 2) }}
</td>

<td class="text-left">
    ₱{{ number_format($ap->details->sum('total_amount') - $ap->details->sum('amount_to_pay'), 2) }}
</td>

        {{-- ===== Archived Extra Columns ===== --}}
        @if($status === 'archived')
            <td>{{ $ap->archivedBy?->name ?? '' }}</td>
            <td>
                {{ $ap->archived_at
                    ? \Carbon\Carbon::parse($ap->archived_at)->format('Y-m-d H:i A')
                    : '' }}
            </td>
        @endif

                    {{-- ===== Actions Dropdown ===== --}}
                    <td class="text-right">
                        @include('layouts.actions-dropdown', [
                            'id' => $ap->id,
                            'status' => $ap->status,           // <--- add this
                            'editRoute' => route('accounts-payables.edit', $ap->id),
                            'archiveRoute' => route('accounts-payables.archive', $ap->id),
                            'deleteRoute' => route('accounts-payables.destroy', $ap->id),
                        ])
                    </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No records found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            {{-- <div class="mt-2">
                                {{ $accountPayables->links() }}
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function viewAmountDetails(id) {
    const modal = new bootstrap.Modal(document.getElementById('amountDetailsModal'));
    const body = document.getElementById('amountDetailsContent');

    body.innerHTML = `<p>Loading...</p>`;
    modal.show();

    fetch(`/accounts-payables/${id}/amount-details`)
        .then(res => res.json())
        .then(data => {
            body.innerHTML = `
                <table class="table table-bordered mb-0">
                    <tr>
                        <th>Tax</th>
                        <td>₱${data.tax}</td>
                    </tr>
                    <tr>
                        <th>Sub Total</th>
                        <td>₱${data.sub_total}</td>
                    </tr>
                    <tr>
                        <th>Total Amount</th>
                        <td><strong>₱${data.total}</strong></td>
                    </tr>
                </table>`;
        })
        .catch(() => {
            body.innerHTML = `<p class="text-danger">Failed to load details.</p>`;
        });
}

function approveAP(id) {
    const form = document.getElementById('approveForm');
    form.action = `/accounts-payables/${id}/approve`;
    new bootstrap.Modal(document.getElementById('approveModal')).show();
}

function disapproveAP(id) {
    const form = document.getElementById('disapproveForm');
    form.action = `/accounts-payables/${id}/disapprove`;
    new bootstrap.Modal(document.getElementById('disapproveModal')).show();
}

function openMakePaymentModal(apId) {
    document.getElementById('ap_id').value = apId;

    // Fetch AP details to calculate total amount
    fetch(`/accounts-payables/${apId}/amount-details`)
        .then(res => res.json())
        .then(data => {
            // pre-fill amount_to_pay
            document.getElementById('amount_to_pay').value = data.total; // total_amount from details
        })
        .catch(() => {
            document.getElementById('amount_to_pay').value = '';
        });

    new bootstrap.Modal(document.getElementById('makePaymentModal')).show();
}
</script>


@endsection
