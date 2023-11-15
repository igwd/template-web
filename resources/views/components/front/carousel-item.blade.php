<div>
    <div class="absolute opacity-0" x-show="selected === index">
        <div class="grid grid-rows-2 md:grid-cols-2 text-white text-5xl text-center">
            <div class=" flex-col p-6 md:justify-center items-center flex" x-show="selected === index">
                <p class="mt-6 md:mt-0 text-3xl font-poppins" x-text="carousel.heading_sm"></p>
                <p class="text-4xl md:text-5xl md:mb-4 md:mt-4 text-yellow-300 font-lobster" x-text="carousel.heading_lg"></p>
                <p class="text-xl md:text-4xl mt-6 md:mt-0" x-text="carousel.heading_md"></p>
                <p class="hidden md:block mt-20 text-lg font-poppins" x-text="carousel.description"></p>
            </div>
            <div x-transition.opacity.delay.100ms>
                <img x-bind:src="'storage/carousel/'+carousel.bgimage" class="h-full object-cover object-center">
            </div>
        </div>
    </div>
    <div x-show="selected === index">
        <span x-text="carousel.heading_sm" class="text-red-10"></span>
        <span x-text="carousel.heading_lg"></span>
        <span x-text="carousel.heading_md"></span>
        <span x-text="carousel.description"></span>
    </div>
</div>