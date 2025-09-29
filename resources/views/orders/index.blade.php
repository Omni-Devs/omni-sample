@extends('layouts.app')
@section('content')
<style>
   .container {
	display: flex;
	gap: 20px;
}

.categories {
	display: flex;
	flex-direction: column;
	/* Stack vertically */
	max-height: 700px;
	/* Set height for scroll area */
	overflow-y: auto;
	/* Vertical scroll */
	padding: 10px;
	gap: 10px;
	scrollbar-width: thin;
	/* Firefox */
}

.categories::-webkit-scrollbar {
	width: 6px;
	/* Vertical scrollbar width */
}

.categories::-webkit-scrollbar-thumb {
	background: #bbb;
	border-radius: 3px;
}

.categories::-webkit-scrollbar-track {
	background: #f1f1f1;
}

.categories button {
	flex: 0 0 auto;
	/* Prevent shrinking */
	padding: 10px 20px;
	border: none;
	border-radius: 8px;
	background: #f5f5f5;
	cursor: pointer;
	font-weight: bold;
	transition: background 0.3s, color 0.3s;
	text-align: left;
}

.categories button:hover {
	background: #007bff;
	color: #fff;
}

.categories button.active {
	background: #007bff;
	color: #fff;
}

.products {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	/* 2 per row */
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
<div id="app" class="main-content">
<h2>Order Entry</h2>
<!-- Order Header -->
<div style="display:flex; gap:10px;">
<div class="order-header mb-3" style="flex:1;">
   <div class="card h-40">
        <div class="card-body">
          <!-- Order Header -->
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
                type="text"
                class="form-control form-control-sm"
                value="Serving"
                readonly
              />
            </div>

            <!-- Waiter -->
            <div class="col-md-6">
              <label class="fw-bold">Waiter:</label>
              <v-select
                :options="waiters"
                v-model="selectedWaiter"
                label="name"
                :reduce="waiter => waiter.id"
                placeholder="Select Waiter"
              ></v-select>
              <small v-if="!selectedWaiter" class="text-danger">Required field</small>
            </div>

            <!-- No. of Pax -->
            <div class="col-md-6">
              <label class="fw-bold">No. of Pax:</label>
              <input
                type="number"
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
                type="text"
                v-model.trim="tableNo"
                class="form-control form-control-sm"
              />
            </div>
          </div>

          <!-- Add Order Button -->
          <button
            class="btn btn-primary mt-3"
            data-bs-toggle="modal"
            :disabled="!isFormValid"
            data-bs-target="#orderModal"
          >
            Add Order
          </button>
        </div>
      </div>
   <!-- Order Details -->
   <h2 class=" mt-4">Order Details</h2>
   <div class="card">
      <nav class="card-header">
         <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
               <a href="#" target="_self" class="nav-link active">
               Serving
               </a>
            </li>
            <li class="nav-item">
               <a href="#" target="_self" class="nav-link">
               Billing
               </a>
            </li>
            <li class="nav-item">
               <a href="#" target="_self" class="nav-link">
               Payment
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
                           <tr v-for="item in orderDetails" :key="item.sku">
                              <td>@{{ item.sku }}</td>
                              <td>@{{ item.name }}</td>
                              <td>
                                 <input type="number" v-model.number="item.qty" min="1" class="form-control form-control-sm">
                              </td>
                              <td>@{{ item.amount }}</td>
                              <td>@{{ (item.qty * item.amount).toFixed(2) }}</td>
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
                        @{{ orderDetails.reduce((sum, item) => sum + (item.qty * item.amount), 0).toFixed(2) }}
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="card h-100" style="flex:1;">
<div class="card-body">
    <div class="mt-2 mb-2 col-md-12"><div id="autocomplete" class="autocomplete product-search-box"><input placeholder="Scan/Search Product by Code Or Name" class="autocomplete-input"> <button type="button" class="btn search-product-clear-btn btn-link"><i class="i-Close"></i></button> <ul class="autocomplete-result-list" style="display: none;"></ul></div></div>
   <div class="container" style="margin-left: 0;">
      <!-- Categories -->
      <div class="categories" style="padding-left: 0;">
         <button 
            v-for="c in categories" 
            :key="c" 
            @click="selectedCategory = c"
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
    :key="p.sku"
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
   
</div>
<!-- Pagination -->
<ul role="menubar" aria-disabled="false" aria-label="Pagination" 
    class="pagination my-0 gull-pagination align-items-center b-pagination justify-content-center">

  <!-- First & Prev -->
  <li class="page-item" :class="{ disabled: currentPage === 1 }">
    <button class="page-link" @click="goToPage(1)" :disabled="currentPage === 1">
      «
    </button>
  </li>
  <li class="page-item" :class="{ disabled: currentPage === 1 }">
    <button class="page-link" @click="prevPage" :disabled="currentPage === 1">
      <i class="i-Arrow-Left"></i>
    </button>
  </li>

  <!-- Page Numbers -->
  <li v-for="page in totalPages" :key="page" class="page-item" :class="{ active: currentPage === page }">
    <button class="page-link" @click="goToPage(page)">
      @{{ page }}
    </button>
  </li>

  <!-- Next & Last -->
  <li class="page-item" :class="{ disabled: currentPage === totalPages }">
    <button class="page-link" @click="nextPage" :disabled="currentPage === totalPages">
      <i class="i-Arrow-Right"></i>
    </button>
  </li>
  <li class="page-item" :class="{ disabled: currentPage === totalPages }">
    <button class="page-link" @click="goToPage(totalPages)" :disabled="currentPage === totalPages">
      »
    </button>
  </li>
</ul>
<script>
   // Register vue-select globally
   Vue.component('v-select', VueSelect.VueSelect)
   new Vue({
   el: "#app",
   data: {
       orderNo: 1,
       date: new Date().toLocaleString(),
       waiter: null,
       waiters: [
           { id: 1, name: "Waiter A" },
           { id: 2, name: "Waiter B" }
       ],
       selectedWaiter: null,
       pax: null,
       tableNo: "",
        categories: [
           "PORK",
           "CHICKEN",
           "BEEF",
           "SEAFOODS",
           "DRINKS",
           "DESSERTS",
           "APPETIZERS",
           "SOUPS",
           "RICE MEALS",
           "SALADS",
           "VEGETARIAN",
           "GRILL",
           "NOODLES",
           "BURGERS",
           "PIZZA",
           "PASTA",
           "BREAKFAST",
           "SPECIALS"
       ],
       selectedCategory: "CHICKEN",
       currentPage: 1,
       perPage: 6,
       products: [
   { sku: "B1", name: "Beef Steak", description: "Juicy grilled steak.", amount: 250, category: "BEEF", image: "https://via.placeholder.com/300x200?text=Beef" },
   { sku: "P1", name: "Pork Chop", description: "Tender pork chop.", amount: 180, category: "PORK", image: "/images/products/porkchop.jpg" },
   { sku: "C1", name: "Fried Chicken", description: "Crispy golden chicken.", amount: 150, category: "CHICKEN", image: "https://via.placeholder.com/300x200?text=Chicken" },
   { sku: "S1", name: "Garlic Shrimp", description: "Fresh shrimp sautéed in garlic.", amount: 300, category: "SEAFOODS", image: "https://via.placeholder.com/300x200?text=Seafood" },
   
   // 🔥 10 Pork Categories
   { sku: "P2", name: "Pork Belly", description: "Succulent pork belly with crispy skin.", amount: 220, category: "PORK", image: "/images/products/porkbelly.jpg" },
   { sku: "P3", name: "Pork Ribs", description: "Slow-cooked ribs with BBQ sauce.", amount: 280, category: "PORK", image: "/images/products/porkribs.jpg" },
   { sku: "P4", name: "Pork Adobo", description: "Classic Filipino pork adobo dish.", amount: 200, category: "PORK", image: "/images/products/porkadobo.jpg" },
   { sku: "P5", name: "Lechon Kawali", description: "Deep-fried crispy pork belly.", amount: 250, category: "PORK", image: "/images/products/lechonkawali.jpg" },
   { sku: "P6", name: "Pork Sisig", description: "Sizzling chopped pork with onions and spices.", amount: 230, category: "PORK", image: "/images/products/porksisig.jpg" },
   { sku: "P7", name: "Sweet & Sour Pork", description: "Crispy pork in tangy sweet and sour sauce.", amount: 210, category: "PORK", image: "/images/products/sweetandsourpork.jpg" },
   { sku: "P8", name: "Pork Sinigang", description: "Sour tamarind soup with pork and vegetables.", amount: 190, category: "PORK", image: "/images/products/porksinigang.jpg" },
   { sku: "P9", name: "Pork BBQ Skewers", description: "Grilled pork skewers marinated in BBQ sauce.", amount: 160, category: "PORK", image: "/images/products/porkbbq.jpg" },
   { sku: "P10", name: "Crispy Pata", description: "Deep-fried pork leg served with dipping sauce.", amount: 320, category: "PORK", image: "/images/products/crispypata.jpg" },
   { sku: "P11", name: "Pork Tocino", description: "Sweet cured pork, best with garlic rice.", amount: 170, category: "PORK", image: "/images/products/porktocino.jpg" }
   ],
   
       orderDetails: []
   },
   computed: {
       filteredProducts() {
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
        }
   },
   methods: {
       addToOrder(product) {
           let existing = this.orderDetails.find(i => i.sku === product.sku);
           if (existing) {
               existing.qty++;
           } else {
               this.orderDetails.push({
                   sku: product.sku,
                   name: product.name,
                   qty: 1,
                   amount: product.amount
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
  }
   }
   });
</script>
@endsection