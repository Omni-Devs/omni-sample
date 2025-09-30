@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                <div class="card-header">
                    <h2>SUMMARY</h2>
                </div>
                <div class="p-4 mobile-reset-pb">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="javascript:void(0)">
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-301 mobile-mb-30 text-center">
                                <div class="card-body">
                                    <i class="i-Wallet"></i> 
                                    <div class="content">
                                        <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                        Total Funds
                                        </p>
                                        <p class="text-primary text-24 line-height-1 mb-2">
                                        ₱0.00
                                        </p>
                                        <button type="button" class="btn btn-outline-primary btn-sm">
                                        View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <a href="javascript:void(0)">
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-301 mobile-mb-30 text-center">
                                <div class="card-body">
                                    <i class="i-Library"></i> 
                                    <div class="content">
                                        <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                        Total Inventory Balance
                                        </p>
                                        <p class="text-primary text-24 line-height-1 mb-2">
                                        ₱0.00
                                        </p>
                                        <button type="button" class="btn btn-outline-primary btn-sm">
                                        View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-301 mobile-mb-30 text-center">
                            <div class="card-body">
                                <i class="i-Right-4"></i> 
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                        Total Receivables
                                    </p>
                                    <p class="text-primary text-24 line-height-1 mb-2">
                                        ₱0.00
                                    </p>
                                    <div class="d-flex">
                                        <select class="custom-select" id="__BVID__35">
                                        <option value="2025">2025</option>
                                        </select>
                                        <button type="button" class="btn btn-outline-primary ml-2 btn-sm">
                                        View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-301 mobile-mb-30 text-center">
                            <div class="card-body">
                                <i class="i-Left-4"></i> 
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                        Total Payables
                                    </p>
                                    <p class="text-primary text-24 line-height-1 mb-2">
                                        ₱0.00
                                    </p>
                                    <div class="d-flex">
                                        <select class="custom-select" id="__BVID__36">
                                        <option value="2025">2025</option>
                                        </select>
                                        <button type="button" class="btn btn-outline-primary ml-2 btn-sm">
                                        View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row sales-overview-mt-30">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <div data-v-1ebd09d2="" class="vue-daterange-picker">
                            <div data-v-1ebd09d2="" class="form-control reportrange-text"><i data-v-1ebd09d2="" class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span data-v-1ebd09d2="">Aug 1, 2025 - Aug 31, 2025</span><b data-v-1ebd09d2="" class="caret"></b></div>
                            <!---->
                        </div>
                    </div>
                    <button class="btn btn-primary pull-right">
                    GENERATE REPORT
                    </button>
                </div>
                <div class="p-4 mobile-reset-pb">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Sales <i>(Daily)</i>
                                </p>
                                <p class="text-muted">
                                    Thu Aug 14, 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div role="group" class="b-form-btn-label-control dropdown b-form-datepicker mb-2 form-control" id="__BVID__39__outer_" lang="en-US" aria-labelledby="__BVID__39__value_">
                                        <button type="button" aria-haspopup="dialog" aria-expanded="false" class="btn h-auto" id="__BVID__39">
                                        <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" aria-label="calendar" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-calendar b-icon bi">
                                            <g>
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                            </g>
                                        </svg>
                                        </button>
                                        <!---->
                                        <div role="dialog" tabindex="-1" aria-modal="false" class="dropdown-menu" id="__BVID__39__dialog_" aria-labelledby="__BVID__39__value_">
                                        <!---->
                                        </div>
                                        <label class="form-control" id="__BVID__39__value_" for="__BVID__39">Thursday, August 14, 2025</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Sales <i>(Weekly)</i>
                                </p>
                                <p class="text-muted">
                                    Sun Aug 10, 2025 to Sat Aug 16, 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div data-v-1ebd09d2="" class="vue-daterange-picker">
                                        <div data-v-1ebd09d2="" class="form-control reportrange-text"><i data-v-1ebd09d2="" class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span data-v-1ebd09d2="">Aug 10, 2025 - Aug 16, 2025</span><b data-v-1ebd09d2="" class="caret"></b></div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Sales <i>(Monthly)</i>
                                </p>
                                <p class="text-muted">
                                    August 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div role="group" class="input-group">
                                        <!---->
                                        <select class="custom-select" id="__BVID__44">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                        </select>
                                        <select class="custom-select" id="__BVID__45">
                                        <option value="2025">2025</option>
                                        </select>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Sales <i>(Yearly)</i>
                                </p>
                                <p class="text-muted">
                                    Year 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div dir="auto" class="v-select vs--single vs--searchable">
                                        <div id="vs1__combobox" role="combobox" aria-expanded="false" aria-owns="vs1__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                        <div class="vs__selected-options">
                                            <span class="vs__selected">
                                                2025
                                                <!---->
                                            </span>
                                            <input aria-autocomplete="list" aria-labelledby="vs1__combobox" aria-controls="vs1__listbox" type="search" autocomplete="off" class="vs__search">
                                        </div>
                                        <div class="vs__actions">
                                            <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear" style="display: none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                                    <path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                                </svg>
                                            </button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator">
                                                <path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                            </svg>
                                            <div class="vs__spinner" style="display: none;">Loading...</div>
                                        </div>
                                        </div>
                                        <ul id="vs1__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row sales-overview-mt-30">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2>
                            MONTHLY SALES REPORT (YEAR 2025)
                        </h2>
                        <div style="width: 120px;">
                            <div dir="auto" class="v-select vs--single vs--searchable">
                            <div id="vs2__combobox" role="combobox" aria-expanded="false" aria-owns="vs2__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                <div class="vs__selected-options">
                                    <span class="vs__selected">
                                        2025
                                        <!---->
                                    </span>
                                    <input aria-autocomplete="list" aria-labelledby="vs2__combobox" aria-controls="vs2__listbox" type="search" autocomplete="off" class="vs__search">
                                </div>
                                <div class="vs__actions">
                                    <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear" style="display: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                        <path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                        </svg>
                                    </button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator">
                                        <path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                    </svg>
                                    <div class="vs__spinner" style="display: none;">Loading...</div>
                                </div>
                            </div>
                            <ul id="vs2__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 mobile-reset-pb">
                    <div class="chart-wrapper">
                        <!----> 
                        <div class="echarts" _echarts_instance_="ec_1755149088586" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;">
                            <div style="position: relative; width: 1673px; height: 300px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;">
                            <canvas data-zr-dom-id="zr_0" width="1673" height="300" style="position: absolute; left: 0px; top: 0px; width: 1673px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row sales-overview-mt-30">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <div data-v-1ebd09d2="" class="vue-daterange-picker">
                            <div data-v-1ebd09d2="" class="form-control reportrange-text"><i data-v-1ebd09d2="" class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span data-v-1ebd09d2="">Aug 1, 2025 - Aug 31, 2025</span><b data-v-1ebd09d2="" class="caret"></b></div>
                            <!---->
                        </div>
                    </div>
                    <button class="btn btn-primary pull-right">
                    GENERATE REPORT
                    </button>
                </div>
                <div class="p-4 mobile-reset-pb">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Expenses <i>(Daily)</i>
                                </p>
                                <p class="text-muted">
                                    Thu Aug 14, 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div role="group" class="b-form-btn-label-control dropdown b-form-datepicker mb-2 form-control" id="__BVID__57__outer_" lang="en-US" aria-labelledby="__BVID__57__value_">
                                        <button type="button" aria-haspopup="dialog" aria-expanded="false" class="btn h-auto" id="__BVID__57">
                                        <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" aria-label="calendar" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-calendar b-icon bi">
                                            <g>
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                            </g>
                                        </svg>
                                        </button>
                                        <!---->
                                        <div role="dialog" tabindex="-1" aria-modal="false" class="dropdown-menu" id="__BVID__57__dialog_" aria-labelledby="__BVID__57__value_">
                                        <!---->
                                        </div>
                                        <label class="form-control" id="__BVID__57__value_" for="__BVID__57">Thursday, August 14, 2025</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Expenses <i>(Weekly)</i>
                                </p>
                                <p class="text-muted">
                                    Sun Aug 10, 2025 to Sat Aug 16, 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div data-v-1ebd09d2="" class="vue-daterange-picker">
                                        <div data-v-1ebd09d2="" class="form-control reportrange-text"><i data-v-1ebd09d2="" class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span data-v-1ebd09d2="">Aug 10, 2025 - Aug 16, 2025</span><b data-v-1ebd09d2="" class="caret"></b></div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Expenses <i>(Monthly)</i>
                                </p>
                                <p class="text-muted">
                                    August 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div role="group" class="input-group">
                                        <!---->
                                        <select class="custom-select" id="__BVID__62">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                        </select>
                                        <select class="custom-select" id="__BVID__63">
                                        <option value="2025">2025</option>
                                        </select>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Expenses <i>(Yearly)</i>
                                </p>
                                <p class="text-muted">
                                    Year 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div dir="auto" class="v-select vs--single vs--searchable">
                                        <div id="vs3__combobox" role="combobox" aria-expanded="false" aria-owns="vs3__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                        <div class="vs__selected-options">
                                            <span class="vs__selected">
                                                2025
                                                <!---->
                                            </span>
                                            <input aria-autocomplete="list" aria-labelledby="vs3__combobox" aria-controls="vs3__listbox" type="search" autocomplete="off" class="vs__search">
                                        </div>
                                        <div class="vs__actions">
                                            <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear" style="display: none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                                    <path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                                </svg>
                                            </button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator">
                                                <path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                            </svg>
                                            <div class="vs__spinner" style="display: none;">Loading...</div>
                                        </div>
                                        </div>
                                        <ul id="vs3__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row sales-overview-mt-30">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2>
                            MONTHLY EXPENSES REPORT (YEAR
                            2025)
                        </h2>
                        <div style="width: 120px;">
                            <div dir="auto" class="v-select vs--single vs--searchable">
                            <div id="vs4__combobox" role="combobox" aria-expanded="false" aria-owns="vs4__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                <div class="vs__selected-options">
                                    <span class="vs__selected">
                                        2025
                                        <!---->
                                    </span>
                                    <input aria-autocomplete="list" aria-labelledby="vs4__combobox" aria-controls="vs4__listbox" type="search" autocomplete="off" class="vs__search">
                                </div>
                                <div class="vs__actions">
                                    <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear" style="display: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                        <path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                        </svg>
                                    </button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator">
                                        <path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                    </svg>
                                    <div class="vs__spinner" style="display: none;">Loading...</div>
                                </div>
                            </div>
                            <ul id="vs4__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 mobile-reset-pb">
                    <div class="chart-wrapper">
                        <!----> 
                        <div class="echarts" _echarts_instance_="ec_1755149088587" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;">
                            <div style="position: relative; width: 1673px; height: 300px; padding: 0px; margin: 0px; border-width: 0px;">
                            <canvas data-zr-dom-id="zr_0" width="1673" height="300" style="position: absolute; left: 0px; top: 0px; width: 1673px; height: 300px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row sales-overview-mt-30">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                <div class="card-header">
                    <h2 class="pull-left">SALES AND EXPENSES</h2>
                    <button class="btn btn-primary pull-right">
                    GENERATE STATEMENT
                    </button>
                </div>
                <div class="p-4 mobile-reset-pb">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Net Profit <i>(Daily)</i>
                                </p>
                                <p class="text-muted">
                                    Thu Aug 14, 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div role="group" class="b-form-btn-label-control dropdown b-form-datepicker mb-2 form-control" id="__BVID__73__outer_" lang="en-US" aria-labelledby="__BVID__73__value_">
                                        <button type="button" aria-haspopup="dialog" aria-expanded="false" class="btn h-auto" id="__BVID__73">
                                        <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" aria-label="calendar" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-calendar b-icon bi">
                                            <g>
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>
                                            </g>
                                        </svg>
                                        </button>
                                        <!---->
                                        <div role="dialog" tabindex="-1" aria-modal="false" class="dropdown-menu" id="__BVID__73__dialog_" aria-labelledby="__BVID__73__value_">
                                        <!---->
                                        </div>
                                        <label class="form-control" id="__BVID__73__value_" for="__BVID__73">Thursday, August 14, 2025</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Net Profit <i>(Weekly)</i>
                                </p>
                                <p class="text-muted">
                                    Sun Aug 10, 2025 to Sat Aug 16, 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div data-v-1ebd09d2="" class="vue-daterange-picker">
                                        <div data-v-1ebd09d2="" class="form-control reportrange-text"><i data-v-1ebd09d2="" class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span data-v-1ebd09d2="">Aug 10, 2025 - Aug 16, 2025</span><b data-v-1ebd09d2="" class="caret"></b></div>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Net Profit
                                    <i>(Monthly)</i>
                                </p>
                                <p class="text-muted">
                                    August 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div role="group" class="input-group">
                                        <!---->
                                        <select class="custom-select" id="__BVID__78">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                        </select>
                                        <select class="custom-select" id="__BVID__79">
                                        <option value="2025">2025</option>
                                        </select>
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card mb-301 mobile-mb-30">
                            <div class="card-body">
                                <p class="text-muted mt-2 mb-0 text-14 text-bold">
                                    Total Net Profit <i>(Yearly)</i>
                                </p>
                                <p class="text-muted">
                                    Year 2025
                                </p>
                                <p class="text-primary text-24 line-height-1 mb-2">
                                    ₱0.00
                                </p>
                                <hr class="mt-3 mb-3">
                                <div class="mb-0">
                                    <div dir="auto" class="v-select vs--single vs--searchable">
                                        <div id="vs5__combobox" role="combobox" aria-expanded="false" aria-owns="vs5__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                        <div class="vs__selected-options">
                                            <span class="vs__selected">
                                                2025
                                                <!---->
                                            </span>
                                            <input aria-autocomplete="list" aria-labelledby="vs5__combobox" aria-controls="vs5__listbox" type="search" autocomplete="off" class="vs__search">
                                        </div>
                                        <div class="vs__actions">
                                            <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear" style="display: none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                                    <path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                                </svg>
                                            </button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator">
                                                <path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                            </svg>
                                            <div class="vs__spinner" style="display: none;">Loading...</div>
                                        </div>
                                        </div>
                                        <ul id="vs5__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row sales-overview-mt-30">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h2>SALES AND EXPENSES</h2>
                        <div style="width: 120px;">
                            <div dir="auto" class="v-select vs--single vs--searchable">
                            <div id="vs6__combobox" role="combobox" aria-expanded="false" aria-owns="vs6__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                <div class="vs__selected-options">
                                    <span class="vs__selected">
                                        2025
                                        <!---->
                                    </span>
                                    <input aria-autocomplete="list" aria-labelledby="vs6__combobox" aria-controls="vs6__listbox" type="search" autocomplete="off" class="vs__search">
                                </div>
                                <div class="vs__actions">
                                    <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear" style="display: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10">
                                        <path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path>
                                        </svg>
                                    </button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator">
                                        <path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path>
                                    </svg>
                                    <div class="vs__spinner" style="display: none;">Loading...</div>
                                </div>
                            </div>
                            <ul id="vs6__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 mobile-reset-pb">
                    <div class="chart-wrapper">
                        <!----> 
                        <div class="echarts" _echarts_instance_="ec_1755149088588" style="-webkit-tap-highlight-color: transparent; user-select: none;">
                            <div style="position: relative; width: 1673px; height: 300px; padding: 0px; margin: 0px; border-width: 0px;"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
</div>
<div class="flex-grow-1"></div>
@endsection