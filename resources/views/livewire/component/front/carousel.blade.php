<div>
    <section id="carousel" class="carousel relative shadow-2xl bg-white ">
        <div class="carousel-inner relative overflow-hidden w-full ">
            <!--Slide-->
            @for ($item = count($carousels)-1; $item >= 0; $item--)
                @php $index = ($item + 1) @endphp
                <input class="hidden carousel-open" type="radio" id="carousel-{{ $index }}" name="carousel"
                    aria-hidden="true" hidden="" checked="checked">
                <div class="carousel-item absolute opacity-0 overflow-hidden">
                    @if($carousels[$item]['bgvideo'])
                    <div class=" relative bg-bg-dark text-white ">
                        <video class="absolute object-cover w-full h-full scale-125" autoplay loop muted>
                            <source src="{{ Storage::disk('carousel')->url($carousels[$item]['bgvideo']) }}" type="video/mp4">
                        </video>
                        <div class="p-20 z-30 flex-col justify-center items-center flex" data-aos="fade-up"
                            data-aos-duration="3000">
                            <p class="custom-shadow font-bold mt-6 md:mt-0 text-2xl md:text-5xl font-poppins">
                                {{$carousels[$item]['heading_sm']}}</p>
                            <p class="custom-shadow text-4xl md:text-6xl md:mb-4 md:mt-4 text-yellow-300 font-lobster">
                                {{$carousels[$item]['heading_lg']}}
                            </p>
                            <p class="custom-shadow text-xl md:text-4xl mt-6 md:mt-0">
                                {{$carousels[$item]['heading_md']}}
                            </p>
                        </div>
                    </div>
                    @else
                    <div class="grid grid-rows-2 md:grid-cols-2 text-white text-5xl text-center ">
                        <div class=" flex-col p-6 md:justify-center items-center flex" data-aos="fade-up"
                            data-aos-duration="3000">
                            <p class="mt-6 md:mt-0 text-3xl font-poppins">{{ $carousels[$item]['heading_sm'] }}</p>
                            <p class="text-4xl md:text-5xl md:mb-4 md:mt-4 text-yellow-300 font-lobster">
                                {{ $carousels[$item]['heading_lg'] }}
                            </p>
                            <p class="text-xl md:text-4xl mt-6 md:mt-0">{{ $carousels[$item]['heading_md'] }}</p>
                            <p class="hidden md:block mt-20 text-lg font-poppins">{{ $carousels[$item]['description'] }}</p>
                            <ul
                                class=" flex-wrap md:mt-20 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 text-lg hidden md:flex items-center h-10 gap-5 ">
                                @foreach ($carousels[$item]['sections'] ? json_decode($carousels[$item]['sections'], true) : [] as $section)
                                    <li class="text-gray-200 hover:text-blue-500 transition cursor-pointer text-base md:text-xl list-none"
                                        data-aos="fade-up" data-aos-duration="1000"
                                        data-aos-anchor-placement="top-bottom">
                                        <svg class="text-blue-500 inline w-3 h-3 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 10 16">
                                            <path
                                                d="M3.414 1A2 2 0 0 0 0 2.414v11.172A2 2 0 0 0 3.414 15L9 9.414a2 2 0 0 0 0-2.828L3.414 1Z" />
                                        </svg>
                                        <a href="javascript:void(0)"
                                            data-target="{{ $section['link_section'] }}">{{ Formatting::getLang() == 'id' ? $section['label'] : $section['label_en'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="">
                            <img src="{{ Storage::disk('carousel')->url($carousels[$item]['bgimage']) }}" alt=""
                                srcset="" class="h-full object-cover object-center">
                        </div>
                    </div>
                    @endif
                    <a @click="scrollToDiv('search')" class="justify-center items-center flex cursor-pointer">
                        <svg class="absolute text-white hover:text-gray-900 duration-300 bottom-0 w-10 h-10 animate-bounce"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M5 15C5 16.8565 5.73754 18.6371 7.05029 19.9498C8.36305 21.2626 10.1435 21.9999 12 21.9999C13.8565 21.9999 15.637 21.2626 16.9498 19.9498C18.2625 18.6371 19 16.8565 19 15V9C19 7.14348 18.2625 5.36305 16.9498 4.05029C15.637 2.73754 13.8565 2 12 2C10.1435 2 8.36305 2.73754 7.05029 4.05029C5.73754 5.36305 5 7.14348 5 9V15Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                </path>
                                <path d="M12 6V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M15 11L12 14L9 11" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </a>
                </div>
                @php
                    $prev = ($index - 1 + count($carousels)) % count($carousels);
                    $next = ($index + 1) % count($carousels);
                    if ($prev === 0) {
                        $prev = count($carousels);
                    }
                    if ($next === 0) {
                        $next = count($carousels);
                    }
                @endphp
                <label for="carousel-{{ $prev }}"
                    class="prev opacity-50 control-{{ $index }} w-10 h-10 ml-2 md:ml-10 absolute hidden cursor-pointer text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-{{ $next }}"
                    class="next opacity-50 control-{{ $index }} w-10 h-10 mr-2 md:mr-10 absolute hidden cursor-pointer text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
            @endfor

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                @for ($item = count($carousels)-1; $item >= 0; $item--)
                    @php $index = ($item + 1) @endphp
                    <li class="inline-block mr-3">
                        <label for="carousel-{{ $index }}"
                            class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                @endfor
            </ol>
        </div>
    </section>
    @push('custom-scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                function autoAdvanceCarousel() {
                    const radios = document.querySelectorAll('.carousel-open');
                    let currentRadio = document.querySelector('.carousel-open:checked');
                    const radioCount = radios.length;

                    setInterval(() => {

                        const currentIndex = Array.from(radios).indexOf(currentRadio);

                        const nextIndex = (currentIndex + 1) % radioCount;
                        const nextRadio = radios[nextIndex];

                        
                        currentRadio.checked = false;
                        nextRadio.checked = true;
                        
                        
                        currentRadio = nextRadio;
                    }, 5000);
                }
                /* window.addEventListener('load', autoAdvanceCarousel); */
            });
        </script>
    @endpush
</div>
