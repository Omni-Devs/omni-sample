@extends('layouts.app')
@section('content')
<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Create Accounts Receivable</h1>
            <ul>
                <li><a href="">Accounting</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="px-xl-1 col-lg-6 col-xl-3">
                <div class="list-group h-100">
                    <div class="list-group-item h-100 mb-3" :style="{ opacity: step1Locked ? 0.7 : 1, pointerEvents: step1Locked ? 'none' : 'auto' }">
                        <span>
                            <div>
                                <p><span class="t-font-boldest">Step 1: Basic Information</span></p>

                                <fieldset class="form-group" id="__BVID__576">
                                    <legend class="col-form-label pt-0" id="__BVID__576__BV_label_">Date And Time of Transaction</legend>
                                    <div>
                                        <div class="d-flex">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="transaction_datetime"
                                                v-model="form.transaction_datetime"
                                                :disabled="step1Locked"
                                                placeholder="Select date & time"
                                                readonly
                                            >

                                            <button
                                                type="button"
                                                class="btn btn-secondary btn-sm ml-2"
                                                @click="clearDate"
                                            >
                                                Clear
                                            </button>
                                        </div>

                                        <small class="form-text text-muted">
                                            Edit the Date/Time if you want to backdate this transaction.
                                            You cannot select a future date.
                                        </small>

                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__580">
                                    <legend class="col-form-label pt-0" id="__BVID__580__BV_label_">Reference # *</legend>
                                    <div>
                                        <input type="text" placeholder="Enter Reference #"
                                                class="form-control is-valid"
                                                aria-describedby="ReferenceNo-feedback"
                                                v-model="form.reference_no"
                                                :disabled="step1Locked"
                                                id="__BVID__581">

                                        <div id="ReferenceNo-feedback" class="invalid-feedback"></div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group mt-3" id="__BVID__583">
                                    <legend class="col-form-label pt-0" id="__BVID__583__BV_label_">Payor Details *</legend>
                                    <div>
                                        <input type="text" placeholder="Enter Name"
                                                class="form-control"
                                                aria-describedby="Payor_Details-feedback"
                                                v-model="form.payor_name"
                                                :disabled="step1Locked"
                                                id="__BVID__584">

                                        <div id="Payor_Details-feedback" class="invalid-feedback"></div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__585">
                                    <div>
                                        <input type="text" placeholder="Company"
                                                class="form-control"
                                                aria-describedby="Company-feedback"
                                                v-model="form.company"
                                                :disabled="step1Locked"
                                                id="__BVID__586">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__587">
                                    <div>
                                        <input type="text" placeholder="Address"
                                                class="form-control"
                                                aria-describedby="Address-feedback"
                                                v-model="form.address"
                                                :disabled="step1Locked"
                                                id="__BVID__588">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__589">
                                    <div>
                                        <input type="text" placeholder="Mobile #"
                                                class="form-control"
                                                aria-describedby="MobileNo-feedback"
                                                v-model="form.mobile_no"
                                                :disabled="step1Locked"
                                                id="__BVID__590">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__591">
                                    <div>
                                        <input type="text" placeholder="Email Address"
                                                class="form-control"
                                                aria-describedby="Email_Address-feedback"
                                                v-model="form.email"
                                                :disabled="step1Locked"
                                                id="__BVID__592">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__593">
                                    <div>
                                        <input type="text" placeholder="TIN"
                                                class="form-control"
                                                aria-describedby="TIN-feedback"
                                                v-model="form.tin"
                                                :disabled="step1Locked"
                                                id="__BVID__594">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group mt-3 mb-3" id="__BVID__596">
                                    <legend class="col-form-label pt-0" id="__BVID__596__BV_label_">Payee Details *</legend>
                                    <div>
                                        <input type="text" placeholder="Enter Payee Details"
                                                class="form-control"
                                                aria-describedby="Payee_Details-feedback"
                                                v-model="form.payee_details"
                                                :disabled="step1Locked"
                                                id="__BVID__597">

                                        <div id="Payee_Details-feedback" class="invalid-feedback"></div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group mt-3" id="__BVID__599">
                                    <legend class="col-form-label pt-0" id="__BVID__599__BV_label_">Set Due Date *</legend>

                                    <div>
                                        <input type="text"
                                                id="due_date"
                                                placeholder="Select Date Here"
                                                class="form-control"
                                                v-model="form.due_date"
                                                :disabled="step1Locked"
                                                readonly>

                                        <div id="Due_Date-feedback" class="invalid-feedback"></div>
                                    </div>
                                </fieldset>
                            </div>
                        </span>
                        <!-- PROCEED / EDIT BUTTON -->
                        <div class="mt-3" :style="{ pointerEvents: 'auto' }">
                            <button
                                type="button"
                                class="btn btn-success"
                                v-if="!step1Locked"
                                :disabled="!isStep1Complete"
                                @click="lockStep1"
                            >
                                Proceed to Step 2
                            </button>

                            <button
                                type="button"
                                class="btn btn-warning"
                                v-else
                                @click="editStep1"
                            >
                                Edit Step 1
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-xl-1 col-lg-6 col-xl-3">
                <div class="list-group h-100">
                    <div class="list-group-item h-100 mb-3" :style="{ opacity: step2Opacity, pointerEvents: step2Enabled ? 'auto' : 'none' }">
                        <span>
                           <div class="h-100 d-flex flex-column">
                                <p><span class="t-font-boldest">Step 2: Particulars</span></p>

                                <!-- CATEGORY -->
                                <fieldset class="form-group">
                                    <legend class="bv-no-focus-ring col-form-label pt-0">Category *</legend>
                                    <div>
                                        <select class="form-control" v-model="form.category" :disabled="!step2Enabled">
                                            <option value="" disabled hidden>Select Category</option>
                                            <option v-for="c in categories" :key="c.id" :value="c.name">@{{ c.name }}</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <!-- TYPE -->
                                <fieldset class="form-group">
                                    <legend class="bv-no-focus-ring col-form-label pt-0">Type *</legend>
                                    <div>
                                        <select class="form-control" v-model="form.type_id" :disabled="!step2Enabled">
                                            <option value="" disabled hidden>Select Type</option>
                                            <option v-for="t in types" :key="t.id" :value="t.id">@{{ t.name }}</option>
                                        </select>
                                    </div>
                                </fieldset>


                                <!-- DESCRIPTION -->
                                <fieldset class="form-group">
                                    <legend class="bv-no-focus-ring col-form-label pt-0">Description *</legend>
                                    <div>
                                        <textarea rows="3"
                                            placeholder="Enter Description here"
                                            class="form-control"
                                            v-model="form.description"
                                            :disabled="!step2Enabled">
                                        </textarea>
                                    </div>
                                </fieldset>

                                <!-- MODE (RADIO BUTTONS) -->
                                <fieldset class="form-group">
                                    <legend class="bv-no-focus-ring col-form-label pt-0">Mode *</legend>
                                    <div>
                                        <div role="radiogroup">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input"
                                                    id="mode_regular"
                                                    value="Regular"
                                                    v-model="form.mode"
                                                    :disabled="!step2Enabled">
                                                <label class="custom-control-label" for="mode_regular">Regular</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input"
                                                    id="mode_recurring"
                                                    value="Recurring"
                                                    v-model="form.mode"
                                                    :disabled="!step2Enabled">
                                                <label class="custom-control-label" for="mode_recurring">Recurring</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- QUANTITY -->
                                <fieldset class="form-group">
                                    <legend class="bv-no-focus-ring col-form-label pt-0">Quantity *</legend>
                                    <div>
                                        <input type="number"
                                            class="form-control"
                                            placeholder="Enter Quantity Here"
                                            v-model="form.quantity"
                                            :disabled="!step2Enabled">
                                    </div>
                                </fieldset>

                                <!-- TAX -->
                                <fieldset class="form-group">
                                    <legend class="bv-no-focus-ring col-form-label pt-0">Tax</legend>
                                    <div>
                                        <select class="form-control" v-model="form.tax" :disabled="!step2Enabled">
                                            <option value="" disabled hidden>Select Tax</option>
                                            <option value="VAT" selected>VAT</option>
                                            <option value="NON-VAT">NON-VAT</option>
                                            <option value="ZERO-RATED">Zero Rated</option>
                                        </select>
                                    </div>
                                </fieldset>

                                <!-- AMOUNT PER UNIT -->
                                <fieldset class="form-group mb-3">
                                    <legend class="bv-no-focus-ring col-form-label pt-0">Amount per Unit *</legend>
                                    <div>
                                        <input type="text"
                                            class="form-control"
                                            placeholder="0"
                                            v-model="form.amount_per_unit"
                                            :disabled="!step2Enabled">
                                    </div>
                                </fieldset>

                                <!-- BUTTON -->
                                <div class="mt-auto">
                                    <button type="submit" class="btn btn-info" @click.prevent="addSummary" :disabled="!step2Enabled">
                                        Add to Summary
                                    </button>
                                </div>
                            </div>

                        </span>
                    </div>
                </div>
            </div>
            <div class="px-xl-1 col-lg-12 col-xl-6">
                <div class="list-group h-100">
                    <div class="list-group-item h-100 mb-3">
                        <div class="h-100 d-flex flex-column">

                            <p><span class="t-font-boldest">Step 3: Summary</span></p>

                            <!-- SUMMARY TABLE -->
                            <div class="table-responsive">
                                <table id="summary-table" class="table table-hover tableOne">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Category</th>
                                            <th class="text-left">Type</th>
                                            <th class="text-left">Description</th>
                                            <th class="text-left">Qty</th>
                                            <th class="text-left">Sub-Total</th>
                                            <th class="text-left">Tax</th>
                                            <th class="text-left">Total Amount</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="summaryList.length === 0">
                                            <td colspan="8" class="text-center text-muted">No data for table</td>
                                        </tr>

                                        <tr v-for="(item, index) in summaryList" :key="index">
                                            <td>@{{ item.category }}</td>
                                            <td>@{{ item.type }}</td>
                                            <td>@{{ item.description }}</td>
                                            <td>@{{ item.quantity }}</td>

                                            <td>₱@{{ item.subtotal.toFixed(2) }}</td>
                                            <td>₱@{{ item.tax.toFixed(2) }}</td>
                                            <td>₱@{{ item.total.toFixed(2) }}</td>

                                            <td class="text-right">
                                                <button class="btn btn-sm btn-danger" @click="removeSummary(index)">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- TOTALS -->
                            <div class="row">
                                <div class="offset-md-6 col-md-6 mt-3">
                                    <table class="table table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="bold">Tax</td>
                                                <td>@{{ formatTax }}</td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Sub-Total</td>
                                                <td>@{{ formatSubTotal }}</td>
                                            </tr>
                                            <tr>
                                                <td><span class="font-weight-bold">Total Amount</span></td>
                                                <td><span class="font-weight-bold">@{{ formatTotalAmount }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- ATTACHMENTS -->
                            <div class="mb-3 mt-3">
                                <div class="d-flex justify-content-between">
                                <label class="mb-0">Attachments</label>
                                <button type="button" class="btn btn-link" title="Add Attachment">
                                    <i class="i-Add"></i>
                                </button>

                                <!-- Hidden File Input -->
                                <div id="fileAttachment__BV_file_outer_" class="custom-file d-none">
                                    <input type="file" id="fileAttachment" class="custom-file-input">
                                    <label for="fileAttachment" class="custom-file-label" data-browse="Browse">
                                        <span class="d-block form-file-text">No file chosen</span>
                                    </label>
                                </div>
                                </div>

                                <div class="list-group">
                                <div class="list-group-item">
                                    <span class="fw-light">No Attachments</span>
                                </div>
                                </div>
                            </div>

                            <!-- BUTTONS -->
                            <div class="mt-auto d-flex">
                                <div class="mr-2">
                                <button type="button" class="btn btn-primary" @click="submitReceivable">
                                    <i class="i-Yes me-2 font-weight-bold"></i> Submit
                                </button>
                                </div>

                                <a href="#" class="btn btn-outline-secondary ripple">Cancel</a>
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
            categories: [],
            types: [],           
            form: {
                /* STEP 1 FIELDS */
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

                /* STEP 2 FIELDS (items will be summaryList) */
                type_id: null,
                description: "",
                mode: "Regular",
                quantity: 1,
                amount_per_unit: 0,
                tax: 0
            },
            summaryList: [],
            step1Locked: false, 
        }
    },
    mounted() {
        this.fetchCategories();
        this.fetchTypes();
        this.initDatePicker();
        this.initDueDatePicker();
        
    },
    methods: {
        lockStep1() {
            if (!this.isStep1Complete) {
                alert("Please complete all Step 1 fields first.");
                return;
            }
            this.step1Locked = true;
            this.step2Enabled = true;
        },

        editStep1() {
            this.step1Locked = false;
        },
        
        fetchCategories() {
            axios.get('/api/receivable/categories')
                .then(res => {
                    this.categories = res.data;
                });
        },

        fetchTypes(category) {
            axios.get('/api/receivable/types', {
                params: { category: category }
            }).then(res => {
                this.types = res.data;   // ← MUST EXIST
                console.log("Loaded types:", this.types);
            });
        },
        initDatePicker() {
            const today = moment();
            const vm = this; // preserve Vue instance

            $('#transaction_datetime').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true, // ✅ use 24-hour clock
                showDropdowns: true,
                maxDate: today,
                startDate: today,
                autoUpdateInput: true,
                locale: {
                    format: 'YYYY-MM-DD HH:mm:ss' // 24-hour format
                }
            }).on('apply.daterangepicker', function(ev, picker) {
                vm.form.transaction_datetime = picker.startDate.format('YYYY-MM-DD HH:mm:ss');
            });
        },


        initDueDatePicker() {
            const today = moment().startOf('day');
            const vm = this;

            $('#due_date').daterangepicker({
                singleDatePicker: true,
                autoApply: true,
                showDropdowns: true,
                minDate: today,
                startDate: today,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }).on('apply.daterangepicker', function(ev, picker) {
                vm.form.due_date = picker.startDate.format('YYYY-MM-DD');
            });
        },

        clearDate() {
            this.form.transaction_datetime = "";
            $('#transaction_datetime').val("");
        },
        addSummary() {
            if (!this.form.category || !this.form.type_id || !this.form.description || !this.form.quantity || !this.form.amount_per_unit) {
                Swal.fire({
                    icon: "warning",
                    title: "Incomplete Fields",
                    text: "Please fill all required fields!",
                });
                return;
            }

            const qty = Number(this.form.quantity) || 0;
            const amount = Number(this.form.amount_per_unit) || 0;
            const tax = 0;

            const subtotal = qty * amount;
            const total = subtotal + tax;

            this.summaryList.push({
                category: this.form.category,
                type: this.form.type,
                type_id: this.form.type_id,
                description: this.form.description,
                quantity: qty,
                unit_price: amount,     // <-- ADD THIS
                subtotal: subtotal,
                tax: tax,
                total: total
            });


            this.form.description = "";
            this.form.quantity = 1;
            this.form.amount_per_unit = 0;
            this.form.type_id = null;
        },



        removeSummary(index) {
            this.summaryList.splice(index, 1);
        },
        
        submitReceivable() {
             // Step 1 validation
            if (!this.isStep1Complete) {
                Swal.fire({
                    icon: 'error',
                    title: 'Step 1 incomplete',
                    text: 'Please complete all required fields in Step 1.'
                });
                return;
            }

            // Step 2 validation
            if (this.summaryList.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'No items added',
                    text: 'Please add at least one item in Step 2.'
                });
                return;
            }

            // Build payload
            const payload = {
                transaction_datetime: this.form.transaction_datetime,
                reference_no: this.form.reference_no,
                payor_name: this.form.payor_name,
                company: this.form.company,
                address: this.form.address,
                mobile_no: this.form.mobile_no,
                email: this.form.email,
                tin: this.form.tin,
                payee_details: this.form.payee_details,
                due_date: this.form.due_date,
                items: this.summaryList.map(item => ({
                    type_id: item.type_id,
                    description: item.description,
                    qty: item.quantity,
                    unit_price: item.unit_price,    // <-- now it exists
                    tax_amount: item.tax,
                    sub_total: item.subtotal,
                    total_amount: item.total
                })),
                sub_total: this.subTotal,
                total_amount: this.totalAmount,
                attachments: [] // handle files if needed
            };


            // Axios POST
            axios.post('/accounts-receivable/store', payload)
                .then(res => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.data.message,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        // Redirect to index page
                        window.location.href = '/accounts-receivable';
                    });
                })
                .catch(err => {
                    let errorMessage = 'Something went wrong.';
                    if (err.response && err.response.data && err.response.data.message) {
                        errorMessage = err.response.data.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage
                    });
                });
        },
    },

    computed: {
        isStep1Complete() {
            return (
                this.form.reference_no &&
                this.form.payor_name &&
                this.form.transaction_datetime &&
                this.form.due_date &&
                this.form.payee_details
            );
        },

        step2Opacity() {
            return this.step2Enabled ? 1 : 0.6;
        },

        step2Enabled() {
            return this.step1Locked; 
        },

        totalTax() {
            return this.summaryList.reduce((sum, item) =>
                sum + (Number(item.tax) || 0), 0);
        },

        subTotal() {
            return this.summaryList.reduce((sum, item) =>
                sum + (Number(item.subtotal) || 0), 0);
        },

        totalAmount() {
            return this.summaryList.reduce((sum, item) =>
                sum + (Number(item.total) || 0), 0);
        },

        formatTax() {
            return `₱${this.totalTax.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            })}`;
        },

        formatSubTotal() {
            return `₱${this.subTotal.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            })}`;
        },

        formatTotalAmount() {
            return `₱${this.totalAmount.toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            })}`;
        }
    },


    watch: {
        'form.category'(newVal) {
            if (newVal) {
                this.fetchTypes(newVal);
            } else {
                this.types = [];
            }
        }
    }
});
</script>
@endsection