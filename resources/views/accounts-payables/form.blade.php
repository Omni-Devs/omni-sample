@extends('layouts.app')
@section('content')

@php
    $isEdit = $isEdit ?? false;
    $detailsArray = [];

    if ($isEdit && isset($ap)) {
        $detailsArray = $ap->details->map(function($d) {
            return [
                'accounting_category_id' => $d->accounting_category_id,
                'category_name' => $d->category->category_payable ?? '',
                'type' => $d->category->type_payable ?? '',
                'description' => $d->description,
                'quantity' => $d->quantity,
                'tax_id' => $d->tax_id,
                'tax_value' => $d->tax_value,
                'amount_per_unit' => $d->amount_per_unit,
                'total_amount' => $d->total_amount,
            ];
        })->toArray();
    }
@endphp

<div class="main-content" id="app">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">{{ $isEdit ? 'Edit' : 'Create' }} Accounts Payable</h1>
            <ul>
                <li><a href="#">Accounting</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

    <form action="{{ $isEdit ? route('accounts-payables.update', $ap->id) : route('accounts-payables.store') }}" method="POST">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div class="wrapper">
            <div class="row">

                {{-- STEP 1 --}}
                <div class="col-xl-3">
                    <div id="step1" class="card p-3">
                        <h5>Step 1: Basic Information</h5>

                        <label for="created_at">Date and Time Created</label>
                        <div class="d-flex">
                            <input type="datetime-local"
                                id="created_at"
                                name="created_at"
                                class="form-control"
                                value="{{ old('created_at', $isEdit ? $ap->created_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
                            
                            <button type="button"
                                class="btn btn-secondary ml-2"
                                onclick="document.getElementById('created_at').value = ''">
                                Clear
                            </button>
                        </div>

                        <label>Reference Number *</label>
                        @php
                            $selectedBranchId = old('branch_id', $currentBranchId ?? '');

                            $prefix = 'AP-' . $selectedBranchId . '-';

                            $latestAP = \App\Models\AccountPayable::where('reference_number', 'LIKE', $prefix . '%')
                                ->latest('id')
                                ->first();

                            $nextNumber = $latestAP
                                ? intval(substr($latestAP->reference_number, -6)) + 1
                                : 1;

                            $formattedRef = $isEdit
                                ? $ap->reference_number
                                : $prefix . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
                        @endphp
                        
                        <input type="text" 
                            name="reference_number" 
                            class="form-control" 
                            value="{{ old('reference_number', $formattedRef) }}" 
                            required>

                        <label class="mt-3">Payor Details *</label>
                        <input type="text" name="payor_details" class="form-control" required
                               value="{{ old('payor_details', $isEdit ? $ap->payor_details : '') }}">
                        <input type="text" name="payer_name" class="form-control mt-1" placeholder="Name"
                               value="{{ old('payer_name', $isEdit ? $ap->payer_name : '') }}">
                        <input type="text" name="payer_company" class="form-control mt-1" placeholder="Company"
                               value="{{ old('payer_company', $isEdit ? $ap->payer_company : '') }}">
                        <input type="text" name="payer_address" class="form-control mt-1" placeholder="Address"
                               value="{{ old('payer_address', $isEdit ? $ap->payer_address : '') }}">
                        <input type="text" name="payer_mobile_number" class="form-control mt-1" placeholder="Mobile #"
                               value="{{ old('payer_mobile_number', $isEdit ? $ap->payer_mobile_number : '') }}">
                        <input type="email" name="payer_email_address" class="form-control mt-1" placeholder="Email"
                               value="{{ old('payer_email_address', $isEdit ? $ap->payer_email_address : '') }}">
                        <input type="text" name="payer_tin" class="form-control mt-1" placeholder="TIN"
                               value="{{ old('payer_tin', $isEdit ? $ap->payer_tin : '') }}">

                        <label class="mt-3">Set Due Date *</label>
                        <input type="date" name="due_date" class="form-control"
                               value="{{ old('due_date', $isEdit && $ap->due_date ? $ap->due_date->format('Y-m-d') : '') }}">

                                 <button id="editStep1Btn"
                type="button"
                class="btn btn-warning btn-sm mt-3 d-none"
                onclick="enableStep1()">
            Edit Basic Information
        </button>

                    </div>
                </div>

                {{-- STEP 2 --}}
                <div class="col-xl-3">
                    <div class="card p-3">
                        <h5>Step 2: Particulars</h5>

                        <label>Category *</label>
                        <select id="cat" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $c)
                                <option value="{{ $c->category_payable }}">{{ $c->category_payable }}</option>
                            @endforeach
                        </select>

                        <label class="mt-3">Type *</label>
                        <select id="type" class="form-control" required>
                            <option value="" selected disabled>Select Type</option>
                        </select>

                        <label class="mt-3">Description *</label>
                        <textarea id="desc" class="form-control">{{ old('desc') }}</textarea>

                        <label class="mt-3">Quantity *</label>
                        <input type="number" id="qty" class="form-control" value="1">

                        <label class="mt-3">Tax *</label>
                        <select id="tax" class="form-control" required>
                            <option value="" disabled selected>Select Tax</option>
                            @foreach($taxes as $t)
                                {{-- <option value="{{ $t->id }}" data-value="{{ $t->value }}">
                                {{ $t->name }} - ₱{{ number_format($t->value, 2) }}
                            </option> --}}
                            <option value="{{ $t->id }}" 
                        data-value="{{ $t->value }}" 
                        data-type="{{ $t->type }}">
                    {{ $t->name }}
                </option>
                            @endforeach
                        </select>

                        <label class="mt-3">Amount per Unit *</label>
                        <input type="number" id="amount" class="form-control" value="0">

                        <button type="button" class="btn btn-primary btn-block mt-3" onclick="addToSummary()">
                            Add to Summary
                        </button>
                    </div>
                </div>

                {{-- STEP 3 --}}
                <div class="col-xl-6">
                    <div class="card p-3">
                        <h5>Step 3: Summary</h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>

                            <tbody id="summaryTable">
                                <tr id="emptyRow">
                                    <td colspan="7" class="text-center text-muted">
                                        No data for table
                                    </td>
                                </tr>
                            </tbody>

                            <tfoot id="totalsSection">
                                <tr>
                                    <th colspan="5" class="text-right">Tax Total:</th>
                                    <th colspan="2" id="taxTotalDisplay">₱0.00</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Sub-Total:</th>
                                    <th colspan="2" id="subTotalDisplay">₱0.00</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right">Total Amount:</th>
                                    <th colspan="2" id="grandTotalDisplay" class="font-weight-bold">₱0.00</th>
                                </tr>
                            </tfoot>
                        </table>

                        {{-- Hidden input used to submit details --}}
                        <input type="hidden" name="details" id="detailsInput">

                        <div class="text-right mt-3">
                            <button class="btn btn-success">{{ $isEdit ? 'Update' : 'Submit' }}</button>
                            <a href="{{ route('accounts-payables.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<script>
  let details = @json($detailsArray);
    document.addEventListener("DOMContentLoaded", () => {
        renderTable();
    });

// function addToSummary() {
//     const cat = document.getElementById("cat");
//     const catName = cat.options[cat.selectedIndex].text; // label

//     const typeSelect = document.getElementById("type");
//     const typeId = typeSelect.value;                      
//     const typeName = typeSelect.options[typeSelect.selectedIndex] 
//                         ? typeSelect.options[typeSelect.selectedIndex].text 
//                         : '';

//     const desc = document.getElementById("desc").value;
//     const qty = parseFloat(document.getElementById("qty").value);
//     const taxSelect = document.getElementById('tax');
//     const selectedTax = taxSelect.options[taxSelect.selectedIndex];
//     // const tax_id = parseInt(selectedTax.value, 10);
//     // const tax_value = parseFloat(selectedTax.dataset.value) || 0;

//     const tax_id = parseInt(selectedTax.value, 10);
//     const tax_value = parseFloat(selectedTax.dataset.value) || 0; // value column
//     const tax_type = selectedTax.dataset.type; // <-- NEW (percentage or fixed)


//     const amt = parseFloat(document.getElementById("amount").value);

//     if (!cat.value || !typeId || !typeName || !desc || amt <= 0) {
//         alert("Fill all required fields");
//         return;
//     }

//     // ⬇️ PLACE THIS RIGHT HERE
//     disableStep1();

//    // --- TAX CALCULATION FIX ---
//     let tax_amount = 0;

//     if (tax_type === "percentage") {
//         // Example: 25% of 1000 = 250
//         tax_amount = (qty * amt) * (tax_value / 100);
//     } else {
//         // FIXED tax → use tax_value directly
//         tax_amount = tax_value;
//     }

//     // TOTAL = Amount + Tax
//     const total_amount = (qty * amt) + tax_amount;

//     // Add to details array
//     details.push({
//         accounting_category_id: parseInt(typeId, 10),
//         category_name: catName,
//         type_name: typeName,
//         description: desc,
//         quantity: qty,
//         tax_id: tax_id,
//         tax_value: tax_value,
//         amount_per_unit: amt,
//         total_amount: total_amount
//     });

//     // Re-render table
//     renderTable();
// }

function addToSummary() {
    const cat = document.getElementById("cat");
    const typeSelect = document.getElementById("type");
    const descInput = document.getElementById("desc");
    const qtyInput = document.getElementById("qty");
    const taxSelect = document.getElementById('tax');
    const amtInput = document.getElementById("amount");

    const catName = cat.options[cat.selectedIndex].text;
    const typeId = typeSelect.value;
    const typeName = typeSelect.options[typeSelect.selectedIndex]?.text || '';
    const desc = descInput.value;
    const qty = parseFloat(qtyInput.value);
    const selectedTax = taxSelect.options[taxSelect.selectedIndex];
    const tax_id = parseInt(selectedTax.value, 10);
    const tax_value = parseFloat(selectedTax.dataset.value) || 0;
    const tax_type = selectedTax.dataset.type;
    const amt = parseFloat(amtInput.value);

    // Validation only for Step 2 fields
    if (!cat.value || !typeId || !desc || !tax_id || amt <= 0) {
        alert("Please fill out all fields in Step 2.");
        return;
    }

    // Disable step 1
    disableStep1();

    // TAX CALCULATION
    let tax_amount = 0;

    if (tax_type === "percentage") {
        tax_amount = (qty * amt) * (tax_value / 100);
    } else {
        tax_amount = tax_value;
    }

    const total_amount = (qty * amt) + tax_amount;

    // Add to details array
    details.push({
        accounting_category_id: parseInt(typeId, 10),
        category_name: catName,
        type_name: typeName,
        description: desc,
        quantity: qty,
        tax_id: tax_id,
        tax_value: tax_value,
        amount_per_unit: amt,
        total_amount: total_amount
    });

    // Render updated table
    renderTable();

    // REMOVE REQUIRED FROM STEP 2
    cat.removeAttribute("required");
    typeSelect.removeAttribute("required");
    descInput.removeAttribute("required");
    qtyInput.removeAttribute("required");
    taxSelect.removeAttribute("required");
    amtInput.removeAttribute("required");

    // CLEAR STEP 2 FIELDS
    cat.value = "";
    typeSelect.innerHTML = `<option value="" disabled selected>Select Type</option>`;
    descInput.value = "";
    qtyInput.value = 1;
    taxSelect.value = "";
    amtInput.value = 0;
}

function renderTable() {
    const tbody = document.getElementById("summaryTable");
    tbody.innerHTML = "";

    if (details.length === 0) {
        tbody.innerHTML = `<tr id="emptyRow"><td colspan="7" class="text-center text-muted">No data for table</td></tr>`;
    }

        details.forEach((row, i) => {
        let taxDisplay = "";

        if (row.tax_type === "percentage") {
            taxDisplay = `${row.tax_value}%`;
        } else {
            taxDisplay = `₱${parseFloat(row.tax_value).toFixed(2)}`;
        }

        tbody.innerHTML += `
            <tr data-row 
                data-qty="${row.quantity}" 
                data-tax="${row.tax_value}" 
                data-tax-type="${row.tax_type}"
                data-amount="${row.amount_per_unit}"
                data-tax-amount="${row.tax_amount}">
                
                <td>${row.category_name}</td>
                <td>${row.type_name}</td>
                <td>${row.description}</td>
                <td>${row.quantity}</td>
                <td>${taxDisplay}</td>
                <td>₱${parseFloat(row.total_amount).toFixed(2)}</td>

                <td class="text-right">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(${i})">Delete</button>
                </td>
            </tr>`;
    });

    document.getElementById("detailsInput").value = JSON.stringify(details);
    updateTotals();
}

function removeRow(i) {
    details.splice(i, 1);
    renderTable();
}

function updateTotals() {
    let rows = document.querySelectorAll("#summaryTable tr[data-row]");
    let subTotal = 0, taxTotal = 0;

    rows.forEach(row => {
        let qty = parseFloat(row.dataset.qty) || 0;
        let amount = parseFloat(row.dataset.amount) || 0;
        let taxPercent = parseFloat(row.dataset.tax) || 0;

        let lineSub = qty * amount;
        let lineTax = lineSub * taxPercent / 100;

        subTotal += lineSub;
        taxTotal += lineTax;
    });

    let grandTotal = subTotal + taxTotal;

    document.getElementById("subTotalDisplay").textContent = `₱${subTotal.toFixed(2)}`;
    document.getElementById("taxTotalDisplay").textContent = `₱${taxTotal.toFixed(2)}`;
    document.getElementById("grandTotalDisplay").textContent = `₱${grandTotal.toFixed(2)}`;
}

document.getElementById('cat').addEventListener('change', function () {
    const category = this.value;            // this.value is category_payable string
    const typeSelect = document.getElementById('type');
    typeSelect.innerHTML = '<option value="">Loading...</option>';

    if (!category) {
        typeSelect.innerHTML = '<option value="">Select Type</option>';
        return;
    }

    fetch(`/accounts-payables/get-types/${encodeURIComponent(category)}`)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            typeSelect.innerHTML = '<option value="">Select Type</option>';
            data.forEach(type => {
                // type.id is integer (accounting_category id), type.type_payable is the label
                typeSelect.innerHTML += `<option value="${type.id}">${type.type_payable}</option>`;
            });
        })
        .catch(() => {
            typeSelect.innerHTML = '<option value="">Error loading types</option>';
        });
});

document.querySelector('form').addEventListener('submit', function(e){
    if(details.length < 1){
        e.preventDefault();
        alert('Please add at least one summary item.');
        return false;
    }
    document.getElementById('detailsInput').value = JSON.stringify(details);
});

// function disableStep1() {
//     const step1Fields = document.querySelectorAll(
//         "#created_at, input[name='reference_number'], input[name='payor_details'], input[name='payer_name'], input[name='payer_company'], input[name='payer_address'], input[name='payer_mobile_number'], input[name='payer_email_address'], input[name='payer_tin'], input[name='due_date']"
//     );

//     step1Fields.forEach(field => {
//         field.setAttribute('readonly', true); // <-- allows submission
//         field.classList.add('bg-light');      // visual cue it's locked
//     });
// }

function disableStep1() {
    const step1 = document.getElementById("step1");
    const editBtn = document.getElementById("editStep1Btn");

    // Make fields read-only
    step1.querySelectorAll("input, select, textarea").forEach(el => {
        el.setAttribute("readonly", true);
    });

    // Fade the card
    step1.style.opacity = "0.6";

    // Disable clicks for everything except the edit button
    step1.querySelectorAll("input, select, textarea, div, label").forEach(el => {
        el.style.pointerEvents = "none";
    });

    // Show the edit button
    editBtn.classList.remove("d-none");

    // Ensure the edit button itself is clickable
    editBtn.style.pointerEvents = "auto";
}


function enableStep1() {
    const step1 = document.getElementById("step1");
    const editBtn = document.getElementById("editStep1Btn");

    // Enable inputs
    step1.querySelectorAll("input, select, textarea").forEach(el => {
        el.removeAttribute("readonly");
    });

    // Restore interaction
    step1.style.opacity = "1";
    step1.style.pointerEvents = "auto";

    // Hide edit button again
    editBtn.classList.add("d-none");
}

</script>

@endsection
