@extends('app')

@section('content')
    <h1>Write a new cancion</h1>
    <hr>

    {!! Form::open(['url' => 'tracks']) !!}
        <!-- track Form Input -->
        <div class="form-group">
            {!! Form::label('name','Cancion: ')  !!}
            {!! Form::text('name', null , ['class'=>'form-control'])  !!}
        </div>

        <!-- dir_track Form Input -->
        <div class="form-group">
            {!! Form::label('dir_track','directorio de cancion: ')  !!}
            {!! Form::text('dir_track', null , ['class'=>'form-control'])  !!}
        </div>

    
        <!-- Submit -->
        <div class="form-group">
            {!! Form::submit('Agregar Cancion', ['class'=>'btn btn-primary form-control'])  !!}
        </div>
    {!! Form::close() !!}

    {{-- var_dump($errors->toArray()) --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @include('errors.list')
@stop