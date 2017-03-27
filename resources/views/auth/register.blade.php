@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="ui center aligned grid small container">
        <div class="column">
            <div class="ui segment">
                <form class="ui login form" method="POST" action="{{ route('register') }}">
                    <h2 class="header">Sign up</h2>

                    @include('layouts.flashes.form')

                    {{ csrf_field() }}

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input id="username" placeholder="Username" type="text" name="username" value="{{ old('username') }}"
                                   required autofocus>
                        </div>
                    </div>

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="at icon"></i>
                            <input name="email" placeholder="E-mail" type="email" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input name="password" placeholder="Contraseña" type="password" required>
                        </div>
                    </div>

                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input name="password_confirmation" placeholder="Confirmar contraseña" type="password"
                                   required>
                        </div>
                    </div>

                    <button type="submit" class="ui fluid large primary submit button">Sign up</button>

                </form>
            </div>
        </div>
    </div>
@endsection
