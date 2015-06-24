@extends('app')

@section('content')
    <h1>Articles</h1>

    @foreach($articles as $article)
        <article>

            <a href="/articles/{{ $article->id  }}"><h2>{{ $article->title }}</h2></a>

            {{--
                <a href="{{ action('ArticlesController@show', [$article->id]) }}"><h2>{{ $article->title }}</h2></a>
                <a href="{{ url('/articles', $article->id) }}"><h2>{{ $article->title }}</h2></a>
            --}}

            <div class="body">
                {{ $article->body }}
            </div>
        </article>
    @endforeach

    <a class="btn btn-primary btn-lg" href="{{ url('articles/create') }}"
       role="button">Crear articulo</a>
@stop
