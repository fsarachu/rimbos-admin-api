<html lang="es">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#ff5456">
    <meta name="msapplication-navbutton-color" content="#ff5456">
    <meta name="apple-mobile-web-app-status-bar-style" content="#ff5456">
    <link rel="stylesheet" href="{{ asset('css/40x.css') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <title>Rimbos - @yield('code')</title>

</head>
<body>

<div class="terminal">
    <div class="bar">
        <span class="close button"></span>
        <span class="min button"></span>
        <span class="max button"></span>
    </div>

    <h3 class="header">------ @yield('code')! ------</h3>

    <p>@yield('message')</p>
    <p>Puedes probar ir al <a href="http://www.rimbos.com/">inicio</a></p>
    <p><span class="blinking-cursor"></span></p>
</div>

</body>
</html>