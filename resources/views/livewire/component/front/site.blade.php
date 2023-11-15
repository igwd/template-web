@extends('layouts.base')
@section('title')
    {{$site['header']}} - {{$site['sub_header']}}
@endsection
@section('body')
@foreach($site['sections'] as $section)
    @livewire($section['section'],['slug'=>$site['slug']])
@endforeach
@endsection