<div id="sidebar-menu" class="ui left borderless vertical menu sidebar">
    {{--<!-- Authentication Links -->--}}
    {{--@if (Auth::guest())--}}
    {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
    {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
    {{--@else--}}
    {{--<li class="dropdown">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
    {{--</a>--}}

    {{--<ul class="dropdown-menu" role="menu">--}}
    {{--<li>--}}
    {{--<a href="{{ route('logout') }}"--}}
    {{--onclick="event.preventDefault();--}}
    {{--document.getElementById('logout-form').submit();">--}}
    {{--Logout--}}
    {{--</a>--}}

    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
    {{--{{ csrf_field() }}--}}
    {{--</form>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--@endif--}}
    <div class="header item">Comprobantes</div>
    <a class="item" href="{{ route('invoices.create')  }}">Cargar</a>
    <a class="item" href="{{ route('invoices.index') }}">Listar</a>
</div>

<div class="ui top fixed red borderless inverted massive main menu">
    <div id="sidebar-toggle" class="item">
        <i class="sidebar icon"></i>
    </div>
    <div class="brand item"><a href="/">· RimbosAdmin ·</a></div>
</div>