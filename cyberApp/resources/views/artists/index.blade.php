<!--@extends('app')

@section('content')
    <h1>Artistas</h1>

    @foreach($artists as $artist)
        <artist>

            <a href="/artists/{{ $artist->id  }}"><h2>{{ $artist->title }}</h2></a>

            {{--
                <a href="{{ action('ArticlesController@show', [$artist->id]) }}"><h2>{{ $artist->title }}</h2></a>
                <a href="{{ url('/artists', $article->id) }}"><h2>{{ $artist->title }}</h2></a>
            --}}

            <div class="body">
                {{ $artist->body }}
            </div>
        </artist>
    @endforeach

    <a class="btn btn-primary btn-lg" href="{{ url('artists/create') }}"
       role="button">Crear artista</a>
@stop-->



@extends('layout/template')

@section('content')
 <h1>Peru BookStore</h1>
 <a href="{{url('/artists/create')}}" class="btn btn-success">Crear Artista</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Artista</th>
         <th>Canción</th>
         <th colspan="3">Acciones</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($artists as $artist, $tracks as $track)
         <tr>
             <td>{{ $artist->name }}</td>
             <td>{{ $track->name }}</td>
             <td><a href="{{url('artists',$artist->id)}}" class="btn btn-primary">Encolar</a></td>
             <td><a href="{{route('artists.edit',$artist->id)}}" class="btn btn-warning">Editar</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['artists.destroy', $artist->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection