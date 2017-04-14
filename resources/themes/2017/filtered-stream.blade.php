@extends('layouts.master')

@section('tagged-as')
    <h2 class="navigation__breadcrumb">Tagged as #{{$type}} </h2>
@endsection

@section('content')


    @foreach($stream->items() as $item)
        @include('layouts.components.'.$item->type, $item)
    @endforeach

    {{ $stream->links() }}
@endsection