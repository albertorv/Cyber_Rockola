@extends('app')

@section('content')
    <h1>Add New Song</h1>
    <hr>

    {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}

        <div class="form-group">
            {!! Form::label('name','Song Name: ')  !!}
            {!! Form::text('name', null , ['class'=>'form-control'])  !!}
        </div>

        <!-- dir_track Form Input -->
        <div class="form-group">
            {!! Form::label('artist','Artist Name: ')  !!}
            {!! Form::text('artist', null , ['class'=>'form-control'])  !!}
        </div>
    
          {!! Form::file('file') !!}
      <p class="errors">{!!$errors->first('file')!!}</p>
        <div id="success"> </div>
      {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
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