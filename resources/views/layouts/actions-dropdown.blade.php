<div class="dropdown b-dropdown btn-group">
    <button id="dropdownMenu{{ $id ?? uniqid() }}"
        type="button"
        class="btn dropdown-toggle btn-link btn-lg text-decoration-none dropdown-toggle-no-caret"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
        <span class="_dot _r_block-dot bg-dark"></span>
        <span class="_dot _r_block-dot bg-dark"></span>
        <span class="_dot _r_block-dot bg-dark"></span>
    </button>

    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu{{ $id ?? uniqid() }}">
        <!-- Edit -->
        @isset($editRoute)
        <li role="presentation">
            <a class="dropdown-item" href="{{ $editRoute }}">
                <i class="nav-icon i-Edit font-weight-bold mr-2"></i> {{ $editLabel ?? 'Edit' }}
            </a>
        </li>
        @endisset

        <!-- Update -->
        @isset($updateRoute)
        <li role="presentation">
            <a class="dropdown-item" href="{{ $updateRoute }}">
                <i class="nav-icon i-Edit font-weight-bold mr-2"></i> {{ $updateLabel ?? 'Update Status' }}
            </a>
        </li>
        @endisset

        <!-- Edit for Users-->
        @isset($userEditRoute)
        <li role="presentation">
            <a class="dropdown-item" onclick="openEditUserModal({{ $user }})">
                <i class="i-Pen-2 me-1"></i> Edit
            </a>
        </li>
        @endisset

        <!-- View Stock Card -->
        @isset($stockCardRoute)
            <li role="presentation">
            <a class="dropdown-item" href="{{ $stockCardRoute }}">
               <i class="nav-icon i-Receipt font-weight-bold mr-2"></i> {{ $stockCardLabel ?? 'View Stock Card' }}
            </a>
        </li>
        @endisset

        <!-- View User Profile -->
        @if(isset($profileRoute) && $status !== 'archived')
            <a href="{{ $profileRoute }}" target="_blank" class="dropdown-item">
                <i class="nav-icon i-Eye font-weight-bold mr-2"></i> View User Profile
            </a>
        @endif

        <!-- Cancel Static-->
        @isset($cancelRoute)
            <li role="presentation">
            <a class="dropdown-item" href="{{ $cancelRoute }}">
              <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> {{ $cancelLabel ?? 'Cancel' }}
            </a>
        </li>
        @endisset


        <!-- View / Bill out -->
        @isset($viewRoute)
            <li role="presentation">
                @if($viewRoute === '#')
                    @php $modalId = $viewModalId ?? "billOutModal{$id}"; @endphp
                    <a class="dropdown-item" href="javascript:void(0);"
                    data-bs-toggle="modal"
                    data-bs-target="#{{ $modalId }}">
                        <i class="nav-icon i-Receipt font-weight-bold mr-2"></i> {{ $viewLabel ?? 'View' }}
                    </a>
                @else
                    <a class="dropdown-item" href="{{ $viewRoute }}">
                        <i class="nav-icon i-Receipt font-weight-bold mr-2"></i> {{ $viewLabel ?? 'View' }}
                    </a>
                @endif
            </li>
        @endisset

        <!-- Delete / Cancel -->
        @if(isset($status) && $status === 'archived' && isset($deleteRoute))
        <li role="presentation">
            <form action="{{ $deleteRoute }}" method="POST"
                  onsubmit="return confirm('Are you sure?');"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">
                    <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> {{ $deleteLabel ?? 'Permanently Delete' }}
                </button>
            </form>
        </li>
        @endif

        <!-- Archive -->
        @if(isset($status) && $status === 'active' && isset($archiveRoute))
            <form action="{{ $archiveRoute }}" method="POST"
                  onsubmit="return confirm('Move to archive?');"
                  style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit" class="dropdown-item">
                    <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> {{ $archiveLabel ?? 'Move to Archive' }}
                </button>
            </form>
        @endif

        <!-- Restore -->
        @if(isset($status) && $status === 'archived' && isset($restoreRoute))
            <form action="{{ $restoreRoute }}" method="POST"
                  onsubmit="return confirm('Restore to active?');"
                  style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit" class="dropdown-item">
                    <i class="nav-icon i-Eye font-weight-bold mr-2"></i> {{ $restoreLabel ?? 'Restore as Active' }}
                </button>
            </form>
        @endif

        <!-- Logs -->
        @isset($logsRoute)
        <li role="presentation">
            <a class="dropdown-item" href="{{ $logsRoute }}">
                <i class="nav-icon i-Computer-Secure font-weight-bold mr-2"></i> {{ $logsLabel ?? 'Logs' }}
            </a>
        </li>
        @endisset

        <!-- Remarks -->
        @isset($remarksRoute)
        <li role="presentation">
            <a class="dropdown-item" href="{{ $remarksRoute }}">
                <i class="nav-icon i-Mail-Attachement font-weight-bold mr-2"></i> {{ $remarksLabel ?? 'Remarks' }}
            </a>
        </li>
        @endisset
    </ul>
</div>
