<div id="sidebar-menu" class="ui left borderless vertical menu sidebar">

    <div class="item">

        <div class="ui inline dropdown">

            <img class="ui avatar image" src="{{ asset('images/user_placeholder.jpg') }}">

            <span>{{ Auth::user()->username }}</span>

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

    <a class="item" href="{{ route('admin.invoices.create')  }}">Cargar</a>
    <a class="item" href="{{ route('admin.invoices.index') }}">Listar</a>

</div>

