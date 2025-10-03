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
               <li class="nav-item"><a href="#" target="_self" class="nav-link active">
                  Serving
                  </a>
               </li>
               <li class="nav-item"><a href="#" target="_self" class="nav-link">
                  Bill-Out
                  </a>
               </li>
               <li class="nav-item"><a href="#" target="_self" class="nav-link">
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
                                          <div class="px-4" style="max-height: 400px;">
                                             <ul class="list-unstyled">
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__248"><label class="custom-control-label" for="__BVID__248">Type</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__249"><label class="custom-control-label" for="__BVID__249">Sub-Type</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__250"><label class="custom-control-label" for="__BVID__250">Image</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__251"><label class="custom-control-label" for="__BVID__251">Date and Time Created</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__252"><label class="custom-control-label" for="__BVID__252">Created By</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__253"><label class="custom-control-label" for="__BVID__253">Product Name</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__254"><label class="custom-control-label" for="__BVID__254">SKU(Product Code)</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__255"><label class="custom-control-label" for="__BVID__255">Description</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__256"><label class="custom-control-label" for="__BVID__256">Abbreviation</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__257"><label class="custom-control-label" for="__BVID__257">Category</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__258"><label class="custom-control-label" for="__BVID__258">Brand</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__259"><label class="custom-control-label" for="__BVID__259">Average Cost per Unit</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__260"><label class="custom-control-label" for="__BVID__260">SRP</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__261"><label class="custom-control-label" for="__BVID__261">Unit</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__262"><label class="custom-control-label" for="__BVID__262">Quantity</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__263"><label class="custom-control-label" for="__BVID__263">Stock Alert</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__264"><label class="custom-control-label" for="__BVID__264">Action</label></div>
                                                </li>
                                                <li><button type="button" class="btn mt-2 mb-3 btn-primary btn-sm">Save</button></li>
                                             </ul>
                                          </div>
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
      <td class="text-left">
         @php 
            $grandTotal = 0; 
            $totalItems = 0;
         @endphp

         @foreach($order->details as $detail)
            @php 
               $lineTotal = $detail->quantity * $detail->price; 
               $grandTotal += $lineTotal; 
               $totalItems += $detail->quantity;
            @endphp
         @endforeach
         ₱{{ number_format($grandTotal, 2) }}
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

            {{-- Entries Section --}}
            <hr>
            <div class="card">
               <div class="card-body">
               <h6 class="fw-bold text-center">ENTRIES</h6>

               <form action="{{ route('orders.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="order_id" value="{{ $order->id }}">

   <div class="col-md-5 position-relative">
      <label class="form-label">Discount</label>

      <!-- Input that shows selected discounts -->
      <input type="text" id="selectedDiscountName_{{ $order->id }}" 
            class="form-control"  placeholder="Select discounts..."
            onclick="toggleDiscountDropdown({{ $order->id }})">

      <!-- Dropdown list -->
      <div id="discountDropdown_{{ $order->id }}" 
            class="border rounded p-2 position-absolute bg-white w-100"
            style="display:none; max-height:200px; overflow-y:auto; z-index:100;">
         @foreach($discounts as $discount)
         <div class="form-check">
               <input class="form-check-input" type="checkbox" 
                     value="{{ $discount->id }}" 
                     data-name="{{ $discount->name }}"
                     onchange="updateSelectedDiscounts({{ $order->id }})" 
                     id="discountCheck_{{ $order->id }}_{{ $discount->id }}">
               <label class="form-check-label" for="discountCheck_{{ $order->id }}_{{ $discount->id }}">
                  {{ $discount->name }}
               </label>
         </div>
         @endforeach
      </div>

      <!-- Hidden input to store selected IDs for backend -->
      <input type="hidden" name="discount_ids_{{ $order->id }}" id="discountIds_{{ $order->id }}">

      <!-- Manage Button -->
      <button type="button" class="btn btn-outline-primary btn-sm mt-2 manage-btn"
               onclick="toggleDiscountForm({{ $order->id }})">
         Manage
      </button>
</div>

      <!-- Inline Manage Discount Form (hidden by default) -->
      <div id="discountForm_{{ $order->id }}" class="border rounded p-3 mt-3" style="display:none;">
   <h6 class="text-center mb-3">Apply Discount</h6>

   <!-- Container for selected discounts -->
   <div id="selectedDiscountsContainer_{{ $order->id }}"></div>

   <div class="d-flex justify-content-center mt-3">
      <button type="button" class="btn btn-danger btn-sm px-3" onclick="toggleDiscountForm({{ $order->id }})">
            Close
      </button>
   </div>
</div>

                  <div class="row mb-2">
                     <div class="col-md-4">
                     <label class="form-label">Other Charges</label>
                     <input type="number" class="form-control" name="other_charges" placeholder="Enter amount">
                     </div>
                     <div class="col-md-4">
                     <label class="form-label">Charges Description</label>
                     <input type="text" class="form-control" name="charges_description" placeholder="Description">
                     </div>
                  </div>

                  <div class="row mb-3">
   <div class="col-md-12 text-center">
      <button type="button" class="btn btn-success"
              onclick="calculateChargesAndDiscounts({{ $order->id }}, {{ $grandTotal }}, {{ $order->number_pax }})">
         Calculate Charges and Discounts
      </button>
   </div>
</div>

                  <!-- Charges and Discounts Section -->
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
                     <button type="submit" class="btn btn-primary">Confirm Bill Out</button>
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

   // Function to calculate charges and discounts
   function calculateChargesAndDiscounts(orderId, grossAmount, pax) {
      const vatRate = 0.12;
      let srPwdBill = 0, regBill = 0, discount20 = 0, vatable = 0, vat12 = 0, netBill = 0, totalCharge = 0;

      // Check if PWD or Senior is selected
      const selectedDiscounts = document.getElementById("discountIds_" + orderId).value.split(",");
      const hasSrPwd = selectedDiscounts.some(id => {
         const chk = document.getElementById(`discountCheck_${orderId}_${id}`);
         return chk && (chk.dataset.name.toLowerCase().includes("pwd") || chk.dataset.name.toLowerCase().includes("senior"));
      });

      if (hasSrPwd) {
         // If SR/PWD Discount applies
         srPwdBill = (grossAmount / pax); // per pax bill
         regBill = grossAmount - srPwdBill;

         discount20 = (regBill / 1.12) * 0.2;
         netBill = (regBill / 1.12) - discount20;

         vatable = regBill / 1.12;
         vat12 = regBill - vatable;
         totalCharge = netBill;
      } else {
         // No SR/PWD
         regBill = grossAmount;
         discount20 = grossAmount * 0.2; // Example if other discounts apply
         vatable = grossAmount / 1.12;
         vat12 = grossAmount - vatable;
         netBill = vatable - discount20;
         totalCharge = netBill;
      }

      // Update UI
      document.getElementById("srPwdBill_" + orderId).value = srPwdBill.toFixed(2);
      document.getElementById("regBill_" + orderId).value = regBill.toFixed(2);
      document.getElementById("discount20_" + orderId).value = discount20.toFixed(2);
      document.getElementById("vatable_" + orderId).value = vatable.toFixed(2);
      document.getElementById("vat12_" + orderId).value = vat12.toFixed(2);
      document.getElementById("netBill_" + orderId).value = netBill.toFixed(2);
      document.getElementById("otherDiscount_" + orderId).value = "0.00"; // placeholder
      document.getElementById("totalCharge_" + orderId).value = totalCharge.toFixed(2);
   }


function toggleDiscountForm(orderId) {
      const form = document.getElementById('discountForm_' + orderId);
      const hidden = document.getElementById('discountIds_' + orderId);
      const selectedIds = hidden.value ? hidden.value.split(',') : [];

      if (!selectedIds.length) {
         alert('Please select at least one discount first.');
         return;
      }

      const container = document.getElementById('selectedDiscountsContainer_' + orderId);
      container.innerHTML = ''; // clear old contents

      selectedIds.forEach((id, idx) => {
         const checkbox = document.getElementById(`discountCheck_${orderId}_${id}`);
         if (!checkbox) return;

         const discountName = checkbox.dataset.name;

         // Create discount block
         const block = document.createElement('div');
         block.classList.add('mb-4', 'p-2', 'border', 'rounded');
         block.innerHTML = `
               <h6 class="fw-bold">${discountName}</h6>
               <div class="form-group mb-2 d-flex align-items-center">
                  <label class="me-2"># of Entries</label>
                  <input type="number" 
                        id="discountCount_${orderId}_${id}" 
                        class="form-control" 
                        style="width:100px" min="1" value="1"
                        oninput="renderDiscountPersons(${orderId}, ${id})">
               </div>
               <div id="discountPersons_${orderId}_${id}">
                  <div class="row mb-2">
                     <div class="col-md-6">
                           <input type="text" name="persons[${id}][0][name]" class="form-control" placeholder="Enter name here">
                     </div>
                     <div class="col-md-6">
                           <input type="text" name="persons[${id}][0][id_number]" class="form-control" placeholder="Enter ID number here">
                     </div>
                  </div>
               </div>
         `;
         container.appendChild(block);
      });

      // Toggle form display
      form.style.display = form.style.display === 'block' ? 'none' : 'block';
}

   function renderDiscountPersons(orderId, discountId) {
      const count = parseInt(document.getElementById(`discountCount_${orderId}_${discountId}`).value) || 0;
      const container = document.getElementById(`discountPersons_${orderId}_${discountId}`);
      container.innerHTML = "";

      for (let i = 0; i < count; i++) {
         const row = document.createElement('div');
         row.classList.add('row', 'mb-2');
         row.innerHTML = `
               <div class="col-md-6">
                  <input type="text" name="persons[${discountId}][${i}][name]" class="form-control" placeholder="Enter name here">
               </div>
               <div class="col-md-6">
                  <input type="text" name="persons[${discountId}][${i}][id_number]" class="form-control" placeholder="Enter ID number here">
               </div>
         `;
         container.appendChild(row);
      }
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

      // Get all checked options
      const checked = dropdown.querySelectorAll('input[type="checkbox"]:checked');
      const names = Array.from(checked).map(chk => chk.dataset.name);
      const ids = Array.from(checked).map(chk => chk.value);

      // Display selected names in input field
      input.value = names.join(', ');

      // Store selected IDs for backend submission
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