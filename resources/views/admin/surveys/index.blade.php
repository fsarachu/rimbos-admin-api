@extends('admin.layouts.app')

@section('title', 'Comprobantes')

@section('content')
    <div class="ui container">
        <h3 class="ui horizontal header divider">Listado de Encuestas</h3>
        <div class="ui celled list">
            @foreach($surveys as $survey)
                <div class="item">
                    <div class="content">
                        <a class="header">#{{ $survey->id }}: {{ $survey->question }}</a>
                        <div class="description">{{ $survey->description }} - <small>{{ $survey->event_id }}</small></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection