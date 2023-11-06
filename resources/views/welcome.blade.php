@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen bg-gray-100">
        <div
            class=" fixed bottom-5 right-5 z-50 h-14 w-14 bg-blue-600 text-white grid justify-center items-center rounded-full">
            <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500"
                data-dropdown-trigger="hover" type="button">
                <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M17 12C19.7614 12 22 9.76142 22 7C22 4.23858 19.7614 2 17 2C14.2386 2 12 4.23858 12 7C12 7.79984 12.1878 8.55582 12.5217 9.22624C12.6105 9.4044 12.64 9.60803 12.5886 9.80031L12.2908 10.9133C12.1615 11.3965 12.6035 11.8385 13.0867 11.7092L14.1997 11.4114C14.392 11.36 14.5956 11.3895 14.7738 11.4783C15.4442 11.8122 16.2002 12 17 12Z"
                            stroke="currentColor" stroke-width="1.5"></path>
                        <path d="M15 7H19M17 9L17 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path
                            d="M8.03759 7.31617L8.6866 8.4791C9.2723 9.52858 9.03718 10.9053 8.11471 11.8278C8.11471 11.8278 8.11471 11.8278 8.11471 11.8278C8.11459 11.8279 6.99588 12.9468 9.02451 14.9755C11.0525 17.0035 12.1714 15.8861 12.1722 15.8853C12.1722 15.8853 12.1722 15.8853 12.1722 15.8853C13.0947 14.9628 14.4714 14.7277 15.5209 15.3134L16.6838 15.9624C18.2686 16.8468 18.4557 19.0692 17.0628 20.4622C16.2258 21.2992 15.2004 21.9505 14.0669 21.9934C12.1588 22.0658 8.91828 21.5829 5.6677 18.3323C2.41713 15.0817 1.93421 11.8412 2.00655 9.93309C2.04952 8.7996 2.7008 7.77423 3.53781 6.93723C4.93076 5.54428 7.15317 5.73144 8.03759 7.31617Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownDelay" class="z-50 hidden divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                    <li class="mb-3">
                        <a href="#" class="block">
                            <svg class="h-10 w-10" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#2BA9BB">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>arrow-up-square</title>
                                    <desc>Created with Sketch Beta.</desc>
                                    <defs> </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                        sketch:type="MSPage">
                                        <g id="Icon-Set-Filled" sketch:type="MSLayerGroup"
                                            transform="translate(-518.000000, -985.000000)" fill="#2BA9BB">
                                            <path
                                                d="M540.535,1000.535 C540.145,1000.926 539.512,1000.926 539.121,1000.535 L535,996.414 L535,1007 C535,1007.55 534.552,1008 534,1008 C533.447,1008 533,1007.55 533,1007 L533,996.414 L528.879,1000.535 C528.488,1000.926 527.854,1000.926 527.465,1000.535 C527.074,1000.146 527.074,999.512 527.465,999.121 L533.121,993.465 C533.361,993.225 533.689,993.15 534,993.205 C534.311,993.15 534.639,993.225 534.879,993.465 L540.535,999.121 C540.926,999.512 540.926,1000.146 540.535,1000.535 L540.535,1000.535 Z M546,985 L522,985 C519.791,985 518,986.791 518,989 L518,1013 C518,1015.21 519.791,1017 522,1017 L546,1017 C548.209,1017 550,1015.21 550,1013 L550,989 C550,986.791 548.209,985 546,985 L546,985 Z"
                                                id="arrow-up-square" sketch:type="MSShapeGroup"> </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://api.whatsapp.com/send/?phone=6281246927420&text&type=phone_number&app_absent=0"
                            class="block">
                            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" aria-label="WhatsApp" role="img"
                                viewBox="0 0 512 512" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect width="512" height="512" rx="15%" fill="#25d366"></rect>
                                    <path fill="#25d366" stroke="#ffffff" stroke-width="26"
                                        d="M123 393l14-65a138 138 0 1150 47z"></path>
                                    <path fill="#ffffff"
                                        d="M308 273c-3-2-6-3-9 1l-12 16c-3 2-5 3-9 1-15-8-36-17-54-47-1-4 1-6 3-8l9-14c2-2 1-4 0-6l-12-29c-3-8-6-7-9-7h-8c-2 0-6 1-10 5-22 22-13 53 3 73 3 4 23 40 66 59 32 14 39 12 48 10 11-1 22-10 27-19 1-3 6-16 2-18">
                                    </path>
                                </g>
                            </svg></a>
                    </li>

                </ul>
            </div>
        </div>
        @livewire('component.front.navbar')
        @livewire('component.front.carousel')
        @livewire('component.front.info.search')
        @livewire('component.front.info.info-base')
        @livewire('component.front.detail-section.detail-section-base')
        @livewire('component.front.news.news-base')
        @livewire('component.front.gallery.gallery-base')
        @livewire('component.front.video-gallery.video-gallery-base')
        @livewire('component.front.chart.chart-base')
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
