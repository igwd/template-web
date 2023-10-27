<div>
    <div class="carousel relative shadow-2xl bg-white">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide Item-->
            <input class="hidden carousel-open" type="radio" id="carousel-{{$carousels[$currentCarouselIndex]['id']}}" name="carousel" aria-hidden="true"
            checked="checked">
            <div class="carousel-item absolute opacity-0">
                <div class="flex h-full w-full text-white text-5xl text-center ">
                    <div class="w-1/2 flex-col p-6 justify-center items-center flex" data-aos="fade-up" data-aos-duration="3000">
                        <p class="text-3xl font-poppins">{{$carousels[$currentCarouselIndex]['heading_md']}}</p>
                        <p class="text-5xl mb-4 mt-4 text-yellow-300 font-lobster">{{$carousels[$currentCarouselIndex]['heading_lg']}}</p>
                        <p class="text-4xl">{{$carousels[$currentCarouselIndex]['heading_md']}}</p>
                        <p class="mt-20 text-lg font-poppins">{{$carousels[$currentCarouselIndex]['description']}}</p>
                        <ul
                            class=" mt-20 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 text-lg flex items-center h-10 gap-5 ">
                            <li class="text-gray-200 hover:text-blue-500 transition cursor-pointer text-xl list-none"
                                data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                                <svg class="text-blue-500 inline w-3 h-3 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 10 16">
                                    <path
                                        d="M3.414 1A2 2 0 0 0 0 2.414v11.172A2 2 0 0 0 3.414 15L9 9.414a2 2 0 0 0 0-2.828L3.414 1Z" />
                                </svg>
                                Teknik Sipil
                            </li>
                            <li class="text-gray-200 hover:text-blue-500 transition cursor-pointer text-xl list-none"
                                data-aos="fade-up" data-aos-duration="2000" data-aos-anchor-placement="top-bottom">
                                <svg class="text-blue-500 inline w-3 h-3 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 10 16">
                                    <path
                                        d="M3.414 1A2 2 0 0 0 0 2.414v11.172A2 2 0 0 0 3.414 15L9 9.414a2 2 0 0 0 0-2.828L3.414 1Z" />
                                </svg>
                                Arsitektur
                            </li>
                            <li class="text-gray-200 hover:text-blue-500 transition cursor-pointer text-xl list-none"
                                data-aos="fade-up" data-aos-duration="3000" data-aos-anchor-placement="top-bottom">
                                <svg class="text-blue-500 inline w-3 h-3 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 10 16">
                                    <path
                                        d="M3.414 1A2 2 0 0 0 0 2.414v11.172A2 2 0 0 0 3.414 15L9 9.414a2 2 0 0 0 0-2.828L3.414 1Z" />
                                </svg>
                                Teknik Komputer
                            </li>
                        </ul>
                    </div>
                    <div class=" w-1/2">
                        <img src="{{ Storage::disk('carousel')->url($carousels[$currentCarouselIndex]['bgimage'])}}" alt="" srcset="" class="h-full object-cover object-center">
                    </div>
                </div>
            </div>
            <button wire:click="previousCarousel" class="prev opacity-50 control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</button>
            <button wire:click="nextCarousel" class="next opacity-50 control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</button>
        </div>
    </div>
</div>
