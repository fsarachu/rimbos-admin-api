@if(Auth::guest())
    <div id="sidebar-menu" class="ui left borderless vertical menu sidebar">
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
        {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
        {{--</a>--}}

        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
        {{--Nombre <span class="caret"></span>--}}
        {{--</a>--}}

        {{--<ul class="dropdown-menu" role="menu">--}}
        {{--<li>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}

        <div class="item">
            <div class="ui inline dropdown">
                <img class="ui avatar image" src="/images/user_placeholder.jpg">
                <span>Nombre</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div id="logout-trigger" class="item">
                        Salir
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="header item">Comprobantes</div>
        <a class="item" href="{{ route('invoices.create')  }}">Cargar</a>
        <a class="item" href="{{ route('invoices.index') }}">Listar</a>
    </div>
@endif

<div class="ui top fixed red borderless inverted massive main menu">
    @if(Auth::guest())
        <div id="sidebar-toggle" class="item">
            <i class="sidebar icon"></i>
        </div>
    @endif
    <div class="brand item"><a href="/">· RimbosAdmin ·</a></div>
</div>