@extends('admin.layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="ui small container">

        <div class="ui vertical fluid massive menu">

            <div class="item">
                <div class="header">Comprobantes</div>

                <div class="menu">
                    <a class="item" href="{{ route('admin.invoices.create') }}">Cargar</a>
                    <a class="item" href="{{ route('admin.invoices.index') }}">Listar</a>
                </div>
            </div>

            <div class="item">
                <div class="header">Encuestas</div>

                <div class="menu">
                    <a class="item" href="{{ route('admin.surveys.create') }}">Crear</a>
                    <a class="item" href="{{ route('admin.surveys.index') }}">Listar</a>
                </div>
            </div>

        </div>

    </div>
@endsection