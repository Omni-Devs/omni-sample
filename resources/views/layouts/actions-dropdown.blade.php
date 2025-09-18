<div class="dropdown b-dropdown btn-group">
    <!-- 3-dot button -->
    <button id="dropdownMenu{{ $id }}"
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
    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu{{ $id }}">
        <!-- Edit -->
        <li role="presentation">
            <a class="dropdown-item" href="{{ $editRoute }}">
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
        {{-- <li role="presentation">
            <form action="{{ $deleteRoute }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this item?');"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item">
                    <i class="nav-icon i-Letter-Close font-weight-bold mr-2"></i> Delete
                </button>
            </form>
        </li> --}}

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
