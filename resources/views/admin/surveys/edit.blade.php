@extends('admin.layouts.app')

@section('title', 'Crear Encuesta')

@section('content')
    <div class="ui text container">

        @include('admin.layouts.flashes.form')

        <form class="ui form" method="post" action="{{ route('admin.surveys.update', compact('survey')) }}" novalidate>
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <h3 class="ui horizontal divider header">Editar Encuesta</h3>

            <div class="two fields">

                <div class="field">
                    <label for="event_id">Id del evento</label>
                    <input id="event_id" name="event_id" placeholder="Ej: 58b0b93882d43b00106b2827Id" type="text"
                           value="{{ $survey->event_id }}">
                </div>

                <div class="field">
                    <label for="description">Nombre descriptivo</label>
                    <input id="description" name="description" placeholder="Ej: Servicio de discoteca" type="text"
                           value="{{ $survey->description }}">
                </div>

            </div>

            <div class="field">
                <label for="question">Pregunta principal</label>
                <input id="question" name="question" placeholder="Ej: ¿Cómo estuvo la música?" type="text"
                       value="{{ $survey->question }}">
            </div>

            <div class="field">
                <div class="ui checkbox">
                    <input id="has_extra_comments" name="has_extra_comments" value="1" type="checkbox"
                           @if($survey->has_extra_comments) checked @endif>
                    <label for="has_extra_comments">Permitir comentarios adicionales</label>
                </div>
            </div>

            <div class="disabled field">
                <label for="extra_comments_title">Título de comentarios adicionales</label>
                <input id="extra_comments_title" name="extra_comments_title" placeholder="Ej: ¿Algún comentario?"
                       type="text" value="{{ $survey->extra_comments_title }}">
            </div>

            <input class="ui secondary submit large fluid button" value="Crear" type="submit">

        </form>

    </div>
@endsection