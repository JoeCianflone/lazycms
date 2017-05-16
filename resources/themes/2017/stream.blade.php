@extends('layouts.master')
@section('signature', 'stream')

@section('content')
    @include('layouts.components.pinned', $pinned)

    @foreach($stream->items() as $item)
        @includeif('layouts.components.stream-types.'.$item->type, $item)
    @endforeach

    {{ $stream->links() }}
@endsection