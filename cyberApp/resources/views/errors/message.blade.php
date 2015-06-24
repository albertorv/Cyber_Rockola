@extends('app')

@section('content')
    <div class="alert alert-danger">
        <h3>{{ $title }}</h3>
        <body>
            {{ $message }}
            <br><br>
        </body>
    </div>
@stop