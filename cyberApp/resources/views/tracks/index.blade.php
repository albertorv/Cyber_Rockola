@extends('app')

@section('content')
    <h1>Tracks</h1>


    <table class="ui celled table" id="tableIndex">
    <thead>
        <tr>
            <th>Cancion</th>
            <th>Dir Cancion</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tracks as $track)
    <tr>
        <td>{!! $track->name !!}</td>
        <td>{!! $track->dir_track !!}</td>
        <td><a href="{{url('tracks.edit')}}" id={{$track->id}} class="btn btn-warning">Editar</a>
        </td>
    </tr>
    @endforeach

      </tbody>

    </table>



@if (Auth::user()->is_admin == '1')
    <a class="btn btn-primary btn-lg" href="{{ url('tracks/create') }}"
       role="button">Crear cancion</a>
@endif
    
@stop
