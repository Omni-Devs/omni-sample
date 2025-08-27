<!DOCTYPE html>
<html>
<head>
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
</body>
</html>
