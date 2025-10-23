@extends('layouts.app')

@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Customers</h1>
            <ul>
                <li><a href=""> Settings </a></li>
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-30 text-center">
                <!----><!---->
                <div class="card-body">
                <!----><!---->
                <div class="content align-items-center">
                    <p class="text-muted mt-2 mb-0 text-uppercase">
                        ACTIVE CUSTOMERS
                    </p>
                    <p class="text-primary text-18 line-height-1 mb-2">
                        {{ $activeCount }}
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
                        CUSTOMER LICENSES
                    </p>
                    <p class="text-primary text-18 line-height-1 mb-2">
                        E-Commerce Feature Not Availed
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
                        CURRENT TIER
                    </p>
                    <p class="text-primary text-18 line-height-1 mb-2">
                        E-Commerce Feature Not Availed
                    </p>
                </div>
                </div>
                <!----><!---->
            </div>
        </div>
    </div>
    <div class="card wrapper">
        <div class="card-body">
            {{-- Tabs --}}
            <nav class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="{{ route('customers.index', ['status' => 'active']) }}" 
                           class="nav-link {{ $status === 'active' ? 'active' : '' }}">Active</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customers.index', ['status' => 'archived']) }}" 
                           class="nav-link {{ $status === 'archived' ? 'active' : '' }}">Archived</a>
                    </li>
                </ul>
            </nav>

            {{-- Search + Export --}}
            <div class="vgt-global-search vgt-clearfix mt-3">
                <div class="vgt-global-search__input vgt-pull-left">
                    <form role="search">
                        <label for="vgt-search-customers">
                            <span aria-hidden="true" class="input__icon">
                                <div class="magnifying-glass"></div>
                            </span>
                            <span class="sr-only">Search</span>
                        </label>
                        <input id="vgt-search-customers" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                    </form>
                </div>

                <div class="vgt-global-search__actions vgt-pull-right">
                    <div class="mt-2 mb-3">
                        <button type="button" class="btn btn-outline-success ripple m-1 btn-sm">
                            <i class="i-File-Copy"></i> PDF
                        </button>
                        <button class="btn btn-sm btn-outline-danger ripple m-1">
                            <i class="i-File-Excel"></i> EXCEL
                        </button>
                        <a href="{{ route('customers.create') }}" class="btn btn-rounded btn-primary btn-icon m-1">
                            <i class="i-Add"></i> Add
                        </a>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="vgt-responsive mt-3">
                <table id="vgt-table" class="table-hover tableOne vgt-table">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Company Name</th>
                            <th>Mobile #</th>
                            <th>Landline #</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Assigned Personnel</th>
                            <th>Province</th>
                            <th>City/Municipality</th>
                            <th>Credit Limit</th>
                            <th>Payment Terms</th>
                            <th>Customer Type</th>
                            <th>Discount</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->customer_name }}</td>
                                <td>{{ $customer->company_name }}</td>
                                <td>{{ $customer->mobile_no }}</td>
                                <td>{{ $customer->landline_no }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->assigned_personnel }}</td>
                                <td>{{ $customer->province }}</td>
                                <td>{{ $customer->city_municipality }}</td>
                                <td>{{ $customer->credit_limit }}</td>
                                <td>{{ $customer->payment_terms_days }}</td>
                                <td>{{ $customer->customer_type }}</td>
                                <td>{{ $customer->discount->name ?? 'N/A' }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="_dot _r_block-dot bg-dark"></span>
                                            <span class="_dot _r_block-dot bg-dark"></span>
                                            <span class="_dot _r_block-dot bg-dark"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('customers.edit', $customer->id) }}">
                                                    <i class="nav-icon i-Edit font-weight-bold mr-2"></i> Edit
                                                </a>
                                            </li>

                                            @if($customer->status === 'active')
                                                <form action="{{ route('customers.archive', $customer) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to move this item to archive?');"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> Move to Archive
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('customers.restore', $customer) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to restore this item?');"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="nav-icon i-Eye font-weight-bold mr-2"></i> Restore as Active
                                                    </button>
                                                </form>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15" class="text-center">No customers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Footer --}}
            <div class="vgt-wrap__footer vgt-clearfix mt-3">
                <div class="footer__row-count vgt-pull-left">
                    <form>
                        <label for="vgt-select-rpp-customers" class="footer__row-count__label">Rows per page:</label>
                        <select id="vgt-select-rpp-customers" class="footer__row-count__select">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="-1">All</option>
                        </select>
                    </form>
                </div>

                <div class="footer__navigation vgt-pull-right">
                    <div class="footer__navigation__page-info">
                        <div>
                            {{ $customers->count() }} total
                        </div>
                    </div>
                    <button type="button" class="footer__navigation__page-btn disabled">
                        <span class="chevron left"></span><span>prev</span>
                    </button>
                    <button type="button" class="footer__navigation__page-btn disabled">
                        <span>next</span><span class="chevron right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
