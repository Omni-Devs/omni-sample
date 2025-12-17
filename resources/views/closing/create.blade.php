@extends('layouts.app')
@section('content')
<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Closing</h1>
            <ul>
                <li><a href="">Add</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div class="wrapper">
        <div class="card mt-4">
            <div class="card-body">
                <div class="vgt-wrap">
                    <div class="vgt-inner-wrap">
                        <div class="row">
                            <div class="col-3">
                                <label class="form-label">Reference #</label> 
                                <input type="text" v-model="referenceNo" class="form-control"
                                readonly>
                            </div>
                            <div class="col-3">
                                <label>Date and Time Created</label>
                                <input type="datetime-local"
                                    class="form-control"
                                    v-model="createdDatetime"
                                    readonly>
                            </div>
                            <div class="col-3">
                                <label class="form-label">Submitted By</label> 
                                <input type="text" v-model="submittedBy" readonly="readonly" class="form-control"
                                readonly>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4>List of Transactions to Close</h4>
                                <hr>
                                <div class="vgt-responsive">
                                    <table id="vgt-table" class="table-hover tableOne vgt-table">
                                        <thead>
                                            <tr>
                                                <th>Transaction Date</th>
                                                <th>Reference #</th>
                                                <th>Cashier</th>
                                                <th>Transfered To</th>
                                                <th>Transfered Amount</th>
                                                <th>Cash</th>
                                                <th>GCash</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="row in records" :key="row.id">
                                                <td>@{{formatDateTime(row.closed_at)}}</td>
                                                <td>@{{ row.reference_no }}</td>
                                                <td>@{{ row.cashier }}</td>
                                                <td>@{{ row.transferred_to }}</td>

                                                <td class="text-end">@{{ row.transferred_amount }}</td>
                                                <td class="text-end">@{{ row.cash }}</td>
                                                <td class="text-end">@{{ row.gcash }}</td>
                                                <td class="text-end">@{{ row.debit }}</td>
                                                <td class="text-end">@{{ row.credit }}</td>

                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        View
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr v-if="records.length === 0">
                                                <td colspan="11" class="text-center text-muted">No data available.</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="fw-bold table-secondary">
                                                <td colspan="4" class="text-end">TOTAL</td>
                                                <td class="text-end">@{{ totals.transferred_amount }}</td>
                                                <td class="text-end">@{{ totals.cash }}</td>
                                                <td class="text-end">@{{ totals.gcash }}</td>
                                                <td class="text-end">@{{ totals.debit }}</td>
                                                <td class="text-end">@{{ totals.credit }}</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end mt-4">
                <!-- Left side: Submit button -->
                <button class="btn btn-primary" @click="submitClosing">
                    Submit Closing
                </button>

                <!-- Right side: Transfer fields -->
                <div class="d-flex gap-2 align-items-end">
                    <div class="d-flex flex-column flex-grow-1">
                        <label class="mb-1">Transfer To:</label>
                            <v-select 
                                v-model="transferTo" 
                                :options="cashEquivalent" 
                                :clearable="true" 
                                placeholder="Select Transfer To" 
                                label="account_number"
                                :reduce="item => item.id"
                                class="w-100"
                                style="min-width: 200px;"
                            ></v-select>
                    </div>

                    <div class="d-flex flex-column flex-grow-1">
                        <label for="transfer_amount">Amount:</label>
                        <input type="number" v-model="transferAmount" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    Vue.component('v-select', VueSelect.VueSelect);
    window.pageData = {
        referenceNo: @json($referenceNo),
        createdDatetime: @json($createdDatetime),
        submittedBy: @json($submittedBy),
        cashEquivalent: @json($cashEquivalent),
    }
</script>
<script>
new Vue({
    el: '#app',

    data() {
         return {
            referenceNo: '',
            createdDatetime: '',
            submittedBy: '',
            transferTo: '',
            transferAmount: 0,

            records: [],
            cashEquivalent: [],
        }
    },

    mounted() {
        // Auto inputs
        if (window.pageData) {
            this.referenceNo = window.pageData.referenceNo
            this.createdDatetime = window.pageData.createdDatetime
            this.submittedBy = window.pageData.submittedBy
            this.cashEquivalent = window.pageData.cashEquivalent
        }

        // Load selected records
        const saved = localStorage.getItem('selected_cash_audits')
        if (saved) {
            const rawRecords = JSON.parse(saved)
            console.log('RAW RECORD SAMPLE:', rawRecords[0])
            

            this.records = rawRecords.map(this.normalizeRecord)
            console.log('NORMALIZED:', this.normalizeRecord(rawRecords[0]))
        }
    },

    computed: {
        totals() {
            return this.records.reduce((acc, row) => {
                acc.transferred_amount += Number(row.transferred_amount || 0)
                acc.cash += Number(row.cash || 0)
                acc.gcash += Number(row.gcash || 0)
                acc.debit += Number(row.debit || 0)
                acc.credit += Number(row.credit || 0)
                return acc
            }, {
                transferred_amount: 0,
                cash: 0,
                gcash: 0,
                debit: 0,
                credit: 0
            })
        }
    },

    methods: {
        getPaymentTotal(breakdown, type) {
            if (!breakdown) return 0

            // payment_breakdown is an OBJECT
            return breakdown[type]?.total ?? 0
        },
        formatDateTime(datetime) {
            if (!datetime) return '';

            let date = new Date(datetime);

            return date.toLocaleString('en-US', {
                timeZone: 'Asia/Manila',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });
        },
        normalizeRecord(row) {
            return {
                id: row.id,
                closed_at: row.closed_at,
                reference_no: row.reference_no,

                cashier: row.cashier?.name ?? 'N/A',

                transferred_to: row.transfer_to?.account_number ?? 'N/A',

                transferred_amount: Number(row.transfer_amount ?? 0),

                cash: this.getPaymentTotal(row.payment_breakdown, 'cash'),
                gcash: this.getPaymentTotal(row.payment_breakdown, 'gcash'),
                debit: this.getPaymentTotal(row.payment_breakdown, 'debit_card'),
                credit: this.getPaymentTotal(row.payment_breakdown, 'credit_card'),
            }
        },
        submitClosing() {
            const totalTransferred = this.totals.transferred_amount;

            if (!this.transferTo) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops!',
                    text: 'Please select a transfer account.',
                });
                return;
            }

            if (Number(this.transferAmount) !== Number(totalTransferred)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Amount Mismatch',
                    text: `Transfer amount must match total transferred amount: ${totalTransferred}`,
                });
                return;
            }

            // Prepare payload
            const payload = {
                reference_no: this.referenceNo,
                created_at: this.createdDatetime,
                submitted_by: this.submittedBy,
                transfer_to: this.transferTo,
                transfer_amount: this.transferAmount,
                records: this.records.map(r => ({
                    id: r.id,
                    reference_no: r.reference_no,
                    transferred_amount: r.transferred_amount
                }))
            };

            // Confirmation before submitting
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to submit this closing.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, submit it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send payload
                    axios.post('/pos-clossing/store', payload)
                        .then(res => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'POS Closing has been submitted successfully.',
                                timer: 1500,
                                showConfirmButton: false
                            });

                            setTimeout(() => {
                                window.location.href = '/pos-clossing';
                            }, 1500);

                        })
                        .catch(err => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Submission Failed',
                                text: 'Failed to submit closing. Please try again.'
                            });
                            console.error(err);
                        });
                }
            });
        }
    }
})
</script>
@endsection