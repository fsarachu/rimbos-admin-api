<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#ff5456">
    <meta name="msapplication-navbutton-color" content="#ff5456">
    <meta name="apple-mobile-web-app-status-bar-style" content="#ff5456">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <title>Rimbos - Encuesta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.9/semantic.min.css">
    <link rel="stylesheet" href="{{ asset('css/survey.css') }}">
</head>
<body>
<div class="ui survey inverted vertical segment">
    <form class="ui survey form" method="POST" action="{{ route('survey.answer') }}">
        {{ csrf_field() }}
        <div class="ui equal width grid text container">
            <div class="row">
                <div class="center aligned column">
                    <h1>{{ $survey->question }}</h1>
                </div>
            </div>
            <div class="option row">
                <input class="hidden" tabindex="0" type="radio" name="rating" value="5">
                <div class="right aligned column">
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                </div>
                <div class="left aligned column">
                    <h3 class="header">Excelente!</h3>
                </div>
            </div>
            <div class="option row">
                <input class="hidden" tabindex="0" type="radio" name="rating" value="4">
                <div class="right aligned column">
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                </div>
                <div class="left aligned column">
                    <h3 class="header">Buena</h3>
                </div>
            </div>
            <div class="option row">
                <input class="hidden" tabindex="0" type="radio" name="rating" value="3">
                <div class="right aligned column">
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                </div>
                <div class="left aligned column">
                    <h3 class="header">Regular</h3>
                </div>
            </div>
            <div class="option row">
                <input class="hidden" tabindex="0" type="radio" name="rating" value="2">
                <div class="right aligned column">
                    <i class="star icon"></i>
                    <i class="star icon"></i>
                </div>
                <div class="left aligned column">
                    <h3 class="header">Mala</h3>
                </div>
            </div>
            <div class="option row">
                <input class="hidden" tabindex="0" type="radio" name="rating" value="1">
                <div class="right aligned column">
                    <i class="star icon"></i>
                </div>
                <div class="left aligned column">
                    <h3 class="header">Muy mala</h3>
                </div>
            </div>

            @if($survey->has_extra_comments)
                <div class="ui divider"></div>

                <div class="row">
                    <div class="center aligned column">
                        <h2>{{ $survey->extra_comments_title }}</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <textarea name="extra_comments" rows="2"></textarea>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="column">
                    <input class="ui blue fluid large button" type="submit" value="Cargar">
                </div>
            </div>
        </div>
    </form>
</div>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
<script src="{{ asset('js/survey.js') }}"></script>
</body>