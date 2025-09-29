@extends('layouts.app')
@section('content')
    <style>
        .container { display: flex; gap: 20px; }
        .categories {
    display: flex;
    flex-direction: column;   /* Stack vertically */
    max-height: 500px;        /* Set height for scroll area */
    overflow-y: auto;         /* Vertical scroll */
    padding: 10px;
    gap: 10px;
    scrollbar-width: thin;    /* Firefox */
}
.categories::-webkit-scrollbar {
    width: 6px;               /* Vertical scrollbar width */
}
.categories::-webkit-scrollbar-thumb {
    background: #bbb;
    border-radius: 3px;
}
.categories::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.categories button {
    flex: 0 0 auto;          /* Prevent shrinking */
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
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.product-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 8px; text-align: center; }
        input[type=number] { width: 60px; }
        .d-flex { margin: 10px 0; gap: 15px; }
    </style>
<div id="app" class="main-content">
    <h2>Order Entry</h2>
    <!-- Order Header -->
    <div class="order-header mb-3">
        <div class="card">
        <div class="card-body">
    <!-- Row 1: Order No. and Date -->
    <div class="d-flex justify-content-between mb-2">
        <p class="mb-0">
            <label class="fw-bold me-2">Order No:</label> <span>1</span>
        </p>
        <p class="mb-0">
            <label class="fw-bold me-2">Date:</label> <span>9/26/2025, 9:38:52 AM</span>
        </p>
    </div>

    <!-- Row 2: Status, Waiter, Pax, Table -->
    <div class="d-flex flex-wrap gap-3 align-items-center" style="justify-content: space-between;">
        <!-- Status -->
        <div class="d-flex align-items-center">
            <label class="fw-bold me-2">Status:</label>
            <input type="text" class="form-control form-control-sm" value="Serving" readonly>
        </div>

        <!-- Waiter (searchable) -->
        <div class="d-flex align-items-center">
            <label class="fw-bold me-2">Waiter:</label>
                <v-select
                :options="waiters"
                v-model="selectedWaiter"
                label="name"
                :reduce="waiter => waiter.id"
                placeholder="Select Waiter"
                style="width: 250px;"
            ></v-select>
            <small v-if="!selectedWaiter" class="text-danger">Required field</small>

        <!-- No. of Pax -->
        <div class="d-flex align-items-center">
            <label class="fw-bold me-2">No. of Pax:</label>
            <input 
                type="number" 
                min="1" 
                v-model.number="pax" 
                class="form-control form-control-sm"
                style="max-width:120px"
                >
        </div>
         <small v-if="!pax" class="text-danger">Required field</small>

        <!-- Table No. -->
        <div class="d-flex align-items-center">
            <label class="fw-bold me-2">Table No:</label>
            <input 
                type="text" 
                v-model.trim="tableNo" 
                class="form-control form-control-sm"
                style="max-width:120px"
                >
        </div>
    </div>
    </div>
     <!-- Add Order Button -->
    <button 
        class="btn btn-primary mb-3" 
        data-bs-toggle="modal" 
        :disabled="!isFormValid"
        data-bs-target="#orderModal">
        Add Order
    </button>
    <!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 1250px;">
    <div class=" modal-content" style="height: 600px">

      <div class="modal-header">
        <h5 class="modal-title">Add Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>

      <div class="container">
   
        <!-- Categories -->
        <div class="categories">
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
        <div class="product-card" v-for="p in filteredProducts" :key="p.sku">
            <img :src="p.image" :alt="p.name">
            <div class="product-body">
                <h4>@{{ p.name }}</h4>
                <p>@{{ p.description }}</p>
                <button @click="addToOrder(p)">Add to Order - ₱@{{ p.amount }}</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
        </div>
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
        products: [
            { sku: "B1", name: "Beef Steak", description: "Juicy grilled steak.", amount: 250, category: "BEEF", image: "https://via.placeholder.com/300x200?text=Beef" },
            { sku: "P1", name: "Pork Chop", description: "Tender pork chop.", amount: 180, category: "PORK", image: "/images/products/porkchop.jpg" },
            { sku: "C1", name: "Fried Chicken", description: "Crispy golden chicken.", amount: 150, category: "CHICKEN", image: "https://via.placeholder.com/300x200?text=Chicken" },
            { sku: "S1", name: "Garlic Shrimp", description: "Fresh shrimp sautéed in garlic.", amount: 300, category: "SEAFOODS", image: "https://via.placeholder.com/300x200?text=Seafood" }
        ],
        orderDetails: []
    },
    computed: {
        filteredProducts() {
            return this.products.filter(p => p.category === this.selectedCategory);
        },
        isFormValid() {
            return this.selectedWaiter && this.pax && this.tableNo;
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
        }
    }
});
</script>
@endsection