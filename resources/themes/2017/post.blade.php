@extends('layouts.master')

@section('page_title', $post->title)

@section('meta')
{{--     @foreach($post->meta_content['meta'] as $name => $value)
        <meta property="{{$name}}" value="{{$value}}">
    @endforeach --}}
@endsection

@section('content')
    <article id="{{$post->id}}" class="post">
        <h1 class="post__headline">{{$post->content['headline']}}</h1>
        {!! $post->content['body'] !!}
    </article>
@endsection
