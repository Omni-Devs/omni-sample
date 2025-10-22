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
                                    <span>Running Time</span>
                                    <button><span class="sr-only">Sort table by Running Time in descending order</span></button>
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

    // 🔹 Filtered orders based on selected date
    filteredOrders() {
      return this.orderItems.filter(item => {
        const date = new Date(item.time_submitted);
        return (
          date.getFullYear() === this.selectedYear &&
          date.getMonth() + 1 === this.selectedMonth &&
          date.getDate() === this.selectedDay
        );
      });
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

    fetchOrders() {
      axios.get(`/kitchen/served`)
        .then(res => {
          this.orderItems = res.data.orderItems;
        })
        .catch(err => console.error("❌ Failed to reload orders:", err));
    },

    submitUpdateStatus() {
      const now = new Date();
      const timeSubmitted =
        now.getFullYear() + '-' +
        String(now.getMonth() + 1).padStart(2, '0') + '-' +
        String(now.getDate()).padStart(2, '0') + ' ' +
        now.toLocaleTimeString('en-US', { hour12: false });

      const payload = {
        order_detail_id: this.selectedOrder.order_detail_id,
        cook_id: this.selectedOrder.cook_id,
        time_submitted: timeSubmitted,
        status: this.selectedOrder.status,
      };

      axios.post(`/order-items/update-or-create`, payload)
        .then(response => {
          if (response.data.success) {
            alert("✅ Order item updated successfully!");
            const updatedDetail = response.data.data.order_detail;
            const updatedOrderStatus = response.data.data.order_status;

            const index = this.orderItems.findIndex(
              item => item.order_detail_id === updatedDetail.id
            );
            if (index !== -1) {
              this.orderItems[index].status = updatedDetail.status;
              this.orderItems[index].cook_id = this.selectedOrder.cook_id;
              this.orderItems[index].time_submitted = timeSubmitted;
            }

            if (updatedDetail.status !== 'serving') {
              this.orderItems = this.orderItems.filter(
                i => i.order_detail_id !== updatedDetail.id
              );
            }

            if (updatedOrderStatus === 'served') {
              this.fetchOrders();
            }

            const modal = bootstrap.Modal.getInstance(document.getElementById("updateModal"));
            if (modal) modal.hide();
          } else {
            alert("⚠️ " + (response.data.message || "Something went wrong."));
          }
        })
        .catch(error => {
          console.error("❌ Update failed:", error.response || error);
          alert("❌ Failed to update order item. Check console for details.");
        });
    },
  }
});
</script>



@endsection