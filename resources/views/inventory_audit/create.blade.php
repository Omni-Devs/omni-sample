@extends('layouts.app')
@section('content')
<style>
.sortable {
  user-select: none;
}
.sortable span {
  display: inline-flex;
  align-items: center;
  gap: 4px;
}
</style>
<div class="main-content" id="app">
   <div>
      <div class="breadcrumb">
         <h1 class="mr-3">Inventory</h1>
         <ul>
            <li><a href=""> Create Audit Form</a></li>
            <!----> <!---->
         </ul>
         <div class="breadcrumb-action"></div>
      </div>
      <div class="separator-breadcrumb border-top"></div>
   </div>
   <div class="wrapper">
      <div class="card-body">
         <span>
            <div class="row">
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <span>
                     <fieldset class="form-group" id="__BVID__329">
                        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__329__BV_label_">Reference # *</legend>
                        <div>
                           <input type="text" placeholder="Enter Reference #" class="form-control" aria-describedby="ReferenceNo-feedback" label="ReferenceNo" id="__BVID__330"> 
                           <div id="ReferenceNo-feedback" class="invalid-feedback"></div>
                           <!----><!----><!---->
                        </div>
                     </fieldset>
                  </span>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <span>
                     <fieldset class="form-group">
                        <legend class="col-form-label pt-0">Date and Time of Entry</legend>
                        <div>
                           <div class="d-flex align-items-center">
                              <div class="vue-daterange-picker form-control reportrange-text">
                                 @{{ formattedNow }}
                              </div>
                              <button type="button" class="btn ml-2 btn-secondary btn-sm" @click="clearDate">
                              Clear
                              </button>
                           </div>
                           <small class="form-text text-muted">
                           Edit the Date/Time if you want to backdate this transaction, if not, please leave it blank so that the transaction will be recorded real time.
                           </small>
                        </div>
                     </fieldset>
                  </span>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <span>
                     <fieldset class="form-group" id="__BVID__336">
                        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__336__BV_label_">Date and Time of Audit *</legend>
                        <div>
                           <div class="d-flex">
                              <div data-v-1ebd09d2="" class="vue-daterange-picker">
                                 <div data-v-1ebd09d2="" class="form-control reportrange-text">
                                    --
                                 </div>
                              </div>
                              <button type="button" class="btn ml-2 btn-secondary btn-sm">
                              Clear
                              </button>
                           </div>
                           <div id="DateAndTimeofAudit-feedback" class="invalid-feedback"></div>
                           <!----><!----><!---->
                        </div>
                     </fieldset>
                  </span>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <span>
                     <fieldset class="form-group">
                        <legend class="col-form-label pt-0">Audited by *</legend>
                        <div>
                           <v-select
                              :options="users"
                              label="name"
                              :reduce="user => user.id"
                              v-model="selectedAuditor"
                              placeholder="Select Audited by"
                              ></v-select>
                           <div id="AuditedBy-feedback" class="invalid-feedback"></div>
                        </div>
                     </fieldset>
                  </span>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <span>
                     <fieldset class="form-group">
                        <legend class="col-form-label pt-0">Type *</legend>
                        <v-select
                           v-model="selectedType"
                           :options="auditTypeOptions"
                           :clearable="true"
                           placeholder="Select type"
                           label="label"
                           ></v-select>
                     </fieldset>
                  </span>
               </div>
               <!-- 🔹 List of items -->
               <div class="col-sm-12">
                  <div class="list-group mt-2">
                     <div class="list-group-item d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 font-weight-bold">List of Items to Audit</h6>
                        <button type="button" class="btn btn-primary btn-sm">Filter</button>
                     </div>
                     <div class="list-group-item">
                        <div class="vgt-responsive">
                           <table id="vgt-table" class="table-hover tableOne vgt-table ">
                              <colgroup>
                                 <col id="col-0">
                                 <col id="col-1">
                                 <col id="col-2">
                                 <col id="col-3">
                                 <col id="col-4">
                                 <col id="col-5">
                              </colgroup>
                              <thead>
                                 <tr>
                                    <th>
                                    <input
                                        type="checkbox"
                                        v-model="selectAll"
                                        @change="toggleAll"
                                    />
                                    </th>

                                    <!-- Name -->
                                    <th
                                       scope="col"
                                       class="vgt-left-align text-left sortable"
                                       :aria-sort="currentSort === 'name' ? currentSortDir : 'none'"
                                       style="cursor: pointer;"
                                       @click="sortTable('name')"
                                       >
                                       <span>Name</span>
                                       <i
                                          :class="[
                                          'fa',
                                          currentSort === 'name'
                                          ? (currentSortDir === 'asc' ? 'fa-sort-up' : 'fa-sort-down')
                                          : 'fa-sort'
                                          ]"
                                          class="ml-1"
                                          ></i>
                                       <button class="sr-only">
                                       Sort table by Name in @{{ currentSort === 'name' && currentSortDir === 'asc' ? 'descending' : 'ascending' }} order
                                       </button>
                                    </th>
                                    <!-- SKU (Code) -->
                                    <th
                                       scope="col"
                                       class="vgt-left-align text-left sortable"
                                       :aria-sort="currentSort === 'code' ? currentSortDir : 'none'"
                                       style="cursor: pointer;"
                                       @click="sortTable('code')"
                                       >
                                       <span>SKU (Code)</span>
                                       <i
                                          :class="[
                                          'fa',
                                          currentSort === 'code'
                                          ? (currentSortDir === 'asc' ? 'fa-sort-up' : 'fa-sort-down')
                                          : 'fa-sort'
                                          ]"
                                          class="ml-1"
                                          ></i>
                                       <button class="sr-only">
                                       Sort table by SKU in @{{ currentSort === 'code' && currentSortDir === 'asc' ? 'descending' : 'ascending' }} order
                                       </button>
                                    </th>
                                    <!-- Category -->
                                    <th
                                       scope="col"
                                       class="vgt-left-align text-left sortable"
                                       :aria-sort="currentSort === 'category' ? currentSortDir : 'none'"
                                       style="cursor: pointer;"
                                       @click="sortTable('category')"
                                       >
                                       <span>Category</span>
                                       <i
                                          :class="[
                                          'fa',
                                          currentSort === 'category'
                                          ? (currentSortDir === 'asc' ? 'fa-sort-up' : 'fa-sort-down')
                                          : 'fa-sort'
                                          ]"
                                          class="ml-1"
                                          ></i>
                                       <button class="sr-only">
                                       Sort table by Category in @{{ currentSort === 'category' && currentSortDir === 'asc' ? 'descending' : 'ascending' }} order
                                       </button>
                                    </th>
                                    <!-- Subcategory -->
                                    <th
                                       scope="col"
                                       class="vgt-left-align text-left sortable"
                                       :aria-sort="currentSort === 'subcategory' ? currentSortDir : 'none'"
                                       style="cursor: pointer;"
                                       @click="sortTable('subcategory')"
                                       >
                                       <span>Subcategory</span>
                                       <i
                                          :class="[
                                          'fa',
                                          currentSort === 'subcategory'
                                          ? (currentSortDir === 'asc' ? 'fa-sort-up' : 'fa-sort-down')
                                          : 'fa-sort'
                                          ]"
                                          class="ml-1"
                                          ></i>
                                       <button class="sr-only">
                                       Sort table by Subcategory in @{{ currentSort === 'subcategory' && currentSortDir === 'asc' ? 'descending' : 'ascending' }} order
                                       </button>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr v-for="product in sortedData" :key="product.id">
                                    <td><input type="checkbox" v-model="selected" :value="product.id"></td>
                                    <td>@{{ product.name }}</td>
                                    <td>@{{ product.code }}</td>
                                    <td>@{{ product.category ? product.category.name : 'N/A' }}</td>
                                    <td>@{{ product.subcategory ? product.subcategory.name : 'N/A' }}</td>
                                 </tr>
                                 <tr v-if="!products.length">
                                    <td colspan="6" class="text-center text-muted">No products found</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12">
  <div class="list-group mt-4">
    <div class="list-group-item">
      <h6 class="mb-0 font-weight-bold">
        Enter Quantity of Audited Items Here
      </h6>
    </div>
    <div class="list-group-item">
      <div class="vgt-wrap">
        <div class="vgt-inner-wrap">
          <div class="vgt-fixed-header"></div>
          <div class="vgt-responsive">
            <table id="vgt-table" class="table-hover tableOne vgt-table">
              <colgroup>
                <col id="col-0">
                <col id="col-1">
                <col id="col-2">
                <col id="col-3">
                <col id="col-4">
              </colgroup>
              <thead>
                <tr>
                  <th scope="col" class="vgt-left-align"><span>Name</span></th>
                  <th scope="col" class="vgt-left-align sortable"><span>SKU (Product Code)</span></th>
                  <th scope="col" class="vgt-left-align"><span>Category</span></th>
                  <th scope="col" class="vgt-left-align"><span>Subcategory</span></th>
                  <th scope="col" class="vgt-left-align"><span>Enter Quantity of Item Here</span></th>
                  <th scope="col" class="vgt-left-align text-right"><span>Action</span></th>
                </tr>
              </thead>
              <tbody>
                <!-- Show selected products -->
                <tr v-if="selectedProducts.length === 0">
                  <td colspan="6" class="text-center">No Selected Items</td>
                </tr>
                <tr v-for="product in selectedProducts" :key="product.id">
                  <td>@{{ product.name }}</td>
                  <td>@{{ product.code }}</td>
                  <td>@{{ product.category ? product.category.name : 'N/A' }}</td>
                  <td>@{{ product.subcategory ? product.subcategory.name : 'N/A' }}</td>
                  <td>
                    <div style="width: 200px;">
                        <div role="group" class="input-group input-group-sm">
                            <!-- Decrement button -->
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary" @click="decrementQuantity(product)">
                                -
                                </button>
                            </div>

                            <!-- Quantity input -->
                            <input type="number"
                                    step="0.01"
                                    class="form-control"
                                    v-model.number="product.quantity"
                                    min="0">

                            <!-- Increment button -->
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" @click="incrementQuantity(product)">
                                +
                                </button>
                            </div>
                        </div>
                    </div>
                  </td>
                  <!-- Action column -->
                    <td class="vgt-left-align text-right">
                        <div role="group" class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-danger" @click="removeProduct(product)">Remove</button>
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

            </div>
         </span>
      </div>
   </div>
</div>
<script>
Vue.component('v-select', VueSelect.VueSelect);

new Vue({
  el: '#app', // adjust based on your root element
  data() {
    return {
      currentDateTime: new Date(),
      selectedType: 'Products', // default selection
      auditTypeOptions: [
        { label: 'Products', value: 'products' },
        { label: 'Components', value: 'components' },
        { label: 'Consumables/Engineering', value: 'consumables' },
        { label: 'Assets', value: 'assets' },
      ],
      users: @json($users),
      selectedAuditor: null,
      products: @json($products).map(p => ({ ...p, quantity: 0 })),
      selected: [],
      selectAll: false,
      currentSort: '',
      currentSortDir: 'asc',
    };
},
  computed: {
    formattedNow() {
      return this.currentDateTime.toLocaleString('en-PH', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
      });
    },
   sortedData() {
    if (!this.currentSort) return this.products;
    return [...this.products].sort((a, b) => {
        let modifier = this.currentSortDir === 'asc' ? 1 : -1;

        // Extract the comparable values
        let valA = a[this.currentSort];
        let valB = b[this.currentSort];

        // If they are objects (e.g., have a `name` property), compare by name
        if (valA && typeof valA === 'object') valA = valA.name;
        if (valB && typeof valB === 'object') valB = valB.name;

        // Normalize to lowercase strings for consistent sorting
        valA = valA ? valA.toString().toLowerCase() : '';
        valB = valB ? valB.toString().toLowerCase() : '';

        if (valA < valB) return -1 * modifier;
        if (valA > valB) return 1 * modifier;
        return 0;
    });
    },
    selectedProducts() {
    return this.products.filter(p => this.selected.includes(p.id));
  },
  },
  methods: {
    clearDate() {
      this.currentDateTime = null;
    },
    toggleAll() {
      if (this.selectAll) {
         this.selected = this.sortedData.map(p => p.id);
      } else {
        this.selected = [];
      }
    },
    sortTable(column) {
  if (this.currentSort === column) {
    this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
  } else {
    this.currentSort = column;
    this.currentSortDir = 'asc';
  }
},
 incrementQuantity(product) {
    product.quantity = parseFloat(product.quantity) + 1;
  },
  decrementQuantity(product) {
    product.quantity = parseFloat(product.quantity) - 1;
    if (product.quantity < 0) product.quantity = 0;
  },
  removeProduct(product) {
    // Remove product ID from selected array
    this.selected = this.selected.filter(id => id !== product.id);
    // Optional: reset quantity
    product.quantity = 0;
  },
  },
  mounted() {
    // automatically set current datetime on mount
    this.currentDateTime = new Date();
  },
  watch: {
    selectedAuditor(newVal) {
      console.log('Selected user ID:', newVal);
    }
 }
});

</script>
@endsection