@extends('layouts.master')
@section('page_title', $post->title)

@section('meta')
    @if (isset($post->meta_content['meta']))
        @foreach($post->meta_content['meta'] as $name => $value)
            <meta property="{{$name}}" value="{{$value}}">
        @endforeach
    @endif
@endsection

@section('content')
    <article id="{{$post->id}}" class="post">
        <h1 class="post__headline">{{$post->content['headline']}}</h1>
        <ul class="stream-block__list">
            <li class="stream-block__item--type"><span class="fa fa-thumb-tack"></span></li>
            <li class="stream-block__item">Posted by: {{$post->meta_content['author']}}</li>
            <li class="stream-block__item">{{$post->item_created_at->diffForHumans()}}</li>
        </ul>
        {!! $post->content['summary'] !!}
        {!! $post->content['body'] !!}
    </article>
@endsection
