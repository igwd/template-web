@extends('layouts.base')
@push('custom-style')
<style>
    .container-sub {
        margin-top: 112px;
    }
</style>
@endpush
@section('body')
<div class="min-h-screen">
    <div class="flex flex-col min-h-screen bg-white dark:bg-gray-700">
        @livewire('component.front.navbar',['slug'=>$site])
        <div
            class="container-sub text-gray-500 p-5 pb-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 gap-0 md:gap-4">
            <div class="col-span-3">
                <div class="h-full p-2 flex flex-col rounded-lg shadow bg-white dark:bg-gray-800 p-5">
                    <h1 class=" text-2xl text-gray-900 dark:text-white font-bold">
                        {{$news->title}}
                    </h1>
                    <span class="font-bold text-base text-gray-500 truncate dark:text-gray-400 mb-5">
                        {{ \Illuminate\Support\Carbon::parse($news->published_at)->diffForHumans() }}
                    </span>
                    <figure class="w-full">
                        <img class="w-full rounded-lg over:scale-110 transition duration-500 object-cover"
                        src="{{ Storage::disk('news')->url($news->thumbnail) }}" alt="{{$news->slug}}">
                    </figure>
                    <small class="text-center">{{$news->thumbnail_meta}}</small>
                    <p class="text-justify mt-5">{!!$news->content!!}</p>
                    <div class="col-span-3 mt-3">
                        @if(!empty(explode(',',$news->tags)))
                            @foreach(explode(',',$news->tags) as $tags)
                                <span class="bg-green-400 text-white rounded-full py-1 px-3 inline-block">{{$tags}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-news mt-4 md:mt-0 grid sm:grid-cols-1">
                <div class="max-h-100">
                @livewire('component.front.news.news-update',['slug'=>$site,'post'=>$news->slug])
                </div>
                <div class="mt-5 max-h-100">
                @livewire('component.front.news.announcement',['slug'=>$site])
                </div>
            </div>
        </div>
        @livewire('component.front.footer.footer-base',['slug'=>$site])
    </div>
</div>
@endsection

