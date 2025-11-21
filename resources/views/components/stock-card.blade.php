@extends('layouts.app')
@section('content')
<div class="main-content" id="app">
   <div>
      <div class="breadcrumb">
         <h1 class="mr-3">View Stock Card</h1>
         <div class="breadcrumb-action">
            Inventory - Products and Inventories
        </div>
      </div>
      <div class="separator-breadcrumb border-top"></div>
   </div>
   <div class="wrapper">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">

                            <div>
                                <label>Warehouse:</label>
                                <span>{{ $component->warehouse_name ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <label>Type:</label>
                                <span>{{ $component->type ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <label>Sub-Type:</label>
                                <span>{{ $component->sub_type ?? 'N/A' }}</span>
                            </div>

                            <div class="mt-2">
                                <label>Name:</label>
                                <span>{{ $component->name ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <label>SKU (Product Code):</label>
                                <span>{{ $component->sku ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <label>Category:</label>
                                <span>{{ $component->category->name ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <label>Subcategory:</label>
                                <span>{{ $component->subcategory->name ?? 'N/A' }}</span>
                            </div>

                            <div class="mt-2">
                                <label>Cost per Unit:</label>
                                <span>₱{{ number_format($component->cost ?? 0, 2) }}</span>
                            </div>

                            <div>
                                <label>SRP:</label>
                                <span>₱{{ number_format($component->price ?? 0, 2) }}</span>
                            </div>

                            <div class="mt-2">
                                <label>Description:</label>
                                <span>{{ $component->description ?? 'N/A' }}</span>
                            </div>

                        </div>

                        <div class="col-sm-12 col-md-4">
                            <span class="text-success font-weight-bold fs-15px">
                                Average Cost/Unit: ₱{{ number_format($component->cost ?? 0, 2) }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div data-v-0eb8d504="" class="d-flex flex-column justify-content-between h-100">
                <div data-v-0eb8d504="" class="card">
                    <!----><!---->
                    <div data-v-0eb8d504="" class="card-body">
                        <!----><!---->
                        <h6 data-v-0eb8d504="" class="t-font-boldest">Images</h6>
                        <div data-v-0eb8d504="">
                            <span data-v-0eb8d504="" class="b-avatar badge-light rounded" style="width: 5rem; height: 5rem;">
                            <span class="b-avatar-img"><img src="/images/products/no-image.png" alt="avatar"></span><!---->
                            </span>
                        </div>
                    </div>
                    <!----><!---->
                </div>
                <div data-v-0eb8d504="" class="d-flex justify-content-end"><button data-v-0eb8d504="" type="button" class="btn mt-4 btn-primary">
                    Download FIFO Tracker
                    </button>
                </div>
                </div>
        </div>
        <div class="mt-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="vgt-wrap">
                        <div class="vgt-inner-wrap">
                            <div class="vgt-global-search vgt-clearfix">
                                <div class="vgt-global-search__input vgt-pull-left">
                                    <form role="search">
                                    <label for="vgt-search-1209375475317">
                                        <span aria-hidden="true" class="input__icon">
                                            <div class="magnifying-glass"></div>
                                        </span>
                                        <span class="sr-only">Search</span>
                                    </label>
                                    <input id="vgt-search-1209375475317" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                                    </form>
                                </div>
                                <div class="vgt-global-search__actions vgt-pull-right">
                                    <div data-v-0eb8d504="" class="mt-2 mb-3">
                                        <div data-v-0eb8d504="" id="dropdown-form" class="dropdown b-dropdown m-2 btn-group" rounded="">
                                            <!----><button id="dropdown-form__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"><i data-v-0eb8d504="" class="i-Gear"></i></button>
                                            <ul role="menu" tabindex="-1" aria-labelledby="dropdown-form__BV_toggle_" class="dropdown-menu dropdown-menu-right">
                                                <li data-v-0eb8d504="" role="presentation">
                                                    <header data-v-0eb8d504="" id="dropdown-header-label" class="dropdown-header">
                                                    Columns
                                                    </header>
                                                </li>
                                                <li data-v-0eb8d504="" role="presentation" style="width: 220px;">
                                                    <form data-v-0eb8d504="" tabindex="-1" class="b-dropdown-form p-0">
                                                    <section data-v-0eb8d504="" class="ps-container ps">
                                                        <div data-v-0eb8d504="" class="px-4" style="max-height: 400px;">
                                                            <ul data-v-0eb8d504="" class="list-unstyled">
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__226"><label class="custom-control-label" for="__BVID__226">Date and Time</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__227"><label class="custom-control-label" for="__BVID__227">Created By</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__228"><label class="custom-control-label" for="__BVID__228">Activity</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__229"><label class="custom-control-label" for="__BVID__229">Transaction Reference #</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__230"><label class="custom-control-label" for="__BVID__230">Supplier</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__231"><label class="custom-control-label" for="__BVID__231">Customer</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__232"><label class="custom-control-label" for="__BVID__232">Batch #</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__233"><label class="custom-control-label" for="__BVID__233">Lot #</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__234"><label class="custom-control-label" for="__BVID__234">Manufacturing Date</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__235"><label class="custom-control-label" for="__BVID__235">Expiry Date</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__236"><label class="custom-control-label" for="__BVID__236">IEMI</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__237"><label class="custom-control-label" for="__BVID__237">Serial #</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__238"><label class="custom-control-label" for="__BVID__238">Qty In</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__239"><label class="custom-control-label" for="__BVID__239">Cost per Unit</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__240"><label class="custom-control-label" for="__BVID__240">Qty Out</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__241"><label class="custom-control-label" for="__BVID__241">Qty Balance</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504="">
                                                                <div data-v-0eb8d504="" class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__242"><label class="custom-control-label" for="__BVID__242">Action</label></div>
                                                                </li>
                                                                <li data-v-0eb8d504=""><button data-v-0eb8d504="" type="button" class="btn mt-2 mb-3 btn-primary btn-sm">Save</button></li>
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
                                        <button data-v-0eb8d504="" type="button" class="btn btn-outline-info ripple m-1 btn-sm collapsed" aria-expanded="false" aria-controls="sidebar-right" style="overflow-anchor: none;"><i data-v-0eb8d504="" class="i-Filter-2"></i>
                                        Filter
                                        </button> <button data-v-0eb8d504="" type="button" class="btn btn-outline-success ripple m-1 btn-sm"><i data-v-0eb8d504="" class="i-File-Copy"></i> PDF
                                        </button> <button data-v-0eb8d504="" class="btn btn-sm btn-outline-danger ripple m-1"><i data-v-0eb8d504="" class="i-File-Excel"></i> EXCEL
                                        </button>
                                        </div>
                                </div>
                            </div>
                            <div class="vgt-fixed-header">
                            </div>
                            <div class="vgt-responsive">
                                <table id="vgt-table" class="table-hover tableOne vgt-table">
                                    <colgroup><col id="col-0"><col id="col-1"><col id="col-2"><col id="col-3"><col id="col-4"><col id="col-5"><col id="col-6"><col id="col-7"><col id="col-8"><col id="col-9"><col id="col-10"><col id="col-11"><col id="col-12"><col id="col-13"><col id="col-14"><col id="col-15"><col id="col-16"></colgroup>
                                    <thead>
                                        <tr>
                                            <!----> 
                                            <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                            <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Date and Time</span> <button><span class="sr-only">
                                                Sort table by Date and Time in descending order
                                                </span></button>
                                            </th>
                                            <!---->
                                            <th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Activity</span> <button><span class="sr-only">
                                                Sort table by Activity in descending order
                                                </span></button>
                                            </th>
                                            <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Transaction Reference #</span> <button><span class="sr-only">
                                                Sort table by Transaction Reference # in descending order
                                                </span></button>
                                            </th>
                                            <!----><!----><!----><!----><!----><!----><!----><!---->
                                            <th scope="col" aria-sort="descending" aria-controls="col-12" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Qty In</span> <button><span class="sr-only">
                                                Sort table by Qty In in descending order
                                                </span></button>
                                            </th>
                                            <th scope="col" aria-sort="descending" aria-controls="col-13" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Cost per Unit</span> <button><span class="sr-only">
                                                Sort table by Cost per Unit in descending order
                                                </span></button>
                                            </th>
                                            <th scope="col" aria-sort="descending" aria-controls="col-14" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Qty Out</span> <button><span class="sr-only">
                                                Sort table by Qty Out in descending order
                                                </span></button>
                                            </th>
                                            <th scope="col" aria-sort="descending" aria-controls="col-15" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Qty Balance</span> <button><span class="sr-only">
                                                Sort table by Qty Balance in descending order
                                                </span></button>
                                            </th>
                                            <th scope="col" aria-sort="descending" aria-controls="col-16" class="vgt-left-align text-right" style="min-width: auto; width: auto;">
                                                <span>Action</span> <!---->
                                            </th>
                                        </tr>
                                        <!---->
                                    </thead>
                                    <tbody>
                                        <tr v-for="(log, index) in logs" :key="index">
        
                                            <!-- Checkbox -->
                                            <th class="vgt-checkbox-col">
                                                <input type="checkbox">
                                            </th>

                                            <!-- Date and Time -->
                                            <td class="vgt-left-align text-left">
                                                <span>@{{ log.entry_datetime }}</span>
                                            </td>

                                            <!-- Activity -->
                                            <td class="vgt-left-align text-left">
                                                <span>@{{ log.activity }}</span>
                                            </td>

                                            <!-- Transaction Reference # -->
                                            <td class="vgt-left-align text-left">
                                                <span>@{{ log.reference_no }}</span>
                                            </td>

                                            <!-- Qty In -->
                                            <td class="vgt-left-align text-left">
                                                <span>@{{ log.qty_in ?? '--' }}</span>
                                            </td>

                                            <!-- Cost per Unit -->
                                            <td class="vgt-left-align text-left">
                                                <span>@{{ log.cost_per_unit ?? '--' }}</span>
                                            </td>

                                            <!-- Qty Out -->
                                            <td class="vgt-left-align text-left">
                                                <span>@{{ log.qty_out ?? '--' }}</span>
                                            </td>

                                            <!-- Qty Balance -->
                                            <td class="vgt-left-align text-left">
                                                <span>@{{ log.qty_balance ?? '--' }}</span>
                                            </td>

                                            <!-- Action -->
                                            <td class="vgt-left-align text-left">
                                                @include('layouts.actions-dropdown', [
                                                    'logsRoute' => '#',
                                                    'remarksSample' => '#'
                                                ])
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
   </div>
</div>
<script>
new Vue({
    el: '#app',

    data() {
        return {
            logs: @json($movements), // <-- Laravel passes data directly
        };
    },
});
</script>
@endsection