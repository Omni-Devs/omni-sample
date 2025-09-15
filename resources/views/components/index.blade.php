@extends('layouts.app')
@section('content')
<div class="main-content">
   <div>
      <div class="breadcrumb">
         <h1 class="mr-3">Components</h1>
         <div class="breadcrumb-action"></div>
      </div>
      <div class="separator-breadcrumb border-top"></div>
   </div>
   <!----> 
   <div class="wrapper">
      <div class="row">
         <div class="col-sm-12 col-md-4">
            <fieldset class="form-group" id="__BVID__227">
               <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__227__BV_label_">Select Type</legend>
               <div>
                  <div dir="auto" class="v-select vs--single vs--searchable">
                     <div id="vs4__combobox" role="combobox" aria-expanded="false" aria-owns="vs4__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                        <div class="vs__selected-options">
                           <span class="vs__selected">
                              Products
                              <!---->
                           </span>
                           <input aria-autocomplete="list" aria-labelledby="vs4__combobox" aria-controls="vs4__listbox" type="search" autocomplete="off" class="vs__search">
                        </div>
                        <div class="vs__actions">
                           <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear">
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
                  <!----><!----><!---->
               </div>
            </fieldset>
         </div>
         <div class="col-sm-12 col-md-4">
            <fieldset class="form-group" id="__BVID__232">
               <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__232__BV_label_">Select Sub-Type</legend>
               <div>
                  <div dir="auto" class="v-select vs--single vs--searchable">
                     <div id="vs5__combobox" role="combobox" aria-expanded="false" aria-owns="vs5__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                        <div class="vs__selected-options">
                           <span class="vs__selected">
                              For Sale
                              <!---->
                           </span>
                           <input aria-autocomplete="list" aria-labelledby="vs5__combobox" aria-controls="vs5__listbox" type="search" autocomplete="off" class="vs__search">
                        </div>
                        <div class="vs__actions">
                           <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear">
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
                  <!----><!----><!---->
               </div>
            </fieldset>
         </div>
         <div class="col-sm-12 col-md-4">
            <fieldset class="form-group" id="__BVID__237">
               <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__237__BV_label_">Select Warehouse</legend>
               <div>
                  <div dir="auto" class="v-select vs--single vs--searchable">
                     <div id="vs6__combobox" role="combobox" aria-expanded="false" aria-owns="vs6__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                        <div class="vs__selected-options">
                           <span class="vs__selected">
                              Main
                              <!---->
                           </span>
                           <input aria-autocomplete="list" aria-labelledby="vs6__combobox" aria-controls="vs6__listbox" type="search" autocomplete="off" class="vs__search">
                        </div>
                        <div class="vs__actions">
                           <button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear">
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
                  <!----><!----><!---->
               </div>
            </fieldset>
         </div>
      </div>
      <div class="card mt-4">
         <!----><!---->
         <nav class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
               <li class="nav-item"><a href="#" target="_self" class="nav-link active">
                  Active
                  </a>
               </li>
               <li class="nav-item"><a href="#" target="_self" class="nav-link">
                  Archived
                  </a>
               </li>
            </ul>
         </nav>
         <div class="card-body">
            <!----><!---->
            <div class="vgt-wrap ">
               <!----> 
               <div class="vgt-inner-wrap">
                  <!----> 
                  <div class="vgt-global-search vgt-clearfix">
                     <div class="vgt-global-search__input vgt-pull-left">
                        <form role="search">
                           <label for="vgt-search-352530096888">
                              <span aria-hidden="true" class="input__icon">
                                 <div class="magnifying-glass"></div>
                              </span>
                              <span class="sr-only">Search</span>
                           </label>
                           <input id="vgt-search-352530096888" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                        </form>
                     </div>
                     <div class="vgt-global-search__actions vgt-pull-right">
                        <div>
                           <div id="dropdown-form" class="dropdown b-dropdown mx-1 btn-group" rounded="">
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
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__248"><label class="custom-control-label" for="__BVID__248">Type</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__249"><label class="custom-control-label" for="__BVID__249">Sub-Type</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__250"><label class="custom-control-label" for="__BVID__250">Image</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__251"><label class="custom-control-label" for="__BVID__251">Date and Time Created</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__252"><label class="custom-control-label" for="__BVID__252">Created By</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__253"><label class="custom-control-label" for="__BVID__253">Product Name</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__254"><label class="custom-control-label" for="__BVID__254">SKU(Product Code)</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__255"><label class="custom-control-label" for="__BVID__255">Description</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__256"><label class="custom-control-label" for="__BVID__256">Abbreviation</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__257"><label class="custom-control-label" for="__BVID__257">Category</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__258"><label class="custom-control-label" for="__BVID__258">Brand</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__259"><label class="custom-control-label" for="__BVID__259">Average Cost per Unit</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__260"><label class="custom-control-label" for="__BVID__260">SRP</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__261"><label class="custom-control-label" for="__BVID__261">Unit</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__262"><label class="custom-control-label" for="__BVID__262">Quantity</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__263"><label class="custom-control-label" for="__BVID__263">Stock Alert</label></div>
                                                </li>
                                                <li>
                                                   <div class="my-1 custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__264"><label class="custom-control-label" for="__BVID__264">Action</label></div>
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
                           <button type="button" class="btn mx-1 btn-outline-info ripple btn-sm collapsed" aria-expanded="false" aria-controls="sidebar-right" style="overflow-anchor: none;"><i class="i-Filter-2"></i>
                           Filter
                           </button> <button type="button" class="btn mx-1 btn-outline-success ripple btn-sm"><i class="i-File-Copy"></i> PDF
                           </button> <button class="btn btn-sm btn-outline-danger ripple mx-1"><i class="i-File-Excel"></i> EXCEL
                           </button> <button type="button" class="btn btn-info m-1 btn-sm"><i class="i-Upload"></i>
                           Import
                           </button> <button type="button" class="btn mx-1 btn-btn btn-primary btn-icon" onclick="window.location='{{ url('components/create') }}'"><i class="i-Add"></i>
                           Add
                           </button> <button type="button" class="btn mx-1 btn-btn btn-primary">
                           Stock Alert Summary
                           </button>
                        </div>
                     </div>
                  </div>
                  <!----> 
                  <div class="vgt-fixed-header">
                     <!---->
                  </div>
                 <div class="vgt-responsive" style="max-height: 400px; overflow-y: auto;">
                     <table id="vgt-table" class="table-hover tableOne vgt-table custom-vgt-table ">
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
                        </colgroup>
                        <thead>
                           <tr>
                              <!----><!----><!---->
                              <th scope="col" aria-sort="descending" aria-controls="col-5" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;">
                        <thead>
                           <tr>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Component Name</span>
                                 <button><span class="sr-only">Sort table by Product ID in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Category Name</span>
                                 <button><span class="sr-only">Sort table by Product Name in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>SubCategory Name</span>
                                 <button><span class="sr-only">Sort table by Product Name in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Component Cost</span>
                                 <button><span class="sr-only">Sort table by Category in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-left sortable">
                                 <span>Component Price</span>
                                 <button><span class="sr-only">Sort table by Category in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-right sortable">
                                 <span>Component Unit</span>
                                 <button><span class="sr-only">Sort table by Unit Price in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-right sortable">
                                 <span>Onhand</span>
                                 <button><span class="sr-only">Sort table by Unit Price in descending order</span></button>
                              </th>
                              <th scope="col" class="vgt-left-align text-right sortable">
                                 <span>For Sale</span>
                              </th>
                              <th scope="col" class="vgt-left-align text-right">
                                 <span>Action</span>
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($components as $component)
                           <tr>
                              <td class="text-left">{{ $component['COMPONENT_NAME'] }}</td>
                              <td class="text-left">{{ $component['CATEGORY'] }}</td>
                              <td class="text-left">{{ $component['SUBCATEGORY'] }}</td>
                              <td class="text-left">{{ number_format($component['COMPONENT_COST'], 2, '.', '') }}</td>
                              <td class="text-left">{{ number_format($component['COMPONENT_PRICE'], 2, '.', '') }}</td>
                              <td class="text-right">{{ $component['COMPONENT_UNIT'] }}</td>
                              <td class="text-right">{{ $component['ONHAND'] }}</td>
                              <td class="text-right">
                                 <input type="checkbox" {{ !empty($component['FOR_SALE']) && $component['FOR_SALE'] ? 'checked' : '' }}>
                              </td>
                              <td class="vgt-left-align text-right">
   <span>
      <div>
         <div id="dropdown-right" class="dropdown b-dropdown btn-group">
            <!---->
            <button id="dropdown-right__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret">
               <span class="_dot _r_block-dot bg-dark"></span> <span class="_dot _r_block-dot bg-dark"></span> <span class="_dot _r_block-dot bg-dark"></span> <!---->
            </button>
            <ul role="menu" tabindex="-1" aria-labelledby="dropdown-right__BV_toggle_" class="dropdown-menu dropdown-menu-right">
               <li role="presentation"><a role="menuitem" target="_self" class="dropdown-item" href="{{ route('components.edit', ['id' => $component['COMP_ID']]) }}"><i class="nav-icon i-Edit font-weight-bold mr-2"></i>
                  Edit
                  </a>
               </li>
               <li role="presentation"><a role="menuitem" href="#" target="_self" class="dropdown-item"><i class="nav-icon i-Receipt font-weight-bold mr-2"></i>
                  View Stock Card
                  </a>
               </li>
               <li role="presentation">
                  <form action="{{ route('components.destroy', $component['COMP_ID']) }}" 
                        method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this component?');"
                        style="display:inline;">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="dropdown-item">
                        <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i>
                        Delete
                     </button>
                  </form>
               </li>
               <li role="presentation"><a role="menuitem" href="#" target="_self" class="dropdown-item"><i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i>
                  Logs
                  </a>
               </li>
               <li role="presentation"><a role="menuitem" href="#" target="_self" class="dropdown-item"><i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                  Remarks
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </span>
</td>
                              {{-- <td class="text-right">
                                 <a href="{{ route('components.edit', ['id' => $component['COMP_ID']]) }}" class="btn btn-sm btn-primary">Edit</a>
                                 <form action="{{ route('components.destroy', $component['COMP_ID']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this component?')">
                                    Delete
                                    </button>
                                 </form>
                              </td> --}}
                           </tr>
                           @empty
                           <tr>
                              <td colspan="5" class="vgt-center-align vgt-text-disabled">
                                 No data for table
                              </td>
                           </tr>
                           @endforelse
                        </tbody>
                  </div>
                  </td></tr></tbody></table>
               </div>
               <!----> 
               <div class="vgt-wrap__footer vgt-clearfix">
                  <div class="footer__row-count vgt-pull-left">
                     <form>
                        <label for="vgt-select-rpp-1724262253017" class="footer__row-count__label">Rows per page:</label> 
                        <select id="vgt-select-rpp-1724262253017" autocomplete="off" name="perPageSelect" aria-controls="vgt-table" class="footer__row-count__select">
                           <option value="10">
                              10
                           </option>
                           <option value="20">
                              20
                           </option>
                           <option value="30">
                              30
                           </option>
                           <option value="40">
                              40
                           </option>
                           <option value="50">
                              50
                           </option>
                           <!---->
                        </select>
                     </form>
                  </div>
                  <div class="footer__navigation vgt-pull-right">
                     <div data-v-347cbcfa="" class="footer__navigation__page-info">
                        <div data-v-347cbcfa="">
                           0 - 0 of 0
                        </div>
                     </div>
                     <!----> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span aria-hidden="true" class="chevron left"></span> <span>prev</span></button> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span>next</span> <span aria-hidden="true" class="chevron right"></span></button> <!---->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!----><!---->
   </div>
</div>
<div tabindex="-1" class="b-sidebar-outer">
   <!---->
   <div id="sidebar-right" tabindex="-1" role="dialog" aria-modal="false" aria-hidden="true" aria-labelledby="sidebar-right___title__" class="b-sidebar shadow b-sidebar-right bg-white text-dark" style="display: none;">
      <header class="b-sidebar-header">
         <button type="button" aria-label="Close" class="close text-dark">
            <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" aria-label="x" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-x b-icon bi">
               <g>
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
               </g>
            </svg>
         </button>
         <strong id="sidebar-right___title__">Filter</strong>
      </header>
      <div class="b-sidebar-body">
         <div class="px-3 py-2">
            <div class="row">
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__39">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__39__BV_label_">Name</legend>
                     <div>
                        <input type="text" placeholder="Search by Name" class="form-control" label="Name" id="__BVID__40"><!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__41">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__41__BV_label_">SKU(Product Code)</legend>
                     <div>
                        <input type="text" placeholder="Search SKU(Product Code)" class="form-control" label="SKUProductCode" id="__BVID__42"><!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__43">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__43__BV_label_">Category</legend>
                     <div>
                        <div dir="auto" class="v-select vs--single vs--searchable">
                           <div id="vs1__combobox" role="combobox" aria-expanded="false" aria-owns="vs1__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                              <div class="vs__selected-options"> <input placeholder="Select Category" aria-autocomplete="list" aria-labelledby="vs1__combobox" aria-controls="vs1__listbox" type="search" autocomplete="off" class="vs__search"></div>
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
                        <!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__48">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__48__BV_label_">Brand</legend>
                     <div>
                        <div dir="auto" class="v-select vs--single vs--searchable">
                           <div id="vs2__combobox" role="combobox" aria-expanded="false" aria-owns="vs2__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                              <div class="vs__selected-options"> <input placeholder="Select Brand" aria-autocomplete="list" aria-labelledby="vs2__combobox" aria-controls="vs2__listbox" type="search" autocomplete="off" class="vs__search"></div>
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
                        <!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__53">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__53__BV_label_">Unit</legend>
                     <div>
                        <div dir="auto" class="v-select vs--single vs--searchable">
                           <div id="vs3__combobox" role="combobox" aria-expanded="false" aria-owns="vs3__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                              <div class="vs__selected-options"> <input placeholder="Select Unit" aria-autocomplete="list" aria-labelledby="vs3__combobox" aria-controls="vs3__listbox" type="search" autocomplete="off" class="vs__search"></div>
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
                        <!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__58">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__58__BV_label_">Total Cost of Goods</legend>
                     <div>
                        <div role="group" class="input-group">
                           <!----><input type="text" placeholder="Enter Amount (From)" class="form-control" aria-label="cost-from" id="__BVID__59"> 
                           <div class="input-group-text" style="border-right: 0px; border-left: 0px; border-radius: 0px;">
                              to
                           </div>
                           <input type="text" placeholder="Enter Amount (To)" class="form-control" aria-label="cost-to" id="__BVID__60"><!---->
                        </div>
                        <!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__61">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__61__BV_label_">SRP</legend>
                     <div>
                        <div role="group" class="input-group">
                           <!----><input type="text" placeholder="Enter Amount (From)" class="form-control" aria-label="price-from" id="__BVID__62"> 
                           <div class="input-group-text" style="border-right: 0px; border-left: 0px; border-radius: 0px;">
                              to
                           </div>
                           <input type="text" placeholder="Enter Amount (To)" class="form-control" aria-label="price-to" id="__BVID__63"><!---->
                        </div>
                        <!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__64">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__64__BV_label_">Quantity</legend>
                     <div>
                        <div role="group" class="input-group">
                           <!----><input type="text" placeholder="Enter Amount (From)" class="form-control" aria-label="quantity-from" id="__BVID__65"> 
                           <div class="input-group-text" style="border-right: 0px; border-left: 0px; border-radius: 0px;">
                              to
                           </div>
                           <input type="text" placeholder="Enter Amount (To)" class="form-control" aria-label="quantity-to" id="__BVID__66"><!---->
                        </div>
                        <!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__67">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__67__BV_label_">Created By</legend>
                     <div>
                        <input type="text" placeholder="Filter by Created by" class="form-control" label="CreatedBy" id="__BVID__68"><!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-md-12">
                  <fieldset class="form-group" id="__BVID__69">
                     <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__69__BV_label_">Created Date</legend>
                     <div>
                        <div data-v-1ebd09d2="" class="vue-daterange-picker">
                           <div data-v-1ebd09d2="" class="form-control reportrange-text"><i data-v-1ebd09d2="" class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span data-v-1ebd09d2=""> - </span><b data-v-1ebd09d2="" class="caret"></b></div>
                           <!---->
                        </div>
                        <button type="button" class="btn btn-danger btn-sm">
                        Clear Created Date
                        </button><!----><!----><!---->
                     </div>
                  </fieldset>
               </div>
               <div class="col-sm-12 col-md-6"><button type="button" class="btn btn-primary btn-sm btn-block"><i class="i-Filter-2"></i>
                  Filter
                  </button>
               </div>
               <div class="col-sm-12 col-md-6"><button type="button" class="btn btn-danger btn-sm btn-block"><i class="i-Power-2"></i>
                  Reset
                  </button>
               </div>
            </div>
         </div>
      </div>
      <!---->
   </div>
   <!----><!---->
</div>
<span data-v-03022ced="">
   <!---->
</span>
</div>

{{-- Change Type Script  --}}
<script>
   function handleTypeChange(value) {
       if (value === 'products') {
           window.location.href = "{{ url('products') }}";
       }
   }
   
   // On load, replace any JS-rendered v-select for "Select Type" with a responsive native select
   document.addEventListener('DOMContentLoaded', function () {
       try {
           var legends = document.querySelectorAll('fieldset.form-group legend');
           legends.forEach(function (legend) {
               if (legend && legend.textContent && legend.textContent.trim() === 'Select Type') {
                   var fieldset = legend.parentElement;
                   if (!fieldset) return;
                   // Build select HTML
                   var html = '' +
                       '<label for="select-type" class="bv-no-focus-ring col-form-label pt-0">Select Type</label>' +
                       '<select id="select-type" class="form-control" aria-label="Select Type">' +
                       '<option value="components" selected>Components</option>' +
                       '<option value="products">Products</option>' +
                       '</select>';
                   // Replace the inner content of the fieldset (remove v-select markup)
                   fieldset.innerHTML = html;
   
                   // Attach change handler
                   var sel = fieldset.querySelector('#select-type');
                   if (sel) {
                       sel.addEventListener('change', function (e) {
                           handleTypeChange(e.target.value);
                       });
                   }
               }
           });
       } catch (e) {
           console.error('Failed to replace Select Type control:', e);
       }
   });
</script>

{{-- 3dots Dropdown Script --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
  // select all dropdowns inside your table
  const dropdowns = document.querySelectorAll(".dropdown");

  dropdowns.forEach(dropdown => {
    const toggleBtn = dropdown.querySelector("button");
    const menu = dropdown.querySelector(".dropdown-menu");

    toggleBtn.addEventListener("click", function (e) {
      e.preventDefault();

      // close other menus first
      document.querySelectorAll(".dropdown-menu.show").forEach(openMenu => {
        if (openMenu !== menu) {
          openMenu.classList.remove("show");
        }
      });

      // toggle this one
      menu.classList.toggle("show");
    });
  });

  // close menus when clicking outside
  document.addEventListener("click", function (e) {
    if (!e.target.closest(".dropdown")) {
      document.querySelectorAll(".dropdown-menu.show").forEach(openMenu => {
        openMenu.classList.remove("show");
      });
    }
  });
});
</script>

{{-- Searchbar Script --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector("#vgt-search-352530096888");
  const table = document.querySelector("#vgt-table"); // your main table
  const rows = table.querySelectorAll("tbody tr");

  searchInput.addEventListener("keyup", function () {
    const searchTerm = this.value.toLowerCase();

    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      if (text.includes(searchTerm)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
});
</script>

{{-- Sortable Table Script --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
  const table = document.querySelector("#vgt-table");
  const headers = table.querySelectorAll("thead th.sortable");

  headers.forEach((header, index) => {
    const button = header.querySelector("button");
    if (!button) return;

    let asc = true; // start ascending

    button.addEventListener("click", function () {
      const tbody = table.querySelector("tbody");
      const rows = Array.from(tbody.querySelectorAll("tr"));

      rows.sort((a, b) => {
        let aText = a.querySelectorAll("td")[index]?.textContent.trim() || "";
        let bText = b.querySelectorAll("td")[index]?.textContent.trim() || "";

        // if numeric, compare as number
        if (!isNaN(aText) && !isNaN(bText)) {
          return asc ? aText - bText : bText - aText;
        }

        // else compare as string
        return asc 
          ? aText.localeCompare(bText) 
          : bText.localeCompare(aText);
      });

      // re-append sorted rows
      rows.forEach(row => tbody.appendChild(row));

      // toggle sort direction
      asc = !asc;
    });
  });
});
</script>



@endsection