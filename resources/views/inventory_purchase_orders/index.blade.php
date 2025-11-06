@extends('layouts.app')

@section('content')
<div class="main-content">
    {{-- Breadcrumb --}}
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Inventory Purchase Orders</h1>
            <ul>
                <li><a href="">Inventory</a></li>
                <li>Purchase Orders</li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

    {{-- Summary Cards --}}
    <div class="row mb-4">
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden text-center">
                <div class="card-body">
                    <div class="content align-items-center">
                        <p class="text-muted mt-2 mb-0 text-uppercase">Total POs</p>
                        <p class="text-primary text-18 line-height-1 mb-2">{{ $purchaseOrders->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="card wrapper">
        <div class="card-body">

            {{-- Tabs --}}
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    @foreach(['pending', 'approved', 'completed', 'disapproved', 'archived'] as $tab)
                        <li class="nav-item">
                            <a href="{{ route('inventory_purchase_orders.index', ['status' => $tab]) }}"
                                class="nav-link {{ $status === $tab ? 'active' : '' }}">
                                {{ ucfirst($tab) }}
                            </a>
                        </li>
                    @endforeach 
                </ul>
            </nav>  

            {{-- Actions --}}
            <div class="vgt-global-search vgt-clearfix mt-3">
                <div class="vgt-global-search__input vgt-pull-left">
                    <form role="search">
                        <label for="vgt-search-po">
                            <span aria-hidden="true" class="input__icon">
                                <div class="magnifying-glass"></div>
                            </span>
                        </label>
                        <input id="vgt-search-po" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                    </form>
                </div>

                <div class="vgt-global-search__actions vgt-pull-right">
                    <div class="mt-2 mb-3">
                        <a href="{{ route('inventory_purchase_orders.create') }}" class="btn btn-rounded btn-primary btn-icon m-1">
                            <i class="i-Add"></i> New PO
                        </a>
                    </div>
                </div>
            </div>

            {{-- Main Table --}}
            <div class="vgt-responsive mt-3">
                <table class="table table-hover vgt-table">
                    <thead>
                        <tr>
                            <th>Date & Time Created</th>
                            <th>PO #</th>
                            <th>Requested By</th>
                            <th>Department</th>
                            <th>PRF Reference #</th>
                            <th>Type of Request</th>
                            <th>Origin</th>
                            <th>Supplier</th>
                            <th>PO Details</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($purchaseOrders as $po)
                            <tr>
                                <td>{{ $po->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $po->po_number }}</td>
                                <td>{{ $po->user?->name ?? '—' }}</td>
                                <td>{{ $po->department ?? '—' }}</td>
                                <td>{{ $po->prf_reference_number ?? '—' }}</td>
                                <td>{{ $po->type_of_request ?? '—' }}</td>
                                <td>{{ $po->select_origin ?? '—' }}</td>
                                <td>{{ $po->supplier?->fullname ?? '—' }}</td>
                                <td class="text-right">
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-info"
                                            onclick="viewPODetails({{ $po->id }})">
                                        <i class="i-Eye"></i> View
                                    </button>
                                </td>
                                <td>
                                    <span class="badge 
                                        {{ $po->status === 'pending' ? 'badge-warning' : 
                                            ($po->status === 'approved' ? 'badge-success' : 
                                            ($po->status === 'completed' ? 'badge-primary' : 
                                            ($po->status === 'disapproved' ? 'badge-danger' : 'badge-secondary'))) }}">
                                        {{ ucfirst($po->status) }}
                                    </span>
                                </td>
                            <td class="text-right">
                                    @include('layouts.actions-dropdown', [
                                        'id' => $po->id,
                                        'editRoute' => route('inventory_purchase_orders.edit', $po->id),
                                        'deleteRoute' => route('inventory_purchase_orders.destroy', $po->id),
                                    ])
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No purchase orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- 📁 View Attached Files Modal -->
<div class="modal fade" id="viewAttachmentsModal" tabindex="-1" aria-labelledby="viewAttachmentsLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-header bg-white">
        <h5 class="modal-title fw-semibold" id="viewAttachmentsLabel">Attached Files</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="attachmentsList">
          <p class="text-muted mb-0">Loading attachments...</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="attachmentModal" tabindex="-1" aria-labelledby="attachmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0 shadow-sm">
            <div class="modal-header bg-white">
                <h5 class="modal-title fw-semibold" id="attachmentModalLabel">Attach Files</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="attachmentForm" enctype="multipart/form-data" method="POST" action="{{ route('inventory.purchase_orders.attachments') }}">
                @csrf
                <input type="hidden" name="po_id" id="attachment_po_id">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Attachments</label>
                        <div id="attachmentList" class="border rounded d-flex align-items-center justify-content-between px-3 py-2 text-muted">
                            No Attachments
                            <button type="button" class="btn btn-link text-danger p-0 ms-2" id="removeFileBtn" style="display:none;">
                                <i class="i-Close-Window"></i>
                            </button>
                        </div>
                        <input type="file" class="form-control mt-2" id="attachmentInput" name="attachments[]" multiple hidden>
                        <button type="button" class="btn btn-light border mt-2 w-100" id="addAttachmentBtn">
                            <i class="i-Add me-1"></i> Add File
                        </button>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-warning text-white px-4">
                        <i class="i-Yes me-1"></i> Submit
                    </button>
                </div>
            </form>
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
<div class="modal fade" id="viewPOInvoiceModal" tabindex="-1" aria-labelledby="viewPOInvoiceLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-sm">
            <div class="modal-header bg-white">
                <h5 class="modal-title fw-semibold" id="viewPOInvoiceLabel">Purchase Order Invoice</h5>
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

{{-- MODAL for PO Details --}}
<div class="modal fade" id="poDetailsModal" tabindex="-1" aria-labelledby="poDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Purchase Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="po-details-content" class="table-responsive text-center py-3">
                    <p>Loading details...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Script for modal view --}}
<script>
function viewPODetails(poId) {
    const modalBody = document.getElementById('po-details-content');
    modalBody.innerHTML = '<p>Loading details...</p>';
    const modal = new bootstrap.Modal(document.getElementById('poDetailsModal'));
    modal.show();

    fetch(`/inventory/purchase-orders/${poId}/details`)
        .then(response => response.json())
        .then(data => {
            if (data.details && data.details.length > 0) {
                let rows = '';
                data.details.forEach(d => {
                    rows += `
                        <tr>
                            <td>${d.component?.name ?? '—'}</td>
                            <td>${d.component?.code ?? '—'}</td>
                            <td>${d.component?.unit ?? '—'}</td>
                            <td>${parseFloat(d.unit_cost).toFixed(2)}</td>
                            <td>${d.qty}</td>
                            <td>${parseFloat(d.sub_total).toFixed(2)}</td>
                            <td>${data.type_of_request ?? '—'}</td>
                        </tr>`;
                });

                modalBody.innerHTML = `
                    <h6 class="text-start mb-3">PO #: <strong>${data.po_number}</strong></h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Unit</th>
                                <th>Unit Cost</th>
                                <th>Qty</th>
                                <th>Sub-Total</th>
                                <th>Type of Request</th>
                            </tr>
                        </thead>
                        <tbody>${rows}</tbody>
                    </table>`;
            } else {
                modalBody.innerHTML = '<p>No items found for this PO.</p>';
            }
        })
        .catch(err => {
            modalBody.innerHTML = `<p class="text-danger">Error loading details.</p>`;
            console.error(err);
        });
}
</script>

<script>
function viewPOInvoice(poId) {
    const modalBody = document.getElementById('po-details-content');
    modalBody.innerHTML = '<p>Loading details...</p>';
    const modal = new bootstrap.Modal(document.getElementById('poDetailsModal'));
    modal.show();

    fetch(`/inventory/purchase-orders/${poId}/details`)
        .then(response => response.json())
        .then(data => {
            if (!data || !data.details || data.details.length === 0) {
                modalBody.innerHTML = '<p>No items found for this PO.</p>';
                return;
            }

            // Compute subtotal and grand total
            let subtotal = 0;
            data.details.forEach(d => subtotal += parseFloat(d.sub_total || 0));
            const tax = subtotal * 0.12;
            const grandTotal = subtotal + tax;

            // Build PO Summary table rows
            let rows = '';
            data.details.forEach(d => {
                rows += `
                    <tr>
                        <td>${d.component?.name ?? '—'}</td>
                        <td>${d.component?.code ?? '—'}</td>
                        <td>${d.component?.category ?? '—'}</td>
                        <td>${d.component?.brand ?? '—'}</td>
                        <td>${d.component?.unit ?? '—'}</td>
                        <td class="text-end">₱${parseFloat(d.unit_cost ?? 0).toFixed(2)}</td>
                        <td class="text-end">${d.qty}</td>
                        <td class="text-end">₱${parseFloat(d.sub_total ?? 0).toFixed(2)}</td>
                    </tr>`;
            });

            // Build full modal content
            modalBody.innerHTML = `
                <div class="po-header text-center mb-4">
                    <h5 class="fw-bold text-uppercase">PURCHASE ORDER</h5>
                    <div class="text-muted small">
                        Date of PO: ${new Date(data.created_at).toLocaleDateString()}<br>
                        Estimated Date of Delivery: —
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>NO.:</strong> ${data.po_number}</p>
           <p class="mb-0"><strong>Requested by:</strong> ${data.user && data.user.name ? data.user.name : '—'}</p>
      <p class="mb-0"><strong>Department:</strong> ${data.department ? data.department : '—'}</p>
                        <p><strong>PO Addressed to (Supplier):</strong> ${data.supplier?.fullname ?? '—'}</p>
                        <p><strong>Address:</strong> ${data.supplier?.address ?? '—'}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Type of PO:</strong> ${data.type_of_request ?? '—'}</p>
                        <p><strong>Origin:</strong> ${data.select_origin ?? '—'}</p>
                        <p><strong>Status:</strong> 
                            <span class="badge bg-${data.status === 'approved' ? 'success' : data.status === 'disapproved' ? 'danger' : 'secondary'} text-uppercase">
                                ${data.status}
                            </span>
                        </p>
                    </div>
                </div>

                <h6 class="fw-bold mt-3 mb-2">PO SUMMARY</h6>
                <table class="table table-bordered align-middle text-sm">
                    <thead class="table-light" style="background-color: skyblue;>
                        <tr class="text-center">
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Unit</th>
                            <th>Unit Cost</th>
                            <th>Qty</th>
                            <th>Sub-Total</th>
                        </tr>
                    </thead>
                    <tbody>${rows}</tbody>
                </table>

                <div class="text-end mt-3">
                    <p><strong>SUBTOTAL:</strong> ₱${subtotal.toFixed(2)}</p>
                    <p><strong>VAT (12%):</strong> ₱${tax.toFixed(2)}</p>
                    <h6><strong>GRAND TOTAL:</strong> ₱${grandTotal.toFixed(2)}</h6>
                </div>

                <div class="mt-5">
                    <p class="fw-semibold mb-0">Prepared By:</p>
        <p class="mb-0">${"{{ auth()->user()->name }}"}</p>
                </div>
            `;
        })
        .catch(err => {
            modalBody.innerHTML = `<p class="text-danger">Error loading details.</p>`;
            console.error(err);
        });
}
</script>

<script>
    let selectedFiles = [];

    function openAttachmentModal(poId) {
        document.getElementById('attachment_po_id').value = poId;
        const modal = new bootstrap.Modal(document.getElementById('attachmentModal'));
        modal.show();
    }

    document.getElementById('addAttachmentBtn').addEventListener('click', () => {
        document.getElementById('attachmentInput').click();
    });

    document.getElementById('attachmentInput').addEventListener('change', function() {
        const list = document.getElementById('attachmentList');
        const removeBtn = document.getElementById('removeFileBtn');
        selectedFiles = Array.from(this.files);

        if (selectedFiles.length > 0) {
            list.innerHTML = selectedFiles.map(f => f.name).join(', ');
            removeBtn.style.display = 'inline-block';
        } else {
            list.innerHTML = 'No Attachments';
            removeBtn.style.display = 'none';
        }
    });

    document.getElementById('removeFileBtn').addEventListener('click', function() {
        selectedFiles = [];
        document.getElementById('attachmentInput').value = '';
        document.getElementById('attachmentList').innerHTML = 'No Attachments';
        this.style.display = 'none';
    });
</script>

<script>
function openViewAttachmentsModal(poId) {
    const modal = new bootstrap.Modal(document.getElementById('viewAttachmentsModal'));
    const container = document.getElementById('attachmentsList');
    container.innerHTML = `<p class="text-muted mb-0">Loading attachments...</p>`;
    modal.show();

    fetch(`/inventory_purchase_orders/${poId}/attachments`)
        .then(response => response.json())
        .then(data => {
            if (!data.attachments || data.attachments.length === 0) {
                container.innerHTML = `<p class="text-muted mb-0">No attachments found.</p>`;
                return;
            }

            let html = '<div class="list-group">';
            data.attachments.forEach(file => {
                const filename = file.split('/').pop();
                html += `
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="i-File-PDF text-danger me-2" style="font-size: 1.4rem;"></i>
                            <span>${filename}</span>
                        </div>
                        <div>
                            <a href="/storage/${file}" target="_blank" class="text-decoration-none me-2 text-warning">
                                <i class="i-Download"></i>
                            </a>
                            <a href="javascript:void(0);" class="text-decoration-none text-danger" onclick="deleteAttachment('${file}', ${poId})">
                                <i class="i-Close-Window"></i>
                            </a>
                        </div>
                    </div>`;
            });
            html += '</div>';
            container.innerHTML = html;
        })
        .catch(() => {
            container.innerHTML = `<p class="text-danger">Failed to load attachments.</p>`;
        });
}
</script>

<script>
    let selectedFiles = [];

    function openAttachmentModal(poId) {
        document.getElementById('attachment_po_id').value = poId;
        const modal = new bootstrap.Modal(document.getElementById('attachmentModal'));
        modal.show();
    }

    document.getElementById('addAttachmentBtn').addEventListener('click', () => {
        document.getElementById('attachmentInput').click();
    });

    document.getElementById('attachmentInput').addEventListener('change', function() {
        const list = document.getElementById('attachmentList');
        const removeBtn = document.getElementById('removeFileBtn');
        selectedFiles = Array.from(this.files);

        if (selectedFiles.length > 0) {
            list.innerHTML = selectedFiles.map(f => f.name).join(', ');
            removeBtn.style.display = 'inline-block';
        } else {
            list.innerHTML = 'No Attachments';
            removeBtn.style.display = 'none';
        }
    });

    document.getElementById('removeFileBtn').addEventListener('click', function() {
        selectedFiles = [];
        document.getElementById('attachmentInput').value = '';
        document.getElementById('attachmentList').innerHTML = 'No Attachments';
        this.style.display = 'none';
    });
</script>

<script>
function openViewAttachmentsModal(poId) {
    const modal = new bootstrap.Modal(document.getElementById('viewAttachmentsModal'));
    const container = document.getElementById('attachmentsList');
    container.innerHTML = `<p class="text-muted mb-0">Loading attachments...</p>`;
    modal.show();

    fetch(`/inventory_purchase_orders/${poId}/attachments`)
        .then(response => response.json())
        .then(data => {
            if (!data.attachments || data.attachments.length === 0) {
                container.innerHTML = `<p class="text-muted mb-0">No attachments found.</p>`;
                return;
            }

            let html = '<div class="list-group">';
            data.attachments.forEach(file => {
                const filename = file.split('/').pop();
                html += `
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="i-File-PDF text-danger me-2" style="font-size: 1.4rem;"></i>
                            <span>${filename}</span>
                        </div>
                        <div>
                            <a href="/storage/${file}" target="_blank" class="text-decoration-none me-2 text-warning">
                                <i class="i-Download"></i>
                            </a>
                            <a href="javascript:void(0);" class="text-decoration-none text-danger" onclick="deleteAttachment('${file}', ${poId})">
                                <i class="i-Close-Window"></i>
                            </a>
                        </div>
                    </div>`;
            });
            html += '</div>';
            container.innerHTML = html;
        })
        .catch(() => {
            container.innerHTML = `<p class="text-danger">Failed to load attachments.</p>`;
        });
}
</script>

<script>
function approvePO(id) {
    const form = document.getElementById('approveForm');
    form.action = `/inventory/purchase-orders/${id}/approve`;
    const modal = new bootstrap.Modal(document.getElementById('approveModal'));
    modal.show();
}

function disapprovePO(id) {
    const form = document.getElementById('disapproveForm');
    form.action = `/inventory/purchase-orders/${id}/disapprove`;
    const modal = new bootstrap.Modal(document.getElementById('disapproveModal'));
    modal.show();
}
</script>

@endsection
