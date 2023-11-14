@extends('layouts.base')
@section('body')
@foreach(['component.front.navbar','component.front.carousel','component.front.news.news-base','component.front.footer.footer-base'] as $section)
{{-- @livewire('component.front.navbar',['slug'=>$slug])
@livewire('component.front.carousel',['slug'=>$slug]) --}}
@livewire($section,['slug'=>$slug])
@endforeach
@endsection