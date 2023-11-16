<div>
    <div class="carousel relative shadow-2xl bg-white ">
        <div class="carousel-inner relative overflow-hidden w-full ">
            <!--Slide-->
            @foreach ($carousels as $item => $carousel)
                @php $index = ($item + 1) @endphp
                <input class="hidden carousel-open" type="radio" id="carousel-{{ $index }}" name="carousel"
                    aria-hidden="true" hidden="" checked="checked">
                <div class="carousel-item absolute opacity-0">
                    <div class="grid grid-rows-2 md:grid-cols-2 text-white text-5xl text-center ">
                        <div class=" flex-col p-6 md:justify-center items-center flex" data-aos="fade-up"
                            data-aos-duration="3000">
                            <p class="mt-6 md:mt-0 text-3xl font-poppins">{{ $carousel['heading_sm'] }}</p>
                            <p class="text-4xl md:text-5xl md:mb-4 md:mt-4 text-yellow-300 font-lobster">
                                {{ $carousel['heading_lg'] }}
                            </p>
                            <p class="text-xl md:text-4xl mt-6 md:mt-0">{{ $carousel['heading_md'] }}</p>
                            <p class="hidden md:block mt-20 text-lg font-poppins">{{ $carousel['description'] }}</p>
                            <ul
                                class=" flex-wrap md:mt-20 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 text-lg hidden md:flex items-center h-10 gap-5 ">
                                @foreach ($carousel['sections'] ? json_decode($carousel['sections'], true) : [] as $item)
                                    <li class="text-gray-200 hover:text-blue-500 transition cursor-pointer text-base md:text-xl list-none"
                                        data-aos="fade-up" data-aos-duration="1000"
                                        data-aos-anchor-placement="top-bottom">
                                        <svg class="text-blue-500 inline w-3 h-3 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 10 16">
                                            <path
                                                d="M3.414 1A2 2 0 0 0 0 2.414v11.172A2 2 0 0 0 3.414 15L9 9.414a2 2 0 0 0 0-2.828L3.414 1Z" />
                                        </svg>
                                        <a href="javascript:void(0)"
                                            data-target="{{ $item['link_section'] }}">{{ Formatting::getLang() == 'id' ? $item['label'] : $item['label_en'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="">
                            <img src="{{ Storage::disk('carousel')->url($carousel['bgimage']) }}" alt=""
                                srcset="" class="h-full object-cover object-center">
                        </div>
                    </div>
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
            @endforeach
            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                @foreach ($carousels as $item => $carousel)
                    @php $index = ($item + 1) @endphp
                    <li class="inline-block mr-3">
                        <label for="carousel-{{ $index }}"
                            class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
    <script>
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

        // window.addEventListener('load', autoAdvanceCarousel);
    </script>
</div>
