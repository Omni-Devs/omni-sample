@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Accounts Receivable</h1>
            <ul>
                <li><a href="">Accounting</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <div class="card-wrapper">
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
        </div>
        <div class="card-body">
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                        Pending
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                        Approved
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                        Completed
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                        Disapproved
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection