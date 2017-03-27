@extends('layouts.app')

@section('content')
    <div class="ui center aligned grid small container">
        <div class="column">
            <div class="ui segment">
                <form class="ui login form" method="POST" action="{{ route('login') }}">

                    <h2 class="header">Login</h2>

                    @include('layouts.flashes.form')

                    {{ csrf_field() }}

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input name="email" placeholder="E-mail" type="text" value="{{ old('email') }}" autofocus>
                        </div>
                    </div>

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input name="password" placeholder="Contraseña" type="password">
                        </div>
                    </div>

                    <button type="submit" class="ui fluid large primary submit button">Login</button>

                </form>
            </div>
        </div>
    </div>
@endsection