<html lang="es">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#ff5456">
    <meta name="msapplication-navbutton-color" content="#ff5456">
    <meta name="apple-mobile-web-app-status-bar-style" content="#ff5456">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <title>Rimbos - 404</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background: #000;
            color: #fff;
            font-family: monospace;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        a {
            font-weight: bold;
            color: #5BC0EB;
            text-decoration: none;
            border-bottom: solid 1px;
        }

        body {
            background: #FF5456;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .terminal {
            position: relative;
            width: 95%;
            max-width: 500px;
            background-color: #333;
            padding: 3rem 1rem;
            box-sizing: border-box;
            box-shadow: 0 0 15px rgba(0, 0, 0, .3);
            border-radius: 5px;
        }

        .terminal > p:before {
            content: "~$ ";
            font-weight: bolder;
        }

        .bar {
            background: #f9f9f3;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            padding: 5px;
            overflow: hidden;
            border-radius: 5px 5px 0 0;
        }

        .button {
            display: inline-block;
            float: left;
            border-radius: 50%;
            width: 15px;
            height: 15px;
            margin-right: 5px;
        }

        .close {
            background: #fc635d;
        }

        .min {
            background: #fdbc40;
        }

        .max {
            background: #34c84a;
        }

        .header {
            width: 100%;
            text-align: center;
        }

        .blinking-cursor:after {
            content: "|";
            font-weight: bolder;
            color: #FFFFFF;
            -webkit-animation: 1s blink step-end infinite;
            animation: 1s blink step-end infinite;
        }

        @-webkit-keyframes blink {
            from, to {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
        }

        @keyframes blink {
            from, to {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
        }
    </style>

</head>
<body>

<div class="terminal">
    <div class="bar">
        <span class="close button"></span>
        <span class="min button"></span>
        <span class="max button"></span>
    </div>

    <h3 class="header">------ 404! ------</h3>

    <p>Uhm... No hay nada por aquí...</p>
    <p>Puedes probar ir al <a href="{{ env('APP_URL') }}">inicio</a></p>
    <p><span class="blinking-cursor"></span></p>
</div>

</body>
</html>