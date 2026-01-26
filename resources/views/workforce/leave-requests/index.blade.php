@extends('layouts.app')
@section('content')
<style>
  .dropdown-menu {
        position: relative;
    }
</style>
<div class="main-content" id="app">
  <div>
    <div class="breadcrumb">
      <h1 class="mr-3">Request for Leaves</h1>
      <ul>
        <li><a href="/accounts-receivable">Workforce</a></li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
  </div>
  <!-- ==================== ADD MODAL ==================== -->
  <div
    class="modal fade"
    id="requestModal"
    tabindex="-1"
    aria-labelledby="requestModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="requestModalLabel">
             @{{ isEdit ? 'Edit Leave Request' : 'Create Leave Request' }}
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            X
          </button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
          <form enctype="multipart/form-data" @submit.prevent="submitForm">
            <div class="row">
              <!-- Date of Application -->
              <div class="col-md-12 form-group">
                <label>Date of Application</label>
                <input
                  type="text"
                  id="applicationDatePicker"
                  class="form-control"
                  v-model="form.application_date"
                  placeholder="YYYY-MM-DD HH:mm"
                  readonly
                />
              </div>

              <!-- Employee Selection -->
              <div class="col-md-12 form-group">
                <label>Employee *</label>
                <select class="form-control" v-model="form.employee_id">
                  <option disabled value="">Select Employee</option>
                  @foreach($employees as $employee)
                  <option value="{{ $employee->id }}">
                    {{ $employee->name }}
                  </option>
                  @endforeach
                </select>
                <div class="invalid-feedback"></div>
              </div>

              <!-- Employee Leave Details -->
              <div v-if="selectedEmployee" class="mb-3 col-md-12">
                <div class="list-group">
                  <div class="list-group-item">
                    <!-- Employee Header -->
                    <div class="mb-2">
                      <span>
                        @{{ selectedEmployee.name }} - @{{ selectedEmployee.id
                        }}
                      </span>
                    </div>
                    <!-- Leave Table -->
                    <table class="table table-sm table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0">List of Available Leave Type</th>
                          <th>Assigned Leaves</th>
                          <th>Earned Leaves</th>
                          <th>Used Leaves</th>
                          <th class="pr-0">Leaves Balance</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="leave in leaveBalances" :key="leave.id">
                          <td class="pl-0">@{{ leave.name }}</td>
                          <td>@{{ leave.days }}</td>
                          <td>@{{ leave.earned }}</td>
                          <td>@{{ leave.used }}</td>
                          <td>@{{ leave.balance }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Type -->
              <div class="col-md-12 form-group">
                <label>Type *</label>
                <select
                  class="form-control"
                  v-model="form.workforce_leave_id"
                  @change="updateNoticePeriod"
                >
                  <option disabled value="">Select Type</option>
                  <option
                    v-for="leave in leaves"
                    :key="leave.id"
                    :value="leave.id"
                  >
                    @{{ leave.name }}
                  </option>
                </select>
                <div class="invalid-feedback"></div>
              </div>

              <!-- Notice Period -->
              <div class="col-md-12 form-group">
                <label>Notice Period</label>
                <input
                  v-model="form.notice_period"
                  type="number"
                  class="form-control"
                  readonly
                />
              </div>

              <!-- Period -->
              <div class="col-md-12 form-group">
                <label>Period *</label>
                <input
  type="text"
  id="periodPicker"
  class="form-control"
  placeholder="Select date range"
  v-model="periodRange"
  readonly
/>

              </div>

              <!-- Number of Days -->
              <div class="col-md-12 form-group">
                <label># of Days *</label>
                <input
                  type="number"
                  step="0.5"
                  class="form-control"
                  v-model="form.days"
                  readonly
                />
              </div>

              <!-- Reason -->
              <div class="col-md-12 form-group">
                <label>Reason *</label>
                <textarea
                  class="form-control"
                  rows="3"
                  placeholder="Enter Reason Here"
                  v-model="form.reason"
                ></textarea>
              </div>

              <!-- Attachments -->
<div class="col-md-12 mt-2">
    <div class="d-flex justify-content-between align-items-center">
        <label class="mb-0">Attachments</label>
        <!-- Custom button triggers hidden file input -->
        <button type="button" class="btn btn-link" @click="triggerFileInput">
            <i class="i-Add"></i>
        </button>
    </div>

    <!-- Hidden file input -->
    <input
        type="file"
        multiple
        ref="fileInput"
        class="d-none"
        @change="handleFiles"
    />

    <div class="list-group mt-2">

  <!-- 🟢 EXISTING ATTACHMENTS (from DB) -->
  <div
    v-for="(file, index) in existingAttachments"
    :key="'existing-' + index"
    class="list-group-item d-flex justify-content-between align-items-center"
  >
    <a
      :href="`/storage/${file.file_path}`"
      target="_blank"
    >
      @{{ file.file_name }}
    </a>

    <button
      type="button"
      class="btn btn-sm btn-outline-danger"
      @click="removeExistingAttachment(index)"
    >
      <i class="i-Close"></i>
    </button>
  </div>

  <!-- 🔵 NEW UPLOADS (not saved yet) -->
  <div
    v-for="(file, index) in form.attachments"
    :key="'new-' + index"
    class="list-group-item d-flex justify-content-between align-items-center"
  >
    <span>
      @{{ file.name }}
      <small class="text-muted">(new)</small>
    </span>

    <button
      type="button"
      class="btn btn-sm btn-outline-danger"
      @click="removeNewAttachment(index)"
    >
      <i class="i-Close"></i>
    </button>
  </div>

  <!-- 🟡 EMPTY STATE -->
  <div
    v-if="existingAttachments.length === 0 && form.attachments.length === 0"
    class="list-group-item text-muted"
  >
    No attachments
  </div>

</div>

</div>


              <!-- Submit -->
              <div class="col-md-12 mt-3 text-right">
                <button type="submit" class="btn btn-primary">
                  <i class="i-Yes mr-2"></i>
                  @{{ isEdit ? 'Update' : 'Submit' }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="wrapper">
    <div class="card-body">
      <!-- Status Tabs -->
      <nav class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item" v-for="status in statusList" :key="status.value">
            <a
              href="#"
              class="nav-link"
              :class="{ active: statusFilter === status.value }"
              @click.prevent="setStatus(status.value)"
            >
              @{{ status.label }}
            </a>
          </li>
        </ul>
      </nav>
      <div class="card-body">
        <div class="vgt-wrap">
          <div class="vgt-inner-wrap">
            <div class="vgt-global-search vgt-clearfix">
              <div class="vgt-global-search__input vgt-pull-left">
                <form role="search">
                  <label for="vgt-search">
                    <span aria-hidden="true" class="input_icon">
                      <div class="magnifying-glass"></div>
                    </span>
                    <span class="sr-only">Search:</span>
                  </label>
                  <input
                    id="vgt-search"
                    type="text"
                    placeholder="Search this table"
                    class="vgt-input vgt-pull-left"
                  />
                </form>
              </div>
              <div class="vgt-global-search__actions vgt-pull-right">
                <div class="mt-2 mb-3">
                  <div
                    id="dropdown-form"
                    class="dropdown b-dropdown m-2 btn-group"
                    rounded=""
                  >
                    <!----><button
                      id="dropdown-form__BV_toggle_"
                      aria-haspopup="menu"
                      aria-expanded="false"
                      type="button"
                      class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"
                    >
                      <i class="i-Gear"></i>
                    </button>
                    <ul
                      role="menu"
                      tabindex="-1"
                      aria-labelledby="dropdown-form__BV_toggle_"
                      class="dropdown-menu dropdown-menu-right"
                    >
                      <li role="presentation">
                        <header
                          id="dropdown-header-label"
                          class="dropdown-header"
                        >
                          Columns
                        </header>
                      </li>
                      <li role="presentation" style="width: 220px">
                        <form tabindex="-1" class="b-dropdown-form p-0">
                          <section class="ps-container ps">
                            <div class="px-4" style="max-height: 400px">
                              <ul class="list-unstyled">
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__309"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__309"
                                      >Date and Time of Entry</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__310"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__310"
                                      >Date And Time of Transaction</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__311"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__311"
                                      >Created By</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__312"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__312"
                                      >Branch</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__313"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__313"
                                      >Transaction</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__314"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__314"
                                      >Reference #</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__315"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__315"
                                      >Payor</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__317"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__317"
                                      >Amount Due</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__318"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__318"
                                      >Amount Details</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__319"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__319"
                                      >Due Date</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__320"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__320"
                                      >Total received</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__321"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__321"
                                      >Balance</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__322"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__322"
                                      >Date of Completion</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__323"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__323"
                                      >Status</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__324"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__324"
                                      >Approved by</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__325"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__325"
                                      >Date and Time Approved</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__326"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__326"
                                      >Completed by</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__327"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__327"
                                      >Date and Time Completed</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__328"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__328"
                                      >Disapproved by</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__329"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__329"
                                      >Date and Time Disapproved</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__330"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__330"
                                      >Archived by</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__331"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__331"
                                      >Date and Time Archived</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <div
                                    class="my-1 custom-control custom-checkbox"
                                  >
                                    <input
                                      type="checkbox"
                                      class="custom-control-input"
                                      value="true"
                                      id="__BVID__332"
                                    /><label
                                      class="custom-control-label"
                                      for="__BVID__332"
                                      >Action</label
                                    >
                                  </div>
                                </li>
                                <li>
                                  <button
                                    type="button"
                                    class="btn mt-2 mb-3 btn-primary btn-sm"
                                  >
                                    Save
                                  </button>
                                </li>
                              </ul>
                            </div>
                            <div
                              class="ps__rail-x"
                              style="left: 0px; bottom: 0px"
                            >
                              <div
                                class="ps__thumb-x"
                                tabindex="0"
                                style="left: 0px; width: 0px"
                              ></div>
                            </div>
                            <div
                              class="ps__rail-y"
                              style="top: 0px; right: 0px"
                            >
                              <div
                                class="ps__thumb-y"
                                tabindex="0"
                                style="top: 0px; height: 0px"
                              ></div>
                            </div>
                          </section>
                        </form>
                      </li>
                    </ul>
                  </div>
                  <button
                    type="button"
                    class="btn btn-outline-info ripple m-1 btn-sm collapsed"
                    aria-expanded="false"
                    aria-controls="sidebar-right"
                    style="overflow-anchor: none"
                  >
                    <i class="i-Filter-2"></i>
                    Filter
                  </button>
                  <button
                    type="button"
                    class="btn btn-outline-success ripple m-1 btn-sm"
                  >
                    <i class="i-File-Copy"></i> PDF
                  </button>
                  <button class="btn btn-sm btn-outline-danger ripple m-1">
                    <i class="i-File-Excel"></i> EXCEL
                  </button>
                  <button type="button" class="btn btn-info m-1 btn-sm">
                    <i class="i-Upload"></i>
                    Import
                  </button>
                  <a
  href="#"
  class="btn btn-primary btn-icon m-1"
  @click.prevent="openCreateModal"
>
  <i class="i-Add"></i>
  Add
</a>
                </div>
              </div>
            </div>
            <div class="vgt-fixed-header"></div>
            <div class="vgt-responsive">
              <table id="vgt-table" class="table-hover tableOne vgt-table">
                <colgroup>
                  <col id="col-0" />
                  <col id="col-1" />
                  <col id="col-2" />
                  <col id="col-3" />
                  <col id="col-4" />
                  <col id="col-5" />
                  <col id="col-6" />
                </colgroup>
                <thead>
                  <tr>
                    <!---->
                    <th scope="col" class="vgt-checkbox-col">
                      <input type="checkbox" />
                    </th>
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-0"
                      class="vgt-left-align text-left w-190px sortable"
                      style="min-width: auto; width: auto"
                    >
                      <span>Date and Time of Request</span>
                      <button>
                        <span class="sr-only">
                          Sort table by Date and Time of Request in descending
                          order
                        </span>
                      </button>
                    </th>
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-2"
                      class="vgt-left-align text-left w-160px sortable"
                      style="min-width: auto; width: auto"
                    >
                      <span>Employee Name</span>
                      <button>
                        <span class="sr-only">
                          Sort table by Employee Name in descending order
                        </span>
                      </button>
                    </th>
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-3"
                      class="vgt-left-align text-left w-160px sortable"
                      style="min-width: auto; width: auto"
                    >
                      <span>Type</span>
                      <button>
                        <span class="sr-only">
                          Sort table by Source in descending order
                        </span>
                      </button>
                    </th>
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-3"
                      class="vgt-left-align text-left w-160px sortable"
                      style="min-width: auto; width: auto"
                    >
                      <span>Period (From)</span>
                      <button>
                        <span class="sr-only">
                          Sort table by Period (From) in descending order
                        </span>
                      </button>
                    </th>
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-3"
                      class="vgt-left-align text-left w-160px sortable"
                      style="min-width: auto; width: auto"
                    >
                      <span>Period (To)</span>
                      <button>
                        <span class="sr-only">
                          Sort table by Period (To) in descending order
                        </span>
                      </button>
                    </th>
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-3"
                      class="vgt-left-align text-left w-160px sortable"
                      style="min-width: auto; width: auto"
                    >
                      <span># of Days</span>
                      <button>
                        <span class="sr-only">
                          Sort table by # of Days in descending order
                        </span>
                      </button>
                    </th>
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-3"
                      class="vgt-left-align text-left w-160px sortable"
                      style="min-width: auto; width: auto"
                    >
                      <span>Reason</span>
                      <button>
                        <span class="sr-only">
                          Sort table by Reason in descending order
                        </span>
                      </button>
                    </th>
                    <!----><!----><!----><!----><!----><!----><!----><!---->
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-1"
                      class="vgt-left-align text-left w-220px sortable"
                      >
                      <span>@{{ dynamicHeaderLabel }}</span>
                      <button>
                          <span class="sr-only">
                              Sort table by @{{ dynamicHeaderLabel }} in descending order
                          </span>
                      </button>
                    </th>
                    <th
                      scope="col"
                      aria-sort="descending"
                      aria-controls="col-23"
                      class="vgt-left-align text-right"
                      style="min-width: auto; width: auto"
                    >
                      <span>Action</span>
                      <!---->
                    </th>
                  </tr>
                  <!---->
                </thead>
                <tbody>
                  <tr v-for="row in records" :key="row.id">
                    <td class="vgt-checkbox-col">
                      <input type="checkbox" :value="row.id" />
                    </td>
                    <td class="vgt-left-align text-left w-190px">
                      @{{ row.application_datetime }}
                    </td>
                    <td class="vgt-left-align text-left w-220px">
                      @{{ row.employee_name }}
                    </td>
                    <td class="vgt-left-align text-left w-160px">
                      @{{ row.type }}
                    </td>
                    <td class="vgt-left-align text-left w-160px">
                      @{{ row.period_start }}
                    </td>
                    <td class="vgt-left-align text-left w-160px">
                      @{{ row.period_end }}
                    </td>
                    <td class="vgt-left-align text-left w-160px">
                      @{{ row.no_of_days }}
                    </td>
                    <td class="vgt-left-align text-left w-160px">
                      @{{ row.reason }}
                    </td>
                    <td class="vgt-left-align text-left w-220px">
                      @{{ row[dynamicRowField] || '—' }}
                    </td>
                    <td class="text-right">
                      <actions-dropdown
        :row="row"
        @status-confirmed="updateStatus"
        @edit-leave="openEditModal"
        @view-attachments="viewAttachments"
        @logs="openLogs"
        @open-remarks="openRemarks"
    />
                    </td>
                  </tr>
                  <tr v-if="records.length === 0">
                    <td colspan="9" class="text-center text-muted">
                      No data available.
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/x-template" id="actions-dropdown-template">
<div class="dropdown btn-group" ref="dropdown">
    <button type="button" class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
            @click.stop="toggleDropdown">
        <span class="_dot _r_block-dot bg-dark"></span>
        <span class="_dot _r_block-dot bg-dark"></span>
        <span class="_dot _r_block-dot bg-dark"></span>
    </button>

    <ul :class="['dropdown-menu dropdown-menu-right', { show: isOpen }]">

        <!-- 1. Edit -->
<li v-if="row.status === 'pending'">
    <a class="dropdown-item" href="#" @click.prevent="editLeave">
        <i class="nav-icon i-Edit font-weight-bold mr-2"></i>
        Edit
    </a>
</li>


        <!-- 3. Approve -->
        <li v-if="row.status === 'pending'">
            <a class="dropdown-item" href="#" @click.prevent="changeStatus(row.id, 'approved')">
                <i class="nav-icon i-Like font-weight-bold mr-2"></i>
                Approve
            </a>
        </li>

        <!-- 4. Disapprove -->
        <li v-if="row.status === 'pending'">
            <a class="dropdown-item" href="#" @click.prevent="changeStatus(row.id, 'disapproved')">
                <i class="nav-icon i-Unlike-2 font-weight-bold mr-2"></i>
                Disapprove
            </a>
        </li>
        
        <!-- 5. Cancel -->
        <li v-if="['pending', 'approved'].includes(row.status)">
            <a class="dropdown-item" href="#" @click.prevent="changeStatus(row.id, 'cancelled')">
                <i class="nav-icon i-Close-Window font-weight-bold mr-2"></i>       
                Cancel
            </a>
        </li>

        <!-- 6. View Attached File -->
        <li>
            <a class="dropdown-item" href="#" @click.prevent="$emit('view-attachments', row.id)">
                <i class="nav-icon i-Files font-weight-bold mr-2"></i>
                View Attached File
            </a>
        </li>

        <!-- For Disapproved & Archived – Add Restore Option -->
        <li v-if="['disapproved', 'cancelled'].includes(row.status)">
            <a class="dropdown-item" href="#" @click.prevent="changeStatus(row.id, 'pending')">
                <i class="nav-icon i-Restore-Window font-weight-bold mr-2"></i>
                Restore to Pending
            </a>
        </li>

        <!-- 7. Mark as Completed – approved -->
        <li v-if="['approved'].includes(row.status)">
            <a class="dropdown-item" href="#" @click.prevent="$emit('edit-due-date', row.id)">
                <i class="nav-icon i-Check font-weight-bold mr-2"></i>
                Mark as Completed
            </a>
        </li>

        <!-- ARCHIVED: Replace "Move to Archive" with these -->
        <template v-if="row.status === 'archived'">
            <li>
                <a class="dropdown-item" href="#" @click.prevent="$emit('delete-permanently', row.id)">
                    <i class="nav-icon i-Close font-weight-bold mr-2"></i>
                    Permanently Delete
                </a>
            </li>
        </template>

        <!-- 9. Logs -->
        <li>
            <a class="dropdown-item" href="#" @click.prevent="$emit('logs', row.id)">
                <i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i>
                Logs
            </a>
        </li>

        <!-- 10. Remarks -->
        <li>
            <a class="dropdown-item" href="#" @click.prevent="$emit('open-remarks', row.id)">
                <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i>
                Remarks
            </a>
        </li>

    </ul>
</div>
</script>
<script>
Vue.component("actions-dropdown", {
    template: "#actions-dropdown-template",
    props: {
        row: { type: Object, required: true }
    },
    data() {
        return { isOpen: false };
    },
    methods: {
        toggleDropdown() {
            this.isOpen = !this.isOpen;
        },
        handleClickOutside(e) {
            if (this.$refs.dropdown && !this.$refs.dropdown.contains(e.target)) {
                this.isOpen = false;
            }
        },

        changeStatus(id, status) {
            const labels = {
                approved: 'Approve',
                disapproved: 'Disapprove',
                cancelled: 'Cancel',
                completed: 'Complete'
            };

            if (status === 'approved') {
                const balance = Number(this.row.balance ?? 0);
                const days = Number(this.row.no_of_days ?? 0);

                if (balance <= 0 || balance < days) {
                    Swal.fire({
                        title: 'Insufficient Leave Balance',
                        text: 'Approve as Leave Without Pay?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, approve',
                        cancelButtonText: 'No'
                    }).then(r => {
                        if (!r.isConfirmed) return;
                        this.$emit('status-confirmed', { id, status });
                        this.isOpen = false;
                    });
                    return;
                }
            }

            Swal.fire({
                title: `${labels[status]} Leave Request?`,
                text: `Are you sure you want to ${labels[status].toLowerCase()} this request?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then(r => {
                if (!r.isConfirmed) return;
                this.$emit('status-confirmed', { id, status });
                this.isOpen = false;
            });
        },

        editLeave() {
            this.$emit('edit-leave', this.row);
            this.isOpen = false;
        }
    },
    mounted() {
        document.addEventListener("click", this.handleClickOutside);
    },
    beforeDestroy() {
        document.removeEventListener("click", this.handleClickOutside);
    }
});
</script>


<script>
new Vue({
    el: '#app',

    data() {
        return {
            /* ================= STATE ================= */
            loading: false,
            isEdit: false,
            editId: null,

            statusFilter: 'pending',
            statusList: [
                { label: 'Pending', value: 'pending' },
                { label: 'Approved', value: 'approved' },
                { label: 'Disapproved', value: 'disapproved' },
                { label: 'Cancelled', value: 'cancelled' },
            ],
            headerLabelMap: {
                pending: 'Requested By',
                approved: 'Approved By',
                disapproved: 'Disapproved By',
                cancelled: 'Cancelled By',
            },
            rowFieldMap: {
                pending: 'requested_by',
                approved: 'approved_by',
                completed: 'completed_by',
                disapproved: 'disapproved_by',
                cancelled: 'cancelled_by_name',
            },

            records: [],
            employees: @json($employees) || [],
            leaves: @json($leaves) || [],

            selectedEmployee: null,
            selectedLeave: null,
            leaveBalances: [],

            periodPickerInstance: null,
            existingAttachments: [], // from DB
            removedAttachments: [],  // user removed

            form: {
                application_date: null,
                employee_id: '',
                workforce_leave_id: null,
                notice_period: 0,
                period_start: null,
                period_end: null,
                days: 0,
                reason: '',
                attachments: []
            },

            pagination: {
                current_page: 1,
                per_page: 10,
                total: 0,
                last_page: 1,
            },

            errors: {}
        };
    },
    mounted() {
            this.initApplicationDatePicker();
            this.initDatePicker();
            this.fetchRecords();

            $('#requestModal').on('hidden.bs.modal', () => {
                this.resetForm();
            });
        },



      methods: {
        initDatePickerForEdit(row) {
    this.initDatePicker();

    this.$nextTick(() => {
        if (!this.periodPickerInstance) return;

        const start = new Date(row.period_start);
        const end   = new Date(row.period_end);

        this.periodPickerInstance.setDate([start, end], true);

        document.getElementById('periodPicker').value =
            `${this.formatDateTime(start)} - ${this.formatDateTime(end)}`;
    });
},
    updateStatus({ id, status }) {
        axios.put(`/workforce/leave-requests/${id}/update-status`, {
            status
        })
        .then(res => {
            Swal.fire('Success', res.data.message, 'success');
            this.fetchRecords(this.pagination.current_page);
        })
        .catch(err => {
            Swal.fire(
                'Error',
                err.response?.data?.message || 'Failed to update status',
                'error'
            );
        });
    },
        /* =======================
         * DATE PICKERS
         * ======================= */
        initApplicationDatePicker() {
            const now = new Date();

            flatpickr('#applicationDatePicker', {
                enableTime: true,
                time_24hr: true,
                dateFormat: 'Y-m-d H:i',
                minuteIncrement: 15,
                defaultDate: now,
                maxDate: now,
                onChange: (dates) => {
                    if (dates.length) {
                        this.form.application_date =
                            this.formatDateTime(dates[0]);
                    }
                }
            });

            this.form.application_date = this.formatDateTime(now);
        },

        initDatePicker() {
    if (this.periodPickerInstance) {
        this.periodPickerInstance.destroy();
    }

    const today = new Date();
    let minDate = new Date();

    if (this.form.notice_period > 0) {
        minDate.setDate(today.getDate() + Number(this.form.notice_period));
    } else {
        minDate.setDate(today.getDate() - 30);
    }

    this.periodPickerInstance = flatpickr('#periodPicker', {
        mode: 'range',
        enableTime: true,
        time_24hr: true,
        dateFormat: 'Y-m-d H:i',
        minuteIncrement: 15,
        minDate: minDate,

        // 🔹 WHEN USER SELECTS DATES
        onChange: (dates) => {
            if (dates.length === 2) {
                let [start, end] = dates;

                if (
                    start.getFullYear() === end.getFullYear() &&
                    start.getMonth() === end.getMonth() &&
                    start.getDate() === end.getDate() &&
                    end <= start
                ) {
                    end = new Date(start.getTime() + 60 * 60 * 1000);
                }

                this.form.period_start = this.formatDateTime(start);
                this.form.period_end   = this.formatDateTime(end);

                this.periodRange =
                    `${this.form.period_start} - ${this.form.period_end}`;

                this.computeDaysWithTime(start, end);
            }
        },

        // 🔹 WHEN PICKER CLOSES (click outside / esc)
        onClose: (dates) => {
            if (dates.length < 2) {
                this.periodRange = '';
                this.form.period_start = null;
                this.form.period_end = null;
                this.form.days = 0;
            }
        }
    });
},
formatDateTime(date) {
        const pad = n => n.toString().padStart(2, '0');

        return `${date.getFullYear()}-${pad(date.getMonth() + 1)}-${pad(date.getDate())} ` +
               `${pad(date.getHours())}:${pad(date.getMinutes())}`;
    },

       computeDaysWithTime(start, end) {
    if (!(start instanceof Date) || !(end instanceof Date) || end <= start) {
        this.form.days = 0;
        return;
    }

    const sameDay =
        start.getFullYear() === end.getFullYear() &&
        start.getMonth() === end.getMonth() &&
        start.getDate() === end.getDate();

    // 🟢 SAME DAY → time-based (9 hrs = 1 day)
    if (sameDay) {
        const diffHours = (end - start) / (1000 * 60 * 60);
        const HOURS_PER_DAY = 9;

        this.form.days = Number((diffHours / HOURS_PER_DAY).toFixed(2));
        return;
    }

    // 🟢 MULTI-DAY → calendar days (inclusive)
    const startDay = new Date(start.getFullYear(), start.getMonth(), start.getDate());
    const endDay   = new Date(end.getFullYear(), end.getMonth(), end.getDate());

    const diffDays =
        Math.round((endDay - startDay) / (1000 * 60 * 60 * 24)) + 1;

    this.form.days = diffDays;
},

        /* =======================
         * EMPLOYEE / LEAVE LOGIC
         * ======================= */
        updateSelectedEmployee() {
            this.selectedEmployee =
                this.employees.find(e => e.id == this.form.employee_id) || null;

            this.leaveBalances = this.leaves.map(leave => {
                const userLeave =
                    this.selectedEmployee?.leaves?.find(ul => ul.id === leave.id);

                return {
                    id: leave.id,
                    name: leave.name,
                    days: userLeave?.pivot?.assigned_days ?? 0,
                    earned: userLeave?.pivot?.earn ?? 0,
                    used: userLeave?.pivot?.used ?? 0,
                    balance: userLeave?.pivot?.balance ?? 0,
                };
            });
        },

        updateNoticePeriod() {
            const leave = this.leaves.find(
                l => l.id === this.form.workforce_leave_id
            );

            this.form.notice_period = leave ? leave.notice_period : 0;
        },

        /* =======================
         * UI ACTIONS
         * ======================= */
        setStatus(status) {
            this.statusFilter = status;
            this.fetchRecords();
        },

        openModal() {
            new bootstrap.Modal(
                document.getElementById('requestModal')
            ).show();
        },

        // Trigger hidden file input when icon button is clicked
    triggerFileInput() {
        this.$refs.fileInput.click();
    },

    // Handle file selection
    handleFiles(e) {
  const files = Array.from(e.target.files);
  this.form.attachments.push(...files);

  // reset input so selecting same file again works
  e.target.value = '';
},

    // Remove single attachment
    removeAttachment(index) {
        this.form.attachments.splice(index, 1);
    },

        /* =======================
         * API
         * ======================= */
        fetchRecords(page = 1) {
            this.loading = true;

            axios.get('/workforce/leave-requests/fetch', {
                params: {
                    status: this.statusFilter,
                    page,
                    per_page: 10
                }
            })
            .then(res => {
                this.records = res.data.data;
                this.pagination = res.data;
            })
            .catch(() => {
                Swal.fire('Error', 'Failed to load data', 'error');
            })
            .finally(() => this.loading = false);
        },
        hasEnoughLeaveCredits() {
    const availableBalance = Number(this.selectedLeave?.balance || 0);
    const requestedDays = Number(this.form.days || 0);

    return requestedDays <= availableBalance;
},

        submitForm() {
    this.errors = {};

    if (
        !this.form.employee_id ||
        !this.form.workforce_leave_id ||
        !this.form.period_start ||
        !this.form.period_end ||
        !this.form.days ||
        !this.form.reason
    ) {
        Swal.fire(
            'Incomplete Form',
            'Please complete all required fields.',
            'warning'
        );
        return;
    }

    const availableBalance = Number(this.selectedLeave?.balance || 0);
    const requestedDays   = Number(this.form.days || 0);

    const proceedSubmit = () => {
    const payload = new FormData();

    payload.append('application_date', this.form.application_date);
    payload.append('employee_id', this.form.employee_id);
    payload.append('workforce_leave_id', this.form.workforce_leave_id);
    payload.append('notice_period', this.form.notice_period);
    payload.append('period_start', this.form.period_start);
    payload.append('period_end', this.form.period_end);
    payload.append('days', this.form.days);
    payload.append('reason', this.form.reason);

    this.form.attachments.forEach((file, i) => {
        payload.append(`attachments[${i}]`, file);
    });

    // 🔁 EDIT MODE
    if (this.isEdit) {
        payload.append('_method', 'PUT');

                payload.append(
  'existing_attachments',
  JSON.stringify(this.existingAttachments)
);

payload.append(
  'removed_attachments',
  JSON.stringify(this.removedAttachments)
);

        axios.post(
            `/workforce/leave-requests/${this.editId}`,
            payload
        )
        .then(res => {
            Swal.fire('Updated', res.data.message, 'success')
                .then(() => window.location.reload());
        })
        .catch(err => {
            Swal.fire(
                'Error',
                err.response?.data?.message || 'Something went wrong',
                'error'
            );
        });

        return;
    }

    // ➕ CREATE MODE
    axios.post('{{ route('leave-requests.store') }}', payload)
        .then(res => {
            Swal.fire('Success', res.data.message, 'success')
                .then(() => window.location.href = '/workforce/leave-requests');
        })
        .catch(err => {
            Swal.fire(
                'Error',
                err.response?.data?.message || 'Something went wrong',
                'error'
            );
        });
};


    // 🚨 INSUFFICIENT LEAVE CREDIT CHECK
    if (requestedDays > availableBalance) {
        Swal.fire({
            title: 'Insufficient Leave Credits',
            text: 'The employee currently do not have enough leave credits available. Do you want to apply leave without pay?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, apply without pay',
            cancelButtonText: 'No'
        }).then(result => {
            if (result.isConfirmed) {
                proceedSubmit();
            }
        });

        return;
    }

    // ✅ Enough credits → submit directly
    proceedSubmit();
},
openCreateModal() {
    this.resetForm();
    this.form.workforce_leave_id = '';
    this.$nextTick(() => $('#requestModal').modal('show'));
},
openEditModal(row) {
    this.isEdit = true;
    this.editId = row.id;

    axios.get(`/workforce/leave-requests/${row.id}/edit`)
        .then(res => {
            const data = res.data.data;

            console.log('Edit API data:', data);

            this.fillEditForm(data);

            this.$nextTick(() => {
                $('#requestModal').modal('show');
            });
        })
        .catch(() => {
            Swal.fire('Error', 'Failed to load leave data', 'error');
        });
},
fillEditForm(data) {
    this.form.application_date = this.formatDateTime(
        new Date(data.application_datetime)
    );

    this.form.employee_id = data.employee_id;
    this.form.workforce_leave_id = data.workforce_leave_id;

    this.form.period_start = this.formatDateTime(
        new Date(data.period_start)
    );
    this.form.period_end = this.formatDateTime(
        new Date(data.period_end)
    );

    this.form.days = parseFloat(data.no_of_days);
    this.form.reason = data.reason;

    // ✅ EXISTING attachments (JSON)
this.existingAttachments = Array.isArray(data.attachments)
    ? [...data.attachments]
    : [];

// ✅ reset new uploads
this.form.attachments = [];
this.removedAttachments = [];

    this.selectedEmployee = data.employee;

    this.initDatePickerForEdit(data);
},

resetForm() {
    this.isEdit = false;
    this.editId = null;

    // Reset form fields
    this.form = {
        application_date: this.formatDateTime(now),
        employee_id: '',
        workforce_leave_id: null,
        notice_period: 0,
        period_start: null,
        period_end: null,
        days: 0,
        reason: '',
        attachments: []
    };

    // Reset the displayed period range
    this.periodRange = '';

    // Destroy date picker so it re-inits fresh next time
    if (this.periodPickerInstance) {
        this.periodPickerInstance.destroy();
        this.periodPickerInstance = null;
    }
},
removeExistingAttachment(index) {
    const removed = this.existingAttachments.splice(index, 1)[0];
    this.removedAttachments.push(removed);
},
removeNewAttachment(index) {
  this.form.attachments.splice(index, 1);
}



    },
    computed: {
            dynamicHeaderLabel() {
                return this.headerLabelMap[this.statusFilter] || 'Requested By';
            },
            dynamicRowField() {
                return this.rowFieldMap[this.statusFilter] || 'requested_by';
            }
        },

    watch: {
        'form.employee_id'() {
            this.updateSelectedEmployee();
        },

        'form.notice_period'() {
            this.form.period_start = null;
            this.form.period_end = null;
            this.form.days = 0;

            this.$nextTick(this.initDatePicker);
        },

         'form.workforce_leave_id'(newVal) {
          if (!newVal) {
              this.form.notice_period = 0;
              return;
          }

          const leave = this.leaves.find(l => l.id == newVal);
          this.form.notice_period = leave ? Number(leave.notice_period) : 0;

          // 🔥 re-init date picker because rules changed
          this.$nextTick(this.initDatePicker);
      }
    }
});
</script>
@endsection