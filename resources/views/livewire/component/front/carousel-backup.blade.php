<div x-data='{
        selected:2,
        carousels:@json($carousels),
        prev() {
            this.selected = (this.selected - 1 + this.carousels.length) % this.carousels.length;
            console.log("prev :"+this.selected+" selected : "+this.selected)
        },
        next() {
            this.selected = (this.selected + 1) % this.carousels.length;
            console.log("next :"+this.selected+" selected : "+this.selected)
        }
    }'
    x-init="console.log('hello carousel is an array ? :',Array.isArray(carousels))"
>
    <div class="carousel relative shadow-2xl bg-white">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide-->
            <template x-for="(carousel, index) in Object.values(carousels)" :key="index">
                <x-front.carousel-item />
            </template>
            <label
                class="prev opacity-50 control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto"
                x-on:click="prev()"
            >‹</label>
            <label
                class="next opacity-50 control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto"
                x-on:click="next()"
            >›</label>
            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <template x-for="(carousel, index) in Object.keys(carousels)" :key="index">
                    <li class="inline-block mr-3">
                        <label x-bind:for="'carousel-' + index"
                            class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                </template>
            </ol>
        </div>
    </div>
</div>