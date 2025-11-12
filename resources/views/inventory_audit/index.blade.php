@extends('layouts.app')
@section('content')
<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Inventory</h1>
            <ul>
            <li><a href=""> Audit </a></li>
            <!----> <!---->
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <fieldset class="form-group">
                    <legend class="col-form-label pt-0">Select Year *</legend>
                    <v-select
                    v-model="selectedYear"
                    :options="yearOptions"
                    :clearable="false"
                    placeholder="Select year"
                    label="label"
                    ></v-select>
                </fieldset>
            </div>
            <div class="col-sm-12 col-md-3">
                <fieldset class="form-group">
                <legend class="col-form-label pt-0">Select Month *</legend>
                <v-select
                    v-model="selectedMonth"
                    :options="monthOptions"
                    :clearable="false"
                    placeholder="Select month"
                    label="label"
                />
                </fieldset>
            </div>
            <div class="col-sm-12 col-md-3">
                <fieldset class="form-group">
                    <legend class="col-form-label pt-0">Select Type of Audit</legend>
                    <v-select
                    v-model="selectedType"
                    :options="auditTypeOptions"
                    :clearable="true"
                    placeholder="Select type"
                    label="label"
                    ></v-select>
                </fieldset>
            </div>
        </div>
        <div class="card mt-4">
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="/kitchen" 
                            class="nav-link active">
                            Audit Logs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/kitchen/served" 
                            class="nav-link">
                            Completed
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/kitchen/walked"
                            class="nav-link">
                            Archived
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
                                    <label for="vgt-search-426127929825">
                                        <span aria-hidden="true" class="input__icon">
                                        <div class="magnifying-glass"></div>
                                        </span>
                                        <span class="sr-only">Search</span>
                                    </label>
                                    <input id="vgt-search-426127929825" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                                </form>
                            </div>
                            <div class="vgt-global-search__actions vgt-pull-right">
                                <div class="mt-2 mb-3">
                                    <div id="dropdown-form" class="dropdown b-dropdown m-2 btn-group" rounded="">
                                        <!----><button id="dropdown-form__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"><i class="i-Gear"></i></button>
                                        <ul role="menu" tabindex="-1" aria-labelledby="dropdown-form__BV_toggle_" class="dropdown-menu dropdown-menu-right">
                                        <li role="presentation">
                                            <header id="dropdown-header-label" class="dropdown-header">
                                                Columns
                                            </header>
                                        </li>
                                        <li role="presentation">
                                            <form tabindex="-1" class="b-dropdown-form">
                                                <ul class="list-unstyled">
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__220"><label class="custom-control-label" for="__BVID__220">Date and Time of Entry</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__221"><label class="custom-control-label" for="__BVID__221">Date and Time of Actual Audit</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__222"><label class="custom-control-label" for="__BVID__222">Audited by</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__223"><label class="custom-control-label" for="__BVID__223">Reference #</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__224"><label class="custom-control-label" for="__BVID__224">Warehouse</label></div>
                                                    </li>
                                                    <li>
                                                    <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__225"><label class="custom-control-label" for="__BVID__225">Action</label></div>
                                                    </li>
                                                    <li><button type="button" class="btn mt-2 mb-3 btn-primary btn-sm">Save</button></li>
                                                </ul>
                                            </form>
                                        </li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-outline-info ripple m-1 btn-sm collapsed" aria-expanded="false" aria-controls="sidebar-right" style="overflow-anchor: none;"><i class="i-Filter-2"></i>
                                    Filter
                                    </button> <button type="button" class="btn btn-outline-success ripple m-1 btn-sm"><i class="i-File-Copy"></i> PDF
                                    </button> <button class="btn btn-sm btn-outline-danger ripple m-1"><i class="i-File-Excel"></i> EXCEL
                                    </button> <a href="/inventory/audits/create" class="btn btn-primary btn-rounded btn-icon m-1"><i class="i-Add"></i>
                                    Add
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="vgt-fixed-header">
                            <!---->
                        </div>
                        <div class="vgt-responsive">
                            <table id="vgt-table" class="table-hover tableOne vgt-table">
                                <thead>
                                <tr>
                                    <th class="vgt-checkbox-col"><input type="checkbox" /></th>
                                    <th class="vgt-left-align text-left sortable">Date and Time of Entry</th>
                                    <th class="vgt-left-align text-left sortable">Date and Time of Actual Audit</th>
                                    <th class="vgt-left-align text-left sortable">Audited by</th>
                                    <th class="vgt-left-align text-left sortable">Reference #</th>
                                    <th class="vgt-left-align text-left sortable">Warehouse</th>
                                    <th class="vgt-left-align text-right">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <!-- When there are records -->
                                <tr v-for="(audit, index) in audits" :key="index">
                                    <th class="vgt-checkbox-col"><input type="checkbox" /></th>
                                    <td class="vgt-left-align text-left">@{{ audit.entry_datetime }}</td>
                                    <td class="vgt-left-align text-left">@{{ audit.audit_datetime }}</td>
                                    <td class="vgt-left-align text-left">@{{ audit.audited_by }}</td>
                                    <td class="vgt-left-align text-left">@{{ audit.reference_no }}</td>
                                    <td class="vgt-left-align text-left">@{{ audit.warehouse }}</td>
                                    <td class="vgt-left-align text-right">
                                    {{-- Actions --}}
                                    <td class="text-right">
                                        @include('layouts.actions-dropdown', [
                                        'id' => 'audit.id',
                                        'editRoute' => '#',
                                        'adjustmentRoute' => '#',
                                        'viewAuditRoute' => '#',
                                        'archived' => '#',
                                        'logsRoute' => '#',
                                        'remarksRoute' => '#',
                                    ])
                                    </td>
                                </tr>

                                <!-- When no records -->
                                <tr v-if="audits.length === 0">
                                    <td colspan="7" class="text-center text-muted py-3">
                                    No records found as of the moment.
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

<script>
Vue.component('v-select', VueSelect.VueSelect);

new Vue({
    el: '#app',
    data() {
        return {
            selectedYear: null,
            yearOptions: @json($yearOptions), // Use dynamic years from PHP
             monthOptions: [
            { label: 'All Months', value: 'All Months' },
            { label: 'January', value: 'January' },
            { label: 'February', value: 'February' },
            { label: 'March', value: 'March' },
            { label: 'April', value: 'April' },
            { label: 'May', value: 'May' },
            { label: 'June', value: 'June' },
            { label: 'July', value: 'July' },
            { label: 'August', value: 'August' },
            { label: 'September', value: 'September' },
            { label: 'October', value: 'October' },
            { label: 'November', value: 'November' },
            { label: 'December', value: 'December' },
            ],
            selectedMonth: { label: 'All Months', value: 'All Months' },
            selectedType: 'Products',
            auditTypeOptions: [
                { label: 'Products', value: 'products' },
                { label: 'Components', value: 'components' },
                { label: 'Consumables/Engineering', value: 'consumables' },
                { label: 'Assets', value: 'assets' },
            ],
            audits: @json($audits),
        };
    },
    created() {
        // Default selected year = latest year in options
        if (this.yearOptions.length) {
            this.selectedYear = this.yearOptions[this.yearOptions.length - 1].value;
        }
    },
    watch: {
        selectedYear() {
            this.fetchAudits();
        },
        selectedMonth(newVal) {
            this.fetchAudits();
        },
        selectedType() {
            this.fetchAudits();
        },
    },
    methods: {
        fetchAudits() {
        axios.get('{{ route('inventory_audit.fetch') }}', {
            params: {
                year: this.selectedYear,
                month: this.selectedMonth.value, // pass only value, not object
                type: this.selectedType.value || this.selectedType,
            }
        }).then(res => {
            this.audits = res.data.audits || [];
        }).catch(err => {
            console.error(err);
            this.audits = [];
        });
        },
    },
});
</script>

@endsection