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
            <h1 class="mr-3">Allowances</h1>
            <ul>
                <li><a href="">Workforce Settings</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <!-- ==================== ADD MODAL ==================== -->
    <div class="modal fade" id="allowancesModal" tabindex="-1" aria-labelledby="allowancesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="allowancesModalLabel">
                        @{{ isEditing ? "Edit Allowance Name" : "Add Allowance" }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Date Only -->
                        <div class="col-6">
                            <label class="form-label">Date Created</label>
                            <input type="date" 
                                class="form-control" 
                                :value="createdDate" 
                                readonly>
                        </div>

                        <!-- Time Only -->
                        <div class="col-6">
                            <label class="form-label">Time Created</label>
                            <input type="time" 
                                class="form-control" 
                                :value="createdTime" 
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" v-model="allowanceName" placeholder="Enter Name of Allowance">
                        </div>
                        <div class="col-12 mt-4">
                            <button type="button" class="btn btn-primary" @click="saveAllowance">
                                <i class="i-Yes me-2"></i> @{{ isEditing ? "Update" : "Submit" }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
    <div class="wrapper">
        <div class="card mt-4">
        <div class="card-body">
            <!-- Status Tabs -->
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item" v-for="status in statusList" :key="status.value">
                        <a href="#" class="nav-link" 
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
                                    <button type="button" class="btn btn-outline-info ripple m-1 btn-sm collapsed" aria-expanded="false" aria-controls="sidebar-right" style="overflow-anchor: none;"><i class="i-Filter-2"></i>
                                    Filter
                                    </button> <button type="button" class="btn btn-outline-success ripple m-1 btn-sm"><i class="i-File-Copy"></i> PDF
                                    </button> <button class="btn btn-sm btn-outline-danger ripple m-1"><i class="i-File-Excel"></i> EXCEL
                                    </button><button @click="openAddModal" class="btn btn-primary btn-rounded btn-icon m-1">
                                        <i class="i-Add"></i> Add
                                    </button>
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
                                </colgroup>
                                <thead>
                                <tr>
                                    <!----> 
                                    <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align text-left w-190px sortable" style="min-width: auto; width: auto;"><span>Date and Time Created</span> <button><span class="sr-only">
                                        Sort table by Date and Time Created in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-1" class="vgt-left-align text-left w-220px sortable" style="min-width: auto; width: auto;"><span>Created By</span> <button><span class="sr-only">
                                        Sort table by Created By in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Name</span> <button><span class="sr-only">
                                        Sort table by Name in descending order
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
                                    <tr v-for="row in filteredRecords" :key="row.id">
                                        <td class="vgt-checkbox-col">
                                            <input type="checkbox" :value="row.id">
                                        </td>
                                        <td class="vgt-left-align text-left w-190px"> @{{ formatDateTime(row.created_at) }}</td>
                                        <td class="vgt-left-align text-left w-220px">@{{ row.created_by_name }}</td>
                                        <td class="vgt-left-align text-left w-160px">@{{ row.name }}</td>
                                        <td class="vgt-left-align text-right">
                                            <actions-dropdown :row="row" 
                                                @edit-allowance="openEditModal"
                                                @archive-allowance="archiveAllowance"
                                                @restore-allowance="restoreAllowance"
                                                @delete-allowance="deleteAllowance"
                                            ></actions-dropdown>
                                        </td>

                                    <tr v-if="records.length === 0">
                                        <td colspan="6" class="text-center text-muted">No data available.</td>
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
    <ul :class="['dropdown-menu dropdown-menu-right', { show: isOpen }]">
        <template v-if="row.status === 'archived'">
            <li>
                <a class="dropdown-item" @click.prevent="editAllowance">
                    <i class="nav-icon i-Edit font-weight-bold mr-2"></i>
                    Edit
                </a>
            </li>
            <li>
                <a class="dropdown-item text-danger" href="#" @click.prevent="$emit('delete-allowance', row.id)">
                    <i class="nav-icon i-Remove-Basket font-weight-bold mr-2"></i>
                    Permanently Delete
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('restore-allowance', row.id)">
                    <i class="nav-icon i-Restore-Window font-weight-bold mr-2"></i>
                    Restore as Active
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="dropdown-item" @click="$emit('open-remarks', allowanceId)">
                    <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                    Remarks
                </a>
            </li>
        </template>
        <template v-else>
            <li>
                <a class="dropdown-item" href="#"
                @click.prevent="editAllowance">
                    <i class="nav-icon i-Edit font-weight-bold mr-2"></i>
                    Edit
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="archiveAllowance">
                    <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i>
                    Move to Archive
                </a>
            </li>
            <li>
                <a class="dropdown-item" :href="`/workforce-allowances/${allowanceId}/logs`">
                    <i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i>
                    Logs
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="dropdown-item" @click="$emit('open-remarks', allowanceId)">
                    <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                    Remarks
                </a>
            </li>
        </template>
    </ul>
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
        editAllowance() {
            // Emit event to parent with the row
            this.$emit('edit-allowance', this.row);
            this.isOpen = false; // close dropdown
        },
        archiveAllowance() {
            // Emit event to parent with the allowance ID
            this.$emit('archive-allowance', this.row.id);
            this.isOpen = false; // close dropdown
        },
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
            statusFilter: 'active',
            statusList: [
                { label: 'Active', value: 'active' },
                { label: 'Archived', value: 'archived' },
            ],
            createdDate: '',
            createdTime: '',
            isEditing: false,
            editId: null,
            allowanceName: '',
        }
    },

    mounted() {
        this.fetchRecords();
        const now = new Date();
        const manilaTime = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Manila' }));

        this.createdDate = manilaTime.toISOString().split('T')[0]; // YYYY-MM-DD
        this.createdTime = manilaTime.toTimeString().slice(0, 5);   // HH:MM (24h)
        },

        methods: {
            openAddModal() {
                this.isEditing = false;
                this.editId = null;

                this.allowanceName = '';

                const now = new Date();
                const manila = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Manila' }));

                this.createdDate = manila.toISOString().split('T')[0];
                this.createdTime = manila.toTimeString().slice(0, 5);

                const modalEl = document.getElementById('allowancesModal');
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            },

            openEditModal(row) {
                this.isEditing = true;
                this.editId = row.id;

                this.allowanceName = row.name;

                // Format existing created date & time
                const created = new Date(row.created_at);
                const manila = new Date(created.toLocaleString('en-US', { timeZone: 'Asia/Manila' }));

                this.createdDate = manila.toISOString().split('T')[0];
                this.createdTime = manila.toTimeString().slice(0, 5);

                const modalEl = document.getElementById('allowancesModal');
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            },
            async archiveAllowance(allowanceId) {
                try {
                    const res = await axios.patch(`/workforce-allowances/${allowanceId}/archive`);
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Archived!',
                        text: res.data.message,
                        timer: 1500,
                        showConfirmButton: false
                    });

                    // Refresh the table
                    this.fetchRecords(this.pagination.current_page);
                } catch (err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: err.response?.data?.message || 'Something went wrong'
                    });
                }
            },
            async restoreAllowance(allowanceId) {
                try {
                    const res = await axios.patch(`/workforce-allowances/${allowanceId}/restore`);
                    Swal.fire({
                        icon: 'success',
                        title: 'Restored!',
                        text: res.data.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    this.fetchRecords(this.pagination.current_page);
                } catch (err) {
                    Swal.fire("Error", err.response?.data?.message || "Something went wrong.", "error");
                }
            },

            async deleteAllowance(allowanceId) {
                const confirm = await Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: "This will permanently delete the allowance!",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'Cancel'
                });

                if (!confirm.isConfirmed) return;

                try {
                    await axios.delete(`/workforce-allowances/${allowanceId}`);
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: "Allowance has been deleted.",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    this.fetchRecords(this.pagination.current_page);
                } catch (err) {
                    Swal.fire("Error", err.response?.data?.message || "Something went wrong.", "error");
                }
            },
            fetchRecords(page = 1) {
                axios.get("{{ route('allowances.fetch') }}", {
                    params: {
                        status: this.statusFilter,
                        page: page,
                        per_page: this.pagination.per_page,
                    }
                })
                .then(response => {

                    const res = response.data;

                    // Main data
                    this.records = res.data || res;

                    console.log("✅ Fetched records:", this.records);

                    // Pagination (if API paginated)
                    if (res.current_page) {
                        this.pagination.current_page = res.current_page;
                        this.pagination.per_page = res.per_page;
                        this.pagination.total = res.total;
                        this.pagination.from = res.from;
                        this.pagination.to = res.to;
                        this.pagination.last_page = res.last_page;
                    }
                })
                .catch(error => {
                    console.error("❌ Error fetching records:", error);
                });
            },

            // Reformatted date/time to Asia/Manila
            formatDateTime(datetime) {
                if (!datetime) return '';

                return new Date(datetime).toLocaleString('en-US', {
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
                this.statusFilter = status;
                this.fetchRecords(1);
            },
            async saveAllowance() {
                if (!this.allowanceName || this.allowanceName.trim() === "") {
                    return Swal.fire("Required", "Allowance name is required.", "warning");
                }

                let payload = {
                    name: this.allowanceName.trim(),
                };

                try {
                    let res;

                    if (this.isEditing) {
                        // UPDATE
                        res = await axios.put(`/workforce-allowances/${this.editId}`, payload);
                    } else {
                        // CREATE
                        res = await axios.post('/workforce-allowances', payload);
                    }

                    Swal.fire({
                        icon: "success",
                        title: this.isEditing ? "Updated successfully!" : "Added successfully!",
                        timer: 1500,
                        showConfirmButton: false
                    });

                    this.fetchRecords();
                    bootstrap.Modal.getInstance(document.getElementById('allowancesModal')).hide();

                } catch (err) {
                    Swal.fire("Error", err.response?.data?.message || "Something went wrong.", "error");
                }
            }


        },
        computed: {
            filteredRecords() {
                return this.records.filter(r => r.status === this.statusFilter);
            },
            currentDate() {
                return new Date().toLocaleDateString('en-CA'); // YYYY-MM-DD format
            },
            currentTime() {
                return new Date().toLocaleString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true,
                    timeZone: 'Asia/Manila'
                });
            }
        }
});
</script>
@endsection