@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">User/Employees</h1>
            <ul>
                <li><a href=""> People </a></li>
                <!----> <!---->
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>

    <!-- Add modal removed: Add user is now a dedicated route (/users/create) -->

    {{-- ✅ Include the edit modal once here --}}
    @include('layouts.user-editModal')
    <div>
        <div class="row">
            @if(request('status', 'active') !== 'archived')
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-30 text-center">
                <!----><!---->
                <div class="card-body">
                    <!----><!---->
                    <div class="content align-items-center">
                        <p class="text-muted mt-2 mb-0 text-uppercase">
                            Employee Licenses
                        </p>
                        <p class="text-primary text-24 line-height-1 mb-2">
                            {{ $users->count() }}
                        </p>
                    </div>
                </div>
                <!----><!---->
                </div>
            </div>
            @endif
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-30 text-center">
                <!----><!---->
                <div class="card-body">
                    <div class="content align-items-center">
                        @php
                            $currentStatus = request('status', 'active'); // default to active if not set
                        @endphp

                        <p class="text-muted mt-2 mb-0 text-uppercase">
                            {{ ucfirst($currentStatus) }} Employees
                        </p>
                        <p class="text-primary text-24 line-height-1 mb-2">
                            {{ $users->where('status', $currentStatus)->count() }}
                        </p>
                    </div>
                </div>
                <!----><!---->
                </div>
            </div>
        </div>
    <div class="card">
        <nav class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a href="{{ route('users.index', ['status' => 'active']) }}"
                   class="nav-link {{ request('status', 'active') === 'active' ? 'active' : '' }}">
                    Active
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index', ['status' => 'resigned']) }}"
                   class="nav-link {{ request('status') === 'resigned' ? 'active' : '' }}">
                    Resigned
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index', ['status' => 'terminated']) }}"
                   class="nav-link {{ request('status') === 'terminated' ? 'active' : '' }}">
                    Terminated
                </a>
            </li>
                </ul>
            </nav>
            <div class="card-body">
                <!----><!---->
                <div class="vgt-wrap ">
                <!----> 
                <div class="vgt-inner-wrap">
                    <!----> 
                    <div class="vgt-global-search vgt-clearfix">
                        <div class="vgt-global-search__input vgt-pull-left">
                            <form role="search">
                            <label for="vgt-search-1666469488712">
                                <span aria-hidden="true" class="input__icon">
                                    <div class="magnifying-glass"></div>
                                </span>
                                <span class="sr-only">Search</span>
                            </label>
                            <input id="vgt-search-1666469488712" type="text" placeholder="Search this table" class="vgt-input vgt-pull-left">
                            </form>
                        </div>
                        <div class="vgt-global-search__actions vgt-pull-right">
                            <div class="mt-2 mb-3">
                            <div id="dropdown-form" class="2rdropdown b-dropdown m-2 btn-group" rounded="">
                                <!----><button id="dropdown-form__BV_toggle_" aria-haspopup="menu" aria-expanded="false" type="button" class="btn dropdown-toggle btn-light dropdown-toggle-no-caret"><i class="i-Gear"></i></button>
                                <ul role="menu" tabindex="-1" aria-labelledby="dropdown-form__BV_toggle_" class="dropdown-menu dropdown-menu-right">
                                    <li role="presentation">
                                        <header id="dropdown-header-label" class="dropdown-header">
                                        Columns
                                        </header>
                                    </li>
                                </ul>
                            </div>
                             </button>
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-icon">
                                <i class="i-Add"></i> Add
                            </a>
                            </div>
                        </div>
                    </div>
                    <!----> 
                    <div class="vgt-fixed-header">
                        <!---->
                    </div>
                    <div class="vgt-responsive">
                        <table id="vgt-table" class="tableOne table-hover vgt-table ">
                            <colgroup>
                            <col id="col-0">
                            <col id="col-1">
                            <col id="col-2">
                            <col id="col-3">
                            <col id="col-4">
                            <col id="col-5">
                            <col id="col-6">
                            <col id="col-7">
                            <col id="col-8">
                            <col id="col-9">
                            <col id="col-10">
                            <col id="col-11">
                            </colgroup>
                            <thead>
                            <tr>
                                <!----> 
                                <th scope="col" class="vgt-checkbox-col"><input type="checkbox"></th>
                                <!----><!---->
                                <th scope="col" aria-sort="descending" aria-controls="col-2" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Employee #</span> <button><span class="sr-only">
                                    Sort table by Employee # in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Employee Name</span> <button><span class="sr-only">
                                    Sort table by Employee Name in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Department</span> <button><span class="sr-only">
                                    Sort table by Department in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-3" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Position</span> <button><span class="sr-only">
                                    Sort table by Position in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-4" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Permission</span> <button><span class="sr-only">
                                    Sort table by Permission in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-5" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Username</span> <button><span class="sr-only">
                                    Sort table by Username in descending order
                                    </span></button>
                                </th>
                                {{-- Password column removed for security --}}
                                <th scope="col" aria-sort="descending" aria-controls="col-7" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Email</span> <button><span class="sr-only">
                                    Sort table by Email in descending order
                                    </span></button>
                                </th>
                                <th scope="col" aria-sort="descending" aria-controls="col-8" class="vgt-left-align text-left sortable" style="min-width: auto; width: auto;"><span>Mobile #</span> <button><span class="sr-only">
                                    Sort table by Mobile # in descending order
                                    </span></button>
                                </th>
                                <!----><!---->
                                <th scope="col" aria-sort="descending" aria-controls="col-11" class="vgt-left-align text-right" style="min-width: auto; width: auto;">
                                    <span>Action</span> <!---->
                                </th>
                            </tr>
                            <!---->
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                            <!----> 
                            <tr class="">
                                <!----> 
                                <th class="vgt-checkbox-col"><input type="checkbox"></th>
                                <!----><!---->
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->id }}
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->first_name }} {{ $user->last_name }}
                                    </span>
                                </td>
                                <td>
                                    {{ $user->employeeWorkInformations->last()?->department?->name ?? '-' }}
                                </td>
                                <td>
                                    {{ $user->employeeWorkInformations->last()?->designation?->name ?? '-' }}
                                </td>
                                <td class="vgt-left-align text-left">
                                    <span>
                                        <ul class="list-unstyled">
                                            @php
                                                // Global role names for the user (eager-loaded)
                                                $globalRoles = $user->roles->pluck('name')->toArray();

                                                // Collect per-branch role names that apply to this user.
                                                // Show branch-specific role labels like "Manager (Bantayan)".
                                                // If a role is represented by a branch, hide the plain global
                                                // role name to avoid the duplicate appearance (e.g. show
                                                // "Administrator (Main Commissary)" instead of both
                                                // "Administrator" and "Administrator (Main Commissary)").
                                                $branchRoleParts = [];
                                                $branchRoleNames = [];
                                                foreach ($user->branches as $b) {
                                                    // Branch roles were eager-loaded as `roles` on the branch
                                                    $roleNames = $b->roles->pluck('name')->toArray();

                                                    if (!empty($roleNames)) {
                                                        $branchRoleParts[] = implode(', ', $roleNames) . ' (' . $b->name . ')';
                                                        // Keep a quick lookup of role names that appear in branches
                                                        foreach ($roleNames as $rn) {
                                                            $branchRoleNames[$rn] = true;
                                                        }
                                                    }
                                                }

                                                // Remove any plain global role that is already shown via branch
                                                // (so we won't display both "Administrator" and
                                                // "Administrator (Main Commissary)").
                                                $filteredGlobalRoles = array_values(array_filter($globalRoles, function($r) use ($branchRoleNames) {
                                                    return ! isset($branchRoleNames[$r]);
                                                }));

                                                // Merge filtered global role names (if any) and the per-branch parts
                                                $displayParts = array_values(array_filter(array_merge($filteredGlobalRoles, $branchRoleParts)));
                                            @endphp

                                            <li>
                                                @if(count($displayParts))
                                                    {{ implode(', ', $displayParts) }}
                                                @else
                                                    -
                                                @endif
                                            </li>
                                        
                                        </ul>
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->username }}
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->email }}
                                    </span>
                                </td>
                                <td class="vgt-left-align text-left"><span>
                                    {{ $user->mobile_number }}
                                    </span>
                                </td>
                                <!----><!---->
                                <td class="text-right">
                                    @include('layouts.actions-dropdown', [
                                        'id' => $user->id,
                                        'userEditRoute' => route('users.edit', $user->id),
                                        'resignRoute' => route('users.updateStatus', [$user->id, 'resigned']),
                                        'terminateRoute' => route('users.updateStatus', [$user->id, 'terminated']),
                                        'logsRoute' => '#',
                                        'profileRoute' => route('users.profile', $user->id),
                                        'remarksRoute' => '#',
                                        'status' => request('status', 'active'),
                                        'restoreRoute' => route('users.restore', $user->id),
                                        'deleteRoute'   => route('users.destroy', $user->id),
                                    ])
                                </td>
                            </tr>
                            <!---->
                            @endforeach
                            </tbody>
                            <!---->
                        </table>
                    </div>
                    <!----> 
                    <div class="vgt-wrap__footer vgt-clearfix">
                        <div class="footer__row-count vgt-pull-left">
                            <form method="GET" id="perPageForm">
                                <input type="hidden" name="status" value="{{ $status }}">

                                <label for="per_page" class="footer__row-count__label">Rows per page:</label>

                                <select name="per_page" id="per_page" class="footer__row-count__select" onchange="document.getElementById('perPageForm').submit()">
                                    <option value="10" {{ $users->perPage() == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ $users->perPage() == 20 ? 'selected' : '' }}>20</option>
                                    <option value="30" {{ $users->perPage() == 30 ? 'selected' : '' }}>30</option>
                                    <option value="40" {{ $users->perPage() == 40 ? 'selected' : '' }}>40</option>
                                    <option value="50" {{ $users->perPage() == 50 ? 'selected' : '' }}>50</option>
                                </select>
                            </form>

                        </div>
                        <div class="footer__navigation vgt-pull-right">
                            <div data-v-347cbcfa="" class="footer__navigation__page-info">
                                <div>
                                    {{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total() }}
                                </div>
                            </div>
                            <button type="button"
                                    onclick="window.location='{{ $users->previousPageUrl() }}'"
                                    class="footer__navigation__page-btn {{ $users->onFirstPage() ? 'disabled' : '' }}">
                                <span class="chevron left"></span> <span>prev</span>
                            </button>

                            <button type="button"
                                    onclick="window.location='{{ $users->nextPageUrl() }}'"
                                    class="footer__navigation__page-btn {{ $users->hasMorePages() ? '' : 'disabled' }}">
                                <span>next</span> <span class="chevron right"></span>
                            </button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!----><!---->
        </div>
    </div>
    <div tabindex="-1" class="b-sidebar-outer">
        <!---->
        <div id="sidebar-right" tabindex="-1" role="dialog" aria-modal="false" aria-hidden="true" aria-labelledby="sidebar-right___title__" class="b-sidebar shadow b-sidebar-right bg-white text-dark" style="display: none;">
            <div class="b-sidebar-body">
                <div class="px-3 py-2">
                <div class="row">
                </div>
                </div> 
            </div>
            <!---->
        </div>
        <!----><!---->
    </div>
    <span>
        <!---->
    </span>
    <!---->
</div>

@endsection
@section('scripts')
<script>
function previewUserImage(input) {
  const file = input.files[0];
  const preview = document.getElementById('user-image-preview');
  preview.innerHTML = '';

  if (file && file.type.startsWith('image/')) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.className = 'img-thumbnail mt-2';
      img.style.maxWidth = '190px';
      img.style.borderRadius = '10px';
      img.style.margin = '0 auto';
      img.style.position = 'absolute';
      img.style.top = '0';
      img.style.pointerEvents = 'none';
      preview.appendChild(img);
    };
    reader.readAsDataURL(file);
  }
}

function handleUserDrop(event) {
    event.preventDefault();
    document.getElementById('user-drop-area').classList.remove('border-primary');

    const file = event.dataTransfer.files[0];
    const input = document.getElementById('user_image');

    if (file && file.type.startsWith('image/')) {
        input.files = event.dataTransfer.files;
        previewUserImage({ target: input });
    } else {
        alert('Please drop a valid image file.');
    }
}
Vue.component('v-select', VueSelect.VueSelect);

new Vue({
  el: '#app',
  data: {
    selectedRoles: [], // will hold selected branch IDs
  }
});

// Separate Vue instance for branches multi-select in Add modal
new Vue({
    el: '#app-branches',
    data: {
        selectedBranches: [],
    }
});
</script>
@endsection