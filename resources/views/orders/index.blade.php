@extends('layouts.app')
@section('content')
<div class="main-content" id="orderTypeApp">
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
   <!-- 🧾 ORDER TYPE MODAL -->
<div class="modal fade" id="orderTypeModal" tabindex="-1" aria-labelledby="orderTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="orderTypeApp">

      <!-- Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="orderTypeModalLabel">Select Order Type</h5>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="orderType">Order Type</label>
          <select class="form-control" v-model="orderType" id="orderType">
            <option value="Dine-In">Dine-In</option>
            <option value="Take-Out">Take-Out</option>
            <option value="Delivery">Delivery</option>
          </select>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" @click="submitOrderType">Continue</button>
      </div>

    </div>
  </div>
</div>

   <!----> 
   <div class="wrapper">
      <div class="card mt-4">
         
         <nav class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
               <li class="nav-item">
                  <a href="{{ route('orders.index', ['status' => 'serving']) }}" 
                     class="nav-link {{ $status === 'serving' ? 'active' : '' }}">
                     Serving
                  </a>
               </li>
               
               {{-- <li class="nav-item">
                  <a href="{{ route('orders.index', ['status' => 'served']) }}" 
                     class="nav-link {{ $status === 'served' ? 'active' : '' }}">
                     Served
                  </a>
               </li> --}}

               <li class="nav-item">
                  <a href="{{ route('orders.index', ['status' => 'billout']) }}" 
                     class="nav-link {{ $status === 'billout' ? 'active' : '' }}">
               Bill Out
                  </a>

               @foreach($orders as $order)
               <!-- Payment Modal (moved here so it's outside nav links) -->
               <div class="modal fade" id="paymentModal{{ $order->id }}" tabindex="-1" aria-labelledby="paymentLabel{{ $order->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Payment - Order #{{ $order->id }}</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                           <div class="container-fluid">
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

                              <hr>
                              <h6 class="fw-bold text-center">GROSS CHARGE</h6>
                              <div class="row mb-3">
                                 <div class="col-md-4 offset-md-4">
                                    <input type="text" class="form-control text-center fw-bold" 
                                           value="₱{{ number_format($order->details->sum(fn($d) => ($d->price * $d->quantity) - ($d->discount ?? 0)), 2) }}" readonly>
                                 </div>
                              </div>

                              {{-- Charges and discounts: prefill from order if billout else blank --}}
                              <div class="row mb-3">
                                 <div class="col-md-3">
                                    <label class="form-label">SR/PWD Bill</label>
                                    <input type="text" id="pay_srPwdBill_{{ $order->id }}" class="form-control" value="{{ $order->sr_pwd_discount ?? '' }}" readonly>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="form-label">Net Bill</label>
                                    <input type="text" id="pay_netBill_{{ $order->id }}" class="form-control" value="{{ $order->net_amount ?? '' }}" readonly>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="form-label">Reg Bill</label>
                                    <input type="text" id="pay_regBill_{{ $order->id }}" class="form-control" value="{{ $order->vatable ?? '' }}" readonly>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="form-label">Other Discount</label>
                                    <input type="text" id="pay_otherDiscount_{{ $order->id }}" class="form-control" value="{{ $order->other_discounts ?? '' }}" readonly>
                                 </div>
                              </div>

                              <div class="row mb-3">
                                 <div class="col-md-3">
                                    <label class="form-label">Vatable</label>
                                    <input type="text" id="pay_vatable_{{ $order->id }}" class="form-control" value="{{ $order->vatable ?? '' }}" readonly>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="form-label">VAT 12%</label>
                                    <input type="text" id="pay_vat12_{{ $order->id }}" class="form-control" value="{{ $order->vat_12 ?? '' }}" readonly>
                                 </div>
                                 <div class="col-md-6">
                                    <label class="form-label fw-bold">TOTAL CHARGE</label>
                                    <input type="text" id="pay_totalCharge_{{ $order->id }}" class="form-control fw-bold text-success" value="{{ $order->total_charge ?? '' }}" readonly>
                                 </div>
                              </div>

                              <hr>
                              <div class="row mb-2">
                                 <div class="col-md-12 d-flex justify-content-between align-items-center">
                                    <div>
                                       <strong>Mode of Payment</strong>
                                    </div>
                                    <div>
                                       <button type="button" class="btn btn-sm btn-warning" onclick="addPaymentRow({{ $order->id }})">Add</button>
                                    </div>
                                 </div>
                              </div>

                              <!-- Payments table -->
                              <div class="row mb-3">
                                 <div class="col-md-12">
                                    <div class="table-responsive">
                                       <table class="table table-sm table-bordered">
                                          <thead>
                                             <tr>
                                                <th>Payment Method</th>
                                                {{-- <th>Transaction Reference #</th> --}}
                                                <th>Payment Destination</th>
                                                <th>Transaction Reference #</th>
                                                <th class="text-end">Amount Paid</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody id="payments_table_body_{{ $order->id }}">
                                             <!-- rows will be appended here -->
                                          </tbody>
                                          <tfoot>
                                             <tr>
                                                <td colspan="3" class="text-end"><strong>Total Payment Rendered</strong></td>
                                                <td class="text-end"><strong id="payments_total_{{ $order->id }}">0.00</strong></td>
                                                <td></td>
                                             </tr>
                                             <tr>
                                                <td colspan="3" class="text-end"><strong>Change</strong></td>
                                                <td class="text-end"><strong id="payments_change_{{ $order->id }}">0.00</strong></td>
                                                <td></td>
                                             </tr>
                                          </tfoot>
                                       </table>
                                    </div>
                                    <input type="hidden" id="payments_counter_{{ $order->id }}" value="0">
                                 </div>
                              </div>

                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="button" class="btn btn-primary" data-bs-target="#paymentModal{{ $order->id }}" data-bs-toggle="modal" onclick="submitPayment({{ $order->id }})">Submit Payment</button>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
               
                  </a>
               </li>

               <li class="nav-item">
                  <a href="{{ route('orders.index', ['status' => 'payments']) }}"
                     class="nav-link {{ $status === 'payments' ? 'active' : '' }}">
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
                           </button>
                           <!-- ADD ORDER BUTTON -->
                           <button
                              type="button"
                              class="btn mx-1 btn-btn btn-primary btn-icon"
                              data-bs-toggle="modal"
                              data-bs-target="#orderTypeModal">
                                 <i class="i-Add"></i> Add
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
                                 <span>Order Type</span>
                                 <button><span class="sr-only">Sort table by Order Type in descending order</span></button>
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
      <td class="text-left">{{ $order->order_type }}</td>
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
         'editRoute' => route('orders.edit', $order->id),
         'viewRoute' => '#',
         'cancelRoute' => '#',
         'deleteRoute' => '#',
         'remarksRoute' => '#',
         'status' => '#',

         // Show label/modal depending on current page tab ($status):
         // serving => 'Bill out' (opens billOut modal)
         // billout  => 'Payment' (opens payment modal)
         // payments => 'View Receipt' (opens invoice modal)
      'viewLabel' => ($status === 'serving') ? 'Bill out' : (($status === 'billout') ? 'Payment' : (($status === 'payments') ? 'View Receipt' : 'View')),
         // target appropriate modal depending on page status
         'viewModalId' => ($status === 'serving') ? "billOutModal{$order->id}" : (($status === 'billout') ? "paymentModal{$order->id}" : (($status === 'payments') ? "invoiceModal{$order->id}" : null)),
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
      const formData = new FormData(form);

      // ✅ Include computed discount and billing fields
      const fields = [
         'srPwdBill', 'discount20', 'otherDiscount',
         'netBill', 'vatable', 'vat12', 'totalCharge'
      ];
      fields.forEach(f => {
         const el = document.getElementById(f + '_' + orderId);
         if (el) formData.append(f, el.value);
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
      // ✅ Attach JSON string of all persons to form data
   formData.append('persons', JSON.stringify(personsData));

      // ✅ Submit request
      fetch(form.action, {
         method: 'POST',
         headers: {
               'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
         },
         body: formData
      })
      .then(res => res.json())
      .then(data => {
         if (data.success) {
               alert('✅ Bill saved successfully!');
               document.getElementById('totalCharge_' + orderId).value = data.order.total_charge;

               // Optional: reload or move order to Bill-Out section
               setTimeout(() => location.reload(), 1000);
         } else {
               alert('⚠️ Failed to save bill: ' + (data.message || 'Unknown error'));
         }
      })
      .catch(err => {
         console.error(err);
         alert('❌ Error saving bill.');
      });
}

// function confirmBillOut(orderId) {
//     const form = document.getElementById('billOutForm_' + orderId);
//     if (!form) {
//         alert("⚠️ Bill Out form not found.");
//         return;
//     }

//     const formData = new FormData(form);

//     // ✅ Include computed fields
//     const fields = [
//         'srPwdBill', 'discount20', 'otherDiscount',
//         'netBill', 'vatable', 'vat12', 'totalCharge'
//     ];
//     fields.forEach(f => {
//         const el = document.getElementById(f + '_' + orderId);
//         if (el && el.value !== '') {
//             formData.set(f, el.value);
//         }
//     });

//     // ✅ Collect discount persons from saved memory
//     const personsData = [];
//     if (savedDiscountPersons[orderId]) {
//         Object.entries(savedDiscountPersons[orderId]).forEach(([discountId, persons]) => {
//             persons.forEach(p => {
//                 personsData.push({
//                     discount_id: discountId,
//                     name: p.name || '',
//                     id_number: p.id_number || ''
//                 });
//             });
//         });
//     }

//     formData.append('persons', JSON.stringify(personsData));

//     // ✅ Confirm action
//     if (!confirm('Are you sure you want to confirm this Bill Out?')) return;

//     fetch(form.action, {
//         method: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//         },
//       body: formData,
//       credentials: 'same-origin'
//     })
//     .then(res => res.json())
//     .then(data => {
//         console.log("Bill Out Response:", data);

//         if (data.success) {
//             const totalChargeInput = document.getElementById('totalCharge_' + orderId);
//             if (totalChargeInput) {
//                 totalChargeInput.value = parseFloat(data.order.total_charge).toFixed(2);
//             }

//             const amountCell = document.getElementById('amount_' + orderId);
//             if (amountCell) {
//                 amountCell.textContent = `₱${Number(data.order.total_charge).toLocaleString('en-PH', {
//                     minimumFractionDigits: 2
//                 })}`;
//             }

//             alert('✅ Bill saved successfully!');
//             setTimeout(() => window.location.href = "/orders?status=billout", 1000);
//         } else {
//             alert('⚠️ Failed to save bill: ' + (data.message || 'Unknown error'));
//         }
//     })
//     .catch(err => {
//         console.error("Bill Out Error:", err);
//         alert('❌ Error saving bill.');
//     });
// }

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

   // helper to add a payment row in the modal table
   function addPaymentRow(orderId) {
      const counterEl = document.getElementById('payments_counter_' + orderId);
      let counter = counterEl ? parseInt(counterEl.value || 0) : 0;
      counter++;
      if (counterEl) counterEl.value = counter;

      const tbody = document.getElementById('payments_table_body_' + orderId);
      if (!tbody) return;

      // build select options for payment methods and cash equivalents
      const paymentMethods = {!! json_encode($paymentMethods->map(fn($m) => [
         'id' => $m->id,
         'name' => $m->name
      ])) !!};

      // include account_number in mapping for display
      const cashEquivalents = {!! json_encode($cashEquivalents->map(fn($c) => [
         'id' => $c->id,
         'name' => $c->name,
         'account_number' => $c->account_number
      ])) !!};

      const tr = document.createElement('tr');
      tr.dataset.rowId = counter;
      tr.innerHTML = `
         <td>
               <select id="pm_${orderId}_${counter}" class="form-select form-select-sm">
                  <option value=""></option>
                  ${paymentMethods.map(m => `<option value="${m.id}">${m.name}</option>`).join('')}
               </select>
         </td>
         <td>
               <select id="pdest_${orderId}_${counter}" class="form-select form-select-sm" onchange="toggleReferenceInput(${orderId}, ${counter})">
                  <option value=""></option>
                  ${cashEquivalents.map(c => 
                     `<option value="${c.id}">${c.name} | ${c.account_number ?? ''}</option>`
                  ).join('')}
               </select>
         </td>
         
         <td id="pref_td_${orderId}_${counter}" style="display:none;">
               <input type="text" id="pref_${orderId}_${counter}" class="form-control form-control-sm" placeholder="Ref. No." />
         </td>
         <td class="text-end">
               <input type="number" step="0.01" id="pamt_${orderId}_${counter}" class="form-control form-control-sm text-end" value="0.00" oninput="recalcPayments(${orderId})" />
         </td>
         <td>
               <button type="button" class="btn btn-sm btn-danger" onclick="removePaymentRow(${orderId}, ${counter})">Remove</button>
         </td>
      `;

      tbody.appendChild(tr);
      recalcPayments(orderId);
   }

      // ✅ new function: show/hide the reference input based on selection
      function toggleReferenceInput(orderId, rowId) {
         const select = document.getElementById(`pdest_${orderId}_${rowId}`);
         const refTd = document.getElementById(`pref_td_${orderId}_${rowId}`);
         if (select && refTd) {
            if (select.value) {
                  refTd.style.display = ''; // show
            } else {
                  refTd.style.display = 'none'; // hide
                  const input = document.getElementById(`pref_${orderId}_${rowId}`);
                  if (input) input.value = ''; // clear when hidden
            }
         }
      }

      function removePaymentRow(orderId, rowId) {
         const tbody = document.getElementById('payments_table_body_' + orderId);
         if (!tbody) return;
         const tr = tbody.querySelector(`tr[data-row-id="${rowId}"]`);
         if (tr) tr.remove();
         recalcPayments(orderId);
      }

      function recalcPayments(orderId) {
         const tbody = document.getElementById('payments_table_body_' + orderId);
         let total = 0;
         if (tbody) {
            tbody.querySelectorAll('input[id^="pamt_"]').forEach(inp => {
               const val = parseFloat(inp.value || 0) || 0;
               total += val;
            });
         }

         // display totals; total charge
         const totalEl = document.getElementById('payments_total_' + orderId);
         const changeEl = document.getElementById('payments_change_' + orderId);
         const totalChargeStr = document.getElementById('pay_totalCharge_' + orderId)?.value || document.getElementById('totalCharge_' + orderId)?.value || 0;
         const totalCharge = parseFloat(String(totalChargeStr).replace(/,/g, '')) || 0;
         if (totalEl) totalEl.textContent = Number(total).toFixed(2);
         if (changeEl) changeEl.textContent = Number(Math.max(0, total - totalCharge)).toFixed(2);
      }
   </script>
<!-- Invoice / Receipt Modal Template -->
@foreach($orders as $order)
<div class="modal fade" id="invoiceModal{{ $order->id }}" tabindex="-1" aria-labelledby="invoiceLabel{{ $order->id }}" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">POS Receipt</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
         </div>
         <div class="modal-body">
            <div id="pos-invoice-{{ $order->id }}">
               <div style="max-width: 400px; margin: 0px auto; font-family: Arial, Helvetica, sans-serif;">
                  <div class="info text-center">
                     <div class="invoice_logo mb-2"><img src="/images/logo-default.png" alt="" width="60" height="60"></div>
                     <div class="d-flex flex-column small">
                        <span class="t-font-boldest">{{ $branch->name ?? 'Branch Name' }}</span>
                        <span>{{ $branch->address ?? '' }}</span>
                        <span>Permit #: {{ $branch->permit_number ?? '' }}</span>
                        <span>DTI Issued: {{ $branch->dti_issued ?? '' }}</span>
                        <span>POS SN: {{ $branch->pos_sn ?? '' }}</span>
                        <span>MIN#: {{ $branch->min_number ?? '' }}</span>
                     </div>

                     <h6 class="t-font-boldest mt-3">SALES INVOICE</h6>
                     <div class="mb-2">INV: {{ sprintf('%08d', $order->id) }}</div>
                     <div class="mb-1">Date: {{ $order->created_at->format('Y-m-d H:i') }}</div>
                     <div class="mb-1">TBL: {{ $order->table_no }}</div>
                     <div class="mb-1"># of Pax: {{ $order->number_pax }}</div>
                  </div>

                  <table class="table table-invoice-items mt-2" style="width:100%; font-size:13px;">
                     <thead>
                        <tr>
                           <th style="text-align:left; width:10%">QTY</th>
                           <th style="text-align:left; width:60%">DESCRIPTION</th>
                           <th style="text-align:right; width:30%">AMOUNT</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($order->details as $d)
                        <tr>
                           <td>{{ $d->quantity }}x</td>
                           <td>
                              <div class="d-flex flex-column">
                                 <span>{{ $d->item_name }}</span>
                                 <span style="font-size:11px; color:#666">@₱{{ number_format($d->price,2) }}</span>
                              </div>
                           </td>
                           <td style="text-align:right;">₱{{ number_format($d->price * $d->quantity,2) }}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>

                  <table class="table table-invoice-data" style="width:100%; font-size:13px;">
                     <tbody>
                        <tr>
                           <td>Gross Charge</td>
                           <td class="text-right">₱{{ number_format($order->details->sum(fn($d) => ($d->price * $d->quantity) - ($d->discount ?? 0)), 2) }}</td>
                        </tr>
                        <tr>
                           <td>Less Discount</td>
                           <td class="text-right">₱{{ number_format($order->sr_pwd_discount ?? 0,2) }}</td>
                        </tr>
                        <tr>
                           <td>Vatable</td>
                           <td class="text-right">₱{{ number_format($order->vatable ?? 0,2) }}</td>
                        </tr>
                        <tr>
                           <td>Vat 12%</td>
                           <td class="text-right">₱{{ number_format($order->vat_12 ?? 0,2) }}</td>
                        </tr>
                        <tr>
                           <td>Reg Bill</td>
                           <td class="text-right">₱{{ number_format($order->vatable ?? 0,2) }}</td>
                        </tr>
                        <tr>
                           <td>SR/PWD Bill</td>
                           <td class="text-right">₱{{ number_format($order->sr_pwd_discount ?? 0,2) }}</td>
                        </tr>
                        <tr>
                           <td><strong>Total</strong></td>
                           <td class="text-right"><strong>₱{{ number_format($order->total_charge ?? $order->net_amount ?? 0,2) }}</strong></td>
                        </tr>
                     </tbody>
                  </table>

                     <div class="d-flex justify-content-between fw-bold mt-2"><span>Total Charge</span> <span>₱{{ number_format($order->total_charge ?? $order->net_amount ?? 0,2) }}</span></div>
                     <div class="d-flex justify-content-between fw-bold">
                     <span>Total Rendered</span>
                     <span>{{ number_format($order->paymentDetails->last()?->total_rendered ?? 0, 2) }}</span>
                  </div>
                  <div class="d-flex justify-content-between fw-bold">
                     <span>Change</span>
                     <span>{{ number_format($order->paymentDetails->last()?->change_amount ?? 0, 2) }}</span>
                  </div>
                              </div>
                  <p class="d-flex justify-content-between fw-bold mt-2"><span>POS Provided by:</span> <span>OMNI Systems Solutions</span></p>
                  <div class="d-flex flex-column small">
                        <span class="t-font-boldest">TIN: {{ $branch->tin ?? '' }}</span>
                        <span>OMNI Address: A. C. Cortes Ave, Mandaue, 6014 Cebu</span>
                     </div>
               </div>
            </div>
         </div>
         <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-outline-primary btn-sm me-2" onclick="window.print()">Print</button>
            <button class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
@endforeach


<script>
window.openInvoiceModalFromResponse = function(orderData) {
         console.log('🧾 openInvoiceModalFromResponse called', orderData);

         try {
            if (!orderData || !orderData.id) {
                  console.error('❌ Invalid order data passed to invoice modal');
                  return;
            }

            const orderId = orderData.id;
            const modalId = 'invoiceModal' + orderId;
            let modalEl = document.getElementById(modalId);

            // Build modal dynamically if it doesn't exist yet
            if (!modalEl) {
                  const branch = window.appBranch || {};

                  modalEl = document.createElement('div');
                  modalEl.className = 'modal fade';
                  modalEl.id = modalId;
                  modalEl.tabIndex = -1;
                  modalEl.setAttribute('aria-hidden', 'true');

                  modalEl.innerHTML = `
                     <div class="modal-dialog modal-sm modal-dialog-scrollable">
                        <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">POS Receipt</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                 <div style="max-width:400px;margin:0 auto;font-family:Arial,Helvetica,sans-serif; font-size:13px;">
                                    <div class="text-center mb-2">
                                          <img src="/images/logo-default.png" width="60" height="60" alt="logo" />
                                          <div><strong>${branch.name || 'Branch Name'}</strong></div>
                                       2 <div>${branch.address || ''}</div>
                                          <div>Permit #: ${branch.permit_number || ''}</div>
                                          <div>DTI: ${branch.dti_issued || ''} | POS SN: ${branch.pos_sn || ''}</div>
                                    </div>
                                    <div class="mb-2 text-center"><strong>SALES INVOICE</strong></div>
                                    <div>Date: ${orderData.created_at || ''}</div>
                                    <div>INV: ${String(orderId).padStart(8, '0')}</div>
                                    <div>TBL: ${orderData.table_no || ''} | Pax: ${orderData.number_pax || ''}</div>
                                    <hr/>
                                    <div>
                                          ${(orderData.details || []).map(d => `
                                             <div style="display:flex;justify-content:space-between;margin-bottom:4px;">
                                                <div style="width:55%">${(d.product?.name || d.component?.name || d.item_name || 'Item')}</div>
                                                <div style="width:10%">${d.quantity}x</div>
                                                <div style="width:35%;text-align:right">₱${((d.price || 0) * (d.quantity || 1)).toFixed(2)}</div>
                                             </div>
                                          `).join('')}
                                    </div>
                                    <hr/>
                                    <div style="display:flex;justify-content:space-between"><div>Gross</div><div>₱${Number(orderData.gross_amount || (orderData.details||[]).reduce((s,i)=>s+(i.price||0)*(i.quantity||0),0)).toFixed(2)}</div></div>
                                    <div style="display:flex;justify-content:space-between"><div>Discount</div><div>₱${Number(orderData.discount_total || orderData.sr_pwd_discount || 0).toFixed(2)}</div></div>
                                    <div style="display:flex;justify-content:space-between;font-weight:bold"><div>Total</div><div>₱${Number(orderData.total_charge || orderData.net_amount || 0).toFixed(2)}</div></div>
                                    <hr/>
                                    <div><strong>Payments</strong></div>
                                    ${(orderData.payment_details || orderData.paymentDetails || []).map(pd => `
                                          <div style="display:flex;justify-content:space-between">
                                             <div>${pd.payment?.name || pd.payment_name || 'Method'}</div>
                                             <div>₱${Number(pd.amount_paid || 0).toFixed(2)}</div>
                                          </div>
                                    `).join('')}
                                    <div style="display:flex;justify-content:space-between;margin-top:6px"><div>Total Paid</div><div>₱${Number(orderData.total_payment_rendered || 0).toFixed(2)}</div></div>
                                    <div style="display:flex;justify-content:space-between"><div>Change</div><div>₱${Number(orderData.change_amount || 0).toFixed(2)}</div></div>
                                    <p class="text-center small mt-3"><strong>This is not an official receipt</strong></p>
                                 </div>
                              </div>
                              <div class="modal-footer d-flex justify-content-center">
                                 <button class="btn btn-outline-primary btn-sm me-2" onclick="window.print()">Print</button>
                                 <button class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                              </div>
                        </div>
                     </div>
                  `;

                  document.body.appendChild(modalEl);
                  modalEl.addEventListener('hidden.bs.modal', () => modalEl.remove());
            }

            // Show the modal using Bootstrap
            const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modal.show();

         } catch (e) {
            console.error('💥 openInvoiceModalFromResponse error', e);
         }
};

// =====================================
// Intercept submitPayment() function
// =====================================
window.submitPayment = function(orderId) {
    console.log('💳 Submitting payment for order', orderId);

    const payments = [];
    const tbody = document.getElementById('payments_table_body_' + orderId);
    if (tbody) {
        tbody.querySelectorAll('tr[data-row-id]').forEach(tr => {
            const rid = tr.dataset.rowId;
            const method = document.getElementById(`pm_${orderId}_${rid}`)?.value || '';
            const ref = document.getElementById(`pref_${orderId}_${rid}`)?.value || '';
            const dest = document.getElementById(`pdest_${orderId}_${rid}`)?.value || '';
            const amount = parseFloat(document.getElementById(`pamt_${orderId}_${rid}`)?.value || 0);
            if (method && dest && amount > 0) {
                payments.push({ payment_method_id: method, reference_no: ref, cash_equivalent_id: dest, amount_paid: amount });
            }
        });
    }

    if (payments.length === 0) {
        alert('⚠️ No payments to submit. Please add at least one valid payment row.');
        return;
    }

   const totalRendered = parseFloat(document.getElementById('payments_total_' + orderId)?.textContent?.replace(/[^\d.-]/g, '') || 0);
   const changeAmount = parseFloat(document.getElementById('payments_change_' + orderId)?.textContent?.replace(/[^\d.-]/g, '') || 0);

   // Validate that rendered payment covers total charge
   const totalChargeStr = document.getElementById('pay_totalCharge_' + orderId)?.value || document.getElementById('totalCharge_' + orderId)?.value || 0;
   const totalCharge = parseFloat(String(totalChargeStr).replace(/,/g, '')) || 0;
   if (totalRendered < totalCharge) {
      alert('⚠️ Insufficient payment. Total rendered (' + Number(totalRendered).toFixed(2) + ') is less than total charge (' + Number(totalCharge).toFixed(2) + ').');
      return;
   }

   const payload = new FormData();
    payload.append('payments', JSON.stringify(payments));
    payload.append('total_payment_rendered', totalRendered);
    payload.append('change_amount', changeAmount);

    const token = document.querySelector('meta[name="csrf-token"]').content;
    if (!confirm('Confirm submit payment for order #' + orderId + '?')) return;

    fetch('/orders/' + orderId + '/payment', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': token },
        body: payload,
        credentials: 'same-origin'
    })
    .then(res => res.json())
    .then(data => {
        console.log('✅ Payment response:', data);

        if (data.success) {
            alert('Payment saved. Order marked as PAID.');

            // Update UI
            const row = document.querySelector(`.toggle-details[data-id="${orderId}"]`)?.closest('tr');
            if (row) {
                const statusCell = row.querySelectorAll('td')[5];
                if (statusCell) statusCell.textContent = 'Paid';
            }

            // Close payment modal, then show invoice
            const paymentModal = document.getElementById('paymentModal' + orderId);
            if (paymentModal && typeof bootstrap !== 'undefined') {
                const pm = bootstrap.Modal.getInstance(paymentModal) || new bootstrap.Modal(paymentModal);
                paymentModal.addEventListener('hidden.bs.modal', function onHidden() {
                    paymentModal.removeEventListener('hidden.bs.modal', onHidden);
                    if (data.order) {
                        window.openInvoiceModalFromResponse(data.order);
                    }
                });
                pm.hide(); 
            } else if (data.order) {
                // fallback if no modal found
                window.openInvoiceModalFromResponse(data.order);
            }
        } else {
            alert('❌ Failed to save payment: ' + (data.message || 'Unknown error.'));
        }
    })
    .catch(err => {
        console.error('💥 Payment error', err);
        alert('Error saving payment.');
    });
};
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
   <script>

   function submitPayment(orderId) {
      // gather payments rows if any
      const payments = [];
      const tbody = document.getElementById('payments_table_body_' + orderId);
      if (tbody) {
         tbody.querySelectorAll('tr[data-row-id]').forEach(tr => {
            const rid = tr.dataset.rowId;
            const method = document.getElementById(`pm_${orderId}_${rid}`)?.value || '';
            const ref = document.getElementById(`pref_${orderId}_${rid}`)?.value || '';
            const dest = document.getElementById(`pdest_${orderId}_${rid}`)?.value || '';
            const amount = parseFloat(document.getElementById(`pamt_${orderId}_${rid}`)?.value || 0) || 0;
            if (method && dest && amount > 0) {
               payments.push({
                  payment_method_id: method,
                  reference_no: ref,
                  cash_equivalent_id: dest,
                  amount_paid: amount
               });
            }
         });
      }

      // Fallback: legacy single-field inputs
      if (payments.length === 0) {
         const method = document.getElementById('payment_method_id_' + orderId)?.value || '';
         const dest = document.getElementById('cash_equivalent_id_' + orderId)?.value || '';
         const ref = document.getElementById('reference_no_' + orderId)?.value || '';
         const amt = parseFloat(document.getElementById('amount_paid_' + orderId)?.value || 0) || 0;
         if (method && dest && amt > 0) {
            payments.push({
               payment_method_id: method,
               reference_no: ref,
               cash_equivalent_id: dest,
               amount_paid: amt
            });
         }
      }

      if (payments.length === 0) {
         alert('No payments to submit. Please add at least one payment row and enter valid amounts.');
         return;
      }

      // ✅ Get totals from footer
      const totalRendered = parseFloat(
         document.getElementById('payments_total_' + orderId)?.textContent?.replace(/[^\d.-]/g, '') || 0
      );
      const changeAmount = parseFloat(
         document.getElementById('payments_change_' + orderId)?.textContent?.replace(/[^\d.-]/g, '') || 0
      );

      // Validate payment sufficiency against computed total charge
      const totalChargeStr = document.getElementById('pay_totalCharge_' + orderId)?.value || document.getElementById('totalCharge_' + orderId)?.value || 0;
      const totalCharge = parseFloat(String(totalChargeStr).replace(/,/g, '')) || 0;
      if (totalRendered < totalCharge) {
         alert('⚠️ Insufficient payment. Total rendered (' + Number(totalRendered).toFixed(2) + ') is less than total charge (' + Number(totalCharge).toFixed(2) + ').');
         return;
      }

      const payload = new FormData();
      payload.append('payments', JSON.stringify(payments));
      payload.append('total_payment_rendered', totalRendered);
      payload.append('change_amount', changeAmount);

      // include single fields for backward compat if they exist
      const singleMethod = document.getElementById('payment_method_id_' + orderId);
      if (singleMethod) payload.append('payment_method_id', singleMethod.value);
      const singleDest = document.getElementById('cash_equivalent_id_' + orderId);
      if (singleDest) payload.append('cash_equivalent_id', singleDest.value);
      const singleRef = document.getElementById('reference_no_' + orderId);
      if (singleRef) payload.append('reference_no', singleRef.value);
      const singleAmt = document.getElementById('amount_paid_' + orderId);
      if (singleAmt) payload.append('amount_paid', singleAmt.value || 0);

      // csrf
      const token = document.querySelector('meta[name="csrf-token"]').content;

      if (!confirm('Confirm submit payment for order #' + orderId + '?')) return;

      fetch("/orders/" + orderId + "/payment", {
         method: 'POST',
         headers: { 'X-CSRF-TOKEN': token },
         body: payload,
         credentials: 'same-origin'
      })
         .then(res => res.json())
         .then(data => {
            if (data.success) {
               console.log('Payment response', data);
               alert('Payment saved. Order marked as PAID');

               // update status display in the row
               const checkbox = document.querySelector('.toggle-details[data-id="' + orderId + '"]');
               if (checkbox) {
                  const row = checkbox.closest('tr');
                  if (row) {
                     const statusCell = row.querySelectorAll('td')[5];
                     if (statusCell) statusCell.textContent = 'Paid';

                     const amountCell = document.getElementById('amount_' + orderId);
                     if (amountCell)
                        amountCell.textContent = '₱' +
                           Number(data.order.total_charge || data.order.net_amount || 0)
                              .toLocaleString('en-PH', { minimumFractionDigits: 2 });
                  }
               }

               // close modal
               const modalEl = document.getElementById('paymentModal' + orderId);
               if (modalEl) {
                  const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                     // show invoice modal (if server returned order data)
                     if (data.order) {
                        console.log('Attempting to open invoice modal for order', data.order.id);
                        try { openInvoiceModalFromResponse(data.order); } catch(e) { console.error(e); }
                     } else {
                        console.warn('No order returned in payment response');
                     }
                     modal.hide();
               }
            } else {
               alert('Failed to save payment: ' + (data.message || 'Unknown'));
            }
         })
         // .catch(err => {
         //    console.error('Payment error', err);
         //    alert('Error saving payment');
         // });
   }

new Vue({
  el: '#orderTypeApp',
  data: {
    orderType: 'Dine-In', // default value
  },
  methods: {
    submitOrderType() {
      // Close modal manually
      const modal = bootstrap.Modal.getInstance(document.getElementById('orderTypeModal'));
      modal.hide();

      // Redirect with order type as query parameter
      const url = `{{ url('order/create') }}?type=${encodeURIComponent(this.orderType)}`;
      window.location.href = url;
    }
  }
});


   </script>
@endsection