@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen bg-gray-100">
        @livewire('component.front.navbar')

        @livewire('component.front.carousel')
        @livewire('component.front.info.search')
        @livewire('component.front.info.info-base')
        @livewire('component.front.detail-section.detail-section-base')
        @livewire('component.front.news.news-base')
        @livewire('component.front.gallery.gallery-base')
        @livewire('component.front.video-gallery.video-gallery-base')
        @livewire('component.front.footer.footer-base')
        <div class="flex items-center justify-center">
            {{-- <div class="flex flex-col justify-around">
                <div class="space-y-6">
                    <a href="{{ route('home') }}">
                        <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
                    </a>

                    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                        {{ config('app.name') }}
                    </h1>

                    <ul class="list-reset">
                        <li class="inline px-4">
                            <a href="https://tailwindcss.com" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">Tailwind CSS</a>
                        </li>
                        <li class="inline px-4">
                            <a href="https://github.com/alpinejs/alpine" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">Alpine.js</a>
                        </li>
                        <li class="inline px-4">
                            <a href="https://laravel.com" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">Laravel</a>
                        </li>
                        <li class="inline px-4">
                            <a href="https://laravel-livewire.com" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">Livewire</a>
                        </li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
