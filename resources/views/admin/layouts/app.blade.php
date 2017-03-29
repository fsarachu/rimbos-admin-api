<html lang="es">
<head>

    @include('admin.layouts.meta')
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <title>Rimbos Admin - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>
<body>

@if(Auth::check())
    @include('admin.layouts.nav.sidebar')
@endif

<div class="pusher">
    @include('admin.layouts.nav.topbar')

    @include('admin.layouts.flashes.generic')

    @yield('content')
</div>

<script src="{{ asset('js/admin.js') }}"></script>
@yield('scripts')
</body>
</html>