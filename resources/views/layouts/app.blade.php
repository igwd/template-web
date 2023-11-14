@extends('layouts.base')

@section('body')
@isset($slot)
    {{ $slot }}
@endisset
@endsection
