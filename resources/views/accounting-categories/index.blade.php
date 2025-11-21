@extends('layouts.app')
@section('content')

<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Accounting Categories</h1>
            <ul>
                <li><a href=""> Accounting Settings </a></li>
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

    <div class="container">

        {{-- MODE DROPDOWN --}}
        <div class="row mb-4">
            <div class="col-md-4 mx-auto">
                <label class="font-weight-bold">Mode</label>
                <select id="mode" class="form-control">
                    <option value="payable">Accounts Payables</option>
                    <option value="receivable">Accounts Receivables</option>
                </select>
            </div>
        </div>

        {{-- CATEGORY AND TYPE --}}
        <div class="row">

            <div class="col-md-6 text-center">
                <label class="font-weight-bold">Category</label>
                <select id="categorySelect" class="form-control" style="max-width:350px; margin:auto;">
                    @foreach ($categoryPayableOptions as $option)
                        <option class="payable-item" value="{{ $option }}">{{ ucfirst($option) }}</option>
                    @endforeach
                    @foreach ($categoryReceivableOptions as $option)
                        <option class="receivable-item d-none" value="{{ $option }}">{{ ucfirst($option) }}</option>
                    @endforeach
                </select>

                <button class="btn btn-outline-success btn-sm mt-3" onclick="toggleCategoryForm()">
                    <i class="i-Add"></i> Add
                </button>
            </div>

            <div class="col-md-6 text-center">
    <label class="font-weight-bold">Type</label>

    <select id="typeSelect" class="form-control" style="max-width:350px; margin:auto;">

        {{-- PAYABLE TYPES --}}
        @foreach ($typesByCategoryPayable as $category => $types)
            @foreach ($types as $item)
                <option class="type-item payable-type d-none"
                        data-category="{{ $category }}"
                        value="{{ $item->type_payable }}">
                    {{ ucfirst($item->type_payable) }}
                </option>
            @endforeach
        @endforeach

        {{-- RECEIVABLE TYPES --}}
        @foreach ($typesByCategoryReceivable as $category => $types)
            @foreach ($types as $item)
                <option class="type-item receivable-type d-none"
                        data-category="{{ $category }}"
                        value="{{ $item->type_receivable }}">
                    {{ ucfirst($item->type_receivable) }}
                </option>
            @endforeach
        @endforeach

    </select>

    <button class="btn btn-outline-success btn-sm mt-3" onclick="toggleTypeForm()">
        <i class="i-Add"></i>
    </button>
</div>

        </div>

        {{-- INLINE ADD CATEGORY FORM --}}
        <div id="newCategoryForm" class="border rounded p-4 mt-4 bg-white shadow-sm"
            style="display:none; max-width:500px; margin:auto;">

            <h4 id="newCategoryTitle" class="text-center mb-3"></h4>

            <div class="form-group">
                <label class="font-weight-bold">Category Name *</label>
                <input type="text" id="new_category_name" class="form-control" placeholder="Enter name">
                <div class="invalid-feedback" id="err_new_category_name"></div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="button" onclick="saveNewCategory()" class="btn btn-success px-4 mr-3">Save</button>
                <button type="button" onclick="toggleCategoryForm()" class="btn btn-danger px-4">Cancel</button>
            </div>

        </div>

        {{-- INLINE ADD TYPE FORM --}}
<div id="newTypeForm" class="border rounded p-4 mt-4 bg-white shadow-sm"
     style="display:none; max-width:500px; margin:auto;">

    <h4 id="newTypeTitle" class="text-center mb-3"></h4>

    <div class="form-group">
        <label class="font-weight-bold">Type Name *</label>
        <input type="text" id="new_type_name" class="form-control" placeholder="Enter type name">
        <div class="invalid-feedback" id="err_new_type_name"></div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <button type="button" onclick="saveNewType()" class="btn btn-success px-4 mr-3">Save</button>
        <button type="button" onclick="toggleTypeForm()" class="btn btn-danger px-4">Cancel</button>
    </div>

</div>

    </div>

</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
const modeSelect = document.getElementById('mode');
const categorySelect = document.getElementById('categorySelect');

function updateCategoryDropdown() {
    const mode = modeSelect.value;

    let firstVisible = null;
    Array.from(categorySelect.options).forEach(option => {
        if(mode === 'payable') {
            option.classList.contains('payable-item') 
                ? option.classList.remove('d-none') 
                : option.classList.add('d-none');
        } else {
            option.classList.contains('receivable-item') 
                ? option.classList.remove('d-none') 
                : option.classList.add('d-none');
        }

        if (!option.classList.contains('d-none') && !firstVisible) {
            firstVisible = option;
        }
    });

    categorySelect.value = firstVisible ? firstVisible.value : '';
}

// Initialize
updateCategoryDropdown();
modeSelect.addEventListener('change', updateCategoryDropdown);

function updateTypeDropdown() {
    const mode = modeSelect.value;
    const category = categorySelect.value;

    const options = document.querySelectorAll('#typeSelect option.type-item');

    options.forEach(opt => {
        opt.classList.add('d-none'); // hide all first

        if (mode === 'payable' && opt.classList.contains('payable-type')) {
            if (opt.dataset.category === category) {
                opt.classList.remove('d-none');
            }
        }

        if (mode === 'receivable' && opt.classList.contains('receivable-type')) {
            if (opt.dataset.category === category) {
                opt.classList.remove('d-none');
            }
        }
    });

    // auto-select first
    let firstVisible = Array.from(options).find(o => !o.classList.contains('d-none'));
    typeSelect.value = firstVisible ? firstVisible.value : "";
}

categorySelect.addEventListener('change', updateTypeDropdown);
modeSelect.addEventListener('change', updateTypeDropdown);

// initialize on load
updateTypeDropdown();

function toggleTypeForm() {
    const form = document.getElementById('newTypeForm');
    const title = document.getElementById('newTypeTitle');
    const mode = modeSelect.value;
    const category = categorySelect.value;

    title.innerText = `Add Type for ${category}`;

    form.style.display = form.style.display === 'none' ? 'block' : 'none';
    document.getElementById('new_type_name').value = '';
    document.getElementById('err_new_type_name').innerText = '';
}

async function saveNewType() {
    const nameInput = document.getElementById('new_type_name');
    const name = nameInput.value.trim();
    const mode = modeSelect.value;
    const category = categorySelect.value;

    // Clear previous errors
    nameInput.classList.remove('is-invalid');
    document.getElementById('err_new_type_name').innerText = '';

    if (!name) {
        nameInput.classList.add('is-invalid');
        document.getElementById('err_new_type_name').innerText = 'Type name is required.';
        return;
    }

    try {
        const url = mode === 'payable'
            ? "{{ route('accounting-categories.accounting-type.add-payable') }}"
            : "{{ route('accounting-categories.accounting-type.add-receivable') }}";

        const payload = { category: category, name: name };

        const res = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(payload)
        });

        const data = await res.json();

        if (!res.ok || !data.success) {
            Swal.fire('Error', data.message || 'Something went wrong', 'error');
            return;
        }

        // Append new type to dropdown
        const option = document.createElement('option');
        option.value = name;
        option.text = name.charAt(0).toUpperCase() + name.slice(1);
        option.classList.add(mode === 'payable' ? 'type-item' : 'type-item'); // optional classes
        option.dataset.category = category;

        // Show only if current category matches
        if (categorySelect.value === category) option.classList.remove('d-none');
        else option.classList.add('d-none');

        typeSelect.appendChild(option);
        typeSelect.value = name;

        toggleTypeForm();
        Swal.fire('Success', `${name} added successfully!`, 'success');

    } catch (err) {
        console.error(err);
        Swal.fire('Error', err.message || 'Something went wrong', 'error');
    }
}

function toggleCategoryForm() {
    const form = document.getElementById('newCategoryForm');
    const title = document.getElementById('newCategoryTitle');
    const mode = modeSelect.value;

    title.innerText = mode === 'payable' ? 'Add Payable Category' : 'Add Receivable Category';
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
    document.getElementById('new_category_name').value = '';
    document.getElementById('err_new_category_name').innerText = '';
}


async function saveNewCategory() {
    const nameInput = document.getElementById('new_category_name');
    const name = nameInput.value.trim();
    const mode = modeSelect.value;

    // clear previous error state
    nameInput.classList.remove('is-invalid');
    document.getElementById('err_new_category_name').innerText = '';

    if (!name) {
        nameInput.classList.add('is-invalid');
        document.getElementById('err_new_category_name').innerText = 'Name is required.';
        return;
    }

    try {
        const url = mode === 'payable'
            ? "{{ route('accounting-categories.accounting-category.add-payable') }}"
            : "{{ route('accounting-categories.accounting-category.add-receivable') }}";

        // Build payload according to controller expectation:
        // addPayable expects 'category_payable'; addReceivable expects 'name'
        const payload = mode === 'payable'
            ? { category_payable: name }
            : { name: name };

        const res = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(payload)
        });

        // try to parse JSON if possible (may throw on empty responses)
        let data = null;
        try { data = await res.json(); } catch (e) { data = null; }

        if (!res.ok) {
            // show validation errors if present
            if (data && data.errors) {
                // server returned Laravel validation structure
                const errs = Object.values(data.errors).flat();
                Swal.fire('Error', errs.join('<br>'), 'error');
            } else if (data && data.message) {
                Swal.fire('Error', data.message, 'error');
            } else {
                Swal.fire('Error', 'Server returned an error.', 'error');
            }
            return;
        }

        // Success — append option then re-run updateCategoryDropdown to handle visibility
        const displayName = name.charAt(0).toUpperCase() + name.slice(1);
        const option = document.createElement('option');
        option.value = name;
        option.text = displayName;
        option.classList.add(mode === 'payable' ? 'payable-item' : 'receivable-item');

        categorySelect.appendChild(option);

        // Ensure newly added option follows current mode visibility
        updateCategoryDropdown();
        categorySelect.value = name;

        toggleCategoryForm();
        Swal.fire('Success', `${displayName} added successfully!`, 'success');

    } catch (err) {
        console.error(err);
        Swal.fire('Error', err.message || 'Something went wrong', 'error');
    }
}
</script>

@endsection
