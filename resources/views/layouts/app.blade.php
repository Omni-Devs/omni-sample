<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.min.css" />

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"></script>

</head>
<body>
    @include('layouts.header')
    @include('layouts.sidebar')

    <main>
        <div class="main-content-wrap d-flex flex-column flex-grow-1 sidenav-open">
        @yield('content')
        @include('layouts.footer')
        </div>
    </main>
    @yield('scripts')
</body>
</html>
