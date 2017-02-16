@extends('layouts.master')

@section('content')
    @foreach($stream['data'] as $item)
        @include('layouts.components.'.$item['type'], $item)
    @endforeach
@endsection