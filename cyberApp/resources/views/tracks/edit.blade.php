@extends('app')

@section('content')
    <h1>Editando: {!! $track->title  !!}</h1>
    <hr>

    {!! Form::model($track, ['method'=>'PATCH', 'action' => ['TracksController@update', $track->id]]) !!}
        <input name="name" value="{{{$track->name}}}" >
        

        <div class="form-group">
            {!! Form::submit('Editar Cancion', ['class'=>'btn btn-primary form-control'])  !!}
        </div>
    {!! Form::close() !!}


    @include('errors.list')

@stop