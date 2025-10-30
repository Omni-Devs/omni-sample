<!-- POS Start / End Modal -->

      <div class="modal fade" id="startPOSModal" tabindex="-1" aria-labelledby="startPOSModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable"><!-- 🔹 use modal-lg or custom width -->
    <div class="modal-content" style="max-width: 800px; margin: auto;"> <!-- 🔹 manually limit width -->
      <!-- Header -->
      <div class="modal-header bg-primary text-white py-2">
        <h5 class="modal-title" id="startPOSModalLabel">
          @{{ modalMode === 'open' ? 'Start POS Session' : 'End POS Session' }}
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">X</button>
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
            <label>Starting Fund (₱)</label>
            <input type="number" class="form-control" v-model="startingFund" placeholder="Enter starting fund">
          </div>
        </div>

        <!-- 🔴 END SESSION FORM -->
        <div v-else>
          <div class="modal-body p-3">

          <!-- ROW 1: DENOMINATIONS -->
          <div class="mb-4">
            <h6><strong>Denominations</strong></h6>
            <div class="table-responsive">
              <table class="table table-sm table-bordered align-middle text-center">
                <thead class="table-light">
                  <tr>
                    <th style="width: 40%"># PCS</th>
                    <th style="width: 60%">PESO VALUE</th>
                  </tr>
                </thead>
                <tbody>
                  <tbody>
                    <tr>
                      <td><input type="number" v-model="denom_1000" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 1,000.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_500" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 500.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_200" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 200.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_100" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 100.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_50" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 50.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_20" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 20.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_10" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 10.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_5" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 5.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_1" class="form-control form-control-sm text-end" placeholder="0"></td>
                      <td>₱ 1.00</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_050" class="form-control form-control-sm text-end" placeholder="0" step="any"></td>
                      <td>₱ 0.50</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_025" class="form-control form-control-sm text-end" placeholder="0" step="any"></td>
                      <td>₱ 0.25</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_010" class="form-control form-control-sm text-end" placeholder="0" step="any"></td>
                      <td>₱ 0.10</td>
                    </tr>
                    <tr>
                      <td><input type="number" v-model="denom_005" class="form-control form-control-sm text-end" placeholder="0" step="any"></td>
                      <td>₱ 0.05</td>
                    </tr>
                  </tbody>

                  <tr>
                    <td colspan="2">
                      <div class="d-flex justify-content-between align-items-center">
                        <label>TIP:</label>
                        <input
                          type="number"
                          step="0.01"
                          v-model.number="tip"
                          class="form-control form-control-sm w-50 text-end"
                          placeholder="0.00"
                        />
                      </div>
                    </td>
                  </tr>

                   <tr class="fw-bold">
                    <td colspan="2" class="text-end">
                      Total: ₱ <span id="denomination-total">@{{ denominationTotal }}</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- ROW 2: POS CASH SALES -->
          <div class="mb-4 border-top pt-3">
            <div class="row">
              <div class="col-md-6">
                <h6><strong>POS Cash Sales</strong></h6>

                <div class="mb-2">
                  <label>Cash Sales:</label>
                    <input 
                      type="number"
                      step="0.01"
                      :value="posCashSalesTotal"
                      readonly
                      class="form-control form-control-sm"
                    >
                </div>

                <div class="mb-2">
                  <label>Starting Fund:</label>
                  <input
                    type="number"
                    step="0.01"
                    name="starting_fund"
                    id="starting_fund"
                    v-model="startingFund"
                    class="form-control form-control-sm"
                    readonly
                  />
                </div>

                <div class="mb-2">
                  <label>Shortage:</label>
                  <input
                    type="number"
                    step="0.01"
                    :value="shortage"
                    readonly
                    class="form-control form-control-sm"
                  >
                </div>

                <div class="mb-2">
                  <label>Overage:</label>
                  <input
                    type="number"
                    step="0.01"
                    :value="overage"
                    readonly
                    class="form-control form-control-sm"
                  >
                </div>

                <div class="mb-2">
                  <label>Remarks:</label>
                  <textarea name="remarks" rows="3"  v-model="remarks" class="form-control form-control-sm"></textarea>
                </div>
              </div>

              <div class="col-md-6 border-start">
                <h6><strong>Cash Turnover Transfer</strong></h6>

                <div class="mb-2">
                  <label>Cashier Name:</label>
                  <input type="text" name="cashier_name" class="form-control form-control-sm" value="{{ Auth::user()->name }}" readonly>
                </div>

                <div class="mb-2">
                  <label>Transfer To:</label>
                  <select name="transfer_to" id="transfer_to" v-model="transferTo" class="form-select form-select-sm">
                    <option value="">-- Select Manager --</option>
                    @foreach($managers as $manager)
                      <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-2">
                  <label>Amount:</label>
                  <input type="number" step="0.01" name="transfer_amount" v-model="transferAmount" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>

          <!-- ROW 3: SALES & RECEIVABLES -->
          <div class="border-top pt-3">
            <h6><strong>Sales</strong></h6>
            <div class="row">
                <!-- 🟢 CHANGED: replaced name[] with v-models -->
                <div class="col-md-3 mb-2"><label>Cash:</label><input 
                  type="number" 
                  step="0.01"
                  v-model.number="cash_sales"
                  class="form-control form-control-sm"
                ></div>
                <div class="col-md-3 mb-2"><label>GCash:</label><input type="number" step="0.01" v-model="gcash_sales" class="form-control form-control-sm"></div>
                <div class="col-md-3 mb-2"><label>BDO:</label><input type="number" step="0.01" v-model="bdo_sales" class="form-control form-control-sm"></div>
                <div class="col-md-3 mb-2"><label>BPI:</label><input type="number" step="0.01" v-model="bpi_sales" class="form-control form-control-sm"></div>
              </div>

            <h6 class="mt-3"><strong>Receivables</strong></h6>
              <div class="row">
                <div class="col-md-3 mb-2">
                  <label>BPI:</label>
                  <input type="number" step="0.01" v-model="receivable_bpi" class="form-control form-control-sm">
                </div>
              </div>
            </div>

        </div>
      </form>
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
