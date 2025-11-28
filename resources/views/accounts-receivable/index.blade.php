@extends('layouts.app')
@section('content')
<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Accounts Receivable</h1>
            <ul>
                <li><a href="">Accounting</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <!-- Item Details Modal -->
    <div class="modal fade" id="ItemDetailsModal" tabindex="-1" aria-labelledby="ItemDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="ItemDetailsModalLabel">Amount Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="list-group">
                <div class="list-group-item p-0">
                    <table class="table mb-0">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Tax</th>
                        <th>Price/Unit</th>
                        <th>Sub-Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in modalItems" :key="index">
                            <td>@{{ index + 1 }}</td>
                            <td>@{{ item.category }}</td>
                            <td>@{{ item.type }}</td>
                            <td>@{{ item.description }}</td>
                            <td>@{{ item.quantity }}</td>
                            <td>₱@{{ item.tax.toFixed(2) }}</td>
                            <td>₱@{{ item.unit_price.toFixed(2) }}</td>
                            <td>₱@{{ item.subtotal.toFixed(2) }}</td>
                        </tr>
                    </tbody>
                    </table>

                    <div class="row mt-3">
                    <div class="offset-md-6 col-md-6">
                        <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                            <td class="bold">Tax</td>
                            <td>₱@{{ modalTax.toFixed(2) }}</td>
                            </tr>
                            <tr>
                            <td class="bold">Sub-Total</td>
                            <td>₱@{{ modalSubTotal.toFixed(2) }}</td>
                            </tr>
                            <tr>
                            <td><span class="font-weight-bold">Total Amount</span></td>
                            <td><span class="font-weight-bold">₱@{{ modalTotal.toFixed(2) }}</span></td>
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
    </div>



    <div class="wrapper">
        <div class="row row mb-4">
            <div class="col-sm-12 col-md-3">
                <fieldset class="form-group">
                    <legend class="col-form-label pt-0">Select Year *</legend>
                    <v-select
                        v-model="filter.year"         
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
                    v-model="filter.month"
                    :options="months"
                    :clearable="false"
                    placeholder="Select month"
                    label="label"
                />
                </fieldset>
            </div>
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
                                        <!----><button id="dropdown-form__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"><i class="i-Gear"></i></button>
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
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__309"><label class="custom-control-label" for="__BVID__309">Date and Time of Entry</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__310"><label class="custom-control-label" for="__BVID__310">Date And Time of Transaction</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__311"><label class="custom-control-label" for="__BVID__311">Created By</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__312"><label class="custom-control-label" for="__BVID__312">Branch</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__313"><label class="custom-control-label" for="__BVID__313">Transaction</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__314"><label class="custom-control-label" for="__BVID__314">Reference #</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__315"><label class="custom-control-label" for="__BVID__315">Payor</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__316"><label class="custom-control-label" for="__BVID__316">Payee</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__317"><label class="custom-control-label" for="__BVID__317">Amount Due</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__318"><label class="custom-control-label" for="__BVID__318">Amount Details</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__319"><label class="custom-control-label" for="__BVID__319">Due Date</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__320"><label class="custom-control-label" for="__BVID__320">Total received</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__321"><label class="custom-control-label" for="__BVID__321">Balance</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__322"><label class="custom-control-label" for="__BVID__322">Date of Completion</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__323"><label class="custom-control-label" for="__BVID__323">Status</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__324"><label class="custom-control-label" for="__BVID__324">Approved by</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__325"><label class="custom-control-label" for="__BVID__325">Date and Time Approved</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__326"><label class="custom-control-label" for="__BVID__326">Completed by</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__327"><label class="custom-control-label" for="__BVID__327">Date and Time Completed</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__328"><label class="custom-control-label" for="__BVID__328">Disapproved by</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__329"><label class="custom-control-label" for="__BVID__329">Date and Time Disapproved</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__330"><label class="custom-control-label" for="__BVID__330">Archived by</label></div>
                                                        </li>
                                                        <li>
                                                            <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__331"><label class="custom-control-label" for="__BVID__331">Date and Time Archived</label></div>
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
                                    <button type="button" class="btn btn-outline-info ripple m-1 btn-sm collapsed" aria-expanded="false" aria-controls="sidebar-right" style="overflow-anchor: none;"><i class="i-Filter-2"></i>
                                    Filter
                                    </button> <button type="button" class="btn btn-outline-success ripple m-1 btn-sm"><i class="i-File-Copy"></i> PDF
                                    </button> <button class="btn btn-sm btn-outline-danger ripple m-1"><i class="i-File-Excel"></i> EXCEL
                                    </button> <button type="button" class="btn btn-info m-1 btn-sm"><i class="i-Upload"></i>
                                    Import
                                    </button> <a href="/accounts-receivable/create" class="btn btn-primary btn-icon m-1"><i class="i-Add"></i>
                                    Add
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
                                    <col id="col-8">
                                    <col id="col-9">
                                    <col id="col-10">
                                    <col id="col-11">
                                    <col id="col-12">
                                    <col id="col-13">
                                    <col id="col-14">
                                    <col id="col-15">
                                    <col id="col-16">
                                    <col id="col-17">
                                    <col id="col-18">
                                    <col id="col-19">
                                    <col id="col-20">
                                    <col id="col-21">
                                    <col id="col-22">
                                    <col id="col-23">
                                </colgroup>
                                <thead>
                                <tr>
                                    <!----> 
                                    <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align text-left w-190px sortable" style="min-width: auto; width: auto;"><span>Date and Time of Entry</span> <button><span class="sr-only">
                                        Sort table by Date and Time of Entry in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-1" class="vgt-left-align text-left w-220px sortable" style="min-width: auto; width: auto;"><span>Date And Time of Transaction</span> <button><span class="sr-only">
                                        Sort table by Date And Time of Transaction in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Created By</span> <button><span class="sr-only">
                                        Sort table by Created By in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Branch</span> <button><span class="sr-only">
                                        Sort table by Branch in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Transaction</span> <button><span class="sr-only">
                                        Sort table by Transaction in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-5" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Reference #</span> <button><span class="sr-only">
                                        Sort table by Reference # in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-6" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Payor</span> <button><span class="sr-only">
                                        Sort table by Payor in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-7" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Payee</span> <button><span class="sr-only">
                                        Sort table by Payee in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-8" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Amount Due</span> <button><span class="sr-only">
                                        Sort table by Amount Due in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-9" class="vgt-left-align text-left w-160px" style="min-width: auto; width: auto;">
                                        <span>Amount Details</span> <!---->
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-10" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Due Date</span> <button><span class="sr-only">
                                        Sort table by Due Date in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-11" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Total received</span> <button><span class="sr-only">
                                        Sort table by Total received in descending order
                                        </span></button>
                                    </th>
                                    <th scope="col" aria-sort="descending" aria-controls="col-12" class="vgt-left-align text-left w-160px sortable" style="min-width: auto; width: auto;"><span>Balance</span> <button><span class="sr-only">
                                        Sort table by Balance in descending order
                                        </span></button>
                                    </th>
                                    <!---->
                                    <th scope="col" aria-sort="descending" aria-controls="col-14" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Status</span> <button><span class="sr-only">
                                        Sort table by Status in descending order
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

                                        <!-- Checkbox -->
                                        <td>
                                            <input type="checkbox" :value="row.id">
                                        </td>

                                        <!-- Date and Time of Entry -->
                                        <td>@{{ row.created_at }}</td>

                                        <!-- Date and Time of Transaction -->
                                        <td>@{{ row.transaction_datetime }}</td>

                                        <!-- Created By -->
                                        <td>@{{ row.user?.name }}</td>

                                        <!-- Branch -->
                                        <td>@{{ row.branch?.name }}</td>

                                        <!-- Transaction -->
                                        <td>@{{ row.transaction_type }}</td>

                                        <!-- Reference # -->
                                        <td>@{{ row.reference_no }}</td>

                                        <!-- Payor -->
                                        <td>@{{ row.payor_name }}</td>

                                        <!-- Payee -->
                                        <td>@{{ row.payee_details }}</td>

                                        <!-- Amount Due -->
                                        <td>@{{ row.amount_due }}</td>

                                        <!-- Amount Details -->
                                        <td><button class="btn btn-sm btn-primary" @click="openModal(row.items)">View</button></td>

                                        <!-- Due Date -->
                                        <td>@{{ row.due_date }}</td>

                                        <!-- Total Received -->
                                        <td>@{{ row.total_received }}</td>

                                        <!-- Balance -->
                                        <td>@{{ row.balance }}</td>

                                        <!-- Status -->
                                        <td>@{{ row.status }}</td>

                                        <!-- Action -->
                                        <td class="text-right">
                                            <actions-dropdown :row="row"></actions-dropdown>
                                        </td>
                                    </tr>

                                    <tr v-if="records.length === 0">
                                        <td colspan="20" class="text-center text-muted">No data available.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="vgt-wrap__footer vgt-clearfix">
                            <div class="footer__row-count vgt-pull-left">
                                <form>
                                    <label for="vgt-select-rpp-163988036525" class="footer__row-count__label">Rows per page:</label> 
                                    <select id="vgt-select-rpp-163988036525" autocomplete="off" name="perPageSelect" aria-controls="vgt-table" class="footer__row-count__select">
                                        <option value="10">
                                        10
                                        </option>
                                        <option value="20">
                                        20
                                        </option>
                                        <option value="50">
                                        50
                                        </option>
                                        <option value="100">
                                        100
                                        </option>
                                        <!---->
                                    </select>
                                </form>
                            </div>
                            <div class="footer__navigation vgt-pull-right">
                                <div data-v-347cbcfa="" class="footer__navigation__page-info">
                                    <div data-v-347cbcfa="">
                                        1 - 10 of 32
                                    </div>
                                </div>
                                <!----> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span aria-hidden="true" class="chevron left"></span> <span>prev</span></button> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn"><span>next</span> <span aria-hidden="true" class="chevron right"></span></button> <!---->
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
    <!-- 3 Dots Button -->
    <button
        type="button"
        class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
        @click.stop="toggleDropdown"
        :aria-expanded="isOpen.toString()"
    >
        <span class="_dot _r_block-dot bg-dark"></span>
        <span class="_dot _r_block-dot bg-dark"></span>
        <span class="_dot _r_block-dot bg-dark"></span>
    </button>

    <ul :class="['dropdown-menu dropdown-menu-right', { show: isOpen }]">
        <!-- Archived -->
        <template v-if="row.status === 'archived'">
            <li>
                <a class="dropdown-item text-danger" href="#" @click.prevent="$emit('delete-permanently', row.id)">
                    <i class="nav-icon i-Remove-Basket font-weight-bold mr-2"></i>
                    Permanently Delete
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('restore-receivable', row.id)">
                    <i class="nav-icon i-Restore-Window font-weight-bold mr-2"></i>
                    Restore as Active
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="dropdown-item" @click="$emit('open-remarks', row.id)">
                    <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                    Remarks
                </a>
            </li>
        </template>

        <!-- Completed -->
        <template v-else-if="row.status === 'completed'">
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('view-invoice', row.id)">
                    <i class="nav-icon i-Receipt font-weight-bold mr-2"></i>
                    View Invoice
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i>
                    Logs
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="dropdown-item" @click="$emit('open-remarks', row.id)">
                    <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                    Remarks
                </a>
            </li>
        </template>

        <!-- Default / Pending / Active -->
        <template v-else>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('view-invoice', row.id)">
                    <i class="nav-icon i-Receipt font-weight-bold mr-2"></i>
                    View Invoice
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('approve', row.id)">
                    <i class="nav-icon i-Like font-weight-bold mr-2"></i>
                    Approve
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('disapprove', row.id)">
                    <i class="nav-icon i-Unlike-2 font-weight-bold mr-2"></i>
                    Disapprove
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('edit-receivable', row.id)">
                    <i class="nav-icon i-Edit font-weight-bold mr-2"></i>
                    Edit Receivable
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('add-attachment', row.id)">
                    <i class="nav-icon i-Add-File font-weight-bold mr-2"></i>
                    Add Attachment
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('view-attachments', row.id)">
                    <i class="nav-icon i-Files font-weight-bold mr-2"></i>
                    View Attached File
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('move-to-archive', row.id)">
                    <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i>
                    Move to Archive
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('edit-due-date', row.id)">
                    <i class="nav-icon i-Calendar font-weight-bold mr-2"></i>
                    Edit Due Date
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('logs', row.id)">
                    <i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i>
                    Logs
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('open-remarks', row.id)">
                    <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                    Remarks
                </a>
            </li>
        </template>
    </ul>
</div>
</script>



<script>
Vue.component('v-select', VueSelect.VueSelect);

const receivableData = @json($receivables);

window.yearRange = {
    min: {{ $minYear ?? 'null' }},
    max: {{ $maxYear ?? 'null' }}
};
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
        toggleDropdown() {
            this.isOpen = !this.isOpen;
        },
        handleClickOutside(event) {
            if (!this.$refs.dropdown.contains(event.target)) {
                this.isOpen = false;
            }
        },
        updateStatus(id, newStatus) {
            // Find the record locally
            const record = this.records.find(r => r.id === id);
            if (!record) return;

            // Update status locally
            record.status = newStatus;

            // Optional: send to backend
            axios.post(`/accounts-receivable/${id}/update-status`, { status: newStatus })
                .then(res => {
                    console.log('Status updated:', res.data);
                })
                .catch(err => {
                    console.error('Failed to update status:', err);
                    // revert locally if failed
                    record.status = record.status === 'approved' ? 'pending' : record.status === 'disapproved' ? 'pending' : record.status;
                });
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
            yearOptions: [],
            modalItems: [],
            months: [
                { label: 'All Months', value: 'all' },
                { label: 'January', value: 1 },
                { label: 'February', value: 2 },
                { label: 'March', value: 3 },
                { label: 'April', value: 4 },
                { label: 'May', value: 5 },
                { label: 'June', value: 6 },
                { label: 'July', value: 7 },
                { label: 'August', value: 8 },
                { label: 'September', value: 9 },
                { label: 'October', value: 10 },
                { label: 'November', value: 11 },
                { label: 'December', value: 12 },
            ],
            statusFilter: 'pending',
            statusList: [
                { label: 'Pending', value: 'pending' },
                { label: 'Approved', value: 'approved' },
                { label: 'Completed', value: 'completed' },
                { label: 'Disapproved', value: 'disapproved' },
                { label: 'Archived', value: 'archived' },
            ],

            filter: {
                year: null,
                month: { label: 'All Months', value: 'all' },
            },

            records: [],
        };
    },

    mounted() {
        this.generateYears();
        this.fetchRecords(); // load initial data
    },

    watch: {
        "filter.year"() {
            this.fetchRecords();
        },
        "filter.month"() {
            this.fetchRecords();
        }
    },

    methods: {
        openModal(items) {
            if (!items || items.length === 0) {
                console.warn('No items available for this record');
                this.modalItems = [];
                return;
            }

            this.modalItems = items.map(item => ({
                category: item.type ? item.type.category_receivable || 'N/A' : 'N/A',
                type: item.type ? item.type.type_receivable || 'N/A' : 'N/A',
                description: item.description || '',
                quantity: Number(item.qty || 0),
                unit_price: Number(item.unit_price || 0),
                tax: Number(item.tax_amount || 0),
                subtotal: Number(item.sub_total || (item.qty * item.unit_price || 0)),
            }));

            // console.log('Modal Items:', this.modalItems);

            const modalEl = document.getElementById('ItemDetailsModal');
            const modal = new bootstrap.Modal(modalEl);
            modal.show();
        },

        generateYears() {
            const min = window.yearRange.min;
            const max = window.yearRange.max;
            this.yearOptions = [];

            if (!min || !max) {
                const currentYear = new Date().getFullYear();
                this.yearOptions.push({ label: currentYear, value: currentYear });
                this.filter.year = currentYear;
                return;
            }

            for (let y = max; y >= min; y--) {
                this.yearOptions.push({ label: y.toString(), value: y });
            }

            const currentYear = new Date().getFullYear();
            this.filter.year = (currentYear >= min && currentYear <= max) ? currentYear : max;
        },

        setStatus(status) {
            this.statusFilter = status;
            this.fetchRecords();
        },

        fetchRecords() {
            if (!this.filter.year || !this.filter.month) return;

            axios.get('/accounts-receivable/filter', {
                params: {
                    year: this.filter.year,
                    month: this.filter.month.value,
                    status: this.statusFilter,
                }
            })
            .then(res => {
                this.records = res.data;
                console.log(this.records); // <-- Check if items exist
            })
            .catch(err => console.error(err));
        },

    },
    computed: {
         modalSubTotal() {
            return this.modalItems.reduce((sum, item) => sum + Number(item.subtotal), 0);
        },
        modalTax() {
            return this.modalItems.reduce((sum, item) => sum + Number(item.tax), 0);
        },
        modalTotal() {
            return this.modalSubTotal + this.modalTax;
        }
    },

});
</script>


@endsection