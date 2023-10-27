<div class="flex h-full w-full text-white text-5xl text-center ">
    <div class="w-1/2 flex-col p-6 justify-center items-center flex" data-aos="fade-up" data-aos-duration="3000">
        <p class="text-3xl font-poppins">{{$carousel[$currentCarouselIndex]['heading_md']}}</p>
        <p class="text-5xl mb-4 mt-4 text-yellow-300 font-lobster">{{$carousel[$currentCarouselIndex]['heading_lg']}}</p>
        <p class="text-4xl">{{$carousel[$currentCarouselIndex]['heading_md']}}</p>
        <p class="mt-20 text-lg font-poppins">{{$carousel[$currentCarouselIndex]['description']}}</p>
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
        <img src="{{ Storage::disk('carousel')->url($carousel[$currentCarouselIndex]['bgimage'])}}" alt="" srcset="" class="h-full object-cover object-center">
    </div>
</div>