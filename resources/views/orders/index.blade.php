@extends('layouts.app')
@section('content')
    <style>
        .container { display: flex; gap: 20px; }
        .categories {
    display: flex;
    flex-direction: column;   /* Stack vertically */
    max-height: 300px;        /* Set height for scroll area */
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
    </style>
<div id="app">
    <h2>Order Entry</h2>
    <!-- Order Header -->
    <div class="order-header">
        <p><label>Order No:</label> @{{ orderNo }}</p>
        <p><label>Date:</label> @{{ date }}</p>
        <p>
            <label>Waiter:</label>
            <select v-model="waiter">
                <option v-for="w in waiters" :key="w.id" :value="w.id">@{{ w.name }}</option>
            </select>
        </p>
        <p>
            <label>Status:</label>
            <select v-model="status">
                <option>Pending</option>
                <option>Served</option>
                <option>Paid</option>
                <option>Cancelled</option>
            </select>
        </p>
        <p>
            <label>No. of Pax:</label>
            <input type="number" v-model.number="pax" min="1">
        </p>
        <p>
            <label>Table No:</label>
            <input type="text" v-model="tableNo">
        </p>
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

    <!-- Order Details -->
    <h3>Order Details</h3>
    <table>
        <thead>
        <tr>
            <th>SKU</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Amount</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in orderDetails" :key="item.sku">
            <td>@{{ item.sku }}</td>
            <td>@{{ item.name }}</td>
            <td><input type="number" v-model.number="item.qty" min="1"></td>
            <td>@{{ item.amount }}</td>
            <td>@{{ item.qty * item.amount }}</td>
        </tr>
        </tbody>
    </table>
</div>

<script>
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