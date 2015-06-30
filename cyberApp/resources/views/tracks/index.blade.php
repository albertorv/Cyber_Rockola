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
            <th>Track Name</th>
            <th>Artists Name</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>

    @foreach($tracks as $track)
    
    <tr>
        <td>{!! $track->name !!}</td>       
        
        <td>
            @foreach($artists as $artist)
                <?php  
                    if($track->id == $artist->id_)
                    {
                ?>
                {!! $artist->name !!}
                <?php 
                    }
                ?>
            @endforeach
        </td>        
        
        <td>
            <div class="col-xs-2" >
                <a href="/tracks/{{{$track->id}}}/edit" class="btn btn-warning form-control" role="button">Edit</a>
            </div>
            <div class="col-xs-2" >
                {!!Form::open(array('url' => "/tracks/$track->id", 'method' => 'DELETE'))!!}                
                       <button class="btn btn-danger form-control" role="button">Delete</button>
                {!!Form::close()!!} 
            </div>    
        </td>
    </tr>
    @endforeach


        </tbody>

    </table>

    {!! $tracks->render() !!}
    
@stop
    