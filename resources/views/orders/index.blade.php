@extends('layouts.app')
@section('content')
<div class="main-content">
   <div>
      <div class="breadcrumb">
         <h1 class="mr-3">Orders</h1>
         <ul>
            <li><a href=""> POS </a></li>
            <!----> <!---->
         </ul>
         <div class="breadcrumb-action"></div>
      </div>
      <div class="separator-breadcrumb border-top"></div>
   </div>
   <!----> 
   <div class="wrapper">
      
      <div class="card mt-4">
         <!----><!---->
         <nav class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
               <li class="nav-item">
                  <a href="{{ route('orders.index', ['status' => 'serving']) }}" 
                     class="nav-link {{ $status === 'serving' ? 'active' : '' }}">
                     Serving
                  </a>
               </li>

               <li class="nav-item">
                  <a href="{{ route('orders.index', ['status' => 'billout']) }}" 
                     class="nav-link {{ $status === 'billout' ? 'active' : '' }}">
                     Bill Out
                  </a>
               </li>

               <li class="nav-item">
                  <a href="{{ route('orders.index', ['status' => 'payment']) }}"
                     class="nav-link {{ $status === 'payment' ? 'active' : '' }}">
                     Payment
                  </a>
               </li>
            </ul>
         </nav>
         <div class="card-body">
            <!----><!---->
            <div class="vgt-wrap ">
               <!----> 
               <div class="vgt-inner-wrap">
                  <!----> 
                  <div class="vgt-global-search vgt-clearfix">
                     <div class="vgt-global-search__input vgt-pull-left">
                        <form role="search">
                           <label for="vgt-search-352530096888">
                              <span aria-hidden="true" class="input__icon">
                                 <div class="magnifying-glass"></div>
                              </span>
                              <span class="sr-only">Search</span>
                           </label>
                           <input id="vgt-search-352530096888" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                        </form>
                     </div>
                     <div class="vgt-global-search__actions vgt-pull-right">
                        <div>
                           <div id="dropdown-form" class="dropdown b-dropdown mx-1 btn-group" rounded="">
                              <!----><button id="dropdown-form__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"><i class="i-Gear"></i></button>
                              <ul role="menu" tabindex="-1" aria-labelledby="dropdown-form__BV_toggle_" class="dropdown-menu dropdown-menu-right">
                                 <li role="presentation">
                                    <header id="dropdown-header-label" class="dropdown-header">
                                       Columns
                                    </header>
                                 </li>
                                 <li role="presentation" style="width: 220px;">
                                    <form tabindex="-1" class="b-dropdown-form p-0">
                                       <section class="ps-container ps">
                                          <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                             <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                          </div>
                                          <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                             <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                          </div>
                                       </section>
                                    </form>
                                 </li>
                              </ul>
                           </div>
                           <button type="button" class="btn mx-1 btn-outline-info ripple btn-sm collapsed" aria-expanded="false" aria-controls="sidebar-right" style="overflow-anchor: none;"><i class="i-Filter-2"></i>
                           Filter
                           </button> <button type="button" class="btn mx-1 btn-outline-success ripple btn-sm"><i class="i-File-Copy"></i> PDF
                           </button> <button class="btn btn-sm btn-outline-danger ripple mx-1"><i class="i-File-Excel"></i> EXCEL
                           </button> <button type="button" class="btn btn-info m-1 btn-sm"><i class="i-Upload"></i>
                           Import
                           </button> <button type="button" class="btn mx-1 btn-btn btn-primary btn-icon" onclick="window.location='{{ url('order/create') }}'"><i class="i-Add"></i>
                           Add
                           </button> <button type="button" class="btn mx-1 btn-btn btn-primary">
                           Stock Alert Summary
                           </button>
                        </div>
                     </div>
                  </div>
                  <!----> 
                  <div class="vgt-fixed-header">
                     <!---->
                  </div>
                  <div class="vgt-responsive"style="max-height: 400px; overflow-y: auto;">
                     <table id="vgt-table" class="table-hover tableOne vgt-table custom-vgt-table ">
                        <colgroup>
                           <col id="col-0">
                           <col id="col-1">
                           <col id="col-2">
                           <col id="col-3">
                           <col id="col-4">
                           <col id="col-5">
                           <col id="col-6">
                           <col id="col-7">
                           <col id="col-8">
                           <col id="col-9">
                           <col id="col-10">
                           <col id="col-11">
                           <col id="col-12">
                           <col id="col-13">
                           <col id="col-14">
                           <col id="col-15">
                           <col id="col-16">
                        </colgroup>
                        <thead style="min-width: auto; width: auto;">
                           <tr>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Show Details</span>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Order No.</span>
                                 <button><span class="sr-only">Sort table by Product No in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Waiter Name</span>
                                 <button><span class="sr-only">Sort table by Waiter Name in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Table No.</span>
                                 <button><span class="sr-only">Sort table by Table No in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Number Of Pax</span>
                                 <button><span class="sr-only">Sort table by Number of Pax in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-right sortable">
                                 <span>Status</span>
                                 <button><span class="sr-only">Sort table by Status in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-right sortable">
                                 <span>Amount</span>
                                 <button><span class="sr-only">Sort table by Amount Price in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-right">
                                 <span>Action</span>
                              </th>
                           </tr>
                        </thead>
                  <tbody>
                     @forelse ($orders as $order)
                        <tr x-data="{ open: false }">
      <!-- Checkbox -->
      <td>
         <input type="checkbox" class="toggle-details" data-id="{{ $order->id }}">
      </td>

      <!-- Order Data -->
      <td class="text-left">{{ $order->id }}</td>
      <td class="text-left">{{ $order->user?->name ?? 'N/A' }}</td>
      <td class="text-left">{{ $order->table_no }}</td>
      <td class="text-left">{{ $order->number_pax }}</td>
      <td class="text-left">{{ ucfirst($order->status) }}</td>
      <td class="text-left" id="amount_{{ $order->id }}">
      <td class="text-left fw-bold {{ $order->status === 'billout' ? 'text-success' : '' }}">
         @php 
            $grandTotal = 0; 
            $totalItems = 0;

            foreach ($order->details as $detail) {
                  $lineTotal = $detail->quantity * $detail->price; 
                  $grandTotal += $lineTotal; 
                  $totalItems += $detail->quantity;
            }

            if ($order->status === 'billout') {
                  $displayTotal = $order->total_charge ?? $grandTotal;
            } else {
                  $displayTotal = $grandTotal;
            }
         @endphp

         ₱{{ number_format($displayTotal, 2) }}
      </td>
      {{-- Actions --}}
      <td class="text-right">
         @include('layouts.actions-dropdown', [
         'id' => $order->id,
         'editRoute' => '#',
         'viewRoute' => '#',
         'deleteRoute' => '#',
         'remarksRoute' => '#',
         'status' => '#',

         // Custom labels
         'viewLabel' => 'Bill out',
         'deleteLabel' => 'Cancel',
      ])
      </td>
      </tr>

      <!-- Hidden Details Row -->
      <tr id="details-{{ $order->id }}" class="order-details" style="display:none;">
         <td colspan="7">
         <div style="max-height:200px; overflow-y:auto; padding:10px; border:1px solid #ddd; background:#f9f9f9;">
            <table style="width:100%; border-collapse:collapse;">
               <thead style="border-bottom:1px solid #ccc; background:#e9e9e9;">
            <tr>
               <th>SKU</th>
               <th>Product</th>
               <th>Qty</th>
               <th>Amount</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach($order->details as $detail)
               <tr>
                  <td>
                        {{ $detail->product?->code ?? $detail->component?->code ?? 'N/A' }}
                  </td>
                  <td>
                        {{ $detail->item_name }}
                  </td>
                  <td>
                        {{ $detail->quantity }}
                  </td>
                  <td>
                        ₱{{ number_format($detail->price, 2) }}
                  </td>
               </tr>
            @endforeach
            </tbody>
               </table>
         </div>
         </td>
      </tr>
   @empty
      <tr>
         <td colspan="7" class="vgt-center-align vgt-text-disabled">
            No orders found
         </td>
      </tr>
   @endforelse
      </tbody>

      
                  </div>
                  </td></tr></tbody></table>
@foreach($orders as $order)
<div class="modal fade" id="billOutModal{{ $order->id }}" tabindex="-1" aria-labelledby="billOutLabel{{ $order->id }}" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         {{-- Modal Header --}}
         <div class="modal-header">
         <h5 class="modal-title">Bill Out - Order #{{ $order->id }}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>

         {{-- Modal Body --}}
         <div class="modal-body">
         <div class="container-fluid">
            {{-- Order Info --}}
            <div class="row mb-2">
               <div class="col-md-2">
               <label class="form-label">Order No</label>
               <input type="text" class="form-control" value="{{ $order->id }}" readonly>
               </div>
               <div class="col-md-2">
               <label class="form-label">No of Pax</label>
               <input type="text" class="form-control" value="{{ $order->number_pax }}" readonly>
               </div>
               <div class="col-md-3">
               <label class="form-label">Date & Time</label>
               <input type="text" class="form-control" value="{{ $order->created_at->format('Y-m-d H:i') }}" readonly>
               </div>
            </div>

            <div class="row mb-2">
               <div class="col-md-2">
               <label class="form-label">Table No</label>
               <input type="text" class="form-control" value="{{ $order->table_no }}" readonly>
               </div>
               <div class="col-md-3">
               <label class="form-label">Waiter</label>
               <input type="text" class="form-control" value="{{ $order->user?->name }}" readonly>
               </div>
               <div class="col-md-2">
               <label class="form-label">Status</label>
               <input type="text" class="form-control" value="{{ ucfirst($order->status) }}" readonly>
               </div>
               <div class="col-md-3">
               <label class="form-label">Cashier</label>
               <input type="text" class="form-control" value="{{ auth()->user()->name ?? '' }}" readonly>
               </div>
            </div>

            {{-- Gross Charge --}}
            <hr>
            <h6 class="fw-bold text-center">GROSS CHARGE</h6>
            <div class="row mb-3">
               <div class="col-md-4 offset-md-4">
               <input type="text" class="form-control text-center fw-bold" 
                        value="₱{{ number_format($order->details->sum(fn($d) => ($d->price * $d->quantity) - ($d->discount ?? 0)), 2) }}" readonly>
               </div>
            </div>

            @php
    // compute gross for this order explicitly (per-order, not a shared var)
    $orderGross = $order->details->sum(fn($d) => ($d->price * $d->quantity) - ($d->discount ?? 0));
@endphp

            {{-- Entries Section --}}
   <div class="col-md-5 position-relative">
    <label class="form-label">Discount</label>

    <input type="text" id="selectedDiscountName_{{ $order->id }}"
           class="form-control" placeholder="Select discounts..."
           onclick="toggleDiscountDropdown({{ $order->id }})" readonly>

    <div id="discountDropdown_{{ $order->id }}"
         class="border rounded p-2 position-absolute bg-white w-100"
         style="display:none; max-height:200px; overflow-y:auto; z-index:100;">
        @foreach($discounts as $discount)
            <div class="form-check">
                <input class="form-check-input discount-checkbox-single" type="checkbox"
                       value="{{ $discount->id }}"
                       data-name="{{ $discount->name }}"
                       data-value="{{ $discount->value }}"
                       onchange="updateSelectedDiscounts({{ $order->id }})"
                       id="discountCheck_{{ $order->id }}_{{ $discount->id }}">
                <label class="form-check-label" for="discountCheck_{{ $order->id }}_{{ $discount->id }}">
                    {{ $discount->name }} ({{ $discount->value }}%)
                </label>
            </div>
        @endforeach
    </div>

    <input type="hidden" name="discount_ids_{{ $order->id }}" id="discountIds_{{ $order->id }}">

    <!-- Manage toggles the Apply Discount box only (don't call calculate here) -->
    <button type="button" class="btn btn-outline-primary btn-sm mt-2 manage-btn"
            onclick="toggleDiscountForm({{ $order->id }})">
        Manage
    </button>
</div>
</div>

      <!-- Apply Discount form (rendered by toggle) -->
<div id="discountForm_{{ $order->id }}" class="border rounded p-3 mt-3" style="display:none;">
    <h6 class="text-center mb-3">Apply Discount</h6>
    <div id="selectedDiscountsContainer_{{ $order->id }}"></div>
    <div class="d-flex justify-content-center mt-3">
        <button type="button" class="btn btn-danger btn-sm px-3" onclick="toggleDiscountForm({{ $order->id }})">
            Close
        </button>
    </div>
</div>

<!-- Other Charges / Calculate -->
<div class="row mb-2">
    <div class="col-md-4 mt-3">
        <label class="form-label">Other Charges</label>
        <input type="number" class="form-control" id="otherCharges_{{ $order->id }}" name="other_charges" placeholder="Enter amount">
    </div>
    <div class="col-md-4 mt-3">
        <label class="form-label">Charges Description</label>
        <input type="text" class="form-control" id="chargesDescription_{{ $order->id }}" name="charges_description" placeholder="Description">
    </div>
</div>

<div class="row mb-3">
   <div class="col-md-12 text-center">
      <!-- pass the computed per-order gross explicitly (no shared $grandTotal) -->
      <button type="button" class="btn btn-success"
              onclick="calculateChargesAndDiscounts({{ $order->id }}, {{ json_encode((float)$orderGross) }}, {{ $order->number_pax }})">
         Calculate Charges and Discounts
      </button>
   </div>
</div>

<form id="billOutForm_{{ $order->id }}" 
      action="{{ route('orders.billout', $order->id) }}" 
      method="POST">
   @csrf
   <input type="hidden" name="order_id" value="{{ $order->id }}">
   
   <!-- CHARGES AND DISCOUNTS fields (keep your IDs) -->
   <hr>
   <h6 class="fw-bold text-center">CHARGES AND DISCOUNTS</h6>
   <div class="row">
      <div class="col-md-4">
         <label class="form-label">SR/PWD Bill</label>
         <input type="text" id="srPwdBill_{{ $order->id }}" class="form-control" readonly>
      </div>
      <div class="col-md-4">
         <label class="form-label">Reg Bill</label>
         <input type="text" id="regBill_{{ $order->id }}" class="form-control" readonly>
      </div>
      <div class="col-md-4">
         <label class="form-label">20% Discount</label>
         <input type="text" id="discount20_{{ $order->id }}" class="form-control" readonly>
      </div>
   </div>

   <div class="row mt-2">
      <div class="col-md-4">
         <label class="form-label">Vatable</label>
         <input type="text" id="vatable_{{ $order->id }}" class="form-control" readonly>
      </div>
      <div class="col-md-4">
         <label class="form-label">VAT 12%</label>
         <input type="text" id="vat12_{{ $order->id }}" class="form-control" readonly>
      </div>
      <div class="col-md-4">
         <label class="form-label">Net Bill</label>
         <input type="text" id="netBill_{{ $order->id }}" class="form-control" readonly>
      </div>
   </div>

   <div class="row mt-2">
      <div class="col-md-4">
         <label class="form-label">Other Discount</label>
         <input type="text" id="otherDiscount_{{ $order->id }}" class="form-control" readonly>
      </div>
      <div class="col-md-8">
         <label class="form-label fw-bold">TOTAL CHARGE</label>
         <input type="text" id="totalCharge_{{ $order->id }}" class="form-control fw-bold text-success" readonly>
      </div>
   </div>

                  {{-- Modal Footer (Submit inside form now) --}}
                  <div class="modal-footer">
                     <button type="button8" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary" onclick="confirmBillOut({{ $order->id }})">Confirm Bill Out</button>
                  </div>
               </form>

               </div>
            </div>
         </div>
         </div>

      </div>
   </div>
</div>
@endforeach

   <script>
// function calculateChargesAndDiscounts(orderId, grossAmount, pax) {
//     const vatRate = 0.12;

//     // Safety/coerce
//     grossAmount = parseFloat(grossAmount) || 0;
//     pax = parseInt(pax) || 1;
//     if (pax <= 0) pax = 1;

//     // Selected discount IDs
//     const hidden = document.getElementById("discountIds_" + orderId);
//     const selectedIds = hidden && hidden.value
//         ? hidden.value.split(',').map(s => s.trim()).filter(Boolean)
//         : [];

//     const perPaxGross = grossAmount / pax;           // e.g. 1000 / 5 = 200
//     const basePerPax = perPaxGross / (1 + vatRate);  // remove VAT e.g. 178.57

//     // Totals
//     let qualifiedCount = 0;
//     let totalDiscountAmount = 0;

//     selectedIds.forEach(id => {
//         const chk = document.getElementById(`discountCheck_${orderId}_${id}`);
//         if (!chk) return;

//         const name = (chk.dataset.name || '').toLowerCase();
//         const valuePct = parseFloat(chk.dataset.value || 0); // e.g. 20

//         if (name.includes('senior') || name.includes('pwd')) {
//             // Try to read discount count input
//             let count = 0;
//             const countInput = document.getElementById(`discountCount_${orderId}_${id}`);
//             if (countInput) {
//                 count = parseInt(countInput.value) || 0;
//             } else {
//                 const personsContainer = document.getElementById(`discountPersons_${orderId}_${id}`);
//                 if (personsContainer) {
//                     count = personsContainer.querySelectorAll('.row').length || 0;
//                 }
//             }

//             if (count > 0) {
//                 qualifiedCount += count;
//                 const discountPerPax = basePerPax * (valuePct / 100);
//                 totalDiscountAmount += discountPerPax * count;
//             }
//         }
//     });

//     // Clamp qualifiedCount (cannot exceed pax)
//     qualifiedCount = Math.min(qualifiedCount, pax);

//     // Vatable / VAT portion
//     const totalVatable = basePerPax * pax;
//     const totalVat12 = grossAmount - totalVatable;

//     // Compute total charge (net)
//     const qualifiedNetTotal = (basePerPax * qualifiedCount) - totalDiscountAmount;
//     const nonQualifiedCount = pax - qualifiedCount;
//     const nonQualifiedTotal = perPaxGross * nonQualifiedCount;
//     const totalCharge = qualifiedNetTotal + nonQualifiedTotal;

//     // 🧮 Correct SR/PWD Bill — total for all discounted pax
//     const srPwdBillValue = perPaxGross * qualifiedCount;

//     // Others
//     const regBillValue = grossAmount;
//     const discountValue = totalDiscountAmount;
//     const vatableValue = totalVatable;
//     const vat12Value = totalVat12;
//     const netBillValue = totalCharge;
//     const otherDiscountValue = 0.00;

//     // Update UI fields
//     const setVal = (id, val) => {
//         const el = document.getElementById(id + '_' + orderId);
//         if (el) el.value = Number(val || 0).toFixed(2);
//     };

//     setVal('srPwdBill', srPwdBillValue);
//     setVal('regBill', regBillValue);
//     setVal('discount20', discountValue);
//     setVal('vatable', vatableValue);
//     setVal('vat12', vat12Value);
//     setVal('netBill', netBillValue);
//     setVal('otherDiscount', otherDiscountValue);
//     setVal('totalCharge', totalCharge);

//     // Optional display for per-pax info
//     const perPaxNetEl = document.getElementById('perPaxNet_' + orderId);
//     if (perPaxNetEl) {
//         if (qualifiedCount > 0) {
//             const discountPerPax = totalDiscountAmount / qualifiedCount;
//             const netPerQualifiedPax = basePerPax - discountPerPax;
//             perPaxNetEl.textContent = `Qualified per pax: ₱${netPerQualifiedPax.toFixed(2)} (x${qualifiedCount})`;
//         } else {
//             perPaxNetEl.textContent = '';
//         }
//     }
// }

function calculateChargesAndDiscounts(orderId, grossAmount, pax) {
    const vatRate = 0.12;

    // Safety/coerce
    grossAmount = parseFloat(grossAmount) || 0;
    pax = parseInt(pax) || 1;
    if (pax <= 0) pax = 1;

    // Selected discounts
    const hidden = document.getElementById("discountIds_" + orderId);
    const selectedIds = hidden && hidden.value
        ? hidden.value.split(',').map(s => s.trim()).filter(Boolean)
        : [];

    let qualifiedCount = 0;
    let discountPercent = 0;
    let otherDiscountTotal = 0;

    selectedIds.forEach(id => {
        const chk = document.getElementById(`discountCheck_${orderId}_${id}`);
        if (!chk) return;

        const name = (chk.dataset.name || '').toLowerCase();
        const valuePct = parseFloat(chk.dataset.value || 0);

        // SR/PWD Discount logic
        if (name.includes('senior') || name.includes('pwd')) {
            const countInput = document.getElementById(`discountCount_${orderId}_${id}`);
            const count = countInput ? parseInt(countInput.value) || 0 : 0;

            if (count > 0) {
                qualifiedCount += count;
                discountPercent = valuePct;
            }
        } 
        // Other discounts (VIP, Athlete, etc.)
        else {
            const countInput = document.getElementById(`discountCount_${orderId}_${id}`);
            const count = countInput ? parseInt(countInput.value) || 1 : 1;
            const discountPerPerson = grossAmount * (valuePct / 100);
            const totalDiscount = discountPerPerson * count;
            otherDiscountTotal += totalDiscount;
        }
    });

    // Prevent SR/PWD count exceeding total pax
    qualifiedCount = Math.min(qualifiedCount, pax);

    // Compute SR/PWD and Regular shares
    const perPax = grossAmount / pax;
    const srPwdBill = perPax * qualifiedCount;
    const regBill = perPax * (pax - qualifiedCount);

    // ✅ VATABLE and VAT 12%
    const vatable = regBill / (1 + vatRate);
    const vat12 = regBill - vatable;

    // ✅ SR/PWD 20% discount (non-VAT portion)
    const srPwdVatable = srPwdBill / (1 + vatRate);
    const discount20 = srPwdVatable * (discountPercent / 100);

    // ✅ NET BILL for SR/PWD
    const netBill = srPwdVatable - discount20;

   // ✅ TOTAL CHARGE (Regular + SR/PWD discounted + Other discounts)
   //  const totalCharge = (regBill + (netBill * (1 + vatRate))) - otherDiscountTotal;

   // ✅ TOTAL CHARGE (SR/PWD + Regular + Other Discounts)
   const totalCharge = ((grossAmount - otherDiscountTotal) - ((srPwdBill / (1 + vatRate)) * vatRate) - ((srPwdBill / (1 + vatRate)) * (discountPercent / 100)));


    // --- Update UI fields ---
    const setVal = (id, val) => {
        const el = document.getElementById(id + '_' + orderId);
        if (el) el.value = Number(val || 0).toFixed(2);
    };

    setVal('srPwdBill', srPwdBill);
    setVal('regBill', regBill);
    setVal('vatable', vatable);
    setVal('vat12', vat12);
    setVal('discount20', discount20);
    setVal('netBill', netBill);
    setVal('otherDiscount', otherDiscountTotal);
    setVal('totalCharge', totalCharge);
}

// function confirmBillOut(orderId) {
//     const form = document.getElementById('billOutForm_' + orderId);
//     if (!form) {
//         alert("⚠️ Bill Out form not found.");
//         return;
//     }

//     const formData = new FormData(form);

//     // ✅ Include all billing and discount-related computed fields
//     const fields = [
//         'srPwdBill', 'discount20', 'otherDiscount',
//         'netBill', 'vatable', 'vat12', 'totalCharge'
//     ];

//     fields.forEach(f => {
//         const el = document.getElementById(f + '_' + orderId);
//         if (el && el.value !== '') {
//             formData.set(f, el.value); // ensure value overrides FormData correctly
//         } else {
//             console.warn(`Missing or empty field: ${f}_${orderId}`);
//         }
//     });

//     // ✅ Collect discount persons
//     const personsData = [];
//     document.querySelectorAll(`#selectedDiscountsContainer_${orderId} input[name^="persons"]`).forEach(input => {
//         const match = input.name.match(/persons\[(\d+)\]\[(\d+)\]\[(name|id_number)\]/);
//         if (match) {
//             const discountId = match[1];
//             const index = match[2];
//             const key = match[3];
//             if (!personsData[index]) personsData[index] = { discount_id: discountId };
//             personsData[index][key] = input.value;
//         }
//     });

//     formData.append('persons', JSON.stringify(personsData));

//     // ✅ Confirm action
//     if (!confirm('Are you sure you want to confirm this Bill Out?')) return;

//     fetch(form.action, {
//         method: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//         },
//         body: formData
//     })
//     .then(res => res.json())
//     .then(data => {
//         console.log("Bill Out Response:", data);

//         if (data.success) {
//             // ✅ Update totalCharge input
//             const totalChargeInput = document.getElementById('totalCharge_' + orderId);
//             if (totalChargeInput) {
//                 totalChargeInput.value = parseFloat(data.order.total_charge).toFixed(2);
//             }

//             // ✅ Update amount in the table
//             const amountCell = document.getElementById('amount_' + orderId);
//             if (amountCell) {
//                 amountCell.textContent = `₱${Number(data.order.total_charge).toLocaleString('en-PH', {
//                     minimumFractionDigits: 2
//                 })}`;
//             }

//             alert('✅ Bill saved successfully!');
            
//             // ✅ Redirect to Bill Out page after 1 second
//             setTimeout(() => {
//                 window.location.href = "/orders?status=billout";
//             }, 1000);

//         } else {
//             alert('⚠️ Failed to save bill: ' + (data.message || 'Unknown error'));
//         }
//     })
//     .catch(err => {
//         console.error("Bill Out Error:", err);
//         alert('❌ Error saving bill.');
//     });
// }

const savedDiscountPersons = {}; 

function saveDiscountPersons(orderId) {
    const personsMap = {};

    document.querySelectorAll(`#selectedDiscountsContainer_${orderId} [id^="discountPersons_"]`).forEach(container => {
        const discountId = container.id.split('_').pop();
        const rows = container.querySelectorAll('.row');

        personsMap[discountId] = [];
        rows.forEach((row, idx) => {
            const nameInput = row.querySelector('input[name^="persons"][name$="[name]"]');
            const idInput = row.querySelector('input[name^="persons"][name$="[id_number]"]');

            personsMap[discountId].push({
                name: nameInput ? nameInput.value : '',
                id_number: idInput ? idInput.value : ''
            });
        });
    });

    savedDiscountPersons[orderId] = personsMap;
}

function confirmBillOut(orderId) {
    const form = document.getElementById('billOutForm_' + orderId);
    if (!form) {
        alert("⚠️ Bill Out form not found.");
        return;
    }

    const formData = new FormData(form);

    // ✅ Include computed fields
    const fields = [
        'srPwdBill', 'discount20', 'otherDiscount',
        'netBill', 'vatable', 'vat12', 'totalCharge'
    ];
    fields.forEach(f => {
        const el = document.getElementById(f + '_' + orderId);
        if (el && el.value !== '') {
            formData.set(f, el.value);
        }
    });

    // ✅ Collect discount persons from saved memory
    const personsData = [];
    if (savedDiscountPersons[orderId]) {
        Object.entries(savedDiscountPersons[orderId]).forEach(([discountId, persons]) => {
            persons.forEach(p => {
                personsData.push({
                    discount_id: discountId,
                    name: p.name || '',
                    id_number: p.id_number || ''
                });
            });
        });
    }

    formData.append('persons', JSON.stringify(personsData));

    // ✅ Confirm action
    if (!confirm('Are you sure you want to confirm this Bill Out?')) return;

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        console.log("Bill Out Response:", data);

        if (data.success) {
            const totalChargeInput = document.getElementById('totalCharge_' + orderId);
            if (totalChargeInput) {
                totalChargeInput.value = parseFloat(data.order.total_charge).toFixed(2);
            }

            const amountCell = document.getElementById('amount_' + orderId);
            if (amountCell) {
                amountCell.textContent = `₱${Number(data.order.total_charge).toLocaleString('en-PH', {
                    minimumFractionDigits: 2
                })}`;
            }

            alert('✅ Bill saved successfully!');
            setTimeout(() => window.location.href = "/orders?status=billout", 1000);
        } else {
            alert('⚠️ Failed to save bill: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(err => {
        console.error("Bill Out Error:", err);
        alert('❌ Error saving bill.');
    });
}


function toggleDiscountForm(orderId) {
    const hidden = document.getElementById('discountIds_' + orderId);
    const selectedIds = hidden && hidden.value
        ? hidden.value.split(',').map(s => s.trim()).filter(Boolean)
        : [];

    if (!selectedIds.length) {
        alert('Please select at least one discount first.');
        return;
    }

    const container = document.getElementById('selectedDiscountsContainer_' + orderId);
    container.innerHTML = '';

    selectedIds.forEach(id => {
        const chk = document.getElementById(`discountCheck_${orderId}_${id}`);
        if (!chk) return;
        const discountName = chk.dataset.name || 'Discount';
        const valuePct = chk.dataset.value || '0';

        // Initialize store if not exist
        if (!savedDiscountPersons[orderId]) savedDiscountPersons[orderId] = {};
        if (!savedDiscountPersons[orderId][id]) savedDiscountPersons[orderId][id] = [
            { name: '', id_number: '' }
        ];

        const persons = savedDiscountPersons[orderId][id];

        // Build discount block
        const block = document.createElement('div');
        block.className = 'mb-4 p-2 border rounded';
        block.innerHTML = `
            <h6 class="fw-bold">${discountName} (${valuePct}%)</h6>
            <div class="form-group mb-2 d-flex align-items-center">
                <label class="me-2"># of Entries</label>
                <input type="number"
                       id="discountCount_${orderId}_${id}"
                       class="form-control"
                       style="width:100px" min="1"
                       value="${persons.length}"
                       oninput="renderDiscountPersons(${orderId}, ${id})">
            </div>
            <div id="discountPersons_${orderId}_${id}"></div>
        `;
        container.appendChild(block);

        renderDiscountPersons(orderId, id); // render saved data
    });

    // Toggle visibility
    const form = document.getElementById('discountForm_' + orderId);
    form.style.display = form.style.display === 'block' ? 'none' : 'block';
}

/**
 * Render person rows and keep values synced to memory
 */
function renderDiscountPersons(orderId, discountId) {
    const countInput = document.getElementById(`discountCount_${orderId}_${discountId}`);
    const count = Math.max(parseInt(countInput.value) || 0, 1);

    if (!savedDiscountPersons[orderId]) savedDiscountPersons[orderId] = {};
    if (!savedDiscountPersons[orderId][discountId]) savedDiscountPersons[orderId][discountId] = [];

    const persons = savedDiscountPersons[orderId][discountId];

    // Adjust the array size
    while (persons.length < count) persons.push({ name: '', id_number: '' });
    while (persons.length > count) persons.pop();

    const container = document.getElementById(`discountPersons_${orderId}_${discountId}`);
    container.innerHTML = '';

    persons.forEach((p, index) => {
        const row = document.createElement('div');
        row.className = 'row mb-2';
        row.innerHTML = `
            <div class="col-md-6">
                <input type="text"
                       class="form-control"
                       placeholder="Enter name here"
                       value="${p.name || ''}"
                       oninput="updatePersonData(${orderId}, ${discountId}, ${index}, 'name', this.value)">
            </div>
            <div class="col-md-6">
                <input type="text"
                       class="form-control"
                       placeholder="Enter ID number here"
                       value="${p.id_number || ''}"
                       oninput="updatePersonData(${orderId}, ${discountId}, ${index}, 'id_number', this.value)">
            </div>
        `;
        container.appendChild(row);
    });
}

/**
 * Update person data live when typing
 */
function updatePersonData(orderId, discountId, index, field, value) {
    if (!savedDiscountPersons[orderId]) return;
    if (!savedDiscountPersons[orderId][discountId]) return;
    savedDiscountPersons[orderId][discountId][index][field] = value;
}

   </script>

   <script>
      function toggleDiscountDropdown(orderId) {
      const dropdown = document.getElementById('discountDropdown_' + orderId);
      dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
   }

   function updateSelectedDiscounts(orderId) {
    const dropdown = document.getElementById('discountDropdown_' + orderId);
    const input = document.getElementById('selectedDiscountName_' + orderId);
    const hidden = document.getElementById('discountIds_' + orderId);

    const checked = dropdown.querySelectorAll('input[type="checkbox"]:checked');
    const names = Array.from(checked).map(chk => chk.dataset.name);
    const ids = Array.from(checked).map(chk => chk.value);

    input.value = names.join(', ');
    hidden.value = ids.join(',');
}
</script>

               </div>
               <!----> 
               <div class="vgt-wrap__footer vgt-clearfix">
                  <div class="footer__row-count vgt-pull-left">
                     <form>
                        <label for="vgt-select-rpp-1724262253017" class="footer__row-count__label">Rows per page:</label> 
                        <select id="vgt-select-rpp-1724262253017" autocomplete="off" name="perPageSelect" aria-controls="vgt-table" class="footer__row-count__select">
                           <option value="10">
                              10
                           </option>
                           <option value="20">
                              20
                           </option>
                           <option value="30">
                              30x1
                           </option>
                           <option value="40">
                              40
                           </option>
                           <option value="50">
                              50
                           </option>
                           <!---->
                        </select>
                     </form>
                  </div>
                  <div class="footer__navigation vgt-pull-right">
                     <div data-v-347cbcfa="" class="footer__navigation__page-info">
                        <div data-v-347cbcfa="">
                           0 - 0 of 0
                        </div>
                     </div>
                     <!----> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span aria-hidden="true" class="chevron left"></span> <span>prev</span></button> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span>next</span> <span aria-hidden="true" class="chevron right"></span></button> <!---->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!----><!---->
   </div>
</div>
</div>
@endsection

@section('scripts')
    <script>
        window.currentPage = "{{ request()->is('components*') ? 'components' : 'products' }}";

        document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll(".toggle-details");

    toggles.forEach(toggle => {
        toggle.addEventListener("change", function () {
            const orderId = this.dataset.id;

            // Hide all detail rows
            document.querySelectorAll(".order-details").forEach(row => {
                row.style.display = "none";
            });

            // Uncheck all checkboxes
            toggles.forEach(t => {
                if (t !== this) t.checked = false;
            });

            // Show selected details if checked
            const detailsRow = document.getElementById("details-" + orderId);
            if (this.checked && detailsRow) {
                detailsRow.style.display = "table-row";
            }
        });
    });
});
    </script>

    <script src="{{ asset('js/tableFunctions.js') }}"></script>
@endsection