@extends('admin.layouts.app')

@section('title', 'Crear Encuesta')

@section('content')
    <div class="ui text container">

        @include('admin.layouts.flashes.form')

        <form class="ui form" method="post" action="{{ route('admin.surveys.store') }}" novalidate>

            {{ csrf_field() }}

            <h3 class="ui horizontal divider header">Crear Encuesta</h3>

            <div class="two fields">

                <div class="field">
                    <label for="event_id">Id del evento</label>
                    <input id="event_id" name="event_id" placeholder="Ej: 58b0b93882d43b00106b2827Id" type="text">
                </div>

                <div class="field">
                    <label for="description">Nombre descriptivo</label>
                    <input id="description" name="description" placeholder="Ej: Servicio de discoteca" type="text">
                </div>

            </div>

            <div class="field">
                <label for="question">Pregunta principal</label>
                <input id="question" name="question" placeholder="Ej: ¿Cómo estuvo la música?" type="text">
            </div>

            <div class="field">
                <div class="ui checkbox">
                    <input id="has_extra_comments" name="has_extra_comments" value="1" type="checkbox">
                    <label for="has_extra_comments">Permitir comentarios adicionales</label>
                </div>
            </div>

            <div class="disabled field">
                <label for="extra_comments_title">Título de comentarios adicionales</label>
                <input id="extra_comments_title" name="extra_comments_title"
                       placeholder="Ej: ¿Algún comentario?" type="text">
            </div>

            <input class="ui secondary submit large fluid button" value="Crear" type="submit">

        </form>

    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection