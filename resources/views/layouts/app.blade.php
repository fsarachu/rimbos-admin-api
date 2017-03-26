<html lang="es">
<head>

    @include('layouts.meta')
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <title>Rimbos Admin - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">

</head>
<body>

@include('layouts.nav')

<div class="pusher">
    @include('layouts.flashes')

    @yield('content')
</div>

<script async src="/js/app.js"></script>
@yield('scripts')

</body>
</html>