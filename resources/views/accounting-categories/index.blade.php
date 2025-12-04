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
    {{-- CATEGORY + TYPE LIST UI --}}
<div class="row">

    {{-- CATEGORY LIST --}}
    <div class="col-md-6 text-center">
        <label class="font-weight-bold">Category</label>

        <ul id="categoryList" class="list-group mx-auto" style="max-width:350px;">
            {{-- PAYABLE --}}
            @foreach ($categoryPayableOptions as $option)
            <li class="list-group-item category-item payable-item d-none"
                data-id="{{ $option->id }}"
                data-category="{{ $option->category_payable }}"
                onclick="selectCategory('{{ $option->category_payable }}')">
                {{ ucfirst($option->category_payable) }}
                <button class="btn btn-sm btn-danger float-right remove-category-btn" 
                        onclick="event.stopPropagation(); removeCategory({{ $option->id }});">
                    -
                </button>
            </li>
            @endforeach

            {{-- RECEIVABLE --}}
                 @foreach ($categoryReceivableOptions as $option)
                <li class="list-group-item category-item receivable-item d-none"
                    data-id="{{ $option->id }}"
                    data-category="{{ $option->category_receivable }}"
                    onclick="selectCategory('{{ $option->category_receivable }}')">
                    {{ ucfirst($option->category_receivable) }}
                    <button class="btn btn-sm btn-danger float-right remove-category-btn"
                            onclick="event.stopPropagation(); removeCategory({{ $option->id }});">-</button>
                </li>
                @endforeach
        </ul>

        <button class="btn btn-outline-success btn-sm mt-3" onclick="toggleCategoryForm()">
            <i class="i-Add"></i> Add Category
        </button>
    </div>

    {{-- TYPE LIST --}}
    <div class="col-md-6 text-center">
        <label class="font-weight-bold">Type</label>

        <ul id="typeList" class="list-group mx-auto" style="max-width:350px;">
        {{-- PAYABLE TYPES --}}
        @foreach ($typesByCategoryPayable as $category => $types)
            @foreach ($types as $item)
                <li class="list-group-item type-item payable-type d-none"
                    data-category="{{ $category }}"
                    data-id="{{ $item->id }}">
                    {{ ucfirst($item->type_payable) }}
                    <button class="btn btn-sm btn-danger float-right" 
                            onclick="event.stopPropagation(); removeType({{ $item->id }});">
                        -
                    </button>
                </li>
            @endforeach
        @endforeach

        {{-- RECEIVABLE TYPES --}}
        @foreach ($typesByCategoryReceivable as $category => $types)
            @foreach ($types as $item)
                <li class="list-group-item type-item receivable-type d-none"
                    data-category="{{ $category }}"
                    data-id="{{ $item->id }}">
                    {{ ucfirst($item->type_receivable) }}
                    <button class="btn btn-sm btn-danger float-right" 
                            onclick="event.stopPropagation(); removeType({{ $item->id }});">
                        -
                    </button>
                </li>
            @endforeach
        @endforeach
    </ul>


        <button class="btn btn-outline-success btn-sm mt-3" onclick="toggleTypeForm()">
            <i class="i-Add"></i> Add Type
        </button>
    </div>

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

    // GET SELECTED CATEGORY FROM LIST
    const activeCategory = document.querySelector('.category-item.active');
    const category = activeCategory ? activeCategory.dataset.category : null;

    if (!category) {
        Swal.fire('Select Category First', 'Please click a category before adding a type.', 'warning');
        return;
    }

    title.innerText = `Add Type for ${category}`;

    form.style.display = form.style.display === 'none' ? 'block' : 'none';

    document.getElementById('new_type_name').value = '';
    document.getElementById('err_new_type_name').innerText = '';
}

async function saveNewType() {
    const nameInput = document.getElementById('new_type_name');
    const name = nameInput.value.trim();
    const mode = modeSelect.value;

    // Get selected category from list
    const activeCategory = document.querySelector('.category-item.active');
    const category = activeCategory ? activeCategory.dataset.category : null;

    // Clear errors
    nameInput.classList.remove('is-invalid');
    document.getElementById('err_new_type_name').innerText = '';

    if (!category) {
        Swal.fire('Select Category First', 'Please click a category before adding a type.', 'warning');
        return;
    }

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

        // -------------------------------------------------------------
        // ✅ SUCCESS — ADD NEW TYPE TO LIST (INSTANT, NO RELOAD)
        // -------------------------------------------------------------
        const list = document.getElementById('typeList');
        const li = document.createElement('li');

        li.classList.add(
            'list-group-item',
            'type-item',
            mode === 'payable' ? 'payable-type' : 'receivable-type'
        );

        li.dataset.category = category;
        li.dataset.id = data.id; // <-- backend must return new ID
        li.classList.remove('d-none');

        // The inner HTML must include the delete button
        li.innerHTML = `
            ${name.charAt(0).toUpperCase() + name.slice(1)}
            <button class="btn btn-sm btn-danger float-right"
                    onclick="event.stopPropagation(); removeType(${data.id})">
                -
            </button>
        `;

        // Append to list
        list.appendChild(li);

        // Hide form again
        toggleTypeForm();

        Swal.fire('Success', `${name} added successfully!`, 'success');

        // Clear input
        document.getElementById('new_type_name').value = '';

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

    // Clear previous errors
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

        const data = await res.json();

        if (!res.ok || !data.success) {
            Swal.fire('Error', data.message || 'Something went wrong', 'error');
            return;
        }

        // SUCCESS: append the new category to the list
        const list = document.getElementById('categoryList');
        const li = document.createElement('li');

        li.classList.add('list-group-item', 'category-item');
        li.classList.add(mode === 'payable' ? 'payable-item' : 'receivable-item');
        li.dataset.category = name;
        li.innerHTML = `${name.charAt(0).toUpperCase() + name.slice(1)}`;
        li.onclick = () => selectCategory(name);

        list.appendChild(li);

        toggleCategoryForm();
        Swal.fire('Success', `${name} added successfully!`, 'success');

        // Update list visibility based on current mode
        updateCategoryList();

    } catch (err) {
        // console.error(err);
        Swal.fire('Error', err.message || 'Something went wrong', 'error');
    }
}
</script>

<script>
function updateCategoryList() {
    const mode = modeSelect.value;
    const items = document.querySelectorAll('.category-item');

    items.forEach(i => {
        if (mode === 'payable') {
            i.classList.toggle('d-none', !i.classList.contains('payable-item'));
        } else {
            i.classList.toggle('d-none', !i.classList.contains('receivable-item'));
        }
    });

    // Auto-select first visible
    let first = Array.from(items).find(i => !i.classList.contains('d-none'));
    if (first) selectCategory(first.dataset.category);
}

modeSelect.addEventListener('change', updateCategoryList);

function updateTypeList(category) {
    const mode = modeSelect.value;
    const items = document.querySelectorAll('.type-item');

    items.forEach(i => {
        const isType = (mode === 'payable')
            ? i.classList.contains('payable-type')
            : i.classList.contains('receivable-type');

        i.classList.toggle('d-none', !(isType && i.dataset.category === category));
    });
}

// Initialize
updateCategoryList();

// Remove Type
async function removeType(id) {
    if (!confirm('Are you sure you want to remove this type?')) return;

    try {
        const url = "{{ route('accounting-categories.accounting-type.destroy', ':id') }}".replace(':id', id);

        const res = await fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        if (res.ok) {
            document.querySelector(`.type-item[data-id="${id}"]`).remove();
            Swal.fire('Deleted', 'Type removed successfully', 'success');
        } else {
            Swal.fire('Error', 'Could not remove type', 'error');
        }
    } catch (err) {
        console.error(err);
        Swal.fire('Error', 'Something went wrong', 'error');
    }
}

async function removeCategory(id) {
    if (!confirm('Are you sure you want to remove this category?')) return;

    try {
        const url = "{{ route('accounting-categories.destroy', ':id') }}"
            .replace(':id', id);

        const res = await fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        });

        const data = await res.json().catch(() => null);

        if (!res.ok || !data?.success) {
            Swal.fire('Error', data?.message || 'Failed to remove category', 'error');
            return;
        }

        // Remove ALL matching list items (in case same ID appears twice)
        document.querySelectorAll(`.category-item[data-id="${id}"]`)
            .forEach(el => el.remove());

        Swal.fire('Deleted', 'Category removed successfully', 'success');

    } catch (err) {
        console.error(err);
        Swal.fire('Error', 'Something went wrong', 'error');
    }
}

function selectCategory(category) {
    document.querySelectorAll('.category-item').forEach(i => {
        const isActive = i.dataset.category === category;
        i.classList.toggle('active', isActive);

        // Show the "-" button only for the selected category
        const btn = i.querySelector('.remove-category-btn');
        if (btn) btn.style.display = isActive ? 'inline-block' : 'none';
    });

    updateTypeList(category);
}
</script>

<style>
    .category-item.active {
        background-color: transparent !important;
        color: inherit !important;
        font-weight: normal !important;
    }
</style>

@endsection
