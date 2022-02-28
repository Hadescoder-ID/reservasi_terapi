<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="sb-nav-fixed">
    @include('partials.header')
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
</body>
@include('partials.scripts')

</html>