<!--@extends('app')

@section('content')
        <artist>
            <h1>{{ $artist->title }}</h1>
            <div class="body">
                {{ $artist->body }}
            </div>
        </artist>
@stop-->

@extends('layout/template')
@section('content')
    <h1>Mostrar Canción</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
                <img src="{{asset('img/'.$artist->image.'.jpg')}}" height="180" width="150" class="img-rounded">
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Canción</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder={{$track->name}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('artists')}}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </form>
@stop