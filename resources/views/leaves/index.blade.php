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
            <h1 class="mr-3">Leaves</h1>
            <ul>
                <li><a href="">Workforce Settings</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
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
                                                <section class="ps-container ps">
                                                    <div class="px-4" style="max-height: 400px;">
                                                        <ul class="list-unstyled">
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__309"><label class="custom-control-label" for="__BVID__309">Date Created</label></div>
                                                        </li>
                                                       
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__311"><label class="custom-control-label" for="__BVID__311">Created By</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__314"><label class="custom-control-label" for="__BVID__314">Reference #</label></div>
                                                        </li>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__327"><label class="custom-control-label" for="__BVID__327">From</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__328"><label class="custom-control-label" for="__BVID__328">To</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__329"><label class="custom-control-label" for="__BVID__329">Metod of Transfer</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__330"><label class="custom-control-label" for="__BVID__330">Created By</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__331"><label class="custom-control-label" for="__BVID__331">Amount</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__332"><label class="custom-control-label" for="__BVID__332">Action</label></div>
                                                        </li>
                                                        <li><button type="button" class="btn mt-2 mb-3 btn-primary btn-sm">Save</button></li>
                                                        </ul>
                                                    </div>
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                                    </div>
                                                </section>
                                            </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-icon m-1">
                                    Close
                                    </a>
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
                                </colgroup>
                                <thead>
                                <tr>
                                    <!----> 
                                    <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align text-left w-190px sortable" style="min-width: auto; width: auto;"><span>Date Created</span> <button><span class="sr-only">
                                        Sort table by Date Created in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-1" class="vgt-left-align text-left w-220px sortable" style="min-width: auto; width: auto;"><span>Reference #</span> <button><span class="sr-only">
                                        Sort table by Reference # in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>From</span> <button><span class="sr-only">
                                        Sort table by From in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>To</span> <button><span class="sr-only">
                                        Sort table by To in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Method Transfer</span> <button><span class="sr-only">
                                        Sort table by Metod of Transfer in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-5" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Created By</span> <button><span class="sr-only">
                                        Sort table by Created By in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-6" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Amount</span> <button><span class="sr-only">
                                        Sort table by Amount in descending order
                                        </span></button>
                                    </th>
                                    <!----><!----><!----><!----><!----><!----><!----><!---->
                                    <th scope="col" aria-sort="descending" aria-controls="col-23" class="vgt-left-align text-right" style="min-width: auto; width: auto;">
                                        <span>Action</span> <!---->
                                    </th>
                                </tr>
                                <!---->
                                </thead>
                                <tbody>
                                    <tr v-for="row in records" :key="row.id">
                                        <td class="vgt-checkbox-col">
                                            <input type="checkbox" :value="row.id">
                                        </td>
                                        <td class="vgt-left-align text-left w-190px"> @{{ formatDateTime(row.closed_at) }}</td>
                                        <td class="vgt-left-align text-left w-220px">Reference Static</td>
                                        <td class="vgt-left-align text-left w-160px">From Static</td>
                                        <td class="vgt-left-align text-left w-160px">To Static</td>
                                        <td class="vgt-left-align text-left">Method Static</td>
                                        <td class="vgt-left-align text-left w-160px">@{{ row.cashier.name }}</td>
                                        <td class="vgt-left-align text-left w-160px">@{{ row.transfer_amount }}</td>
                                        <td class="vgt-left-align text-right">
                                            <actions-dropdown :row="row"></actions-dropdown>
                                        </td>

                                    <tr v-if="records.length === 0">
                                        <td colspan="8" class="text-center text-muted">No data available.</td>
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
        async changeStatus(id, status) {
            const labels = {
                approved: 'APPROVE',
                disapproved: 'DISAPPROVE',
                completed: 'MARK AS COMPLETED',
                archived: 'ARCHIVE',
                pending: 'RESTORE TO PENDING'
            };

            const result = await Swal.fire({
                title: 'Are you sure?',
                text: `You are about to ${labels[status] || status.toUpperCase()} this receivable.`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, proceed',
                cancelButtonText: 'Cancel'
            });

            if (!result.isConfirmed) return;

            try {
                const res = await axios.post(`/accounts-receivable/${id}/status`, { status });
                const rec = this.$parent.records.find(r => r.id === id);
                if (rec) {
                    rec.status = status;
                    rec.updated_at = res.data.updated_at || new Date();
                }
                this.$parent.fetchRecords(this.$parent.pagination.current_page);
                this.isOpen = false;
                this.$emit('status-updated');

                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: `Receivable has been ${status}.`,
                    timer: 2000,
                    showConfirmButton: false
                });
            } catch (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.response?.data?.message || 'Something went wrong!'
                });
            }
        }
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
            statusFilter: 'active',
            statusList: [
                { label: 'Active', value: 'active' },
                { label: 'Archived', value: 'archived' },
            ],
        }
    },

    // mounted() {
    //     this.fetchRecords();
    // },

    // methods: {
    //     fetchRecords(page = 1) {
    //         console.log("📡 Fetching records with params:", {
    //             status: this.statusFilter,
    //             page: page,
    //             per_page: this.pagination.per_page,
    //         });

    //         axios.get('/pos-clossing/closed', {
    //             params: {
    //                 status: this.statusFilter,
    //                 page: page,
    //                 per_page: this.pagination.per_page,
    //             }
    //         })
    //         .then(response => {

    //             console.log("✅ API Response:", response.data);

    //             this.records = response.data.data || response.data;

    //             console.log("📦 Records stored:", this.records);

    //             // If paginated response exists
    //             if (response.data.current_page) {
    //                 this.pagination.current_page = response.data.current_page;
    //                 this.pagination.per_page = response.data.per_page;
    //                 this.pagination.total = response.data.total;
    //                 this.pagination.from = response.data.from;
    //                 this.pagination.to = response.data.to;
    //                 this.pagination.last_page = response.data.last_page;
    //             }

    //             console.log("📊 Pagination:", this.pagination);
    //         })
    //         .catch(error => {
    //             console.error("❌ Error fetching records:", error);
    //         });
    //     },
    //     formatDateTime(datetime) {
    //         if (!datetime) return '';

    //         let date = new Date(datetime);

    //         return date.toLocaleString('en-US', {
    //             timeZone: 'Asia/Manila',
    //             year: 'numeric',
    //             month: 'long',
    //             day: 'numeric',
    //             hour: 'numeric',
    //             minute: '2-digit',
    //             second: '2-digit',
    //             hour12: true
    //         });
    //     },

    //     setStatus(status) {
    //         console.log("🔄 Changing status filter to:", status);
    //         this.statusFilter = status;
    //         this.fetchRecords(1);
    //     },
    //     computed: {
    //         filteredRecords() {
    //             return this.records.filter(r => r.status === this.statusFilter);
    //         }
    //     }

    // },

});
<script>
</script>
@endsection