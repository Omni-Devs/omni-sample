<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- POS Start / End Modal -->
<div class="modal fade" id="checkUnpaidModal" tabindex="-1" aria-labelledby="checkUnpaidModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <!-- 🔹 use modal-lg or custom width -->
      <div class="modal-content" style="max-width: 800px; margin: auto;">
         <!-- 🔹 manually limit width -->
         <!-- Header -->
         <div class="modal-header bg-primary text-white py-2">
            <h5 class="modal-title" id="checkUnpaidModalLabel">
              Closing Session
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">X</button>
         </div>
        <!-- Body -->
        <div class="modal-body" style="max-height: 80vh; overflow-y: auto; overscroll-behavior: contain;">
            <div class="text-center">
                <p v-if="unpaidStatus.has_unpaid_orders && unpaidStatus.has_unserved_products">
                    ⚠️ There are unpaid orders AND items still serving.<br>
                    Please settle payments and complete all serving items before closing.
                </p>

                <p v-else-if="unpaidStatus.has_unpaid_orders">
                    ⚠️ Unpaid orders detected.<br>
                    Please settle all pending transactions before proceeding.
                </p>

                <p v-else-if="unpaidStatus.has_unserved_products">
                    ⚠️ There are items still in <strong>Serving</strong> status.<br>
                    Please complete all serving items before closing.
                </p>

                <div class="mt-3">
                    <button class="btn btn-warning" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>