@extends('layouts.base')
@section('body')
@foreach($site['sections'] as $section)
    @livewire($section['section'],['slug'=>$site['slug']])
@endforeach
@endsection