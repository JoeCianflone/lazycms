@extends('layouts.master')

@section('content')
    @include('layouts.components.pinned', $pinned)

    @foreach($stream->items() as $item)
        @include('layouts.components.'.$item->type, $item)
    @endforeach

    {{ $stream->links() }}
@endsection