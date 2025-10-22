@extends('layouts.app')
@section('content')
<div class="main-content" id="walkedApp">
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
            <div class="row mb-3 align-items-center">
               <div class="col-md-2">
                  <label class="form-label fw-bold">Year</label>
                  <select v-model="selectedYear" class="form-select">
                     <option v-for="year in years" :value="year">@{{ year }}</option>
                  </select>
               </div>

               <div class="col-md-2">
                  <label class="form-label fw-bold">Month</label>
                  <select v-model="selectedMonth" class="form-select">
                     <option v-for="(m, i) in months" :value="i + 1">@{{ m }}</option>
                  </select>
               </div>

               <div class="col-md-2">
                  <label class="form-label fw-bold">Day</label>
                  <select v-model="selectedDay" class="form-select">
                     <option v-for="d in daysInMonth" :value="d">@{{ d }}</option>
                  </select>
               </div>

               <div class="col-md-3 mt-3 mt-md-4">
                  <button class="btn btn-primary w-100" @click="resetToToday">Today’s Orders</button>
               </div>
               </div>

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
                        <tr v-for="detail in filteredDetails" :key="detail.id">
                           <td>@{{ detail.order.id }}</td>
                           <td>@{{ formatDate(detail.order.time_submitted) }}</td>
                           <td>@{{ detail.product?.code || detail.component?.code || 'N/A' }}</td>
                           <td>@{{ detail.product?.name || detail.component?.name || 'Unknown Item' }}</td>
                           <td>@{{ detail.quantity }}</td>
                           <td>@{{ detail.product?.category?.name || detail.component?.category?.name || 'N/A' }}</td>

                           {{-- 🕕 Time Served (from order_items table) --}}
                            <td>@{{ formatAMPM(detail.order_items?.[0]?.time_submitted) }}</td>

                           {{-- 👨‍🍳 Cook Name (from order_items.cook) --}}
                           <td>@{{ detail.order_items?.[0]?.cook?.name || 'N/A' }}</td>
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
                        <tr v-if="filteredDetails.length === 0">
                           <td colspan="9" class="text-center">No served items found.</td>
                        </tr>
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
new Vue({
   el: '#walkedApp',
   data: {
      servedDetails: @json($walkedDetails),
      selectedYear: new Date().getFullYear(),
      selectedMonth: new Date().getMonth() + 1,
      selectedDay: new Date().getDate(),
      months: [
         'January', 'February', 'March', 'April', 'May', 'June',
         'July', 'August', 'September', 'October', 'November', 'December'
      ],
   },
   computed: {
      years() {
         const current = new Date().getFullYear();
         return Array.from({ length: 5 }, (_, i) => current - i);
      },
      daysInMonth() {
         return Array.from({ length: new Date(this.selectedYear, this.selectedMonth, 0).getDate() }, (_, i) => i + 1);
      },
      filteredDetails() {
         return this.servedDetails.filter(detail => {
            const date = new Date(detail.order.time_submitted);
            return (
               date.getFullYear() === this.selectedYear &&
               date.getMonth() + 1 === this.selectedMonth &&
               date.getDate() === this.selectedDay
            );
         });
      }
   },
   methods: {
      formatDate(dateString) {
         if (!dateString) return 'N/A';
         const date = new Date(dateString);
         return date.toLocaleString();
      },
      resetToToday() {
         const now = new Date();
         this.selectedYear = now.getFullYear();
         this.selectedMonth = now.getMonth() + 1;
         this.selectedDay = now.getDate();
      },
      formatAMPM(time) {
         if (!time) return 'N/A';
         const date = new Date(time);
         let hours = date.getUTCHours(); // ✅ use UTC hours
         const minutes = date.getUTCMinutes();
         const ampm = hours >= 12 ? 'PM' : 'AM';
         hours = hours % 12 || 12;
         const minutesStr = minutes.toString().padStart(2, '0');
         return `${hours}:${minutesStr} ${ampm}`;
      },
   }
});
</script>
@endpush