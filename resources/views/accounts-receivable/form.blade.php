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
                    <div class="list-group-item h-100 mb-3">
                        <span>
                            <form class="">
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
                                                id="__BVID__584">

                                        <div id="Payor_Details-feedback" class="invalid-feedback"></div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__585">
                                    <div>
                                        <input type="text" placeholder="Company"
                                                class="form-control"
                                                aria-describedby="Company-feedback"
                                                id="__BVID__586">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__587">
                                    <div>
                                        <input type="text" placeholder="Address"
                                                class="form-control"
                                                aria-describedby="Address-feedback"
                                                id="__BVID__588">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__589">
                                    <div>
                                        <input type="text" placeholder="Mobile #"
                                                class="form-control"
                                                aria-describedby="MobileNo-feedback"
                                                id="__BVID__590">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__591">
                                    <div>
                                        <input type="text" placeholder="Email Address"
                                                class="form-control"
                                                aria-describedby="Email_Address-feedback"
                                                id="__BVID__592">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group" id="__BVID__593">
                                    <div>
                                        <input type="text" placeholder="TIN"
                                                class="form-control"
                                                aria-describedby="TIN-feedback"
                                                id="__BVID__594">
                                    </div>
                                </fieldset>

                                <fieldset class="form-group mt-3 mb-3" id="__BVID__596">
                                    <legend class="col-form-label pt-0" id="__BVID__596__BV_label_">Payee Details *</legend>
                                    <div>
                                        <input type="text" placeholder="Enter Payee Details"
                                                class="form-control"
                                                aria-describedby="Payee_Details-feedback"
                                                id="__BVID__597">

                                        <div id="Payee_Details-feedback" class="invalid-feedback"></div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-group mt-3" id="__BVID__599">
                                    <legend class="col-form-label pt-0" id="__BVID__599__BV_label_">Set Due Date *</legend>

                                    <div>
                                        <input type="text" placeholder="Select Date Here"
                                                class="form-control"
                                                readonly
                                                autocomplete="off"
                                                aria-describedby="Due_Date-feedback">

                                        <div id="Due_Date-feedback" class="invalid-feedback"></div>
                                    </div>
                                </fieldset>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
            <div class="px-xl-1 col-lg-6 col-xl-3">
                <div class="list-group h-100">
                    <div class="list-group-item h-100 mb-3">
                        <span>
                            <form class="h-100 d-flex flex-column">

                                <p><span class="t-font-boldest">Step 2: Particulars</span></p>

                                <!-- CATEGORY -->
                                <fieldset class="form-group" id="__BVID__607">
                                <legend class="col-form-label pt-0" id="__BVID__607__BV_label_">Category *</legend>
                                <div>
                                    <select class="form-control" id="Category" aria-describedby="Category-feedback">
                                        <option value="">Select Category of Entry</option>
                                    </select>
                                    <div id="Category-feedback" class="invalid-feedback"></div>
                                </div>
                                </fieldset>

                                <!-- TYPE -->
                                <fieldset class="form-group" id="__BVID__613">
                                <legend class="col-form-label pt-0" id="__BVID__613__BV_label_">Type *</legend>
                                <div>
                                    <select class="form-control" id="Type" aria-describedby="Type-feedback">
                                        <option value="">Select Type of Entry</option>
                                    </select>
                                    <div id="Type-feedback" class="invalid-feedback"></div>
                                </div>
                                </fieldset>

                                <!-- DESCRIPTION -->
                                <fieldset class="form-group" id="__BVID__619">
                                <legend class="col-form-label pt-0" id="__BVID__619__BV_label_">Description *</legend>
                                <div>
                                    <textarea rows="3" placeholder="Enter Description here"
                                                class="form-control"
                                                id="__BVID__620"
                                                aria-describedby="Description-feedback"></textarea>

                                    <div id="Description-feedback" class="invalid-feedback"></div>
                                </div>
                                </fieldset>

                                <!-- RADIO BUTTONS -->
                                <fieldset class="form-group" id="__BVID__621">
                                <div>
                                    <div id="radio-group-1" role="radiogroup" tabindex="-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input id="radio-group-1_BV_option_0" type="radio" name="Mode"
                                                class="custom-control-input" value="Regular">
                                            <label class="custom-control-label" for="radio-group-1_BV_option_0">Regular</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input id="radio-group-1_BV_option_1" type="radio" name="Mode"
                                                class="custom-control-input" value="Recurring">
                                            <label class="custom-control-label" for="radio-group-1_BV_option_1">Recurring</label>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>

                                <!-- QUANTITY -->
                                <fieldset class="form-group" id="__BVID__626">
                                <legend class="col-form-label pt-0" id="__BVID__626__BV_label_">Quantity *</legend>
                                <div>
                                    <input type="number" placeholder="Enter Quantity Here"
                                            class="form-control"
                                            aria-describedby="Quantity-feedback"
                                            id="__BVID__627">

                                    <div id="Quantity-feedback" class="invalid-feedback"></div>
                                </div>
                                </fieldset>

                                <!-- TAX -->
                                <fieldset class="form-group" id="__BVID__629">
                                <legend class="col-form-label pt-0" id="__BVID__629__BV_label_">Tax</legend>
                                <div>
                                    <select class="form-control" id="Tax" aria-describedby="Tax-feedback">
                                        <option value="">Select Tax</option>
                                    </select>
                                    <div id="Tax-feedback" class="invalid-feedback"></div>
                                </div>
                                </fieldset>

                                <!-- AMOUNT PER UNIT -->
                                <fieldset class="form-group mb-3" id="__BVID__635">
                                <legend class="col-form-label pt-0" id="__BVID__635__BV_label_">Amount per Unit *</legend>
                                <div>
                                    <input type="text" class="form-control"
                                            placeholder="0"
                                            aria-describedby="AmountperUnit-feedback">

                                    <div id="AmountperUnit-feedback" class="invalid-feedback"></div>
                                </div>
                                </fieldset>

                                <!-- BUTTON -->
                                <div class="mt-auto">
                                <button type="submit" class="btn btn-info">
                                    Add to Summary
                                </button>
                                </div>

                            </form>
                        </span>
                    </div>
                </div>
            </div>
            <div class="px-xl-1 col-lg-12 col-xl-6">
                <div class="list-group h-100">
                    <div class="list-group-item h-100 mb-3">
                        <form class="h-100 d-flex flex-column">

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
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            No data for table
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
                                            <td>₱0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Sub-Total</td>
                                            <td>₱0.00</td>
                                        </tr>
                                        <tr>
                                            <td><span class="font-weight-bold">Total Amount</span></td>
                                            <td><span class="font-weight-bold">₱0.00</span></td>
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
                                <button type="button" class="btn btn-primary">
                                    <i class="i-Yes me-2 font-weight-bold"></i> Submit
                                </button>
                                </div>

                                <a href="#" class="btn btn-outline-secondary ripple">Cancel</a>
                            </div>

                        </form>
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
            form: {
                transaction_datetime: ""
            }
        }
    },
    mounted() {
        this.initDatePicker();
    },
    methods: {
        initDatePicker() {
            const today = moment(); // current date & time

            $('#transaction_datetime').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: false,
                showDropdowns: true,
                autoUpdateInput: true,
                maxDate: today,  // ✅ disable future dates
                startDate: today,
                locale: {
                    format: 'YYYY-MM-DD hh:mm A'
                }
            }, (selectedDate) => {
                // Update Vue model
                this.form.transaction_datetime = selectedDate.format('YYYY-MM-DD hh:mm A');
            });
        },

        clearDate() {
            this.form.transaction_datetime = "";
            $('#transaction_datetime').val("");
        }
    }
});
</script>
@endsection