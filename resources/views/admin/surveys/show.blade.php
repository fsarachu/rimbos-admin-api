@extends('admin.layouts.app')

@section('title', 'Comprobantes')

@section('content')
    <div class="ui text container">
        <div class="ui center aligned basic segment">

            <h3 class="ui dividing header">Detalles de Encuesta</h3>

            <table class="ui unstackable compact fixed table">
                <tr>
                    <td class="right aligned">
                        <strong>Id de encuesta:</strong>
                    </td>
                    <td class="left aligned">
                        {{ $survey->id }}
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        <strong>Id de evento:</strong>
                    </td>
                    <td class="left aligned">
                        {{ $survey->event_id }}
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        <strong>Nombre descriptivo:</strong>
                    </td>
                    <td class="left aligned">
                        {{ $survey->description }}
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        <strong>Pregunta principal:</strong>
                    </td>
                    <td class="left aligned">
                        {{ $survey->question }}
                    </td>
                </tr>
                @if($survey->has_extra_comments)
                    <tr>
                        <td class="right aligned">
                            <strong>Tiene comentarios adicionales:</strong>
                        </td>
                        <td class="left aligned">
                            Si
                        </td>
                    </tr>
                    <tr>
                        <td class="right aligned">
                            <strong>Título de comentarios adicionales:</strong>
                        </td>
                        <td class="left aligned">
                            {{ $survey->extra_comments_title }}
                        </td>
                    </tr>
                @else
                    <tr>
                        <td class="right aligned">
                            <strong>Tiene comentarios adicionales:</strong>
                        </td>
                        <td class="left aligned">
                            No
                        </td>
                    </tr>
                @endif
                <tr>
                    <td class="right aligned">
                        <strong>Fecha de creación:</strong>
                    </td>
                    <td class="left aligned">
                        {{ ucfirst(Carbon\Carbon::parse($survey->created_at)->formatLocalized('%B %d, %Y')) }}
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        <strong>Fecha de la última edición:</strong>
                    </td>
                    <td class="left aligned">
                        {{ ucfirst(Carbon\Carbon::parse($survey->created_at)->formatLocalized('%B %d, %Y')) }}
                    </td>
                </tr>
                <tr>
                    <td class="right aligned">
                        <strong>Cantidad de respuestas:</strong>
                    </td>
                    <td class="left aligned">
                        {{ count($survey->answers) }}
                    </td>
                </tr>
            </table>

            <div class="ui fluid four item stackable menu">
                <a href="{{ route('admin.surveys.answers.index', ['survey' => $survey]) }}" class="item">
                    <i class="comments icon"></i>
                    Respuestas
                </a>
                <a href="{{ route('admin.surveys.preview', ['survey' => $survey]) }}" class="item">
                    <i class="unhide icon"></i>
                    Preview
                </a>
                <a href="{{ route('admin.surveys.edit', ['survey' => $survey]) }}" class="item">
                    <i class="edit icon"></i>
                    Editar
                </a>
                <a href="#0" class="disabled item">
                    <i class="delete icon"></i>
                    Eliminar
                </a>
            </div>

        </div>
    </div>
@endsection