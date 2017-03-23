<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <meta name="theme-color" content="#ff5456">
    <meta name="msapplication-navbutton-color" content="#ff5456">
    <meta name="apple-mobile-web-app-status-bar-style" content="#ff5456">
    <title>Rimbos Admin - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<div id="sidebar-menu" class="ui left borderless vertical menu sidebar">
    <div class="header item">Comprobantes</div>
    <a class="item" href="/invoices/new">Cargar</a>
    <a class="item" href="/invoices">Listar</a>
</div>

<div class="ui top fixed red borderless inverted massive main menu">
    <div id="sidebar-toggle" class="item">
        <i class="sidebar icon"></i>
    </div>
    <div class="brand item"><a href="/">· RimbosAdmin ·</a></div>
</div>

<div class="pusher">
    @yield('content')
</div>
<script async src="/js/app.js"></script>
</body>
</html>