@extends('layouts.app')
@section('content')
<div class="main-content">
<style>
  .container {
    display: flex;
    gap: 20px;
}
/* Hide scrollbars by default */
.categories::-webkit-scrollbar,
.products::-webkit-scrollbar {
  width: 0; /* fully hidden */
  transition: width 0.5s;
}

/* Show scrollbars only on hover */
.categories:hover::-webkit-scrollbar,
.products:hover::-webkit-scrollbar {
  width: 6px;
}

/* Thumb and track (only visible when width > 0) */
.categories::-webkit-scrollbar-thumb,
.products::-webkit-scrollbar-thumb {
  background: #bbb;
  border-radius: 3px;
}

.categories::-webkit-scrollbar-track,
.products::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Categories sidebar */
.categories {
    display: flex;
    flex-direction: column;   /* stack vertically */
    width: 150px;             /* fixed width so it won’t shrink */
    max-height: 700px;        /* set height for scroll area */
    overflow-y: auto;         /* vertical scroll */
    padding: 10px;
    gap: 10px;
    scrollbar-width: thin;    /* Firefox */
    flex-shrink: 0;           /* don’t allow shrinking */
}

.categories::-webkit-scrollbar {
    width: 6px;
}

.categories::-webkit-scrollbar-thumb {
    background: #bbb;
    border-radius: 3px;
}

.categories::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.categories button {
    flex: 0 0 auto;           /* prevent shrinking */
    padding: 10px 16px;
    border: none;
    border-radius: 8px;
    background: #f5f5f5;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s, color 0.3s;
    text-align: left;
    white-space: nowrap;      /* keep text on one line */
    overflow: hidden;
    text-overflow: ellipsis;  /* truncate if too long */
}

.categories button:hover,
.categories button.active {
    background: #007bff;
    color: #fff;
}

/* Products grid */
.products {
    flex: 1;
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Always 2 per row */
    gap: 20px;
    margin-top: 20px;
    max-height: 700px;
    overflow-y: auto;
}

.product-card {
    height: 250px;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.product-body {
    padding: 15px;
    text-align: center;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-body h4 {
    margin: 10px 0 5px;
    font-size: 18px;
    font-weight: bold;
}

.product-body p {
    font-size: 14px;
    color: #555;
    flex-grow: 1;
}

.product-body button {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 10px;
    transition: background 0.3s;
}

.product-body button:hover {
    background: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table,
th,
td {
    border: 1px solid #ddd;
}

th,
td {
    padding: 8px;
    text-align: center;
}

input[type=number] {
    width: 60px;
}

.d-flex {
    margin: 10px 0;
    gap: 15px;
}

</style>
<div id="app">
<h2>Order Entry</h2>
<form @submit.prevent="submitOrder">
<!-- Order Header -->
<div style="display:flex; gap:10px;">
<div class="order-header mb-3" style="flex:1;">
   <div class="card h-40">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-2">
            <p class="mb-0">
              <label class="fw-bold me-2">Order No:</label> <span>1</span>
            </p>
            <p class="mb-0">
              <label class="fw-bold me-2">Date:</label>
              <span>9/26/2025, 9:38:52 AM</span>
            </p>
          </div>

          <!-- Row 2: Status, Waiter, Pax, Table -->
          <div class="row g-3">
            <!-- Status -->
            <div class="col-md-6">
              <label class="fw-bold">Status:</label>
              <input
                name="status"
                type="text"
                class="form-control form-control-sm"
                value="serving"
                readonly
              />
            </div>

            <!-- Waiter -->
            <div class="col-md-6">
              <label class="fw-bold">Waiter:</label>
              <v-select
                class="waiter-select"
                :options="waiters"
                v-model="selectedWaiter"
                label="name"
                :reduce="user => user.id"
                placeholder="Select Waiter"
                ref="waiterSelect"
              ></v-select>
              <small v-if="!selectedWaiter && invalidWaiter" class="text-danger">
                Required field
              </small>
            </div>

            <!-- No. of Pax -->
            <div class="col-md-6">
              <label class="fw-bold">No. of Pax:</label>
              <input
                type="number"
                name="number_pax"
                min="1"
                v-model.number="pax"
                class="form-control form-control-sm"
              />
              <small v-if="!pax" class="text-danger">Required field</small>
            </div>

            <!-- Table No. -->
            <div class="col-md-6">
              <label class="fw-bold">Table No:</label>
              <input 
                v-model="tableNo" 
                name="table_no"
                type="number" 
                class="form-control" 
                required
                >
                <small v-if="!tableNo" class="text-danger">Required field</small>
            </div>
          </div>

          <!-- Add Order Button -->
          {{-- <button
            class="btn btn-primary mt-3"
            data-bs-toggle="modal"
            :disabled="!isFormValid"
            data-bs-target="#orderModal"
          >
            Add Order
          </button> --}}
        </div>
      </div>
   <!-- Order Details -->
   <h2 class=" mt-4">Order Details</h2>
   <div class="card">
      <nav class="card-header">
         <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
               <a href="#" target="_self" class="nav-link active">
               Menu
               </a>
            </li>
         </ul>
      </nav>
      <div class="card">
         <div class="card-body">
            <div class="vgt-wrap">
               <div class="vgt-inner-wrap">
                  <!-- Table -->
                  <div class="vgt-responsive" style="max-height: 400px; overflow-y: auto;">
                     <table id="order-details-table" class="table-hover tableOne vgt-table custom-vgt-table">
                        <thead>
                           <tr>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>SKU</span>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Product</span>
                              </th>
                              <th scope="col" class="vgt-left-align text-right sortable">
                                 <span>Qty</span>
                              </th>
                              <th scope="col" class="vgt-left-align text-right sortable">
                                 <span>Amount</span>
                              </th>
                              <th scope="col" class="vgt-left-align text-right sortable">
                                 <span>Total</span>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr v-for="(item, index) in orderDetails" :key="item.id">
                                <td>@{{ item.sku }}</td>
                                <td>@{{ item.name }}</td>

                                <input 
                                    type="hidden" 
                                    :name="`order_details[${index}][product_id]`" 
                                    :value="item.id"
                                >

                                <td>
                                    <input
                                    type="number"
                                    v-model.number="item.qty"
                                    :name="`order_details[${index}][quantity]`"
                                    min="1"
                                    class="form-control form-control-sm"
                                    >
                                </td>

                                <td>@{{ item.price.toFixed(2) }}</td>
                                <input 
                                    type="hidden" 
                                    :name="`order_details[${index}][price]`" 
                                    :value="item.price"
                                >

                                <td>@{{ (item.qty * item.price).toFixed(2) }}</td>
                                </tr>
                           <tr v-if="orderDetails.length === 0">
                              <td colspan="5" class="vgt-center-align vgt-text-disabled">
                                 No order details available
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <!-- Footer -->
                  <div class="vgt-wrap__footer vgt-clearfix">
                     <div class="footer__row-count vgt-pull-left">
                        <span>Total Items: @{{ orderDetails.length }}</span>
                     </div>
                     <div class="footer__navigation vgt-pull-right">
                        <span class="font-weight-bold">
                        Grand Total: 
                        @{{ orderDetails.reduce((sum, item) => sum + (item.qty * item.price), 0).toFixed(2) }}
                        </span>
                     </div>
                  </div>
                  <button type="submit" class="primary-btn btn btn-primary mt-3">Submit Order</button>
               </div>
            </div>
        </form>
         </div>
      </div>
   </div>
</div>
<div class="card h-100" style="flex:1;">
<div class="card-body">
<div class="autocomplete product-search-box" style="position: relative; width: 100%; max-width: 400px;">
  <input 
    v-model="searchQuery"
    placeholder="Scan/Search Product by Code Or Name"
    class="autocomplete-input"
    style="width: 100%; padding-right: 35px;"
  >
  <button 
    v-if="searchQuery" 
    @click="clearSearch" 
    type="button" 
    class="btn search-product-clear-btn btn-link"
    style="position: absolute; right: 8px; top: 50%; transform: translateY(-50%); padding: 0; border: none;"
  >
    <i class="i-Close"></i>
  </button>
</div>
<div class="container" style="margin-left: 0;">
  <!-- Categories -->
  <div 
    class="categories" 
    v-if="!searchQuery.trim()" 
    style="padding-left: 0;"
  >
    <button 
      v-for="c in categories" 
      :key="c" 
      @click.prevent="selectCategory(c)"
      :class="{ active: selectedCategory === c }"
    >
      @{{ c }}
    </button>
  </div>
  <!-- Products -->
  <div class="products">
  <div 
    class="product-card" 
    v-for="p in paginatedProducts" 
    :key="p.type + '-' + p.id"
    @click="addToOrder(p)"
    style="cursor: pointer;"
  >
    <img :src="p.image" :alt="p.name">
    <div class="product-body">
      <h4>@{{ p.name }}</h4>
      <p>@{{ p.description }}</p>
    </div>
  </div>
</div>

</div>

<!-- Pagination -->
<ul role="menubar" aria-disabled="false" aria-label="Pagination" 
    class="pagination my-0 gull-pagination align-items-center b-pagination justify-content-center">

  <!-- First & Prev -->
  <li class="page-item" :class="{ disabled: currentPage === 1 }">
    <button class="page-link" @click.prevent="goToPage(1)" :disabled="currentPage === 1">
      «
    </button>
  </li>
  <li class="page-item" :class="{ disabled: currentPage === 1 }">
    <button class="page-link" @click.prevent="prevPage" :disabled="currentPage === 1">
      <i class="i-Arrow-Left"></i>
    </button>
  </li>

  <!-- Page Numbers -->
  <li v-for="page in totalPages" :key="page" class="page-item" :class="{ active: currentPage === page }">
    <button class="page-link" @click.prevent="goToPage(page)">
      @{{ page }}
    </button>
  </li>

  <!-- Next & Last -->
  <li class="page-item" :class="{ disabled: currentPage === totalPages }">
    <button class="page-link" @click.prevent="nextPage" :disabled="currentPage === totalPages">
      <i class="i-Arrow-Right"></i>
    </button>
  </li>
  <li class="page-item" :class="{ disabled: currentPage === totalPages }">
    <button class="page-link" @click.prevent="goToPage(totalPages)" :disabled="currentPage === totalPages">
      »
    </button>
  </li>
</ul>
</div>
</div>
</div>
<script>
   // Register vue-select globally
   Vue.component('v-select', VueSelect.VueSelect)
   new Vue({
   el: "#app",
   data: {
       orderNo: 1,
       date: new Date().toLocaleString(),
       waiter: null,
       waiters: @json($waiters),
       selectedWaiter: null,
       pax: null,
       tableNo: null,
       categories: @json($categories),
       selectedCategory: @json($categories[0] ?? ''),
       currentPage: 1,
       perPage: 6,
       products: @json($products),
       orderDetails: [],
       searchQuery: "",
   },
   computed: {
     filteredProducts() {
    if (this.searchQuery.trim() !== "") {
      const q = this.searchQuery.toLowerCase();
      return this.products.filter(p =>
        p.name.toLowerCase().includes(q) ||
        p.sku.toLowerCase().includes(q) ||
        p.description.toLowerCase().includes(q)
      );
    }
    return this.products.filter(p => p.category === this.selectedCategory);
  },
  isFormValid() {
    return this.selectedWaiter && this.pax && this.tableNo;
  },
  totalPages() {
    return Math.ceil(this.filteredProducts.length / this.perPage);
  },
  paginatedProducts() {
    const start = (this.currentPage - 1) * this.perPage;
    return this.filteredProducts.slice(start, start + this.perPage);
  },
        filteredSearch() {
    if (!this.searchQuery) return [];
    let q = this.searchQuery.toLowerCase();
      return this.products.filter(
        p => p.name.toLowerCase().includes(q) || p.sku.toLowerCase().includes(q)
      );
    },
   },
   methods: {
       addToOrder(product) {
    // Reset validation states
    this.invalidWaiter = false;
    this.invalidPax = false;
    this.invalidTable = false;

     // Validate waiter
    if (!this.selectedWaiter) {
      this.invalidWaiter = true;
      this.$nextTick(() => {
        // Auto focus + open dropdown
        const waiterSelect = this.$refs.waiterSelect;
        if (waiterSelect) {
          waiterSelect.$el.querySelector('input')?.focus();
          waiterSelect.toggleDropdown?.(); // open the dropdown
        }
      });
      return;
    }
    if (!this.pax) {
      this.invalidPax = true;
      this.$nextTick(() => {
        document.querySelector('[name="number_pax"]')?.focus();
      });
      return;
    }
    if (!this.tableNo) {
      this.invalidTable = true;
      this.$nextTick(() => {
        document.querySelector('[name="table_no"]')?.focus();
      });
      return;
    }

    const key = product.type + '-' + product.id;

  const existing = this.orderDetails.find(
    item => item.key === key
  );

  if (existing) {
    existing.qty++;
  } else {
    this.orderDetails.push({
      key: key,                  // ✅ internal unique key
      id: product.id,
      type: product.type,        // "product" or "component"
      sku: product.sku,
      name: product.name,
      qty: 1,
      price: parseFloat(product.price)
    });
  }
  },
       goToPage(page) {
    if (page >= 1 && page <= this.totalPages) {
      this.currentPage = page;
    }
  },
  prevPage() {
    if (this.currentPage > 1) {
      this.currentPage--;
    }
  },
  nextPage() {
    if (this.currentPage < this.totalPages) {
      this.currentPage++;
    }
  },
  clearSearch() {
    this.searchQuery = "";
  },
   selectCategory(category) {
    this.selectedCategory = category;
    this.currentPage = 1; // ✅ reset to page 1
  },
  submitOrder() {
  const payload = {
  user_id: this.selectedWaiter, // waiter ID
  table_no: parseInt(this.tableNo),
  number_pax: parseInt(this.pax),
  status: "serving",
  order_details: this.orderDetails.map(item => ({
    product_id: item.type === "product" ? item.id : null,
    component_id: item.type === "component" ? item.id : null,
    quantity: item.qty,
    price: item.price
  }))
};

  console.log("Submitting order payload:", payload);

 axios.post('/orders/store', payload)
  .then(res => {
      console.log(res.data.message);
      window.location.href = res.data.redirect;
  });
},
   },
   watch: {
  searchQuery(newVal, oldVal) {
    if (newVal !== oldVal) {
      this.currentPage = 1; // ✅ always reset to page 1 when searching
    }
  }
}
   });
   
</script>
@endsection