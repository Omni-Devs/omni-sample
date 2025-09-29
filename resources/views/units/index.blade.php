@extends('layouts.app')
@section('content')

<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Units</h1>
            <ul>
                <li><a href=""> Settings </a></li>
                <!----> <!---->
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <!----> 
    
    <div class="card wrapper">
        <!----><!---->
        <div class="card-body">
            <nav class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item"><a href="#" class="nav-link active">Active</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Archived</a></li>
            </ul>
        </nav>
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
                            <button id="dropdown-form__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"><i class="i-Gear"></i></button>
                            <button type="button" class="btn btn-outline-info ripple m-1 btn-sm collapsed" aria-expanded="false" aria-controls="sidebar-right" style="overflow-anchor: none;"><i class="i-Filter-2"></i>Filter</button>
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

            <form action="{{ route('units.store') }}" method="POST">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div id="CreateModal___BV_modal_body_" class="modal-body">
            <form class="">
                <div class="row">
                    <div class="col-md-12">
                        <label for="created_at">Date and Time Created</label>
                        <div class="d-flex">
                            <input type="datetime-local" 
                                id="created_at" 
                                name="created_at" 
                                class="form-control" 
                                value="{{ old('created_at') }}">
                            
                            <button type="button" 
                                class="btn btn-secondary ml-2"
                                onclick="document.getElementById('created_at').value = ''">
                                Clear
                            </button>
                        </div>
                        <small class="form-text text-muted">
                            Leave blank if you want the system to use the current time automatically.
                        </small>
                    </div>
                    <div class="col-md-12">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mt-3 col-md-12">
                        <div class="mr-2">
                        <div class="b-overlay-wrap position-relative d-inline-block btn-loader">
                            <button type="submit" class="btn btn-primary"><i class="i-Yes me-2 font-weight-bold"></i>
                            Submit</button><!---->
                        </div>
                        </div>
                    </div>
                </div>
            </form>
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
                        <thead>
                            <tr>
                            <!----> <!----> 
                            <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                            <th scope="col" aria-sort="descending" aria-controls="col-0" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Date and Time Created</span> <button><span class="sr-only">
                                Sort table by Date and Time Created in descending order
                                </span></button>
                            </th>
                            <th scope="col" aria-sort="descending" aria-controls="col-1" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Unit Name</span> <button><span class="sr-only">
                                Sort table by Unit Name in descending order
                                </span></button>
                            </th>
                            <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Created By</span> <button><span class="sr-only">
                                Sort table by Created By in descending order
                                </span></button>
                            </th>
                            <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-right" style="min-width: auto; width: auto;">
                                <span>Action</span> <!---->
                            </th>
                            </tr>
                            <!---->
                        </thead>
                        <tbody>
                        @forelse($units as $unit)
<tr>
    <td class="vgt-checkbox-col"><input type="checkbox"></td>
    <td class="vgt-left-align text-left">{{ $unit->created_at->format('Y-m-d H:i') }}</td>
    <td class="vgt-left-align text-left">{{ $unit->name }}</td>
    <td class="vgt-left-align text-left">{{ $unit->creator?->username ?? 'N/A' }}</td>
    <td class="vgt-left-align text-right">
        <div class="dropdown b-dropdown btn-group">
            <!-- 3-dot button -->
            <button id="dropdownMenu{{ $unit->id }}"
                type="button"
                class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <span class="_dot _r_block-dot bg-dark"></span>
                <span class="_dot _r_block-dot bg-dark"></span>
                <span class="_dot _r_block-dot bg-dark"></span>
            </button>

            <!-- Dropdown items -->
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu{{ $unit->id }}">
                <!-- Edit -->
                <li role="presentation">
                    <a class="dropdown-item" href="#"
                       data-bs-toggle="modal"
                       data-bs-target="#editUnitModal{{ $unit->id }}">
                        <i class="nav-icon i-Edit font-weight-bold mr-2"></i> Edit
                    </a>
                </li>

                <!-- View Stock Card -->
                <li role="presentation">
                    <a class="dropdown-item" href="#">
                        <i class="nav-icon i-Receipt font-weight-bold mr-2"></i> View Stock Card
                    </a>
                </li>

                <!-- Delete -->
                <li role="presentation">
                    <form action="{{ route('units.destroy', $unit) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to move this item to the archive?');"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item">
                            <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> Move to Archive
                        </button>
                    </form>
                </li>

                <!-- Logs -->
                <li role="presentation">
                    <a class="dropdown-item" href="#">
                        <i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i> Logs
                    </a>
                </li>

                <!-- Remarks -->
                <li role="presentation">
                    <a class="dropdown-item" href="#">
                        <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i> Remarks
                    </a>
                </li>
            </ul>
        </div>
    </td>
</tr>
    <!-- Edit Modal for this Unit -->
<!-- Edit Modal for this Unit -->
<div class="modal fade" id="editUnitModal{{ $unit->id }}" tabindex="-1" aria-labelledby="editUnitModalLabel{{ $unit->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('units.update', $unit->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editUnitModalLabel{{ $unit->id }}">Edit Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Created At -->
                    <div class="form-group mb-3">
                        <label for="unit-created-{{ $unit->id }}">Date &amp; Time Created</label>
                        <input type="datetime-local"
                                name="created_at"
                                id="unit-created-{{ $unit->id }}"
                                class="form-control"
                                value="{{ $unit->created_at ? $unit->created_at->format('Y-m-d\TH:i') : '' }}">
                        <small class="form-text text-muted">
                            Leave blank to keep the original creation date.
                        </small>
                    </div>

                    <!-- Unit Name -->
                    <div class="form-group mb-3">
                        <label for="unit-name-{{ $unit->id }}">Unit Name</label>
                        <input type="text"
                                name="name"
                                id="unit-name-{{ $unit->id }}"
                                class="form-control"
                                value="{{ $unit->name }}" required>
                        </div>
                </div> <!-- ✅ properly closed -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@empty
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