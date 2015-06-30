@extends('app')

@section('content')

 <h1>Artists</h1>
 <a href="{{url('/artists/create')}}" class="btn btn-success">Create Artists</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Artists</th>
         
         <th colspan="3">Acciones</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($artists as $artist)
         <tr>
             <td>{{ $artist->name }}</td>
             
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