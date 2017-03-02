@extends('layouts.master')

@section('content')
    @foreach($stream->items() as $item)
        @include('layouts.components.'.$item->type, $item)
    @endforeach

    {{ $stream->links() }}
@endsection