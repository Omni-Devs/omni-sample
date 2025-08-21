<form action="{{ route('products.store') }}" method="POST">
    @csrf
<div class="main-content"><div><div class="breadcrumb"><h1 class="mr-3">Create Product</h1> <ul><li><a href=""> Inventory </a></li> <!----> <!----></ul> <div class="breadcrumb-action"></div></div> <div class="separator-breadcrumb border-top"></div></div> <!----> <div class="wrapper"><span><form class=""><div class="row"><div class="col-md-4"><span><fieldset class="form-group" id="__BVID__2473"><legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2473__BV_label_">Type *</legend><div><div dir="auto" class="v-select vs--single vs--searchable" aria-describedby="Type-feedback"> <div id="vs164__combobox" role="combobox" aria-expanded="false" aria-owns="vs164__listbox" aria-label="Search for option" class="vs__dropdown-toggle"><div class="vs__selected-options"><span class="vs__selected">
            Products
                <!----></span> <input aria-autocomplete="list" aria-labelledby="vs164__combobox" aria-controls="vs164__listbox" type="search" autocomplete="off" class="vs__search"></div> 
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
        <ul id="vs164__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
        </div> 
        <div id="Type-feedback" class="invalid-feedback"></div>
        <!----><!----><!----></div></fieldset></span></div> 
        <div class="col-md-4">
        <span>
        <fieldset class="form-group" id="__BVID__2479">
        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2479__BV_label_">Select Warehouse *</legend>
        <div>
        <div dir="auto" class="v-select vs--single vs--searchable" aria-describedby="Warehouse-feedback">
        <div id="vs165__combobox" role="combobox" aria-expanded="false" aria-owns="vs165__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
        <div class="vs__selected-options">
        <span class="vs__selected">
            Main
                <!----></span> <input aria-autocomplete="list" aria-labelledby="vs165__combobox" aria-controls="vs165__listbox" type="search" autocomplete="off" class="vs__search"></div> 
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
        <ul id="vs165__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
        </div> 
        <div id="Warehouse-feedback" class="invalid-feedback"></div>
        <!----><!----><!----></div></fieldset></span></div> 
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <span persist="true">
            <fieldset class="form-group" id="__BVID__2485">
           <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2485__BV_label_">Product ID *</legend>
            <div>
                <div role="group" class="input-group">
                    <input 
                        type="number" 
                        name="prod_id" 
                        id="PROD_ID" 
                        class="form-control" 
                        aria-describedby="Code-feedback" 
                        label="Code" 
                        value="{{ old('PROD_ID') }}"
                    >
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="i-Bar-Code font-weight-bold"></i></div>
                    </div>
                </div>
                <div id="Code-feedback" class="invalid-feedback"></div>
                <small tabindex="-1" class="form-text text-muted" id="__BVID__2485__BV_description_">
                    Scan your barcode and select the correct symbology
                </small>
            </div>
            </fieldset>
        </span>
        </div>
        <div class="col-sm-12">
        <div class="row">
        <div class="mt-3 col-md-8">
        <div class="card">
        <!----><!---->
        <div class="card-body">
        <!----><!---->
        <div class="row">
        <div class="col-md-6">
            <span>
            <fieldset class="form-group" id="__BVID__2488">
                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2488__BV_label_">Product Name *</legend>
                <div>
                    <input 
                        type="text" 
                        name="prod_name" 
                        id="PRODNAME" 
                        placeholder="Enter Name of Product" 
                        class="form-control" 
                        aria-describedby="Name-feedback" 
                        label="Name" 
                        value="{{ old('PRODNAME') }}" 
                        required
                    > 
                    <div id="Name-feedback" class="invalid-feedback"></div>
                </div>
            </fieldset>
        </span>
        <span>
            <fieldset class="form-group" id="__BVID__2491">
                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2491__BV_label_">Abbreviation *</legend>
                <div>
                    <input type="text" placeholder="Enter abbreviation for Product" class="form-control" aria-describedby="Abbreviation-feedback" label="Abbreviation" id="__BVID__2492"> 
                    <div id="Abbreviation-feedback" class="invalid-feedback"></div>
                    <!----><!----><!---->
                </div>
            </fieldset>
        </span>
        <span>
            <fieldset class="form-group" id="__BVID__2494">
                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2494__BV_label_">Category Name *</legend>
                <div>
                    <div dir="auto" class="v-select vs--single vs--searchable" aria-describedby="Category-feedback">
                        <div id="vs166__combobox" role="combobox" aria-expanded="false" aria-owns="vs166__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                            <div class="vs__selected-options"> 
                                <input 
                                    type="text" 
                                    name="category" 
                                    id="CATNAME" 
                                    placeholder="Select Category" 
                                    aria-autocomplete="list" 
                                    aria-labelledby="vs166__combobox" 
                                    aria-controls="vs166__listbox" 
                                    autocomplete="off" 
                                    class="vs__search form-control" 
                                    value="{{ old('CATNAME') }}" 
                                    required
                                >
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
                        <ul id="vs166__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                    </div>
                    <div id="Category-feedback" class="invalid-feedback"></div>
                </div>
            </fieldset>
        </span>
        <span>
            <fieldset class="form-group" id="__BVID__2500">
                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2500__BV_label_">Brand *</legend>
                <div>
                    <div dir="auto" class="v-select vs--single vs--searchable" aria-describedby="Brand-feedback">
                    <div id="vs167__combobox" role="combobox" aria-expanded="false" aria-owns="vs167__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                        <div class="vs__selected-options"> <input placeholder="Brand" aria-autocomplete="list" aria-labelledby="vs167__combobox" aria-controls="vs167__listbox" type="number" autocomplete="off" class="vs__search"></div>
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
                    <ul id="vs167__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                    </div>
                    <div id="Brand-feedback" class="invalid-feedback"></div>
                    <!----><!----><!---->
                </div>
            </fieldset>
        </span>
        <span>
            <fieldset class="form-group" id="__BVID__2506">
                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2506__BV_label_">Unit Price</legend>
                <div>
                    <input 
                        type="number" 
                        name="uprice" 
                        id="UPRICE" 
                        class="form-control" 
                        placeholder="0" 
                        aria-describedby="StockAlert-feedback" 
                        value="{{ old('UPRICE') }}" 
                        required
                    >
                    <div id="StockAlert-feedback" class="invalid-feedback"></div>
                </div>
            </fieldset>
        </span>
        </div>
        <div class="col-md-6">
        <span>
        <fieldset class="form-group" id="__BVID__2509">
        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2509__BV_label_">Barcode Symbology *</legend>
        <div>
        <div dir="auto" class="v-select vs--single vs--searchable" state="true">
        <div id="vs168__combobox" role="combobox" aria-expanded="false" aria-owns="vs168__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
        <div class="vs__selected-options">
        <span class="vs__selected"> 
            Code 128
           <!----></span> <input aria-autocomplete="list" aria-labelledby="vs168__combobox" aria-controls="vs168__listbox" type="search" autocomplete="off" class="vs__search"></div> <div class="vs__actions"><button type="button" title="Clear Selected" aria-label="Clear Selected" class="vs__clear"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"><path d="M6.895455 5l2.842897-2.842898c.348864-.348863.348864-.914488 0-1.263636L9.106534.261648c-.348864-.348864-.914489-.348864-1.263636 0L5 3.104545 2.157102.261648c-.348863-.348864-.914488-.348864-1.263636 0L.261648.893466c-.348864.348864-.348864.914489 0 1.263636L3.104545 5 .261648 7.842898c-.348864.348863-.348864.914488 0 1.263636l.631818.631818c.348864.348864.914773.348864 1.263636 0L5 6.895455l2.842898 2.842897c.348863.348864.914772.348864 1.263636 0l.631818-.631818c.348864-.348864.348864-.914489 0-1.263636L6.895455 5z"></path></svg></button> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" role="presentation" class="vs__open-indicator"><path d="M9.211364 7.59931l4.48338-4.867229c.407008-.441854.407008-1.158247 0-1.60046l-.73712-.80023c-.407008-.441854-1.066904-.441854-1.474243 0L7 5.198617 2.51662.33139c-.407008-.441853-1.066904-.441853-1.474243 0l-.737121.80023c-.407008.441854-.407008 1.158248 0 1.600461l4.48338 4.867228L7 10l2.211364-2.40069z"></path></svg> <div class="vs__spinner" style="display: none;">Loading...</div></div></div> <ul id="vs168__listbox" role="listbox" style="display: none; visibility: hidden;"></ul> </div> <div class="invalid-feedback"></div><!----><!----><!----></div></fieldset></span></div> <div class="mt-3 col-md-12"><fieldset class="form-group" id="__BVID__2514"><legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2514__BV_label_">Description</legend><div><textarea rows="4" placeholder="A few words..." class="form-control"></textarea><!----><!----><!----></div></fieldset></div></div></div><!----><!----></div> <!----> <div class="card mt-4" id="" product_type_id="1" warehouse_id="67" abbrev="" barcode_symbology="C128" code="" category_id="" brand_id="" stock_alert="" description="" price="" output_tax_id="" variants="[object Object]" items="" materials="" unit_conversion_id="" unit_conversion_value=""><!----><!----><div class="card-body"><!----><!----><p class="card-text"><strong class="text-uppercase">
            Cost of Products (Display Total Here in Philippine Peso)
        </strong></p> 
        <div class="row">
        <div class="col-md-6">
            <fieldset class="form-group" id="__BVID__2516">
                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2516__BV_label_">Cost of Products</legend>
                <div>
                    <input class="form-control" aria-describedby="Cost-feedback" placeholder="0" value="" inputmode="decimal"><!----><!----><!---->
                </div>
            </fieldset>
        </div>
        <div class="col-md-6">
            <span>
                <fieldset class="form-group" id="__BVID__2519">
                    <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2519__BV_label_">Unit *</legend>
                    <div>
                    <div dir="auto" class="v-select vs--single vs--searchable" aria-describedby="Unit-feedback">
                        <div id="vs169__combobox" role="combobox" aria-expanded="false" aria-owns="vs169__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                            <div class="vs__selected-options"> <input placeholder="Select Unit" aria-autocomplete="list" aria-labelledby="vs169__combobox" aria-controls="vs169__listbox" type="search" autocomplete="off" class="vs__search"></div>
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
                        <ul id="vs169__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                    </div>
                    <div id="Unit-feedback" class="invalid-feedback"></div>
                    <!----><!----><!---->
                    </div>
                </fieldset>
            </span>
            <span>
                <fieldset class="form-group" id="__BVID__2525">
                    <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2525__BV_label_">Supplier</legend>
                    <div>
                    <div dir="auto" class="v-select vs--multiple vs--searchable" aria-describedby="Supplier-feedback">
                        <div id="vs170__combobox" role="combobox" aria-expanded="false" aria-owns="vs170__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                            <div class="vs__selected-options"> <input placeholder="Select Supplier" aria-autocomplete="list" aria-labelledby="vs170__combobox" aria-controls="vs170__listbox" type="search" autocomplete="off" class="vs__search"></div>
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
                        <ul id="vs170__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                    </div>
                    <!----><!----><!---->
                    </div>
                </fieldset>
            </span>
            <span>
                <fieldset class="form-group" id="__BVID__2531">
                    <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2531__BV_label_">Input Tax</legend>
                    <div>
                    <div dir="auto" class="v-select vs--single vs--searchable" aria-describedby="InputTax-feedback">
                        <div id="vs171__combobox" role="combobox" aria-expanded="false" aria-owns="vs171__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                            <div class="vs__selected-options"> <input placeholder="Select Tax" aria-autocomplete="list" aria-labelledby="vs171__combobox" aria-controls="vs171__listbox" type="search" autocomplete="off" class="vs__search"></div>
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
                        <ul id="vs171__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                    </div>
                    <!----><!----><!---->
                    </div>
                </fieldset>
            </span>
        </div>
        </div>
        </div><!----><!----></div> <!----> <!----> 
        <div class="card mt-4" id="" product_type_id="1" warehouse_id="67" abbrev="" barcode_symbology="C128" code="" category_id="" brand_id="" stock_alert="" description="" cost="" unit_id="" supplier_id="" input_tax_id="" variants="[object Object]" items="" materials="" unit_conversion_id="" unit_conversion_value="">
        <!----><!---->
        <div class="card-body">
            <!----><!---->
            <div class="row">
                <div class="col-md-6">
                    <span>
                    <fieldset class="form-group" id="__BVID__2538">
                        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2538__BV_label_">SRP *</legend>
                        <div>
                            <input type="number" class="form-control" aria-describedby="Price-feedback" placeholder="0" inputmode="decimal"> 
                            <div id="Price-feedback" class="invalid-feedback"></div>
                            <!----><!----><!---->
                        </div>
                    </fieldset>
                    </span>
                </div>
                <div class="col-md-6">
                    <span>
                    <fieldset class="form-group" id="__BVID__2541">
                        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__2541__BV_label_">Output Tax</legend>
                        <div>
                            <div dir="auto" class="v-select vs--single vs--searchable" aria-describedby="OutputTax-feedback">
                                <div id="vs172__combobox" role="combobox" aria-expanded="false" aria-owns="vs172__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                <div class="vs__selected-options"> <input placeholder="Select Tax" aria-autocomplete="list" aria-labelledby="vs172__combobox" aria-controls="vs172__listbox" type="search" autocomplete="off" class="vs__search"></div>
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
                                <ul id="vs172__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                            </div>
                            <!----><!----><!---->
                        </div>
                    </fieldset>
                    </span>
                </div>
            </div>
   </div>
   <!----><!---->
</div>
<!----> <!----> 
<div class="card mt-4">
<!----><!---->
<div class="card-body">
<!----><!---->
<fieldset class="form-group" id="__BVID__2546">
<!---->
<div>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" value="true" id="__BVID__2547"><label class="custom-control-label" for="__BVID__2547">                                    With Variants
                                        </label></div><!----><!----><!----></div></fieldset> <fieldset class="form-group" id="__BVID__2548"><!----><div><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__2549"><label class="custom-control-label" for="__BVID__2549">
                                            Product has IMEI / Serial Number
                                        </label></div><!----><!----><!----></div></fieldset> <fieldset class="form-group" id="__BVID__2550"><!----><div><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__2551"><label class="custom-control-label" for="__BVID__2551">
                                            This Product is not for Sale
                                        </label></div><!----><!----><!----></div></fieldset> <fieldset class="form-group" id="__BVID__2552"><!----><div><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__2553"><label class="custom-control-label" for="__BVID__2553">
                                            For Manufacturing / Processing
                                        </label></div><!----><!----><!----></div></fieldset> <fieldset class="form-group" id="__BVID__2554"><!----><div><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__2555"><label class="custom-control-label" for="__BVID__2555">
                                            Unit Conversion
                                        </label></div><!----><!----><!----></div></fieldset> <fieldset class="form-group mb-0" id="__BVID__2556"><!----><div><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__2557"><label class="custom-control-label" for="__BVID__2557">
                                            With Bill of Materials
                                        </label></div><!----><!----><!----></div></fieldset></div><!----><!----></div> <!----> <!----> <!----> <!----></div> <div class="mt-3 col-md-4"><div class="card"><!----><div class="card-header"><h6 class="mb-0">
                                            Multiple Image
                                        </h6></div><div class="card-body"><!----><!----> <div class="card-body"><div class="row form-group"><div class="col-md-12 mb-5"><div id="my-strictly-unique-vue-upload-multiple-image" class="d-flex justify-content-center"><div data-v-6ff5a0de="" style="outline: none;"><div data-v-6ff5a0de="" class="image-container position-relative text-center"><div data-v-6ff5a0de="" class="image-center position-absolute display-flex flex-column justify-content-center align-items-center"><div data-v-6ff5a0de=""><svg data-v-6ff5a0de="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="image-icon-drag"><path data-v-6ff5a0de="" d="M383.6 229l-.5 1.5.7 1.7c-.2-1.1-.2-2.2-.2-3.2zm-119.7-5.4l-.3 1.4.6 1.3c-.2-.8-.3-1.8-.3-2.7zm62.4 3.8l-.2 1 .5 1.1-.3-2.1z"></path> <path data-v-6ff5a0de="" d="M483 326.2l-43.5-100.5c-3.6-8.4-10.3-14.9-18.7-18.4-8.5-3.6-17.8-3.5-26.1.1L391 209c-3.3 1.4-6.1 3.6-8.4 6.3-3.6-8.2-10.2-14.6-18.6-18-8.5-3.4-17.7-3.3-26.1.3-6.1 2.7-10.9 6.8-13.9 12-3.7-8-10.2-14.3-18.4-17.6-8.5-3.4-17.8-3.3-26.1.3l-3.7 1.6c-6.3 2.7-11.2 7.1-14.3 12.4l-20.3-46.9c-4.2-9.8-10.7-16.8-18.7-20.2-8.1-3.5-17.2-3.2-26.5.8l-3.7 1.6c-8 3.5-13.3 9.3-15.5 16.9-2.1 7.3-1 16.2 3.1 25.6l83.4 188.2-64.7-39.8c-11.2-6.8-25.7-4.7-34.4 5.1-11.3 12.5-10.3 31.9 2 43.3l55.8 51.5 50.8 43.4c17.6 16.7 38.2 28.1 59.6 32.9 7.7 1.7 15.5 2.5 23.2 2.5 14.9 0 29.7-3.1 44.2-9.4l27.9-12.1c31.2-13.5 52.8-37.1 62.6-68.4 9.2-29.2 6.6-63-7.3-95.1zM383.6 229c0 1 .1 2.1.2 3.1l-.7-1.7.5-1.4zM281.7 466.6c-.2-.2-.5-.5-.7-.6l-50.4-43.1-55.6-51.5c-7.3-6.7-7.9-18.2-1.2-25.6 4.7-5.3 12.5-6.4 18.5-2.6l65.6 40.2c4.7 2.9 10.4 2.4 14.5-1.3 4.1-3.6 5.3-9.2 3.2-14.2l-83.7-189c-3.2-7.4-3.9-13.4-2.1-18.1 1.7-4.3 5.2-6.5 7.9-7.7l3.7-1.6c12.3-5.3 22.8-.6 28.6 12.9L310.2 350c1.4 3.2 5.1 4.6 8.3 3.3 3.2-1.4 4.7-5.1 3.3-8.3l-48.7-112.5c-2.2-5.2-3-10.8-2-15.4 1.1-5.4 4.5-9.3 9.9-11.7l3.7-1.6c5.3-2.3 11.1-2.3 16.4-.2 5.3 2.2 9.5 6.3 11.8 11.6l43.9 101.5c.7 1.6 1.9 2.7 3.5 3.4 1.6.6 3.3.6 4.8-.1 3.2-1.4 4.7-5.1 3.3-8.3l-32.8-75.9c-8.2-18.9 4.8-25.6 7.5-26.8 10.8-4.7 23.5.4 28.2 11.3l28.9 66.7c1.4 3.2 5.1 4.7 8.3 3.3 3.2-1.4 4.7-5.1 3.3-8.3l-19.4-44.8c-1.3-3-4.9-13.2 3.8-16.9l3.7-1.6c5.2-2.3 11.1-2.3 16.4 0 5.3 2.3 9.6 6.4 11.9 11.8L471.7 331c12.7 29.3 15.1 59.9 6.8 86.3-8.7 27.6-27.9 48.5-55.6 60.5L395 489.9c-38.9 16.9-80.1 8.4-113.3-23.3zm44.6-239.2l.3 2.1-.5-1.1.2-1zm-62.4-3.8l.3 2.7-.6-1.3.3-1.4zM31 217c3.2 0 6-2.6 6-5.7v-40c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.2 2.8 5.7 6 5.7zm0-66.3c3.2 0 6-2.6 6-5.7v-40c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.1 2.8 5.7 6 5.7zM148 296h-40c-3.2 0-5.7 2.3-5.7 5.5s2.6 5.5 5.7 5.5h40c3.2 0 5.7-2.3 5.7-5.5s-2.6-5.5-5.7-5.5zM37 237.6c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.2 2.8 5.7 6 5.7s6-2.6 6-5.7v-40zM31 84.4c3.2 0 6-2.6 6-5.7v-40c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.1 2.8 5.7 6 5.7zM81.6 296H49.1c-1.7 0-3.4-.6-5-1.3-2.9-1.3-6.3-.1-7.5 2.8-1.3 2.9 0 6.3 2.9 7.5 3 1.3 6.3 2 9.6 2h32.5c3.2 0 5.7-2.3 5.7-5.5s-2.5-5.5-5.7-5.5zm60.6-281c3.2 0 5.7-2.8 5.7-6s-2.6-6-5.7-6h-40c-3.2 0-5.7 2.8-5.7 6s2.6 6 5.7 6h40z"></path> <path data-v-6ff5a0de="" d="M323 122.4c-3.2 0-6 2.6-6 5.7v39.2c0 3.2 2.8 5.7 6 5.7s6-2.6 6-5.7v-39.2c0-3.1-2.8-5.7-6-5.7zm6-60.6c0-3.2-2.8-5.7-6-5.7s-6 2.6-6 5.7v40c0 3.2 2.8 5.7 6 5.7s6-2.6 6-5.7v-40zM301.2 15h3.6c6.8 0 12.2 5.6 12.2 12.4v8.1c0 3.2 2.8 5.7 6 5.7s6-2.6 6-5.7v-8.1C329 14.3 317.9 3 304.8 3h-3.6c-3.2 0-5.7 2.8-5.7 6s2.5 6 5.7 6zm-66.3 0h40c3.2 0 5.7-2.8 5.7-6s-2.6-6-5.7-6h-40c-3.2 0-5.7 2.8-5.7 6s2.5 6 5.7 6zm-60.6 292h40c3.2 0 5.7-2.3 5.7-5.5s-2.6-5.5-5.7-5.5h-40c-3.2 0-5.7 2.3-5.7 5.5s2.5 5.5 5.7 5.5zm-5.8-292h40c3.2 0 5.7-2.8 5.7-6s-2.6-6-5.7-6h-40c-3.2 0-5.7 2.8-5.7 6s2.6 6 5.7 6zM37.1 19.8c1.4 0 2.7-.6 3.8-1.5 2.3-2 5.2-3.2 8.2-3.2h26.8c3.2 0 5.7-2.8 5.7-6s-2.6-6-5.7-6H49.1c-5.9 0-11.5 2.5-15.9 6.5-2.3 2.1-2.5 5.9-.4 8.2 1.1 1.2 2.7 2 4.3 2z"></path></svg></div> <div data-v-6ff5a0de="" class="text-center"><label data-v-6ff5a0de="" class="drag-text">Drag &amp; Drop
                                                    Multiple images For
                                                    product</label> <br data-v-6ff5a0de=""> <a data-v-6ff5a0de="" class="browse-text">(or) Select</a></div> <div data-v-6ff5a0de="" class="image-input position-absolute full-width full-height"><label data-v-6ff5a0de="" for="myIdUpload" class="full-width full-height cursor-pointer"></label></div></div></div> <!----> <div data-v-6ff5a0de=""><input data-v-6ff5a0de="" id="myIdUpload" multiple="multiple" accept="image/gif,image/jpeg,image/png,image/bmp,image/jpg" type="file" class="display-none"> <input data-v-6ff5a0de="" id="image-edit" accept="image/gif,image/jpeg,image/png,image/bmp,image/jpg" type="file" class="display-none"></div> <div data-v-3f78f595="" data-v-6ff5a0de="" class="modal-mask" style="display: none;"><div data-v-3f78f595="" class="modal-container"><div data-v-3f78f595="" class="vue-lightbox-content"><div data-v-3f78f595="" class="vue-lightbox-header"><span data-v-3f78f595=""></span> <button data-v-3f78f595="" type="button" title="Close (Esc)" class="vue-lightbox-close"><span data-v-3f78f595=""><svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512"><path data-v-3f78f595="" d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4 L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1 c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1 c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"></path></svg></span></button></div> <div data-v-3f78f595="" class="vue-lightbox-figure"><div data-v-3f78f595="" class="swiper-container vue-lightbox-figure swiper-container-initialized swiper-container-horizontal"> <div class="swiper-wrapper" style="transition-duration: 0ms;"></div>    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div> <div data-v-3f78f595="" class="vue-lightbox-footer"><div data-v-3f78f595="" class="vue-lightbox-footer-info"></div> <div data-v-3f78f595="" class="vue-lightbox-footer-count">
              1/0
            </div></div></div></div> <div data-v-3f78f595="" class="vue-lightbox-thumbnail-wrapper" style="display: none;"><div data-v-3f78f595="" class="vue-lightbox-thumbnail"><button data-v-3f78f595="" type="button" title="Previous" class="swiper-button-prev vue-lightbox-thumbnail-arrow vue-lightbox-thumbnail-left" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"><span data-v-3f78f595=""><svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512"><path data-v-3f78f595="" d="M213.7,256L213.7,256L213.7,256L380.9,81.9c4.2-4.3,4.1-11.4-0.2-15.8l-29.9-30.6c-4.3-4.4-11.3-4.5-15.5-0.2L131.1,247.9 c-2.2,2.2-3.2,5.2-3,8.1c-0.1,3,0.9,5.9,3,8.1l204.2,212.7c4.2,4.3,11.2,4.2,15.5-0.2l29.9-30.6c4.3-4.4,4.4-11.5,0.2-15.8 L213.7,256z"></path></svg></span></button> <div data-v-3f78f595="" class="swiper-container swiper-container-initialized swiper-container-horizontal"> <div class="swiper-wrapper" style="transition-duration: 0ms;"></div>    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div> <button data-v-3f78f595="" type="button" title="Next" class="swiper-button-next vue-lightbox-thumbnail-arrow vue-lightbox-thumbnail-right" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><span data-v-3f78f595=""><svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512"><path data-v-3f78f595="" d="M298.3,256L298.3,256L298.3,256L131.1,81.9c-4.2-4.3-4.1-11.4,0.2-15.8l29.9-30.6c4.3-4.4,11.3-4.5,15.5-0.2l204.2,212.7 c2.2,2.2,3.2,5.2,3,8.1c0.1,3-0.9,5.9-3,8.1L176.7,476.8c-4.2,4.3-11.2,4.2-15.5-0.2L131.3,446c-4.3-4.4-4.4-11.5-0.2-15.8 L298.3,256z"></path></svg></span></button></div></div> <button data-v-3f78f595="" type="button" title="Previous" class="swiper-button-prev vue-lightbox-arrow vue-lightbox-left" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"><span data-v-3f78f595=""><svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512"><path data-v-3f78f595="" d="M213.7,256L213.7,256L213.7,256L380.9,81.9c4.2-4.3,4.1-11.4-0.2-15.8l-29.9-30.6c-4.3-4.4-11.3-4.5-15.5-0.2L131.1,247.9 c-2.2,2.2-3.2,5.2-3,8.1c-0.1,3,0.9,5.9,3,8.1l204.2,212.7c4.2,4.3,11.2,4.2,15.5-0.2l29.9-30.6c4.3-4.4,4.4-11.5,0.2-15.8 L213.7,256z"></path></svg></span></button> <button data-v-3f78f595="" type="button" title="Next" class="swiper-button-next vue-lightbox-arrow vue-lightbox-right" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><span data-v-3f78f595=""><svg data-v-3f78f595="" fill="white" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 512 512" xml:space="preserve"><path data-v-3f78f595="" d="M298.3,256L298.3,256L298.3,256L131.1,81.9c-4.2-4.3-4.1-11.4,0.2-15.8l29.9-30.6c4.3-4.4,11.3-4.5,15.5-0.2l204.2,212.7 c2.2,2.2,3.2,5.2,3,8.1c0.1,3-0.9,5.9-3,8.1L176.7,476.8c-4.2,4.3-11.2,4.2-15.5-0.2L131.3,446c-4.3-4.4-4.4-11.5-0.2-15.8 L298.3,256z"></path></svg></span></button></div></div></div></div></div></div></div></div><!----><!----></div></div></div></div> <div class="mt-3 col-md-12"><div class="mr-2"><div class="b-overlay-wrap position-relative d-inline-block btn-loader">
                <button type="submit" class="btn btn-primary"><i class="i-Yes me-2 font-weight-bold"></i>
                                    Submit</button>
                                    
                                    <!----></div></div></div></div></form></span></div></div>
                                    
</form>
