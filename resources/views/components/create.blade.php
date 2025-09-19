@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Create Components</h1>
            <ul>
                <li><a href=""> Inventory </a></li>
                <!----> <!---->
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <!----> 
    <div class="wrapper">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <span>
            <form action="{{ route('components.store') }}" method="POST">
                @csrf
                <div class="row">
                <div class="top-wrapper" style="display: none;">
                    <div class="col-md-4">
                        <span>
                            <fieldset class="form-group" id="__BVID__343">
                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__343__BV_label_">Type *</legend>
                            <div>
                                <div dir="auto" class="v-select vs--single vs--searchable" aria-describedby="Type-feedback">
                                    <div id="vs13__combobox" role="combobox" aria-expanded="false" aria-owns="vs13__listbox" aria-label="Search for option" class="vs__dropdown-toggle">
                                        <div class="vs__selected-options">
                                        <span class="vs__selected">
                                            Components
                                            <!---->
                                        </span>
                                        <input aria-autocomplete="list" aria-labelledby="vs13__combobox" aria-controls="vs13__listbox" type="search" autocomplete="off" class="vs__search">
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
                                    <ul id="vs13__listbox" role="listbox" style="display: none; visibility: hidden;"></ul>
                                </div>
                                <div id="Type-feedback" class="invalid-feedback"></div>
                                <!----><!----><!---->
                            </div>
                            </fieldset>
                        </span>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                    </div>
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
                                        <fieldset class="form-group" id="__BVID__3161">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__3161__BV_label_">SKU(Component Code) *</legend>
                                            <div>
                                                <input type="text" placeholder="Components SKU" class="form-control" aria-describedby="Name-feedback" label="Name" id="code" name="code" value="{{ old('code') }}"> 
                                                <div id="Name-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                        {{-- <span>
                                    <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </span>
                                        <span>
                                            <fieldset class="form-group" id="create-recipe-field">
                                                <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">&nbsp;</legend>
                                                <div>
                                                    <button type="button" onclick="createCategory()" class="btn btn-outline-success btn-sm"><i class="i-Add"></i> Create Category</button>
                                                </div>
                                            </fieldset>
                                        </span>   --}}

                            <!-- Category select + New button -->
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <div class="d-flex">
                                    <select name="category_id" id="category_id" class="form-control mr-2">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" id="toggleCategoryBtn" class="btn btn-outline-success btn-sm" onclick="toggleCategoryForm()">
                                        <i class="i-Add"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Inline new category form (hidden) -->
                            <div id="newCategoryForm" class="border rounded p-4 mt-3 bg-white shadow-sm" style="display:none; max-width:600px; margin:auto;">
                                <h4 class="text-center mb-4">Add Category</h4>

                                <div class="form-group">
                                    <label for="new_category_name" class="font-weight-bold">Category Name *</label>
                                    <input type="text" id="new_category_name" class="form-control" placeholder="Enter category name">
                                    <div class="invalid-feedback" id="err_new_category_name"></div>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="new_category_description" class="font-weight-bold">Description</label>
                                    <textarea id="new_category_description" class="form-control" rows="3" placeholder="Enter category description"></textarea>
                                    <div class="invalid-feedback" id="err_new_category_description"></div>
                                </div>

                                <div class="d-flex justify-content-center mt-4">
                                    <button type="button" onclick="saveCategory()" class="btn btn-success px-4 mr-2">Save</button>
                                    <button type="button" onclick="toggleCategoryForm()" class="btn btn-danger px-4">Cancel</button>
                                </div>
                            </div>

                            <!-- JS: improved fetch + error handling -->
                            <script>
                            function toggleCategoryForm() {
                                const form = document.getElementById('newCategoryForm');
                                form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
                                clearCategoryFormErrors();
                            }

                            function clearCategoryFormErrors() {
                                document.getElementById('new_category_name').classList.remove('is-invalid');
                                document.getElementById('new_category_description').classList.remove('is-invalid');
                                document.getElementById('err_new_category_name').innerText = '';
                                document.getElementById('err_new_category_description').innerText = '';
                            }

                            async function saveCategory() {
                                clearCategoryFormErrors();

                                const name = document.getElementById('new_category_name').value.trim();
                                const description = document.getElementById('new_category_description').value.trim();

                                if (!name) {
                                    document.getElementById('new_category_name').classList.add('is-invalid');
                                    document.getElementById('err_new_category_name').innerText = 'Name is required.';
                                    return;
                                }

                                try {
                                    const res = await fetch("{{ route('categories.store') }}", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "Accept": "application/json",                 // <-- important so Laravel returns JSON
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                            "X-Requested-With": "XMLHttpRequest"         // <-- helps Laravel detect AJAX
                                        },
                                        body: JSON.stringify({ name, description })
                                    });

                                    // attempt to parse JSON if server returns JSON
                                    const contentType = res.headers.get('content-type') || '';
                                    const data = contentType.includes('application/json') ? await res.json() : null;

                                    if (!res.ok) {
                                        // Validation errors (Laravel returns 422 with { errors: { field: [...] } })
                                        if (res.status === 422 && data && data.errors) {
                                            showValidationErrors(data.errors);
                                            return;
                                        }
                                        // Other errors: show friendly message
                                        const msg = (data && data.message) ? data.message : res.statusText || 'Server error';
                                        throw new Error(msg);
                                    }

                                    // Success: data should be object with id, name, etc.
                                    const category = (data && data.id) ? data : null;
                                    if (!category) {
                                        // fallback if server returned entire model
                                        Swal.fire('Success', 'Category created', 'success');
                                    } else {
                                        // add new category to select and auto-select it
                                        const select = document.getElementById('category_id');
                                        const option = new Option(category.name, category.id, true, true);
                                        select.add(option);
                                        // hide + reset form
                                        document.getElementById('new_category_name').value = '';
                                        document.getElementById('new_category_description').value = '';
                                        toggleCategoryForm();

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Category created',
                                            text: category.name,
                                            timer: 1500,
                                            showConfirmButton: false
                                        });
                                    }
                                } catch (err) {
                                    console.error('Category create error:', err);
                                    Swal.fire('Error', 'Something went wrong: ' + err.message, 'error');
                                }
                            }

                            function showValidationErrors(errors) {
                                // errors is an object keyed by field name, e.g. { name: ["..."], description: ["..."] }
                                for (const [field, messages] of Object.entries(errors)) {
                                    const input = document.getElementById('new_category_' + field);
                                    const feedback = document.getElementById('err_new_category_' + field);
                                    if (input) input.classList.add('is-invalid');
                                    if (feedback) feedback.innerText = messages.join(' ');
                                }
                            }
                            </script>

                <div class="row">
                    <!-- Purchase Cost -->
                <div class="col-md-5">
                    <fieldset class="form-group">
                        <legend class="col-form-label pt-0">Purchase Cost *</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                            </div>
                            <input class="form-control" placeholder="0" id="cost" name="cost"
                                value="{{ old('COST') }}" inputmode="decimal">
                        </div>
                        <div class="invalid-feedback"></div>
                    </fieldset>
                            </div>

                            <!-- Selling Price -->
                            <div class="col-md-5">
                            <fieldset class="form-group">
                        <legend class="col-form-label pt-0">Selling Price *</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                            </div>
                            <input class="form-control" placeholder="0" id="price" name="price"
                                value="{{ old('PRICE') }}" inputmode="decimal">
                        </div>
                        <div class="invalid-feedback"></div>
                    </fieldset>
                            </div>

                            <!-- Qty on Hand -->
                            <div class="col-md-5">
                            <fieldset class="form-group">
                        <legend class="col-form-label pt-0">QTY on Hand *</legend>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                            </div>
                            <input class="form-control" placeholder="0" id="onhand" name="onhand"
                                value="{{ old('ONHAND') }}" inputmode="decimal">
                        </div>
                        <div class="invalid-feedback"></div>
                    </fieldset>
                            </div>

                            <!-- Unit -->
                            <div class="col-md-5">
                            <fieldset class="form-group">
                                <legend class="col-form-label pt-0">Unit *</legend>
                                <input class="form-control" placeholder="0" id="unit" name="unit"
                                    value="{{ old('UNIT') }}" inputmode="text">
                                <div class="invalid-feedback"></div>
                            </fieldset>
                            </div>
                        </div>
                                        <span>
                                        <fieldset class="form-group">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">For Sale</legend>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="for_sale" name="for_sale" value="1"
                                                    {{ !empty($component['FOR_SALE']) && $component['FOR_SALE'] ? 'checked' : '' }}>
                                                <label class="form-check-label" for="for_sale">Yes</label>
                                            </div>
                                        </fieldset>
                                    </span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>
                                        <fieldset class="form-group" id="__BVID__3161">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__3161__BV_label_">Component Name *</legend>
                                            <div>
                                                <input type="text" placeholder="Enter Name of Component" class="form-control" aria-describedby="Name-feedback" label="Name" id="name" name="name" value="{{ old('name') }}"> 
                                                <div id="Name-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                            <!-- Subcategory select + New button -->
                <div class="form-group">
                    <label for="subcategory_id">Subcategory</label>
                    <div class="d-flex">
                        <select name="subcategory_id" id="subcategory_id" class="form-control mr-2">
                            {{-- no default placeholder, will be filled dynamically --}}
                        </select>
                        <button type="button" id="toggleSubCategoryBtn" class="btn btn-outline-success btn-sm" onclick="toggleSubCategoryForm()">
                            <i class="i-Add"></i>
                        </button>
                    </div>
                </div>

                <script>
                document.getElementById('category_id').addEventListener('change', async function () {
                    const categoryId = this.value;
                    const subcategorySelect = document.getElementById('subcategory_id');
                    
                    // Clear options (no placeholder this time)
                    subcategorySelect.innerHTML = '';

                    if (!categoryId) return;

                    try {
                        const res = await fetch(`/categories/${categoryId}/subcategories`);
                        const subcategories = await res.json();

                        // Get old value from Blade
                        const oldSubcategoryId = "{{ old('subcategory_id') }}";

                        subcategories.forEach(sub => {
                            const option = new Option(sub.name, sub.id);

                            // Auto-select if matches old value
                            if (oldSubcategoryId && oldSubcategoryId == sub.id) {
                                option.selected = true;
                            }

                            subcategorySelect.add(option);
                        });

                        // If no old value, select the first subcategory by default
                        if (!oldSubcategoryId && subcategories.length > 0) {
                            subcategorySelect.options[0].selected = true;
                        }
                    } catch (err) {
                        console.error('Failed to load subcategories:', err);
                    }
                });

                // Auto-load subcategories if category is pre-selected
                document.addEventListener('DOMContentLoaded', () => {
                    const selectedCategory = document.getElementById('category_id').value;
                    if (selectedCategory) {
                        document.getElementById('category_id').dispatchEvent(new Event('change'));
                    }
                });
                </script>


                            <!-- Inline new subcategory form (hidden) -->
                            <div id="newSubCategoryForm" class="border rounded p-4 mt-3 bg-white shadow-sm" style="display:none; max-width:600px; margin:auto;">
                                <h4 class="text-center mb-4">Add Sub Category</h4>

                                <div class="form-group">
                                    <label for="new_subcategory_name" class="font-weight-bold">Subcategory Name *</label>
                                    <input type="text" id="new_subcategory_name" class="form-control" placeholder="Enter subcategory name">
                                    <div class="invalid-feedback" id="err_new_subcategory_name"></div>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="new_subcategory_description" class="font-weight-bold">Description</label>
                                    <textarea id="new_subcategory_description" class="form-control" rows="3" placeholder="Enter subcategory description"></textarea>
                                    <div class="invalid-feedback" id="err_new_subcategory_description"></div>
                                </div>

                                <div class="d-flex justify-content-center mt-4">
                                    <button type="button" onclick="saveSubCategory()" class="btn btn-success px-4 mr-2">Save</button>
                                    <button type="button" onclick="toggleSubCategoryForm()" class="btn btn-danger px-4">Cancel</button>
                                </div>
                            </div>

                            <script>
                            function toggleSubCategoryForm() {
                                const form = document.getElementById('newSubCategoryForm');
                                form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
                                clearSubCategoryFormErrors();
                            }

                            function clearSubCategoryFormErrors() {
                                document.getElementById('new_subcategory_name').classList.remove('is-invalid');
                                document.getElementById('new_subcategory_description').classList.remove('is-invalid');
                                document.getElementById('err_new_subcategory_name').innerText = '';
                                document.getElementById('err_new_subcategory_description').innerText = '';
                            }

                            async function saveSubCategory() {
                                clearSubCategoryFormErrors();

                                const name = document.getElementById('new_subcategory_name').value.trim();
                                const description = document.getElementById('new_subcategory_description').value.trim();
                                const category_id = document.getElementById('category_id').value; // parent category selected

                                if (!name) {
                                    document.getElementById('new_subcategory_name').classList.add('is-invalid');
                                    document.getElementById('err_new_subcategory_name').innerText = 'Name is required.';
                                    return;
                                }

                                if (!category_id) {
                                    Swal.fire('Error', 'Please select a parent category first.', 'error');
                                    return;
                                }

                                try {
                                    const res = await fetch("{{ route('subcategories.store') }}", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "Accept": "application/json",
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                            "X-Requested-With": "XMLHttpRequest"
                                        },
                                        body: JSON.stringify({ name, description, category_id })
                                    });

                                    const contentType = res.headers.get('content-type') || '';
                                    const data = contentType.includes('application/json') ? await res.json() : null;

                                    if (!res.ok) {
                                        if (res.status === 422 && data && data.errors) {
                                            showSubCategoryValidationErrors(data.errors);
                                            return;
                                        }
                                        const msg = (data && data.message) ? data.message : res.statusText || 'Server error';
                                        throw new Error(msg);
                                    }

                                    const subcategory = (data && data.id) ? data : null;
                                    if (!subcategory) {
                                        Swal.fire('Success', 'Subcategory created', 'success');
                                    } else {
                                        const select = document.getElementById('subcategory_id');
                                        const option = new Option(subcategory.name, subcategory.id, true, true);
                                        select.add(option);
                                        document.getElementById('new_subcategory_name').value = '';
                                        document.getElementById('new_subcategory_description').value = '';
                                        toggleSubCategoryForm();

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Subcategory created',
                                            text: subcategory.name,
                                            timer: 1500,
                                            showConfirmButton: false
                                        });
                                    }
                                } catch (err) {
                                    console.error('SubCategory create error:', err);
                                    Swal.fire('Error', 'Something went wrong: ' + err.message, 'error');
                                }
                            }

                            function showSubCategoryValidationErrors(errors) {
                                for (const [field, messages] of Object.entries(errors)) {
                                    const input = document.getElementById('new_subcategory_' + field);
                                    const feedback = document.getElementById('err_new_subcategory_' + field);
                                    if (input) input.classList.add('is-invalid');
                                    if (feedback) feedback.innerText = messages.join(' ');
                                }
                            }
                            </script>
                            {{-- Image feat --}}
                <fieldset class="form-group">
                <legend>Multiple Images</legend>
                <div id="drop-area" class="upload-box"
                    onclick="document.getElementById('images').click();">
                    <i class="fas fa-hand-pointer fa-2x mb-2 text-muted"></i>
                    <p class="text-muted">Drag & Drop Multiple images For product<br><strong>(or) Select</strong></p>
                    <input type="file" id="images" name="images[]" multiple class="d-none" accept="image/*">

                    <!-- 🖼️ Previews will show inside this box -->
                    <div id="preview-container" class="preview-box mt-3"></div>
                </div>
            </fieldset>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

            <style>
            .upload-box {
                border: 2px dashed #ccc;
                border-radius: 6px;
                padding: 30px 20px;
                text-align: center;
                cursor: pointer;
                transition: border-color 0.3s, background-color 0.3s;
                min-height: 200px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            .upload-box:hover {
                border-color: #28a745;
                background-color: #f8f9fa;
            }
            .upload-box.dragover {
                border-color: #007bff;
                background-color: #e9f5ff;
            }
            .preview-box {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                margin-top: 15px;
            }
            .preview-box img {
                width: 150px;   /* fixed width */
                height: 150px;  /* fixed height */
                object-fit: cover; /* keeps proportions but crops if needed */
                margin: 8px;
                border: 1px solid #ddd;
                border-radius: 6px;
                padding: 3px;
                background: #fff;
                box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            }
            </style>

                        <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const dropArea = document.getElementById('drop-area');
                            const fileInput = document.getElementById('images');
                            const previewContainer = document.getElementById('preview-container');

                            // Prevent defaults
                            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(evt => {
                                dropArea.addEventListener(evt, (e) => {
                                    e.preventDefault();
                                    e.stopPropagation();
                                });
                            });

                            // Highlight
                            ['dragenter', 'dragover'].forEach(evt => {
                                dropArea.addEventListener(evt, () => dropArea.classList.add('dragover'));
                            });
                            ['dragleave', 'drop'].forEach(evt => {
                                dropArea.addEventListener(evt, () => dropArea.classList.remove('dragover'));
                            });

                            // Drop files
                            dropArea.addEventListener('drop', (e) => {
                                const files = e.dataTransfer.files;
                                if (files.length) handleFiles(files);
                            });

                            // Select files
                            fileInput.addEventListener('change', () => handleFiles(fileInput.files));

                            function handleFiles(files) {
                                previewContainer.innerHTML = ""; // clear previews
                                [...files].forEach(file => {
                                    if (!file.type.startsWith('image/')) return;
                                    const reader = new FileReader();
                                    reader.onload = (ev) => {
                                        const img = document.createElement('img');
                                        img.src = ev.target.result;
                                        previewContainer.appendChild(img);
                                    };
                                    reader.readAsDataURL(file);
                                });
                            }
                        });
                        </script>
                        </span>
                        </div>
                        <div class="mr-2">
                        <div class="b-overlay-wrap position-relative d-inline-block btn-loader">
                            <button type="submit" class="btn btn-primary"><i class="i-Yes me-2 font-weight-bold"></i>
                            Save Component</button><!---->
                        </div>
                    </div>
                </div>
            </form>
        </span>
    </div>
</div>
@endsection