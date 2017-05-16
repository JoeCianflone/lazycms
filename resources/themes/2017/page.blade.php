@extends('layouts.master')
@section('page_title', $page->title)
@section('signature', $page->slug)

@section('meta')
    @foreach($page->meta_content['meta'] as $name => $value)
        <meta property="{{$name}}" value="{{$value}}">
    @endforeach
@endsection

@section('content')
    {!! $page->content['body'] !!}
@endsection