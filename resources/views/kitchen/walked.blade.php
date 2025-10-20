@extends('layouts.app')
@section('content')
<div class="main-content" id="app">
<div>
    <div class="breadcrumb">
        <h1 class="mr-3">POS</h1>
        <ul>
        <li><a href=""> Kitchen </a></li>
        <!----> <!---->
        </ul>
        <div class="breadcrumb-action"></div>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</div>
<div class="wrapper">
   <div class="card mt-4">
      <nav class="card-header">
         <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
               <a href="/kitchen" 
                  class="nav-link">
               Preparing
               </a>
            </li>
            <li class="nav-item">
               <a href="/kitchen/served" 
                  class="nav-link">
               Served
               </a>
            </li>
            <li class="nav-item">
               <a href="/kitchen/walked"
                  class="nav-link active">
               Walked
               </a>
            </li>
            <li class="nav-item">
               <a href="#"
                  class="nav-link">
               Cancelled
               </a>
            </li>
         </ul>
      </nav>
      <div class="card-body">
         <div class="vgt-wrap ">
            <div class="vgt-inner-wrap">
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
                              <span>Order No.</span>
                              <button><span class="sr-only">Sort table by Order No in descending order</span></button>
                           </th>
                           <th scope="col" class="vgt-left-align text-left sortable">
                              <span>Time Ordered</span>
                              <button><span class="sr-only">Sort table by Time Ordered in descending order</span></button>
                           </th>
                           <th scope="col" class="vgt-left-align text-left sortable">
                              <span>SKU</span>
                              <button><span class="sr-only">Sort table by SKU in descending order</span></button>
                           </th>
                           <th scope="col" class="vgt-left-align text-left sortable">
                              <span>Product Name</span>
                              <button><span class="sr-only">Sort table by Product Name in descending order</span></button>
                           </th>
                           <th scope="col" class="vgt-left-align text-right sortable">
                              <span>Qty</span>
                              <button><span class="sr-only">Sort table by Qty in descending order</span></button>
                           </th>
                           <th scope="col" class="vgt-left-align text-right sortable">
                              <span>Station</span>
                              <button><span class="sr-only">Sort table by Station in descending order</span></button>
                           </th>
                           <th scope="col" class="vgt-left-align text-right sortable">
                              <span>Time Served</span>
                              <button><span class="sr-only">Sort table by Running Time in descending order</span></button>
                           </th>
                           <th scope="col" class="vgt-left-align text-right sortable">
                              <span>Chef, Cook</span>
                           </th>
                           <th scope="col" class="vgt-left-align text-right">
                              <span>Action</span>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                    @forelse($walkedDetails as $detail)
                        <tr>
                            <td>{{ $detail->order->id }}</td>

                            {{-- 🕒 Time Ordered (from orders table) --}}
                            <td>
                                {{ $detail->order->time_submitted 
                                    ? \Carbon\Carbon::parse($detail->order->time_submitted)->format('Y-m-d H:i:s') 
                                    : 'N/A' }}
                            </td>

                            <td>{{ $detail->product->code ?? $detail->component->code ?? 'N/A' }}</td>
                            <td>{{ $detail->product->name ?? $detail->component->name ?? 'Unknown Item' }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->product->category->name ?? $detail->component->category->name ?? 'N/A' }}</td>

                            {{-- 🕕 Time Served (from order_items table) --}}
                            <td>
                                {{ optional($detail->orderItems->first())->time_submitted 
                                    ? \Carbon\Carbon::parse(optional($detail->orderItems->first())->time_submitted)->format('Y-m-d H:i:s')
                                    : 'N/A' }}
                            </td>

                            {{-- 👨‍🍳 Cook Name (from order_items.cook) --}}
                            <td>{{ optional(optional($detail->orderItems->first())->cook)->name ?? 'N/A' }}</td>
                            <td class="text-right">
                              <div class="dropdown b-dropdown btn-group">
                                 <button id="dropdownMenu{{ $id ?? uniqid() }}"
                                    type="button"
                                    class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="_dot _r_block-dot bg-dark"></span>
                                    <span class="_dot _r_block-dot bg-dark"></span>
                                    <span class="_dot _r_block-dot bg-dark"></span>
                                 </button>

                                 <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu">
                                    <!-- Update Status -->
                                       <li role="presentation">
                                    <a
                                          class="dropdown-item"
                                          href="#"
                                    >
                                          <i class="nav-icon i-Edit font-weight-bold mr-2"></i>
                                       Update Status
                                    </a>
                                    </li>

                                    <li role="presentation">
                                          <a class="dropdown-item" href="#">
                                             <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i> Remarks
                                          </a>
                                    </li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">No served items found.</td>
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