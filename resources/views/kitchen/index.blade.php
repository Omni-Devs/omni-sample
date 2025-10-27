@extends('layouts.app')
<script src="https://unpkg.com/timeago.js/dist/timeago.min.js"></script>

<style>
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px 12px;
    vertical-align: middle !important;
}

thead {
    background-color: #e9ecf3;
    font-weight: bold;
}

tr {
    transition: background-color 0.3s ease;
}

tr:hover {
    background-color: #dcecff !important;
}

.btn {
    font-size: 0.85rem;
    padding: 4px 8px;
}

.fw-semibold {
    font-weight: 600;
}

.sortable {
  cursor: pointer;
  user-select: none;
}
.sortable:hover {
  background-color: #f8f9fa;
}


</style>
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
   <!-- ✅ Update Status Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateStatusLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" v-if="selectedOrder">

      <!-- Header -->
      <div class="modal-header">
        <h5 class="modal-title">Update Status - Order #@{{ selectedOrder.order_no  }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal">x</button>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <form @submit.prevent="submitUpdateStatus">
          
          <!-- Order Info -->
          <div class="border rounded p-3 mb-3">
            <div class="row g-2">
              <div class="col-md-3">
                <label class="form-label">Order No</label>
                <input type="text" class="form-control" :value="selectedOrder.order_no" readonly>
              </div>
              <div class="col-md-3">
                <label class="form-label">Time Ordered</label>
                <input type="text" class="form-control" :value="formatTime(selectedOrder.time_submitted)" readonly>
              </div>
              <div class="col-md-3">
                <label class="form-label">SKU</label>
                <input type="text" class="form-control" :value="selectedOrder.code" readonly>
              </div>
              <div class="col-md-3">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" :value="selectedOrder.name" readonly>
              </div>
            </div>
          </div>

          <!-- Update Fields -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Chef / Cook</label>
              <select v-model="selectedOrder.cook_id" class="form-select">
                <option value="">-- Select Cook --</option>
                <option v-for="chef in chefs" :key="chef.id" :value="chef.id">
                  @{{ chef.name }}
                </option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select v-model="selectedOrder.status" class="form-select">
                <option value="served">Served</option>
                <option value="walked">Walked</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </div>
          </div>

            <div v-if="selectedOrder" class="mt-3">
            <h5>Ingredients for @{{ selectedOrder.name }}</h5>

            <div class="mb-2">
              <input type="checkbox" v-model="selectedOrder.showLoss"> Wasted Ingredients
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Component</th>
                  <th>Quantity</th>
                  <th v-if="selectedOrder.showLoss" colspan="3" class="text-center">Inventory Loss</th>
                </tr>
                <tr v-if="selectedOrder.showLoss">
                  <th></th>
                  <th></th>
                  <th>Type</th>
                  <th>Qty</th>
                  <th>Unit</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(ingredient, index) in selectedOrder.recipe" :key="index">
                  <td>@{{ ingredient.component_name }}</td>
                  <td class="text-end">@{{ ingredient.quantity }}</td>

                  <template v-if="selectedOrder.showLoss">
                    <td>
                      <select v-model="ingredient.loss_type" class="form-control">
                        <option disabled value="" style="color: #aaa;">Select Type</option>
                        <option value="wastage">Wastage</option>
                        <option value="spoilage">Spoilage</option>
                        <option value="theft">Theft</option>
                      </select>
                    </td>
                    <td>
                      <input type="number" v-model.number="ingredient.loss_qty" step="0.01" class="form-control text-end">
                    </td>
                    <td>@{{ ingredient.unit }}</td>
                  </template>
                </tr>
              </tbody>
            </table>
          </div>

            
          {{-- </div> --}}

          <!-- Buttons -->
          <div class="text-center">
            <button type="submit" class="btn btn-primary px-4 me-2">
              <i class="bi bi-check-circle me-1"></i> Submit
            </button>
            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
              Cancel
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


    <div class="wrapper">
        <div class="card mt-4">
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="/kitchen" 
                            class="nav-link active">
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
                            class="nav-link">
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
                              <th scope="col" class="vgt-left-align text-left sortable" @click="sortTable('order_no')">
                                <span>Order No.</span>
                                <i :class="getSortIcon('order_no')" class="ms-1"></i>
                              </th>

                              <th scope="col" class="vgt-left-align text-left sortable" @click="sortTable('time_submitted')">
                                <span>Time Ordered</span>
                                <i :class="getSortIcon('time_submitted')" class="ms-1"></i>
                              </th>

                              <th scope="col" class="vgt-left-align text-left sortable" @click="sortTable('code')">
                                <span>SKU</span>
                                <i :class="getSortIcon('code')" class="ms-1"></i>
                              </th>

                              <th scope="col" class="vgt-left-align text-left sortable" @click="sortTable('name')">
                                <span>Product Name</span>
                                <i :class="getSortIcon('name')" class="ms-1"></i>
                              </th>

                              <th scope="col" class="vgt-left-align text-right sortable" @click="sortTable('qty')">
                                <span>Qty</span>
                                <i :class="getSortIcon('qty')" class="ms-1"></i>
                              </th>

                              <th scope="col" class="vgt-left-align text-right sortable" @click="sortTable('station')">
                                <span>Station</span>
                                <i :class="getSortIcon('station')" class="ms-1"></i>
                              </th>

                              <th scope="col" class="vgt-left-align text-right sortable" @click="sortTable('running_time')">
                                <span>Running Time</span>
                                <i :class="getSortIcon('running_time')" class="ms-1"></i>
                              </th>

                              <th scope="col" class="vgt-left-align text-right sortable">
                                <span>Recipe</span>
                              </th>

                              <th scope="col" class="vgt-left-align text-right">
                                <span>Action</span>
                              </th>
                            </tr>

                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in filteredOrders" 
                                  :key="index" 
                                  :style="{ backgroundColor: getOrderColor(item.time_submitted) }">
                                <td class="text-left fw-bold text-primary">#@{{ item.order_no }}</td>
                                <td class="text-left">@{{ formatTime(item.time_submitted) }}</td>
                                <td class="text-left fw-semibold">@{{ item.code }}</td>
                                <td class="text-left">@{{ item.name }}</td>
                                <td class="text-end">@{{ item.qty }}</td>
                                <td class="text-end">@{{ item.station }}</td>
                                <td class="text-end fw-bold" 
                                :class="{'text-danger': (new Date(now) - new Date(item.time_submitted)) / 60000 >= 15}">
                                  @{{ getRunningTime(item.time_submitted) }}
                                </td>

                                <td>
                                  <button @click="item.showRecipe = !item.showRecipe">View Recipe</button>
                                  <ul v-if="item.showRecipe">
                                    <li v-for="r in item.recipe" :key="r.component_name">
                                      @{{ r.component_name }} — @{{ r.quantity }}
                                    </li>
                                  </ul>
                                </td>
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
                                          @click="openUpdateModal(item)"
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
new Vue({
  el: "#app",
  data: {
    orderItems: @json($orderItems),
    now: new Date(), // reactive timestamp that updates every second
    selectedOrder: null,
    selectedStatus: "",
    chefs: @json($chefs),

    // 🔹 Date filter state
    selectedYear: new Date().getFullYear(),
    selectedMonth: new Date().getMonth() + 1,
    selectedDay: new Date().getDate(),
    months: [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ],
    sortKey: '',
    sortAsc: true,
  },

  computed: {
    // Generate list of last 5 years
    years() {
      const current = new Date().getFullYear();
      return Array.from({ length: 5 }, (_, i) => current - i);
    },

    // Generate days for selected month/year
    daysInMonth() {
      return Array.from(
        { length: new Date(this.selectedYear, this.selectedMonth, 0).getDate() },
        (_, i) => i + 1
      );
    },

    // 🔹 Filtered + Sorted orders based on selected date
filteredOrders() {
  // Step 1: Filter by selected date
  let data = this.orderItems.filter(item => {
    const date = new Date(item.time_submitted);
    return (
      date.getFullYear() === this.selectedYear &&
      date.getMonth() + 1 === this.selectedMonth &&
      date.getDate() === this.selectedDay
    );
  });

  // Step 2: Sort if a column is selected
  if (this.sortKey) {
  data = [...data].sort((a, b) => {
    let valA = a[this.sortKey];
    let valB = b[this.sortKey];

    // 🕐 Special: sort running time based on difference from now
    if (this.sortKey === 'running_time') {
      const diffA = new Date(this.now) - new Date(a.time_submitted);
      const diffB = new Date(this.now) - new Date(b.time_submitted);
      return this.sortAsc ? diffA - diffB : diffB - diffA;
    }

    // 🕐 Special: sort by actual submission time
    if (this.sortKey === 'time_submitted') {
      return this.sortAsc
        ? new Date(valA) - new Date(valB)
        : new Date(valB) - new Date(valA);
    }

    // Numeric comparison (qty, etc.)
    if (!isNaN(valA) && !isNaN(valB)) {
      return this.sortAsc ? valA - valB : valB - valA;
    }

    // Default string comparison
    return this.sortAsc
      ? String(valA).localeCompare(String(valB))
      : String(valB).localeCompare(String(valA));
  });
}


  return data;
}

  },

  mounted() {
    // 🕒 Update timer every second
    setInterval(() => {
      this.now = new Date();
    }, 1000);
  },

  methods: {
    // Reset dropdowns to today's date
    resetToToday() {
      const now = new Date();
      this.selectedYear = now.getFullYear();
      this.selectedMonth = now.getMonth() + 1;
      this.selectedDay = now.getDate();
    },

    // 🕐 Compute live running time in H:M:S format
    getRunningTime(submitted) {
      const diffInSeconds = Math.floor((new Date(this.now) - new Date(submitted)) / 1000);
      if (diffInSeconds < 0) return "0s"; // safeguard

      const hours = Math.floor(diffInSeconds / 3600);
      const mins = Math.floor((diffInSeconds % 3600) / 60);
      const secs = diffInSeconds % 60;

      let timeStr = "";
      if (hours > 0) timeStr += `${hours}h `;
      if (mins > 0 || hours > 0) timeStr += `${mins}m `;
      timeStr += `${secs}s`;
      return timeStr.trim();
    },

    // 🟩🟧🟥 Compute background color based on elapsed time
    getOrderColor(submitted) {
      const diffInMinutes = (new Date(this.now) - new Date(submitted)) / 1000 / 60;

      if (diffInMinutes >= 15) return '#ffcccc'; // red
      if (diffInMinutes >= 10) return '#ffe5b4'; // orange
      if (diffInMinutes >= 5)  return '#e8f5e9'; // green
      return '#ffffff'; // default white
    },

    formatTime(datetime) {
      const local = new Date(datetime + 'Z');
      return local.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
      });
    },

    openUpdateModal(item) {
      this.selectedOrder = item;
      this.selectedStatus = item.status || "";
      const modal = new bootstrap.Modal(document.getElementById("updateModal"));
      modal.show();
    },

    sortTable(key) {
    if (this.sortKey === key) {
      this.sortAsc = !this.sortAsc; // toggle ascending/descending
    } else {
      this.sortKey = key;
      this.sortAsc = true; // default ascending
    }
  },
  getSortIcon(key) {
    if (this.sortKey !== key) return 'fa fa-sort text-muted';
    return this.sortAsc ? 'fa fa-sort-up text-primary' : 'fa fa-sort-down text-primary';
  },

    fetchOrders() {
      axios.get(`/kitchen/served`)
        .then(res => {
          this.orderItems = res.data.orderItems;
        })
        .catch(err => console.error("❌ Failed to reload orders:", err));
    },

    async submitUpdateStatus() {
    try {
      const now = new Date();
      const timeSubmitted =
        now.getFullYear() + '-' +
        String(now.getMonth() + 1).padStart(2, '0') + '-' +
        String(now.getDate()).padStart(2, '0') + ' ' +
        now.toLocaleTimeString('en-US', { hour12: false });

      // ✅ Prepare deductions array first
      const deductions = [];
      if (['served', 'walked'].includes(this.selectedOrder.status)) {
        const recipes = this.selectedOrder.recipe || [];

        recipes.forEach(ingredient => {
          const usedQty = ingredient.quantity || 0;
          const lossQty = ingredient.loss_qty || 0;

          // ✅ Main served deduction
          if (usedQty > 0) {
            deductions.push({
              component_id: ingredient.component_id,
              order_detail_id: this.selectedOrder.order_detail_id,
              quantity_deducted: usedQty,
              deduction_type: 'served',
              notes: `Used for order (${this.selectedOrder.status}).`,
            });
          }

          // ✅ Separate wastage/spoilage/theft deduction
          if (lossQty > 0) {
            const mappedType = ['wastage', 'spoilage', 'theft'].includes(
              (ingredient.loss_type || '').toLowerCase()
            )
              ? ingredient.loss_type.toLowerCase()
              : 'wastage';

            deductions.push({
              component_id: ingredient.component_id,
              order_detail_id: this.selectedOrder.order_detail_id,
              quantity_deducted: lossQty,
              deduction_type: mappedType,
              notes: `Wasted due to ${mappedType}.`,
            });
          }
        });
      }

      // ✅ Combine deductions with main payload
      const payload = {
        order_detail_id: this.selectedOrder.order_detail_id,
        cook_id: this.selectedOrder.cook_id,
        time_submitted: timeSubmitted,
        status: this.selectedOrder.status,
        recipe: (this.selectedOrder.recipe || []).map(r => ({
          component_name: r.component_name,
          quantity: r.quantity ?? 0,
          loss_type: r.loss_type && r.loss_type !== '' ? r.loss_type : 'served',
          loss_qty: r.loss_qty ?? 0,
        })),
        deductions, // 👈 clean separation, no double count
      };

      console.log("🛰 Sending payload with deductions:", payload);


      // ✅ Send to your controller (handles both order & inventory)
      const response = await axios.post(`/order-items/update-or-create`, payload);

      if (!response.data.success) {
        alert("⚠️ " + (response.data.message || "Something went wrong."));
        return;
      }

      alert("✅ Order item updated successfully!");

      const updatedDetail = response.data.data.order_detail;
      const updatedOrderStatus = updatedDetail?.status;

      // ✅ Update local table
      const index = this.orderItems.findIndex(
        item => item.order_detail_id === updatedDetail.id
      );

      if (index !== -1) {
        this.orderItems[index].status = updatedDetail.status;
        this.orderItems[index].cook_id = this.selectedOrder.cook_id;
        this.orderItems[index].time_submitted = timeSubmitted;
      }

      // ✅ Refresh list or remove if done
      if (['served', 'walked'].includes(updatedOrderStatus)) {
        this.fetchOrders();
      }

      if (updatedDetail.status !== 'serving') {
        this.orderItems = this.orderItems.filter(
          i => i.order_detail_id !== updatedDetail.id
        );
      }

      const modal = bootstrap.Modal.getInstance(document.getElementById("updateModal"));
      if (modal) modal.hide();

  } catch (error) {
    console.error("❌ Update failed:", error.response || error);
    alert("❌ Failed to update order item. Check console for details.");
  }
}

  }
});
</script>



@endsection