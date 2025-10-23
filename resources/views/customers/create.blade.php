@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Create Customer</h1>
            <ul>
                <li><a href=""> Sales </a></li>
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

    <div class="wrapper">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="mt-3 col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Customer Name -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Customer Name *</legend>
                                                <input type="text" name="customer_name" id="customer_name" 
                                                        class="form-control" placeholder="Enter customer name" 
                                                        value="{{ old('customer_name') }}">
                                            </fieldset>
                                        </div>

                                        <!-- Customer No -->
                                        <div class="col-md-6">
                                            <label for="customer_no" class="form-label">Customer # *</label>
                                            <input type="text" name="customer_no" id="customer_no" 
                                                class="form-control" 
                                                value="{{ old('customer_no', $generatedCustomerNo ?? 'CUS-000') }}">
                                        </div>

                                        <!-- Company Name -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Company Name</legend>
                                                <input type="text" name="company_name" id="company_name" 
                                                        class="form-control" placeholder="Enter company name" 
                                                        value="{{ old('company_name') }}">
                                            </fieldset>
                                        </div>

                                        <!-- Landline No -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Landline #</legend>
                                                <input type="text" name="landline_no" id="landline_no" 
                                                        class="form-control" placeholder="Enter landline number" 
                                                        value="{{ old('landline_no') }}">
                                            </fieldset>
                                        </div>

                                        <!-- Mobile No -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Mobile # *</legend>
                                                <input type="text" name="mobile_no" id="mobile_no" 
                                                        class="form-control" placeholder="09xxxxxxxxx" 
                                                        value="{{ old('mobile_no') }}">
                                            </fieldset>
                                        </div>


                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Email *</legend>
                                                <input type="email" name="email" id="email" 
                                                        class="form-control" placeholder="Enter email" 
                                                        value="{{ old('email') }}">
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Customer Since *</legend>
                                                    <input type="date" name="customer_since" id="customer_since" 
                                                        class="form-control" placeholder="Enter customer since" 
                                                        value="{{ old('customer_since') }}">
                                            </fieldset>
                                        </div>

                                        <!-- Address -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Address *</legend>
                                                <input type="text" name="address" id="address" 
                                                        class="form-control" placeholder="Enter address" 
                                                        value="{{ old('address') }}">
                                            </fieldset>
                                        </div>

                                        <!-- Province -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Province *</legend>
                                                <select name="province" id="province" class="form-select" required>
                                                    <option value="" disabled selected>Select Province</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <!-- City / Municipality -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">City / Municipality *</legend>
                                                <select name="city_municipality" id="city_municipality" class="form-select" required>
                                                    <option value="" disabled selected>Select City/Municipality</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <!-- Assigned Personnel -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Assign Personnel *</legend>
                                                <input type="text" name="assigned_personnel" id="assigned_personnel" 
                                                        class="form-control" placeholder="Enter assigned personnel" 
                                                        value="{{ old('assigned_personnel') }}">
                                            </fieldset>
                                        </div>

                                        <!-- Credit Limit -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Assign Credit Limit (₱)</legend>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">₱</span>
                                                    </div>
                                                    <input type="number" name="credit_limit" id="credit_limit"
                                                            class="form-control" placeholder="0.00"
                                                            value="{{ old('credit_limit') }}">
                                                </div>
                                            </fieldset>
                                        </div>

                                        <!-- Payment Terms -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Payment Terms *</legend>
                                                <input type="text" name="payment_terms_days" id="payment_terms_days"
                                                        class="form-control" placeholder="e.g. 30 days"
                                                        value="{{ old('payment_terms_days') }}">
                                            </fieldset>
                                        </div>

                                        <!-- Customer Type -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Customer Type *</legend>
                                                <select name="customer_type" id="customer_type" class="custom-select">
                                                    <option value="" disabled selected>Select type</option>
                                                    <option value="regular_customer" {{ old('customer_type') == 'regular_customer' ? 'selected' : '' }}>Regular Customer</option>
                                                    <option value="vip_customer" {{ old('customer_type') == 'vip' ? 'selected' : '' }}>VIP Customer</option>
                                                    <option value="walk_in_customer" {{ old('customer_type') == 'walk_in_customer' ? 'selected' : '' }}>Walk In Customer</option>
                                                    <option value="senior_customer" {{ old('customer_type') == 'senior_customer' ? 'selected' : '' }}>Senior Customer</option>
                                                    <option value="athlete_type" {{ old('customer_type') == 'athlete_type' ? 'selected' : '' }}>Athlete Type</option>
                                                </select>
                                            </fieldset>
                                        </div>

                                        <!-- Discount Select -->
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <legend class="col-form-label pt-0">Assign Discount</legend>
                                                <div class="d-flex">
                                                    <select name="discount_id" id="discount_id" class="custom-select mr-2">
                                                        <option value="" disabled selected>Select discount</option>
                                                        @foreach ($discounts as $discount)
                                                            <option value="{{ $discount->id }}" {{ old('discount_id') == $discount->id ? 'selected' : '' }}>
                                                                {{ $discount->name }} - {{ $discount->value }}%
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <button type="button" class="btn btn-outline-success btn-sm" onclick="toggleDiscountForm()">
                                                        <i class="i-Add"></i>
                                                    </button> --}}
                                                </div>
                                            </fieldset>
                                        </div>

                                        <!-- Inline Add Discount Form -->
                                        <div id="newDiscountForm" class="border rounded p-4 mt-3 bg-white shadow-sm" style="display:none;">
                                            <h4 class="text-center mb-4">Add Discount</h4>
                                            <div class="form-group">
                                                <label for="new_discount_name">Discount Name *</label>
                                                <input type="text" id="new_discount_name" class="form-control" placeholder="Enter discount name">
                                                <div class="invalid-feedback" id="err_new_discount_name"></div>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label for="new_discount_rate">Discount Rate (%) *</label>
                                                <input type="number" id="new_discount_rate" class="form-control" placeholder="Enter rate (0–100)">
                                                <div class="invalid-feedback" id="err_new_discount_rate"></div>
                                            </div>

                                            <div class="d-flex justify-content-center mt-4">
                                                <button type="button" onclick="saveDiscount()" class="btn btn-success px-4 mr-2">Save</button>
                                                <button type="button" onclick="toggleDiscountForm()" class="btn btn-danger px-4">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group"><div class="list-group-item"><div class="d-flex align-items-center justify-content-between"><p class="card-text"><strong class="text-uppercase">
                        Assign Item Discounts
                    </strong></p> <button type="button" class="btn px-2 py-1 btn-primary">
                    Select Items
                </button></div> <div class="vgt-wrap "><!----> <div class="vgt-inner-wrap"><!----> <!----> <!----> <div class="vgt-fixed-header"><!----></div> <div class="vgt-responsive"><table id="vgt-table" class="table-hover tableOne vgt-table custom-vgt-table "><colgroup><col id="col-0"><col id="col-1"><col id="col-2"><col id="col-3"><col id="col-4"><col id="col-5"></colgroup> <thead><tr><!----> <!----> <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align" style="min-width: auto; width: auto;"><span>Product Name</span> <!----></th><th scope="col" aria-sort="descending" aria-controls="col-1" class="vgt-left-align" style="min-width: auto; width: auto;"><span>SKU</span> <!----></th><th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align" style="min-width: auto; width: auto;"><span>SRP</span> <!----></th><th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align" style="min-width: 350px; max-width: 350px; width: 350px;"><span>Assigned Discount</span> <!----></th><th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align" style="min-width: auto; width: auto;"><span>Discounted SRP</span> <!----></th><th scope="col" aria-sort="descending" aria-controls="col-5" class="vgt-left-align text-right" style="min-width: auto; width: auto;"><span>Action</span> <!----></th></tr> <!----></thead>  <tbody><tr><td colspan="6"><div class="vgt-center-align vgt-text-disabled">
                  No data for table
                </div></td></tr></tbody></table></div> <!----> <div class="vgt-wrap__footer vgt-clearfix"><div class="footer__row-count vgt-pull-left"><form><label for="vgt-select-rpp-1466279377412" class="footer__row-count__label">Rows per page:</label> <select id="vgt-select-rpp-1466279377412" autocomplete="off" name="perPageSelect" aria-controls="vgt-table" class="footer__row-count__select"><option value="10">
          10
        </option><option value="20">
          20
        </option><option value="30">
          30
        </option><option value="40">
          40
        </option><option value="50">
          50
        </option> <option value="-1">All</option></select></form></div> <div class="footer__navigation vgt-pull-right"><div data-v-347cbcfa="" class="footer__navigation__page-info"><div data-v-347cbcfa="">
    0 - 0 of 0
  </div></div> <!----> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span aria-hidden="true" class="chevron left"></span> <span>prev</span></button> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span>next</span> <span aria-hidden="true" class="chevron right"></span></button> <!----></div></div></div></div></div></div>

                            <div class="b-overlay-wrap position-relative d-inline-block btn-loader mt-3">
                                <button type="submit" class="btn btn-primary"><i class="i-Yes me-2"></i>Save Customer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// function toggleDiscountForm() {
//     const form = document.getElementById('newDiscountForm');
//     form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
// }

async function saveDiscount() {
    const name = document.getElementById('new_discount_name').value.trim();
    const rate = document.getElementById('new_discount_rate').value.trim();

    if (!name) {
        document.getElementById('new_discount_name').classList.add('is-invalid');
        document.getElementById('err_new_discount_name').innerText = 'Name is required.';
        return;
    }

    try {
        const res = await fetch("{{ route('discounts.store') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: JSON.stringify({ name, rate })
        });

        const data = await res.json();
        if (!res.ok) throw new Error(data.message || "Error saving discount");

        const select = document.getElementById('discount_id');
        const option = new Option(data.name, data.id, true, true);
        select.add(option);

        document.getElementById('new_discount_name').value = '';
        document.getElementById('new_discount_rate').value = '';
        toggleDiscountForm();

        Swal.fire({
            icon: 'success',
            title: 'Discount created',
            text: data.name,
            timer: 1500,
            showConfirmButton: false
        });
    } catch (err) {
        Swal.fire('Error', err.message, 'error');
    }
}
</script>

{{-- @push('scripts') --}}
{{-- <script>
document.addEventListener('DOMContentLoaded', async function () {
    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city_municipality');

    // Fetch all provinces from PSGC API
    async function loadProvinces() {
        const response = await fetch('https://psgc.gitlab.io/api/provinces/');
        const provinces = await response.json();

        provinceSelect.innerHTML = '<option value="" disabled selected>Select Province</option>';
        provinces.forEach(province => {
            const opt = document.createElement('option');
            opt.value = province.name;
            opt.dataset.code = province.code; // keep province code for city fetch
            opt.textContent = province.name;
            provinceSelect.appendChild(opt);
        });
    }

    // Fetch all cities/municipalities for the selected province
    async function loadCities(provinceCode) {
        citySelect.innerHTML = '<option value="" disabled selected>Loading cities...</option>';
        const response = await fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities/`);
        const cities = await response.json();

        citySelect.innerHTML = '<option value="" disabled selected>Select City/Municipality</option>';
        cities.forEach(city => {
            const opt = document.createElement('option');
            opt.value = city.name;
            opt.textContent = city.name;
            citySelect.appendChild(opt);
        });
    }

    // When province changes, load its cities
    provinceSelect.addEventListener('change', async function () {
        const selected = this.options[this.selectedIndex];
        const provinceCode = selected.dataset.code;
        if (provinceCode) await loadCities(provinceCode);
    });

    // Initialize
    await loadProvinces();
});
</script> --}}

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', async function () {
    const provinceSelect = $('#province');
    const citySelect = $('#city_municipality');

    // Initialize Select2 styling
    provinceSelect.select2({
        placeholder: "Select Province",
        allowClear: true,
        width: '100%'
    });

    citySelect.select2({
        placeholder: "Select City/Municipality",
        allowClear: true,
        width: '100%'
    });

    // Load provinces from PSA API
    async function loadProvinces() {
        const response = await fetch('https://psgc.gitlab.io/api/provinces/');
        const provinces = await response.json();

        provinces.forEach(province => {
            const option = new Option(province.name, province.name, false, false);
            $(option).attr('data-code', province.code);
            provinceSelect.append(option);
        });

        provinceSelect.trigger('change.select2');
    }

    // Load cities based on selected province
    async function loadCities(provinceCode) {
        citySelect.empty().append('<option value="">Select City/Municipality</option>').trigger('change.select2');
        const response = await fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities/`);
        const cities = await response.json();

        cities.forEach(city => {
            const option = new Option(city.name, city.name, false, false);
            citySelect.append(option);
        });

        citySelect.trigger('change.select2');
    }

    // Province change listener
    provinceSelect.on('change', function () {
        const provinceCode = $('#province option:selected').data('code');
        if (provinceCode) {
            loadCities(provinceCode);
        } else {
            citySelect.empty().append('<option value="">Select City/Municipality</option>').trigger('change.select2');
        }
    });

    // Load all provinces on page load
    await loadProvinces();
});
</script>
@endpush

@endsection
