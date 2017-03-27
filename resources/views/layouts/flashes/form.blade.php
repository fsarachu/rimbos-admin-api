@if (count($errors) > 0)
    <div class="ui left aligned fluid container">
        <div class="ui negative message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif