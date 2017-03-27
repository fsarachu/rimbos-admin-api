<html lang="es">
<head>

    @include('layouts.meta')
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <title>Rimbos Admin - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">

</head>
<body>

@if(Auth::check())
    @include('layouts.nav.sidebar')
@endif

<div class="pusher">
    @include('layouts.nav.topbar')

    @include('layouts.flashes.generic')

    @yield('content')
</div>

<script src="/js/app.js"></script>
@yield('scripts')
</body>
</html>