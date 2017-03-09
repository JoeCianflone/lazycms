@extends('layouts.master')

@section('content')
    <h2 class="navigation__breadcrumb">Tagged as #{{$type}} </h2>

    @foreach($stream->items() as $item)
        @include('layouts.components.'.$item->type, $item)
    @endforeach

    {{ $stream->links() }}
@endsection