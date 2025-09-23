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
                        7
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
                        4
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
            <!----><!---->
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
                            </button> <button type="button" class="btn btn-rounded btn-btn btn-primary btn-icon m-1" 
                                    data-bs-toggle="modal" data-bs-target="#New_Branch">
                                <i class="i-Add"></i> Add
                            </button> <!---->

                            <!-- Add Branch Modal -->
    <div class="modal fade" id="New_Branch" tabindex="-1" role="dialog" aria-labelledby="New_BranchLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="New_BranchLabel">Add Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('branches.store') }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Phone #</label>
                <input type="text" name="phone_number" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Mobile # *</label>
                <input type="text" name="mobile_number" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Email *</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>TIN</label>
                <input type="text" name="tin" class="form-control">
            </div>
            <div class="col-md-12">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <!-- Submit button full width under form -->
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
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
                            <th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Phone #</span> <button><span class="sr-only">
                                Sort table by Phone # in descending order
                                </span></button>
                            </th>
                            <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Mobile #</span> <button><span class="sr-only">
                                Sort table by Mobile # in descending order
                                </span></button>
                            </th>
                            <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Email</span> <button><span class="sr-only">
                                Sort table by Email in descending order
                                </span></button>
                            </th>
                            <th scope="col" aria-sort="descending" aria-controls="col-5" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>TIN</span> <button><span class="sr-only">
                                Sort table by TIN in descending order
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
                                <td>{{ $branch->phone_number }}</td>
                                <td>{{ $branch->mobile_number }}</td>
                                <td>{{ $branch->email }}</td>
                                <td>{{ $branch->tin }}</td>
                                <td class="text-right">
                                        @include('layouts.actions-dropdown', [
                                            'id' => $branch->id, 
                                            'editRoute' => route('branches.edit', $branch),   {{-- pass model, works with route-model binding --}}
                                            'deleteRoute' => route('branches.destroy', $branch)
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

@endsection