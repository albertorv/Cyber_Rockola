@extends('app')



@section('content')
    <h1>Tracks</h1>

@if (Auth::user()->is_admin == '1')
    <a class="btn btn-primary btn-lg" href="{{ url('tracks/create') }}"
       role="button">Crear cancion</a>
@endif

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
        <td>
            <div class="form-group" >
                <a href="/tracks/{{{$track->id}}}/edit" class="btn btn-warning" role="button">Editar</a>
                {!!Form::open(array('url' => "/tracks/$track->id", 'method' => 'DELETE'))!!}                
                       <button class="btn btn-danger" role="button">Eliminar</button>
                {!!Form::close()!!} 
            </div>    
        </td>
    </tr>
    @endforeach

      </tbody>

    </table>

    

    {!! $tracks->render() !!}

    
@stop
