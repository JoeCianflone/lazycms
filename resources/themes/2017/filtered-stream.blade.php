@extends('layouts.master')

@section('signature', 'stream stream-'.$type)

@section('tagged-as')
    <h2 class="navigation__breadcrumb">Tagged as #{{$type}} </h2>
@endsection

@section('content')
    @foreach($stream->items() as $item)
        @includeif('layouts.components.stream-types.'.$item->type, $item)
    @endforeach

    {{ $stream->links() }}
@endsection