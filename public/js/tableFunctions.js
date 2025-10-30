function handleProductsTypeChange(value) {
    if (value === "components") {
        window.location.href = "/components"; // blade {{ url('components') }} becomes just a relative path here
    }
    else {
        window.location.href = "/products"; // blade {{ url('products') }} becomes just a relative path here
    }
}

// document.addEventListener("DOMContentLoaded", function () {
//     try {
//         var legends = document.querySelectorAll("fieldset.form-group legend");
//         legends.forEach(function (legend) {
//             if (legend && legend.textContent && legend.textContent.trim() === "Select Type") {
//                 var fieldset = legend.parentElement;
//                 if (!fieldset) return;

//                 // decide which option should be selected
//                 var current = window.currentPage || "products";

//                 var html =
//                     '<label for="products-select-type" class="bv-no-focus-ring col-form-label pt-0">Select Type</label>' +
//                     '<select id="products-select-type" class="form-control" aria-label="Select Type">' +
//                     '<option value="products" ' + (current === "products" ? "selected" : "") + '>Products</option>' +
//                     '<option value="components" ' + (current === "components" ? "selected" : "") + '>Components</option>' +
//                     "</select>";

//                 fieldset.innerHTML = html;

//                 var sel = fieldset.querySelector("#products-select-type");
//                 if (sel) {
//                     sel.addEventListener("change", function (e) {
//                         handleProductsTypeChange(e.target.value);
//                     });
//                 }
//             }
//         });
//     } catch (e) {
//         console.error("Failed to replace Select Type control on products page:", e);
//     }
// });


  document.querySelectorAll('.v-select').forEach(select => {
    const toggle = select.querySelector('.vs__dropdown-toggle');
    const arrow = select.querySelector('.vs__open-indicator');
    const listbox = select.querySelector('.vs__listbox');
    const selected = select.querySelector('.vs__selected');
    const clearBtn = select.querySelector('.vs__clear');

    // toggle dropdown
    toggle.addEventListener('click', e => {
      if (e.target.closest('.vs__clear')) return; // skip if clear clicked
      listbox.style.display = listbox.style.display === 'block' ? 'none' : 'block';
      arrow.classList.toggle('rotate');
    });

    // choose option
    listbox.querySelectorAll('li').forEach(item => {
      item.addEventListener('click', () => {
        selected.textContent = item.textContent;
        listbox.style.display = 'none';
        arrow.classList.remove('rotate');
      });
    });

    // clear selection
    clearBtn.addEventListener('click', e => {
      e.stopPropagation();
      selected.textContent = '';
    });

    // click outside closes dropdown
    document.addEventListener('click', e => {
      if (!select.contains(e.target)) {
        listbox.style.display = 'none';
        arrow.classList.remove('rotate');
      }
    });
  });

// --- Searchbar ---
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('tableSearch');
    const table = document.getElementById('productsTable');
    const rows = table.getElementsByTagName('tr');

    searchInput.addEventListener('keyup', function () {
        const filter = this.value.toLowerCase().trim();

        // loop through all table rows (skip header)
        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const text = row.textContent.toLowerCase();

            // toggle row visibility based on match
            row.style.display = text.includes(filter) ? '' : 'none';
        }
    });
});

// --- Sortable Table ---
document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector("#vgt-table");
    if (!table) return;

    const headers = table.querySelectorAll("thead th");

    headers.forEach((header, index) => {
        // Make header visually clickable
        header.style.cursor = "pointer";

        header.addEventListener("click", function () {
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));
            const isAsc = header.classList.toggle("asc");

            // Remove sorting classes from other headers
            headers.forEach((h, i) => {
                if (i !== index) h.classList.remove("asc", "desc");
            });
            header.classList.toggle("desc", !isAsc);

            rows.sort((a, b) => {
                const aText = a.children[index].textContent.trim();
                const bText = b.children[index].textContent.trim();

                const aNum = parseFloat(aText.replace(/,/g, ""));
                const bNum = parseFloat(bText.replace(/,/g, ""));
                const bothNumbers = !isNaN(aNum) && !isNaN(bNum);

                if (bothNumbers) {
                    return isAsc ? aNum - bNum : bNum - aNum;
                } else {
                    return isAsc
                        ? aText.localeCompare(bText)
                        : bText.localeCompare(aText);
                }
            });

            // Reattach sorted rows
            rows.forEach(row => tbody.appendChild(row));
        });
    });
});
