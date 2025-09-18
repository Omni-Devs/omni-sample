function handleProductsTypeChange(value) {
    if (value === "components") {
        window.location.href = "/components"; // blade {{ url('components') }} becomes just a relative path here
    }
    else {
        window.location.href = "/products"; // blade {{ url('products') }} becomes just a relative path here
    }
}

document.addEventListener("DOMContentLoaded", function () {
    try {
        var legends = document.querySelectorAll("fieldset.form-group legend");
        legends.forEach(function (legend) {
            if (legend && legend.textContent && legend.textContent.trim() === "Select Type") {
                var fieldset = legend.parentElement;
                if (!fieldset) return;

                // decide which option should be selected
                var current = window.currentPage || "products";

                var html =
                    '<label for="products-select-type" class="bv-no-focus-ring col-form-label pt-0">Select Type</label>' +
                    '<select id="products-select-type" class="form-control" aria-label="Select Type">' +
                    '<option value="products" ' + (current === "products" ? "selected" : "") + '>Products</option>' +
                    '<option value="components" ' + (current === "components" ? "selected" : "") + '>Components</option>' +
                    "</select>";

                fieldset.innerHTML = html;

                var sel = fieldset.querySelector("#products-select-type");
                if (sel) {
                    sel.addEventListener("change", function (e) {
                        handleProductsTypeChange(e.target.value);
                    });
                }
            }
        });
    } catch (e) {
        console.error("Failed to replace Select Type control on products page:", e);
    }
});


// --- Searchbar ---
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector("#vgt-search-352530096888");
    const table = document.querySelector("#vgt-table");
    if (!searchInput || !table) return;

    const rows = table.querySelectorAll("tbody tr");

    searchInput.addEventListener("keyup", function () {
        const searchTerm = this.value.toLowerCase();
        rows.forEach((row) => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? "" : "none";
        });
    });
});

// --- Sortable Table ---
document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector("#vgt-table");
    if (!table) return;

    const headers = table.querySelectorAll("thead th");

    headers.forEach((header, index) => {
        if (!header.classList.contains("sortable")) return;

        const button = header.querySelector("button");
        if (!button) return;

        let asc = true;
        button.addEventListener("click", function () {
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));

            rows.sort((a, b) => {
                let aText = a.querySelectorAll("td")[index]?.textContent.trim() || "";
                let bText = b.querySelectorAll("td")[index]?.textContent.trim() || "";

                if (!isNaN(aText) && !isNaN(bText) && aText !== "" && bText !== "") {
                    return asc ? Number(aText) - Number(bText) : Number(bText) - Number(aText);
                }
                return asc ? aText.localeCompare(bText) : bText.localeCompare(aText);
            });

            rows.forEach((row) => tbody.appendChild(row));
            asc = !asc;
        });
    });
});
