@extends('layout.template')
@section('content')
    <h1>Editar Artista</h1>
    {!! Form::model($artist,['method' => 'PATCH','route'=>['artists.edit',$artist->id]]) !!}
    <div class="form-group">
        {!! Form::label('Nombre', 'Nombre:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Canción', 'Canción:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop