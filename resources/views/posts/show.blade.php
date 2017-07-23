@extends('layouts/app')

@section('content')

    <h1>{{ $post->title }}</h1>

    <p>{{ $post->content }}</p>

    <p>{{ $post->user->name }}</p>


    <h4>Comentarios</h4>

    {!! Form::open(['route' => ['comments.store', $post], 'method' => 'POST'])  !!}

    {!! Form::textarea('comment') !!}

    {!! Form::submit('Publicar comentario') !!}

    {!! Form::close() !!}



    @foreach($post->comments as $comment)
        <article class="{!! $comment->answer ? 'answer' : ''!!}">
            <p>{!! $comment->comment !!}</p>
            {!! Form::open(['route' => ['comments.accept', $comment], 'method' => 'POST']) !!}

            {!! Form::submit('Aceptar respuesta') !!}

            {!! Form::close() !!}
        </article>

    @endforeach

@endsection