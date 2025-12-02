@extends('layouts.app')

@section('content')
<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">
                {{ $mode === 'edit' ? 'Edit Accounts Receivable' : 'Create Accounts Receivable' }}
            </h1>
            <ul>
                <li><a href="/accounts-receivable">Accounting</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

    <div class="wrapper">
        <div class="row">

            <!-- STEP 1: Basic Information -->
            <div class="px-xl-1 col-lg-6 col-xl-3">
                <div class="list-group h-100">
                    <div class="list-group-item h-100 mb-3"
                         :style="{ opacity: step1Locked ? 0.7 : 1, pointerEvents: step1Locked ? 'none' : 'auto' }">
                        <p><span class="t-font-boldest">Step 1: Basic Information</span></p>

                        <!-- Transaction Date/Time -->
                        <fieldset class="form-group">
                            <legend class="col-form-label pt-0">Date And Time of Transaction *</legend>
                            <div class="d-flex">
                                <input type="text" class="form-control" id="transaction_datetime"
                                       v-model="form.transaction_datetime" :disabled="step1Locked"
                                       placeholder="Select date & time" readonly>
                                <button type="button" class="btn btn-secondary btn-sm ml-2" @click="clearDate">
                                    Clear
                                </button>
                            </div>
                            <small class="form-text text-muted">
                                Cannot select future date. Edit to backdate.
                            </small>
                        </fieldset>

                        <!-- Reference # -->
                        <fieldset class="form-group">
                            <legend class="col-form-label pt-0">Reference #</legend>
                            <div>
                                <input type="text" 
                                    class="form-control" 
                                    v-model="form.reference_no"
                                    :disabled="true"
                                    placeholder="Auto-generated">
                                <small class="text-muted">Auto-generated per branch (e.g., AR-15-00001)</small>
                            </div>
                        </fieldset>

                        <!-- Payor Details -->
                        <fieldset class="form-group mt-3">
                            <legend class="col-form-label pt-0">Payor Details *</legend>
                            <div>
                                <input type="text" class="form-control" v-model="form.payor_name"
                                       :disabled="step1Locked" placeholder="Enter Name">
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div>
                                <input type="text" class="form-control" v-model="form.company"
                                       :disabled="step1Locked" placeholder="Company">
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div>
                                <input type="text" class="form-control" v-model="form.address"
                                       :disabled="step1Locked" placeholder="Address">
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div>
                                <input type="text" class="form-control" v-model="form.mobile_no"
                                       :disabled="step1Locked" placeholder="Mobile #">
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div>
                                <input type="text" class="form-control" v-model="form.email"
                                       :disabled="step1Locked" placeholder="Email Address">
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <div>
                                <input type="text" class="form-control" v-model="form.tin"
                                       :disabled="step1Locked" placeholder="TIN">
                            </div>
                        </fieldset>

                        <!-- Payee Details -->
                        <fieldset class="form-group mt-3">
                            <legend class="col-form-label pt-0">Payee Details *</legend>
                            <div>
                                <input type="text" class="form-control" v-model="form.payee_details"
                                       :disabled="step1Locked" placeholder="Enter Payee Details">
                            </div>
                        </fieldset>

                        <!-- Due Date -->
                        <fieldset class="form-group mt-3">
                            <legend class="col-form-label pt-0">Set Due Date *</legend>
                            <div>
                                <input type="text" id="due_date" class="form-control"
                                       v-model="form.due_date" :disabled="step1Locked"
                                       placeholder="Select Date Here" readonly>
                            </div>
                        </fieldset>

                        <!-- Proceed / Edit Button -->
                        <div class="mt-3" :style="{ pointerEvents: 'auto' }">
                            <button v-if="!step1Locked" class="btn btn-success"
                                    :disabled="!isStep1Complete" @click="lockStep1">
                                Proceed to Step 2
                            </button>
                            <button v-else class="btn btn-warning" @click="editStep1">
                                Edit Step 1
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Particulars -->
            <div class="px-xl-1 col-lg-6 col-xl-3">
                <div class="list-group h-100">
                    <div class="list-group-item h-100 mb-3"
                         :style="{ opacity: step2Opacity, pointerEvents: step2Enabled ? 'auto' : 'none' }">
                        <div class="h-100 d-flex flex-column">
                            <p><span class="t-font-boldest">Step 2: Particulars</span></p>

                            <fieldset class="form-group">
                                <legend class="bv-no-focus-ring col-form-label pt-0">Category *</legend>
                                <div>
                                    <select class="form-control" v-model="form.category" :disabled="!step2Enabled">
                                        <option value="" disabled hidden>Select Category</option>
                                        <option v-for="c in categories" :key="c.id" :value="c.name">@{{ c.name }}</option>
                                    </select>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <legend class="bv-no-focus-ring col-form-label pt-0">Type *</legend>
                                <div>
                                    <select class="form-control" v-model="form.type_id" :disabled="!step2Enabled">
                                        <option value="" disabled hidden>Select Type</option>
                                        <option v-for="t in types" :key="t.id" :value="t.id">@{{ t.name }}</option>
                                    </select>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <legend class="bv-no-focus-ring col-form-label pt-0">Description *</legend>
                                <div>
                                    <textarea rows="3" class="form-control" v-model="form.description"
                                              :disabled="!step2Enabled" placeholder="Enter Description here"></textarea>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <legend class="bv-no-focus-ring col-form-label pt-0">Mode *</legend>
                                <div>
                                    <div role="radiogroup" class="d-flex gap-4">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="mode_regular" value="Regular"
                                                   class="custom-control-input" v-model="form.mode" :disabled="!step2Enabled">
                                            <label class="custom-control-label" for="mode_regular">Regular</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="mode_recurring" value="Recurring"
                                                   class="custom-control-input" v-model="form.mode" :disabled="!step2Enabled">
                                            <label class="custom-control-label" for="mode_recurring">Recurring</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <legend class="bv-no-focus-ring col-form-label pt-0">Quantity *</legend>
                                <div>
                                    <input type="number" class="form-control" v-model.number="form.quantity"
                                           :disabled="!step2Enabled" min="1">
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <legend class="bv-no-focus-ring col-form-label pt-0">Tax</legend>
                                <div>
                                    <select class="form-control" v-model="form.tax" :disabled="!step2Enabled">
                                        <option value="VAT">VAT</option>
                                        <option value="NON-VAT">NON-VAT</option>
                                        <option value="ZERO-RATED">Zero Rated</option>
                                    </select>
                                </div>
                            </fieldset>

                            <fieldset class="form-group mb-3">
                                <legend class="bv-no-focus-ring col-form-label pt-0">Amount per Unit *</legend>
                                <div>
                                    <input type="number" step="0.01" class="form-control"
                                           v-model.number="form.amount_per_unit" :disabled="!step2Enabled">
                                </div>
                            </fieldset>

                            <div class="mt-auto">
                                <button class="btn btn-info" @click.prevent="addSummary"
                                        :disabled="!step2Enabled || !isStep2Valid">
                                    Add to Summary
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Summary -->
            <div class="px-xl-1 col-lg-12 col-xl-6">
                <div class="list-group h-100">
                    <div class="list-group-item h-100 mb-3">
                        <div class="h-100 d-flex flex-column">
                            <p><span class="t-font-boldest">Step 3: Summary</span></p>

                            <div class="table-responsive flex-grow-1">
                                <table class="table table-hover tableOne">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Sub-Total</th>
                                            <th>Tax</th>
                                            <th>Total</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="!summaryList.length">
                                            <td colspan="8" class="text-center text-muted">No items added</td>
                                        </tr>
                                        <tr v-for="(item, index) in summaryList" :key="index">
                                            <td>@{{ item.category }}</td>
                                            <td>@{{ item.type_name }}</td>
                                            <td>@{{ item.description }}</td>
                                            <td>@{{ item.quantity }}</td>
                                            <td>₱@{{ item.subtotal.toFixed(2) }}</td>
                                            <td>₱@{{ item.tax_amount.toFixed(2) }}</td>
                                            <td>₱@{{ item.total.toFixed(2) }}</td>
                                            <td class="text-right">
                                                <button class="btn btn-sm btn-danger"
                                                        @click="removeSummary(index)">Remove</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3">
                                <div class="offset-md-6 col-md-6">
                                    <table class="table table-sm table-bordered">
                                        <tr>
                                            <td class="font-weight-bold">Sub-Total</td>
                                            <td>@{{ formatSubTotal }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Tax</td>
                                            <td>@{{ formatTax }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Total Amount</td>
                                            <td class="font-weight-bold">@{{ formatTotalAmount }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-auto d-flex gap-2">
                                <button class="btn btn-primary" @click="submitReceivable"
                                        :disabled="isSubmitting">
                                    <i class="i-Yes mr-1"></i>
                                    {{ $mode === 'edit' ? 'Update' : 'Submit' }}
                                </button>
                                <a href="/accounts-receivable" class="btn btn-outline-secondary ml-4">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new Vue({
        el: '#app',
        data() {
            return {
                mode: '{{ $mode ?? "create" }}',
                receivable: @json($receivable ?? null),

                categories: [],
                types: [],
                summaryList: [],

                step1Locked: false,
                isSubmitting: false,

                form: {
                    transaction_datetime: "",
                    reference_no: "",
                    payor_name: "",
                    company: "",
                    address: "",
                    mobile_no: "",
                    email: "",
                    tin: "",
                    payee_details: "",
                    due_date: "",

                    category: "",
                    type_id: null,
                    type_name: "",
                    description: "",
                    mode: "Regular",
                    quantity: 1,
                    amount_per_unit: 0,
                    tax: "VAT"
                }
            }
        },

        computed: {
            isStep1Complete() {
                return this.form.reference_no &&
                       this.form.payor_name &&
                       this.form.transaction_datetime &&
                       this.form.due_date &&
                       this.form.payee_details;
            },
            step2Enabled() {
                return this.step1Locked;
            },
            step2Opacity() {
                return this.step2Enabled ? 1 : 0.6;
            },
            isStep2Valid() {
                return this.form.category &&
                       this.form.type_id &&
                       this.form.description &&
                       this.form.quantity > 0 &&
                       this.form.amount_per_unit > 0;
            },
            subTotal() {
                return this.summaryList.reduce((sum, i) => sum + i.subtotal, 0);
            },
            totalTax() {
                return this.summaryList.reduce((sum, i) => sum + i.tax_amount, 0);
            },
            totalAmount() {
                return this.subTotal + this.totalTax;
            },
            formatSubTotal() {
                return '₱' + this.subTotal.toLocaleString('en-US', { minimumFractionDigits: 2 });
            },
            formatTax() {
                return '₱' + this.totalTax.toLocaleString('en-US', { minimumFractionDigits: 2 });
            },
            formatTotalAmount() {
                return '₱' + this.totalAmount.toLocaleString('en-US', { minimumFractionDigits: 2 });
            }
        },

        watch: {
            'form.category'(val) {
                if (val) this.fetchTypes(val);
                else this.types = [];
            }
        },

       mounted() {
            this.fetchCategories();
            this.initDatePickers();

            // Get the final AR number directly from Laravel (passed from controller)
            const finalReferenceNo = "{{ $next_reference_no ?? '' }}".trim();

            // Log it clearly
            console.log('Current Branch ID:', {{ $current_branch_id ?? 'null' }});
            console.log('Final Reference Number:', finalReferenceNo || 'Not generated yet');

            // Set it in Vue form (so v-model works)
            this.form.reference_no = finalReferenceNo;

            // Optional: extra debug
            if (finalReferenceNo) {
                console.log('AR Number Ready →', finalReferenceNo);
            } else {
                console.warn('No AR number! Check if user has a branch assigned.');
            }

            if (this.mode === 'edit' && this.receivable) {
                this.loadEditData();
            }
        },

        methods: {
            initDatePickers() {
                const vm = this;
                const today = moment();

                $('#transaction_datetime').daterangepicker({
                    singleDatePicker: true,
                    timePicker: true,
                    timePicker24Hour: true,
                    maxDate: today,
                    locale: { format: 'YYYY-MM-DD HH:mm:ss' }
                }).on('apply.daterangepicker', (ev, picker) => {
                    vm.form.transaction_datetime = picker.startDate.format('YYYY-MM-DD HH:mm:ss');
                });

                $('#due_date').daterangepicker({
                    singleDatePicker: true,
                    minDate: today,
                    locale: { format: 'YYYY-MM-DD' }
                }).on('apply.daterangepicker', (ev, picker) => {
                    vm.form.due_date = picker.startDate.format('YYYY-MM-DD');
                });
            },

            clearDate() {
                this.form.transaction_datetime = "";
                $('#transaction_datetime').val("");
            },

            lockStep1() {
                if (this.isStep1Complete) this.step1Locked = true;
            },

            editStep1() {
                this.step1Locked = false;
            },

            fetchCategories() {
                axios.get('/api/receivable/categories').then(res => {
                    this.categories = res.data;
                });
            },

            fetchTypes(category) {
                axios.get('/api/receivable/types', { params: { category } }).then(res => {
                    this.types = res.data;
                });
            },

            addSummary() {
                if (!this.isStep2Valid) return;

                const type = this.types.find(t => t.id == this.form.type_id);
                const qty = Number(this.form.quantity);
                const price = Number(this.form.amount_per_unit);
                const taxRate = this.form.tax === 'VAT' ? 0.12 : 0;
                const subtotal = qty * price;
                const tax_amount = subtotal * taxRate;
                const total = subtotal + tax_amount;

                this.summaryList.push({
                    category: this.form.category,
                    type_name: type ? type.name : '',
                    type_id: this.form.type_id,
                    description: this.form.description,
                    quantity: qty,
                    unit_price: price,
                    tax: this.form.tax,
                    tax_amount,
                    subtotal,
                    total
                });

                this.form.category = "";
                this.form.type_id = null;
                this.form.description = "";
                this.form.quantity = 1;
                this.form.amount_per_unit = 0;
            },

            removeSummary(index) {
                this.summaryList.splice(index, 1);
            },

            loadEditData() {
                const r = this.receivable;

                this.form = {
                    ...this.form,
                    transaction_datetime: r.transaction_datetime,
                    reference_no: r.reference_no,
                    payor_name: r.payor_name,
                    company: r.company || "",
                    address: r.address || "",
                    mobile_no: r.mobile_no || "",
                    email: r.email || "",
                    tin: r.tin || "",
                    payee_details: r.payee_details,
                    due_date: r.due_date,
                };

                // Keep it disabled always
                this.$nextTick(() => {
                    if (this.$refs.referenceInput) {
                        this.$refs.referenceInput.disabled = true;
                    }
                });

                this.summaryList = (r.items || []).map(item => {
                    const type = item.type || {};
                    return {
                        category: type.category_receivable || 'Unknown Category',
                        type_name: type.type_receivable || 'Unknown Type',
                        type_id: item.type_id,
                        description: item.description || '',
                        quantity: Number(item.qty) || 0,
                        unit_price: Number(item.unit_price) || 0,
                        tax: item.tax_amount > 0 ? 'VAT' : 'NON-VAT',
                        tax_amount: Number(item.tax_amount) || 0,
                        subtotal: Number(item.sub_total) || 0,
                        total: Number(item.total_amount) || 0
                    };
                });

                if (this.summaryList.length > 0) {
                    this.step1Locked = true;
                }

                setTimeout(() => {
                    $('#transaction_datetime').val(r.transaction_datetime);
                    $('#due_date').val(r.due_date);
                }, 100);
            },

            async submitReceivable() {
                if (!this.isStep1Complete || this.summaryList.length === 0) {
                    Swal.fire('Error', 'Please complete all steps', 'error');
                    return;
                }

                this.isSubmitting = true;

                const payload = {
                    ...this.form,
                    items: this.summaryList.map(i => ({
                        type_id: i.type_id,
                        description: i.description,
                        qty: i.quantity,
                        unit_price: i.unit_price,
                        tax: i.tax,
                        tax_amount: i.tax_amount,
                        sub_total: i.subtotal,
                        total_amount: i.total
                    })),
                    sub_total: this.subTotal,
                    total_tax: this.totalTax,
                    total_amount: this.totalAmount
                };

                const url = this.mode === 'edit'
                    ? `/accounts-receivable/${this.receivable.id}/update`
                    : '/accounts-receivable/store';

                try {
                    await axios.post(url, payload);
                    Swal.fire('Success!', 'Accounts Receivable saved.', 'success');
                    setTimeout(() => location.href = '/accounts-receivable', 1500);
                } catch (err) {
                    const msg = err.response?.data?.message || 'Failed to save';
                    Swal.fire('Error', msg, 'error');
                } finally {
                    this.isSubmitting = false;
                }
            }
        }
    });
</script>
@endsection