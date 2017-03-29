@if( session('negative_message') )
    <div class="ui text container">
        <div class="ui negative message">
            <i class="close icon"></i>
            {{ session('negative_message') }}
        </div>
    </div>
@endif

@if( session('positive_message') )
    <div class="ui text container">
        <div class="ui positive message">
            <i class="close icon"></i>
            {{ session('positive_message') }}
        </div>
    </div>
@endif