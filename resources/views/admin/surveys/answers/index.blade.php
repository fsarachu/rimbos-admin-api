@extends('admin.layouts.app')

@section('title', 'Comprobantes')

@section('content')
    <div class="ui text container">

        <h3 class="ui horizontal header divider">
            {{ $survey->question }}
            <div class="sub header">
                {{$survey->extra_comments_title}}
            </div>
        </h3>

        <div class="ui divided items">

            @forelse($survey->answers as $answer)
                <div class="item">
                    <div class="content">

                        <div class="header">
                            #{{ $answer->id }}:
                            <div class="ui star rating" data-rating="{{ $answer->rating }}"></div>
                        </div>

                        {{--<div class="meta">--}}
                        {{--{{ucfirst(Carbon\Carbon::parse($answer->created_at)->formatLocalized('%B %d, %Y'))}}--}}
                        {{--</div>--}}

                        @if($survey->has_extra_comments)
                            <p class="description">
                                {{--                                <strong>{{$survey->extra_comments_title}}</strong>--}}
                                @if($answer->extra_comments)
                                    {{ $answer->extra_comments }}
                                @else
                                    <em>No hay comentarios</em>
                                @endif
                            </p>
                        @endif

                        <div class="extra">
                            Usuario:
                            @if($answer->user_id)
                                {{ $answer->user_id }}
                            @else
                                Anónimo
                            @endif
                        </div>
                    </div>

                </div>
            @empty
                <div class="ui center aligned segment">
                    <h3 class="ui heading"><i class="wait icon"></i></h3>
                    <p>Aún no hay respuestas...</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection