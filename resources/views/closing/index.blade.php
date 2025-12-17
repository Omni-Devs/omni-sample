@extends('layouts.app')
@section('content')
<style>
    .vs__search {
        font-size: 14px;
    }
    .dropdown-menu {
        position: relative;
    }
</style>

<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Closing</h1>
            <ul>
                <li><a href="">POS</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div class="modal fade" id="cashAuditRecordsModal" tabindex="-1" aria-labelledby="cashAuditRecordsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cashAuditRecordsModalLabel">
                        Cash Audit Record Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="vgt-table"  class="table-hover tableOne vgt-table">
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
                        </colgroup>
                        <thead>
                        <tr>
                            <!----> 
                            <th>Date and Time Created</th>
                            <th>Reference #</th>
                            <th>Cashier</th>
                            <th>Transfered To</th>
                            <th>Transfer Amount</th>
                            <th>Cash</th>
                            <th>Gcash</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Status</th>
                        </tr>
                        <!---->
                        </thead>
                        <tbody>
                            <tr v-for="row in modalChildren" :key="row.id">
                                <td>@{{ formatDateTime(row.closed_at) }}</td>
                                <td>@{{ row.reference_no }}</td>
                                <td>@{{ row.cashier?.name ?? 'N/A' }}</td>
                                <td>@{{ row.transfer_to ? row.transfer_to.account_number : 'N/A' }}</td>
                                <td>@{{ row.transfer_amount }}</td>
                                <td>@{{ getPaymentTotal(row.payment_breakdown, 'cash') }}</td>
                                <td>@{{ getPaymentTotal(row.payment_breakdown, 'gcash') }}</td>
                                <td>@{{ getPaymentTotal(row.payment_breakdown, 'debit_card') }}</td>
                                <td>@{{ getPaymentTotal(row.payment_breakdown, 'credit_card') }}</td>
                                <td>
                                    <span class="badge badge-success">
                                        @{{ row.status }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>      
    <div class="wrapper">
        <div class="card mt-4">
        <div class="card-body">
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item" v-for="status in statusList" :key="status.value">
                        <a href="#" 
                        class="nav-link" 
                        :class="{ active: statusFilter === status.value }" 
                        @click.prevent="setStatus(status.value)">
                        @{{ status.label }}
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="card-body">
                <div class="vgt-wrap">
                    <div class="vgt-inner-wrap">
                        <div class="vgt-global-search vgt-clearfix">
                            <div class="vgt-global-search__input vgt-pull-left">
                                <form role="search">
                                    <label for="vgt-search">
                                        <span aria-hidden="true" class="input_icon">
                                            <div class="magnifying-glass">
                                            </div>
                                        </span>
                                        <span class="sr-only">Search:</span>
                                    </label>
                                    <input id="vgt-search" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                                </form>
                            </div>
                            <div class="vgt-global-search__actions vgt-pull-right">
                                <div class="mt-2 mb-3">
                                    <div id="dropdown-form" class="dropdown b-dropdown m-2 btn-group" rounded="">
                                        <!---->
                                        <ul role="menu" tabindex="-1" aria-labelledby="dropdown-form__BV_toggle_" class="dropdown-menu dropdown-menu-right">
                                            <li role="presentation">
                                            <header id="dropdown-header-label" class="dropdown-header">
                                                Columns
                                            </header>
                                            </li>
                                            <li role="presentation" style="width: 220px;">
                                            <form tabindex="-1" class="b-dropdown-form p-0">
                                     
                                            </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-primary"
                                            :disabled="selectedRecords.length === 0"
                                            @click="goToCreate">
                                        Close Selected
                                    </button>
                                    {{-- <a href="/pos-clossing/create" class="btn btn-primary btn-icon m-1">
                                    Close
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="vgt-fixed-header">
                        </div>
                        <div class="vgt-responsive">
                            <table id="vgt-table"  class="table-hover tableOne vgt-table">
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
                                </colgroup>
                                <thead>
                                    <tr>
                                        <!----> 
                                        <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                        <th>Date and Time Created</th>
                                        <th>Reference #</th>
                                        <template v-if="statusFilter === 'pending'">
                                            <th>Cashier</th>
                                        </template>
                                        <template v-if="statusFilter === 'completed'">
                                            <th>Submitted By</th>
                                        </template>
                                        <th>Transfered To</th>
                                        <th>Transfer Amount</th>

                                        <!-- PENDING -->
                                        <template v-if="statusFilter === 'pending'">
                                            <th>Cash</th>
                                            <th>Gcash</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Status</th>
                                        </template>

                                        <!-- COMPLETED -->
                                        <template v-else>
                                            <th>Action</th>
                                        </template>
                                    </tr>
                                    <!---->
                                </thead>
                                <tbody>
                                    <tr v-for="row in filteredRecords" :key="row.id">
                                        <td class="vgt-checkbox-col">
                                            <input
                                                v-if="row.status === 'pending'"
                                                type="checkbox"
                                                :value="row"
                                                v-model="selectedRecords"
                                            >
                                        </td>

                                        <!-- DATE -->
                                        <td>
                                            @{{ formatDateTime(
                                                row.status === 'completed'
                                                    ? row.audit_record.entry_datetime
                                                    : row.closed_at
                                            ) }}
                                        </td>

                                        <!-- REFERENCE -->
                                        <td>
                                            @{{ row.status === 'completed'
                                                ? row.audit_record.reference_no
                                                : row.reference_no
                                            }}
                                        </td>

                                        <!-- CASHIER -->
                                        <td>
                                            @{{ row.status === 'completed'
                                                ? row.audit_record.submitted_by.name
                                                : row.cashier.name
                                            }}
                                        </td>

                                        <!-- TRANSFER TO -->
                                        <td>
                                            @{{ row.status === 'completed'
                                                ? row.audit_record.transfer_to.account_number
                                                : (row.transfer_to ? row.transfer_to.account_number : 'N/A')
                                            }}
                                        </td>

                                        <!-- TRANSFER AMOUNT -->
                                        <td>
                                            @{{ row.status === 'completed'
                                                ? row.audit_record.transfer_amount
                                                : row.transfer_amount
                                            }}
                                        </td>

                                        <!-- PAYMENT BREAKDOWN (ONLY FOR PENDING) -->
                                        <template v-if="row.status === 'pending'">
                                            <td>@{{ getPaymentTotal(row.payment_breakdown, 'cash') }}</td>
                                            <td>@{{ getPaymentTotal(row.payment_breakdown, 'gcash') }}</td>
                                            <td>@{{ getPaymentTotal(row.payment_breakdown, 'credit_card') }}</td>
                                            <td>@{{ getPaymentTotal(row.payment_breakdown, 'debit_card') }}</td>
                                            <!-- STATUS -->
                                        <td>
                                            <span class="badge badge-warning">
                                                Pending
                                            </span>
                                        </td>
                                        </template>
                                        

                                        <!-- COMPLETED PLACEHOLDER -->
                                        <template v-else>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-outline-primary" @click="viewClosing(row)">
                                                    View
                                                </button>
                                            </td>
                                        </template>
                                    </tr>

                                    <tr v-if="filteredRecords.length === 0">
                                        <td colspan="11" class="text-center text-muted">
                                            No data available.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="vgt-wrap__footer vgt-clearfix">
                            <!-- Rows per page -->
                            <div class="footer__row-count vgt-pull-left">
                                <form>
                                    <label class="footer__row-count__label">Rows per page:</label>
                                    <select v-model.number="pagination.per_page" @change="fetchRecords(1)" class="footer__row-count__select">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </form>
                            </div>

                            <!-- Showing X to Y of Z -->
                            <div class="footer__navigation vgt-pull-right">
                                <div class="footer__navigation__page-info">
                                    <div v-if="pagination.total > 0">
                                        Showing @{{ pagination.from }} to @{{ pagination.to }} of @{{ pagination.total }} entries
                                    </div>
                                    <div v-else class="text-muted">
                                        No entries found
                                    </div>
                                </div>

                                <!-- Prev / Next Buttons -->
                                <button type="button"
                                        class="footer__navigation__page-btn"
                                        :class="{ disabled: pagination.current_page <= 1 }"
                                        :disabled="pagination.current_page <= 1"
                                        @click="fetchRecords(pagination.current_page - 1)">
                                    <span class="chevron left"></span> prev
                                </button>

                                <button type="button"
                                        class="footer__navigation__page-btn"
                                        :class="{ disabled: pagination.current_page >= pagination.last_page }"
                                        :disabled="pagination.current_page >= pagination.last_page"
                                        @click="fetchRecords(pagination.current_page + 1)">
                                    next <span class="chevron right"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/x-template" id="actions-dropdown-template">
<div class="dropdown btn-group" ref="dropdown">
    <button type="button" class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
            @click.stop="toggleDropdown">
        <span class="_dot _r_block-dot bg-dark"></span>
        <span class="_dot _r_block-dot bg-dark"></span>
        <span class="_dot _r_block-dot bg-dark"></span>
    </button>
</div>
</script>

<script>
Vue.component("actions-dropdown", {
    template: "#actions-dropdown-template",
    props: {
        row: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            isOpen: false
        };
    },
    methods: {
        toggleDropdown() { this.isOpen = !this.isOpen; },
        handleClickOutside(event) {
            if (!this.$refs.dropdown?.contains(event.target)) this.isOpen = false;
        },
    },
    mounted() {
        document.addEventListener("click", this.handleClickOutside);
    },
    beforeDestroy() {
        document.removeEventListener("click", this.handleClickOutside);
    }
});

new Vue({
    el: '#app',

    data() {
        return {
            records: [],
            pagination: {
                current_page: 1,
                per_page: 10,
                total: 0,
                from: 1,
                to: 0,
                last_page: 1,
            },
            statusFilter: 'pending',
            statusList: [
                { label: 'Pending', value: 'pending' },
                { label: 'Completed', value: 'completed' },
            ],
            selectedRecords: [],
            modalChildren: [],
        }
    },

    mounted() {
        this.fetchRecords();
    },

    methods: {
        fetchRecords(page = 1) {
            console.log("📡 Fetching records with params:", {
                status: this.statusFilter,
                page: page,
                per_page: this.pagination.per_page,
            });

            axios.get('/pos-clossing/closed', {
                params: {
                    status: this.statusFilter,
                    page: page,
                    per_page: this.pagination.per_page,
                }
            })
            .then(response => {

                console.log("✅ API Response:", response.data);

                this.records = response.data.data || response.data;

                console.log("📦 Records stored:", this.records);

                // If paginated response exists
                if (response.data.current_page) {
                    this.pagination.current_page = response.data.current_page;
                    this.pagination.per_page = response.data.per_page;
                    this.pagination.total = response.data.total;
                    this.pagination.from = response.data.from;
                    this.pagination.to = response.data.to;
                    this.pagination.last_page = response.data.last_page;
                }

                console.log("📊 Pagination:", this.pagination);
            })
            .catch(error => {
                console.error("❌ Error fetching records:", error);
            });
        },
        viewClosing(row) {
            console.log("👁 Viewing closing for parent row:", row);

            // If completed → use grouped children
            if (row.children && row.children.length) {
                this.modalChildren = row.children;
            } else {
                // Fallback (pending or single row)
                this.modalChildren = [row];
            }

            $('#cashAuditRecordsModal').modal('show');
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

        setStatus(status) {
            console.log("🔄 Changing status filter to:", status);
            this.statusFilter = status;
            this.fetchRecords(1);
        },
        getPaymentTotal(paymentBreakdown, type) {
            if (!paymentBreakdown) return 0;
            let parsed;
            try {
                parsed = typeof paymentBreakdown === 'string' ? JSON.parse(paymentBreakdown) : paymentBreakdown;
            } catch (e) {
                console.error('Invalid payment breakdown JSON', e);
                return 0;
            }
            return parsed[type]?.total || 0;
        },
        goToCreate() {
            localStorage.setItem(
                'selected_cash_audits',
                JSON.stringify(this.selectedRecords)
            )

            window.location.href = '/pos-clossing/create'
        },
    },
        computed: {
    filteredRecords() {
        // Pending = show child rows normally
        if (this.statusFilter === 'pending') {
            return this.records.filter(r => r.status === 'pending');
        }

        // Completed = group by parent (cash_audit_record)
        const grouped = {};

        this.records
            .filter(r => r.status === 'completed' && r.audit_record)
            .forEach(row => {
                const parentId = row.audit_record.id;

                if (!grouped[parentId]) {
                    grouped[parentId] = {
                        ...row,
                        // keep parent as source of truth
                        audit_record: row.audit_record,
                        // attach children for "View" action
                        children: []
                    };
                }

                grouped[parentId].children.push(row);
            });

        // Return ONE row per parent
        return Object.values(grouped);
    }
}

});
</script>

@endsection