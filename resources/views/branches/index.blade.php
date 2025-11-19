@extends('layouts.app')
@section('content')
<div class="main-content">
   <div>
      <div class="breadcrumb">
         <h1 class="mr-3">Branches</h1>
         <ul>
            <li><a href=""> Settings </a></li>
            <!----> <!---->
         </ul>
         <div class="breadcrumb-action"></div>
      </div>
      <div class="separator-breadcrumb border-top"></div>
   </div>
   <!----> 
   <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-3">
         <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-30 text-center">
            <!----><!---->
            <div class="card-body">
               <!----><!---->
                  <div class="content align-items-center">
                  <p class="text-muted mt-2 mb-0 text-uppercase">
                     Branch Licenses
                  </p>
                  <p class="text-primary text-24 line-height-1 mb-2">
                     {{ $totalBranches ?? 0 }}
                  </p>
               </div>
            </div>
            <!----><!---->
         </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
         <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-30 text-center">
            <!----><!---->
            <div class="card-body">
               <!----><!---->
               <div class="content align-items-center">
                  <p class="text-muted mt-2 mb-0 text-uppercase">
                     Active Branches
                  </p>
                  <p class="text-primary text-24 line-height-1 mb-2">
                     {{ $activeBranches ?? 0 }}
                  </p>
               </div>
            </div>
            <!----><!---->
         </div>
      </div>
   </div>
   <div class="card wrapper">
      <!----><!---->
      <div class="card-body">
       <nav class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
               <li class="nav-item">
                  <a href="{{ route('branches.index', ['status' => 'active']) }}" 
                     class="nav-link {{ ($status ?? request('status', 'active')) === 'active' ? 'active' : '' }}"
                     >
                     Active
                  </a>
               </li>

               <li class="nav-item">
                  <a href="{{ route('branches.index', ['status' => 'archived']) }}"
                     class="nav-link {{ ($status ?? request('status')) === 'archived' ? 'active' : '' }}"
                     >
                     Archived
                  </a>
               </li>
            </ul>
         </nav>
         <div class="vgt-wrap ">
            <!----> 
            <div class="vgt-inner-wrap">
               <!----> 
               <div class="vgt-global-search vgt-clearfix">
                  <div class="vgt-global-search__input vgt-pull-left">
                     <form role="search">
                        <label for="vgt-search-1307774914959">
                           <span aria-hidden="true" class="input__icon">
                              <div class="magnifying-glass"></div>
                           </span>
                           <span class="sr-only">Search</span>
                        </label>
                        <input id="vgt-search-1307774914959" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                     </form>
                  </div>
                  <div class="vgt-global-search__actions vgt-pull-right">
                     <div class="mt-2 mb-3">
                        <button type="button" class="btn btn-outline-success ripple m-1 btn-sm"><i class="i-File-Copy"></i> PDF
                        </button> <button class="btn btn-sm btn-outline-danger ripple m-1"><i class="i-File-Excel"></i> EXCEL
                        </button> 
                            <button type="button" class="btn btn-rounded btn-btn btn-primary btn-icon m-1"
                                @click="openAddModal()">

                        <i class="i-Add"></i> Add
                        </button> <!---->
                        <!-- Add / Edit Branch Modal -->
                        <div class="modal fade" id="BranchModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            @{{ isEdit ? 'Edit Branch' : 'Add Branch' }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>

                                    <form :action="isEdit ? updateUrl : storeUrl" method="POST">
                                        @csrf
                                        <input v-if="isEdit" type="hidden" name="_method" value="PUT">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name *</label>
                                                    <input type="text" v-model="form.name" name="name" class="form-control" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Phone #</label>
                                                    <input type="text" v-model="form.phone_number" name="phone_number" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Mobile # *</label>
                                                    <input type="text" v-model="form.mobile_number" name="mobile_number" class="form-control" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Email *</label>
                                                    <input type="email" v-model="form.email" name="email" class="form-control" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>TIN</label>
                                                    <input type="text" v-model="form.tin" name="tin" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Contact Person</label>
                                                    <input type="text" v-model="form.contact_person" name="contact_person" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Permit Number</label>
                                                    <input type="text" v-model="form.permit_number" name="permit_number" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>DTI Issued</label>
                                                    <input type="text" v-model="form.dti_issued" name="dti_issued" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>POS Serial Number</label>
                                                    <input type="text" v-model="form.pos_sn" name="pos_sn" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>MIN Number</label>
                                                    <input type="text" v-model="form.min_number" name="min_number" class="form-control">
                                                </div>

                                                <div class="col-md-12">
                                                    <label>Address</label>
                                                    <textarea v-model="form.address" name="address" class="form-control"></textarea>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <button type="submit" class="btn btn-primary">
                                                        @{{ isEdit ? 'Update' : 'Submit' }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!----> 
               <div class="vgt-fixed-header">
                  <!---->
               </div>
               <div class="vgt-responsive">
                  <table id="vgt-table" class="table-hover tableOne vgt-table ">
                     <colgroup>
                        <col id="col-0">
                        <col id="col-1">
                        <col id="col-2">
                        <col id="col-3">
                        <col id="col-4">
                        <col id="col-5">
                        <col id="col-6">
                     </colgroup>
                     <thead>
                        <tr>
                           <!----> <!----> 
                           <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Name</span> <button><span class="sr-only">
                              Sort table by Name in descending order
                              </span></button>
                           </th>
                           <th scope="col" aria-sort="descending" aria-controls="col-1" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Address</span> <button><span class="sr-only">
                              Sort table by Address in descending order
                              </span></button>
                           </th>
                           <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Email</span> <button><span class="sr-only">
                              Sort table by Email in descending order
                              </span></button>
                           </th>
                           <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Permit #</span> <button><span class="sr-only">
                              Sort table by Permit # in descending order
                              </span></button>
                           </th>
                           <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>DTI Issued</span> <button><span class="sr-only">
                              Sort table by DTI Issued in descending order
                              </span></button>
                           </th>
                           <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>POS SN</span> <button><span class="sr-only">
                              Sort table by POS SN in descending order
                              </span></button>
                           </th>
                           <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Min #</span> <button><span class="sr-only">
                              Sort table by Min # in descending order
                              </span></button>
                           </th>
                           <th scope="col" aria-sort="descending" aria-controls="col-6" class="vgt-left-align text-right" style="min-width: auto; width: auto;">
                              <span>Action</span> <!---->
                           </th>
                        </tr>
                        <!---->
                     </thead>
                     <tbody>
                        @forelse($branches as $branch)
                        <tr>
                           <td>{{ $branch->name }}</td>
                           <td>{{ $branch->address }}</td>
                           <td>{{ $branch->email }}</td>
                           <td>{{ $branch->permit_number }}</td>
                           <td>{{ $branch->dti_issued }}</td>
                           <td>{{ $branch->pos_sn }}</td>
                           <td>{{ $branch->min_number }}</td>
                           <td class="text-right">
                                             @include('layouts.actions-dropdown', [
                                                'id' => $branch->id,
                                                'branchEditRoute' => route('branches.edit', $branch),
                                                'deleteRoute' => route('branches.destroy', $branch),
                                                'archiveRoute' => route('branches.archive', $branch),
                                                'restoreRoute' => route('branches.restore', $branch),
                                                'status' => $status ?? 'active',
                                                'data' => $branch   // <-- IMPORTANT
                                          ])
                           </td>
                        </tr>
                        @empty
                        <tr>
                           <td colspan="7" class="text-center">No branches found.</td>
                        </tr>
                        @endforelse
                     </tbody>
                     <!---->
                  </table>
               </div>
               <!----> 
               <div class="vgt-wrap__footer vgt-clearfix">
                  <div class="footer__row-count vgt-pull-left">
                     <form>
                        <label for="vgt-select-rpp-1491334360472" class="footer__row-count__label">Rows per page:</label> 
                        <select id="vgt-select-rpp-1491334360472" autocomplete="off" name="perPageSelect" aria-controls="vgt-table" class="footer__row-count__select">
                           <option value="10">
                              10
                           </option>
                           <option value="20">
                              20
                           </option>
                           <option value="30">
                              30
                           </option>
                           <option value="40">
                              40
                           </option>
                           <option value="50">
                              50
                           </option>
                           <option value="-1">All</option>
                        </select>
                     </form>
                  </div>
                  <div class="footer__navigation vgt-pull-right">
                     <div data-v-347cbcfa="" class="footer__navigation__page-info">
                        <div data-v-347cbcfa="">
                           1 - 4 of 4
                        </div>
                     </div>
                     <!----> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span aria-hidden="true" class="chevron left"></span> <span>prev</span></button> <button type="button" aria-controls="vgt-table" class="footer__navigation__page-btn disabled"><span>next</span> <span aria-hidden="true" class="chevron right"></span></button> <!---->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!----><!---->
   </div>
   <span>
      <!---->
   </span>
   <!----> 
   <span>
      <!---->
   </span>
</div>
<script>
new Vue({
    el: '.main-content',

    data: {
        isEdit: false,
        storeUrl: "{{ route('branches.store') }}",
        updateUrl: "",
        form: {
            id: null,
            name: "",
            phone_number: "",
            mobile_number: "",
            email: "",
            tin: "",
            contact_person: "",
            permit_number: "",
            dti_issued: "",
            pos_sn: "",
            min_number: "",
            address: "",
        }
    },

    methods: {

        openAddModal() {
            this.isEdit = false;
            this.resetForm();
            $('#BranchModal').modal('show');
        },

        openEditModal(branch) {
            this.isEdit = true;
            this.updateUrl = "/branches/" + branch.id;
            this.form = { ...branch };
            $('#BranchModal').modal('show');
        },

        resetForm() {
            this.form = {
                id: null,
                name: "",
                phone_number: "",
                mobile_number: "",
                email: "",
                tin: "",
                contact_person: "",
                permit_number: "",
                dti_issued: "",
                pos_sn: "",
                min_number: "",
                address: "",
            };
        }
    }
});
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
   // Show server-side flash messages via SweetAlert
   @if(session('success'))
      Swal.fire({
         icon: 'success',
         title: 'Success',
         text: {!! json_encode(session('success')) !!}
      });
   @endif

   @if(session('error'))
      Swal.fire({
         icon: 'error',
         title: 'Error',
         text: {!! json_encode(session('error')) !!}
      });
   @endif

   @if($errors->any())
      var _errs = {!! json_encode($errors->all()) !!};
      Swal.fire({
         icon: 'error',
         title: 'Validation error',
         html: _errs.join('<br>')
      });
   @endif

   // Intercept forms annotated with .swal-confirm for confirmation
   document.querySelectorAll('form.swal-confirm').forEach(function(form){
      form.addEventListener('submit', function(e){
         e.preventDefault();
         var title = form.dataset.title || 'Are you sure?';
         var text = form.dataset.text || '';
         var confirmButton = form.dataset.confirmButton || 'Yes';
         Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: confirmButton,
            cancelButtonText: 'Cancel'
         }).then(function(result){
            if (result.isConfirmed) {
               form.submit();
            }
         });
      });
   });
});
</script>

@endsection