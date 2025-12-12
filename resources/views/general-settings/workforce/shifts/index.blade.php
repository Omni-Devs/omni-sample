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
            <h1 class="mr-3">Shifts</h1>
            <ul>
                <li><a href="">Workforce Settings</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <!-- ==================== ADD MODAL ==================== -->
    <div class="modal fade" id="shiftsModal" tabindex="-1" aria-labelledby="shiftsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shiftsModalLabel">
                        @{{ isEditing ? "Edit Shift" : "Add Shift" }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- NAME -->
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" v-model="shiftName" placeholder="Enter Shift Name">
                        </div>

                        <!-- Schedules row -->
                        <div class="col-md-12 mt-4">
                            <label class="form-label fw-bold">Schedules</label>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Start</label>
                            <input type="time" class="form-control" v-model="timeStart">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">End</label>
                            <input type="time" class="form-control" v-model="timeEnd">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Break Start</label>
                            <input type="time" class="form-control" v-model="breakStart">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Break End</label>
                            <input type="time" class="form-control" v-model="breakEnd">
                        </div>

                        <!-- WEEKDAY SETTINGS -->
                        <div class="col-md-12 mt-4">
                            <label class="form-label fw-bold">Weekly Schedule</label>

                            <table class="table table-bordered mt-2">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th class="text-center">Work Day</th>
                                        <th class="text-center">Rest Day</th>
                                        <th class="text-center">Open Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="day in ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']" :key="day">
                                        <td>@{{ day }}</td>
                                        
                                        <td class="text-center">
                                            <input type="radio" :name="'day_' + day" value="work" v-model="dayType[day]">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" :name="'day_' + day" value="rest" v-model="dayType[day]">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" :name="'day_' + day" value="open" v-model="dayType[day]">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="button" class="btn btn-primary" @click="saveShift">
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
                                    <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align text-left w-190px sortable" style="min-width: auto; width: auto;"><span>Name</span> <button><span class="sr-only">
                                        Sort table by Name in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-1" class="vgt-left-align text-left w-220px sortable" style="min-width: auto; width: auto;"><span>Start</span> <button><span class="sr-only">
                                        Sort table by Start By in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>End</span> <button><span class="sr-only">
                                        Sort table by End in descending order
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
                                        <td class="vgt-left-align text-left w-190px"> @{{ row.name }}</td>
                                        <td class="vgt-left-align text-left w-220px">@{{ formatTime12Hour(row.time_start) }}</td>
                                        <td class="vgt-left-align text-left w-160px">@{{ formatTime12Hour(row.time_end) }}</td>
                                         <!-- 🔒 Hidden but included in row so Vue receives them -->
                                        <td style="display:none;">@{{ row.work_days }}</td>
                                        <td style="display:none;">@{{ row.rest_days }}</td>
                                        <td style="display:none;">@{{ row.open_time }}</td>
                                        <td class="vgt-left-align text-right">
                                            <actions-dropdown :row="row" 
                                                @edit-shift="openEditModal"
                                                @archive-shift="archiveShift"
                                                @restore-shift="restoreShift"
                                                @delete-shift="deleteShift"
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
                <a class="dropdown-item" @click.prevent="editShift">
                    <i class="nav-icon i-Edit font-weight-bold mr-2"></i>
                    Edit
                </a>
            </li>
            <li>
                <a class="dropdown-item text-danger" href="#" @click.prevent="$emit('delete-shift', row.id)">
                    <i class="nav-icon i-Remove-Basket font-weight-bold mr-2"></i>
                    Permanently Delete
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('restore-shift', row.id)">
                    <i class="nav-icon i-Restore-Window font-weight-bold mr-2"></i>
                    Restore as Active
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="dropdown-item" @click="$emit('open-remarks', shiftId)">
                    <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                    Remarks
                </a>
            </li>
        </template>
        <template v-else>
            <li>
                <a class="dropdown-item" href="#"
                @click.prevent="editShift">
                    <i class="nav-icon i-Edit font-weight-bold mr-2"></i>
                    Edit
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="archiveShift">
                    <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i>
                    Move to Archive
                </a>
            </li>
            <li>
                <a class="dropdown-item" :href="`/workforce-shifts/${shiftId}/logs`">
                    <i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i>
                    Logs
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="dropdown-item" @click="$emit('open-remarks', shiftId)">
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
        editShift() {
            // Emit event to parent with the row
            this.$emit('edit-shift', this.row);
            this.isOpen = false; // close dropdown
        },
        archiveShift() {
            // Emit event to parent with the shift ID
            this.$emit('archive-shift', this.row.id);
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
            timeStart: '',
            timeEnd: '',
            breakStart: '',
            breakEnd: '',
            dayType: {
                Monday: 'work',
                Tuesday: 'work',
                Wednesday: 'work',
                Thursday: 'work',
                Friday: 'work',
                Saturday: 'rest',
                Sunday: 'rest'
            },
            workDays: ['Monday','Tuesday','Wednesday','Thursday','Friday'],
            restDays: ['Saturday','Sunday'],
            openTimes: [],
            isEditing: false,
            editId: null,
            shiftName: '',
        }
    },

    mounted() {
        this.fetchRecords();
        },

        methods: {
            openAddModal() {
                this.isEditing = false;
                this.editId = null;

                this.shiftName = '';
                this.timeStart = '';
                this.timeEnd = '';
                this.breakStart = '';
                this.breakEnd = '';
                this.workDays = [];
                this.restDays = [];
                this.openTimes = [];

                const modalEl = document.getElementById('shiftsModal');
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            },

            openEditModal(row) {
                this.isEditing = true;
                this.editId = row.id;

                this.shiftName = row.name;
                this.timeStart = row.time_start;
                this.timeEnd = row.time_end;
                this.breakStart = row.break_start;
                this.breakEnd = row.break_end;
                
                 // Convert JSON fields to arrays
                this.workDays = Array.isArray(row.work_days) ? [...row.work_days] : [];
                this.restDays = Array.isArray(row.rest_days) ? [...row.rest_days] : [];
                this.openTimes = Array.isArray(row.open_time) ? [...row.open_time] : [];

                // Wait for DOM update ---> then open modal
                this.$nextTick(() => {
                    const modalEl = document.getElementById("shiftsModal");
                    const modal = new bootstrap.Modal(modalEl);
                    modal.show();
                });
            },
            async archiveShift(shiftId) {
                try {
                    const res = await axios.patch(`/workforce-shifts/${shiftId}/archive`);
                    
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
            async restoreShift(shiftId) {
                try {
                    const res = await axios.patch(`/workforce-shifts/${shiftId}/restore`);
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

            async deleteShift(shiftId) {
                const confirm = await Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: "This will permanently delete the shift!",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'Cancel'
                });

                if (!confirm.isConfirmed) return;

                try {
                    await axios.delete(`/workforce-shifts/${shiftId}`);
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: "Shift has been deleted.",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    this.fetchRecords(this.pagination.current_page);
                } catch (err) {
                    Swal.fire("Error", err.response?.data?.message || "Something went wrong.", "error");
                }
            },
            fetchRecords(page = 1) {
                axios.get("{{ route('shifts.fetch') }}", {
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
            setStatus(status) {
                this.statusFilter = status;
                this.fetchRecords(1);
            },
            async saveShift() {
                if (!this.shiftName || this.shiftName.trim() === "") {
                    return Swal.fire("Required", "Shift name is required.", "warning");
                }

                // Prepare arrays based on dayType
                const workDays = [];
                const restDays = [];
                const openTimes = [];

                const defaultDayType = {
                    Monday: 'work',
                    Tuesday: 'work',
                    Wednesday: 'work',
                    Thursday: 'work',
                    Friday: 'work',
                    Saturday: 'rest',
                    Sunday: 'rest'
                };

                for (const day of Object.keys(defaultDayType)) {
                    const type = this.dayType[day] || defaultDayType[day]; // fallback to default
                    if (type === 'work') workDays.push(day);
                    else if (type === 'rest') restDays.push(day);
                    else if (type === 'open') openTimes.push(day);
                }

                const payload = {
                    name: this.shiftName.trim(),
                    time_start: this.timeStart,
                    time_end: this.timeEnd,
                    break_start: this.breakStart || null,
                    break_end: this.breakEnd || null,
                    work_days: workDays,
                    rest_days: restDays,
                    open_time: openTimes
                };

                try {
                    let res;
                    if (this.isEditing) {
                        res = await axios.put(`/workforce-shifts/${this.editId}`, payload);
                    } else {
                        res = await axios.post(`/workforce-shifts`, payload);
                    }

                    Swal.fire({
                        icon: "success",
                        title: this.isEditing ? "Updated successfully!" : "Added successfully!",
                        timer: 1500,
                        showConfirmButton: false
                    });

                    this.fetchRecords();
                    bootstrap.Modal.getInstance(document.getElementById("shiftsModal")).hide();

                } catch (err) {
                    Swal.fire("Error", err.response?.data?.message || "Something went wrong.", "error");
                }
            },
            formatTime12Hour(time) {
                if (!time) return '';
                const [hourStr, minute] = time.split(':');
                let hour = parseInt(hourStr);
                const ampm = hour >= 12 ? 'PM' : 'AM';
                hour = hour % 12;
                if (hour === 0) hour = 12;
                return `${hour}:${minute} ${ampm}`;
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