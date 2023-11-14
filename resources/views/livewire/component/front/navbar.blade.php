<div>
    <nav class="bg-white border-gray-200 dark:border-gray-600 dark:bg-gray-900 fixed z-50 w-full shadow-md">
        <div class="flex flex-wrap items-center mx-auto max-w-screen-xl pt-4 pl-4 pr-4 w-full">
            {{-- logo --}}
            <a href="{{url('/')}}" class="flex items-center ">
                <img src="{{ asset('img/logo-warmadewa.png') }}" class=" h-10 mr-3" alt="Teknik Unwar Logo" />
                <span
                    class="self-center sm:text-base md:text-lg font-semibold whitespace-nowrap dark:text-white ">{{$site['header']}}
                    <span
                        class="flex self-center text-sm whitespace-nowrap dark:text-white ">{{$site['sub_header']}}
                    </span>
                </span>
            </a>
            <div class="ml-auto flex items-center">
                <div class="hidden md:flex">
                    <img src="{{ asset('img/logo-merdeka.png') }}" class=" ml-5 h-10 mr-3" alt="Teknik Unwar Logo" />
                    <img src="{{ asset('img/ban-pt.jpeg') }}" class=" h-10 mr-3" alt="Teknik Unwar Logo" />
                </div>
                {{-- dark mode toogle --}}
                <x-front.theme-toogle/>
                {{-- language --}}
                <x-front.language/>
                <!-- burger -->
                <button data-collapse-toggle="mega-menu-full-image" type="button"
                    class=" ml-4 bg-gray-300 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mega-menu-full-image" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            {{-- nav menu --}}
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl py-4 w-full">
                <div id="mega-menu-full-image"
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                        @foreach ($navbars as $item)
                            <x-front.nav-item :navitem="$item"/>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{-- mega menu dropdown --}}
        @foreach($navbars as $item)
            @if(count($item['children']))
                <x-front.nav-mega-menu-dropdown :slug="$item['slug']" :navitem="$item['children']" />
            @endif
        @endforeach
    </nav>
</div>
