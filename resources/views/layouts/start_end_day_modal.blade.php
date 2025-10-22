<!-- POS Start / End Modal -->
<div class="modal fade" id="startPOSModal" tabindex="-1" aria-labelledby="startPOSModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="startEndApp">
      <!-- Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="startPOSModalLabel">
          @{{ modalMode === 'open' ? 'Start POS Session' : 'End POS Session' }}
        </h5>
      </div>

      <!-- Body -->
      <div class="modal-body">
        <!-- 🟢 START SESSION FORM -->
        <div v-if="modalMode === 'open'">
          <div class="form-group mb-3">
            <label>Date</label>
            <input type="date" class="form-control" v-model="currentDate" readonly>
          </div>

          <div class="form-group mb-3">
            <label>Time</label>
            <input type="time" class="form-control" v-model="currentTime">
          </div>

          <div class="form-group mb-3">
            <label>Change Fund (₱)</label>
            <input type="number" class="form-control" v-model="changeFund" placeholder="Enter starting fund">
          </div>
        </div>

        <!-- 🔴 END SESSION FORM -->
        <div v-else>
          <p><strong>Terminal:</strong> @{{ terminal_no }}</p>
          <p><strong>Started At:</strong> @{{ sessionData ? sessionData.transaction_time : '—' }}</p>

          <div class="form-group mb-3">
            <label>Closing Date</label>
            <input type="date" class="form-control" v-model="closingDate" readonly>
          </div>

          <div class="form-group mb-3">
            <label>Closing Time</label>
            <input type="time" class="form-control" v-model="closingTime">
          </div>

          <div class="form-group mb-3">
            <label>End Cash (₱)</label>
            <input type="number" class="form-control" v-model="endCash" placeholder="Enter end cash total">
          </div>

          <div class="form-group mb-3">
            <label>Remarks</label>
            <textarea class="form-control" v-model="remarks" placeholder="Any notes..."></textarea>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

        <button v-if="modalMode === 'open'" class="btn btn-primary" @click="submitStartPOS">
          Start Session
        </button>

        <button v-else class="btn btn-danger" @click="submitEndPOS">
          End Session
        </button>
      </div>
    </div>
  </div>
</div>
