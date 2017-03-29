<div class="ui red borderless inverted large main menu">

    @if(Auth::check())
        <div id="sidebar-toggle" class="item">
            <i class="sidebar icon"></i>
        </div>
    @endif

    <div class="brand item"><a href="{{ route('admin.index') }}">· RimbosAdmin ·</a></div>

</div>