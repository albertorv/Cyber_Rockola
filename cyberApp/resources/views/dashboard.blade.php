@extends('app')

@section('content')
    <div class="jumbotron">
        <h1>ISW-811</h1>
        <h2>Aplicaciones Web con SL</h2>
        <br>

        @if (Auth::guest())
            <p>
                <a class="btn btn-primary btn-lg" href="{{ url('/auth/login') }}"
                   role="button">Iniciar sesión</a>

                <a class="btn btn-warning btn-lg" href="{{ url('/auth/register') }}"
                   role="button">Registrarse</a>
            </p>
        @else
            <p>Bienvenido {{ Auth::user()->name }}</p>
            <p>
                <a class="btn btn-warning btn-lg" href="{{ url('/auth/logout') }}"
                   role="button">Cerrar sesión</a>
            </p>
        @endif


    </div>
@stop
