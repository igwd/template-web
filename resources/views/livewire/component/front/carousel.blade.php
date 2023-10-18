<style>
    .carousel {
        position: relative;
        box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.64);
        margin-top: 26px;
    }

    .carousel-inner {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .carousel-open:checked+.carousel-item {
        position: static;
        opacity: 100;
    }

    .carousel-item {
        position: absolute;
        opacity: 0;
        -webkit-transition: opacity 0.6s ease-out;
        transition: opacity 0.6s ease-out;
        height: 70vh;
    }

    .carousel-item img {
        display: block;
        height: 100%;
        object-fit: contain;
        object-position: center;
    }

    .carousel-control {
        background: rgba(0, 0, 0, 0.28);
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        display: none;
        font-size: 40px;
        height: 40px;
        line-height: 35px;
        position: absolute;
        top: 50%;
        -webkit-transform: translate(0, -50%);
        cursor: pointer;
        -ms-transform: translate(0, -50%);
        transform: translate(0, -50%);
        text-align: center;
        width: 40px;
        z-index: 10;
    }

    .carousel-control.prev {
        left: 2%;
    }

    .carousel-control.next {
        right: 2%;
    }

    .carousel-control:hover {
        background: rgba(0, 0, 0, 0.8);
        color: #aaaaaa;
    }

    #carousel-1:checked~.control-1,
    #carousel-2:checked~.control-2,
    #carousel-3:checked~.control-3 {
        display: block;
    }

    .carousel-indicators {
        list-style: none;
        margin: 0;
        padding: 0;
        position: absolute;
        top: 5%;
        left: 10px;
        text-align: center;
        z-index: 10;
    }

    .carousel-indicators li {
        display: inline-block;
        margin: 0 5px;
    }

    .carousel-bullet {
        color: #fff;
        cursor: pointer;
        display: block;
        font-size: 35px;
    }

    .carousel-bullet:hover {
        color: #aaaaaa;
    }

    #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
    #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
    #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
        color: #428bca;
    }
</style>

<div class="carousel relative shadow-2xl bg-white ">
    <div class="carousel-inner relative overflow-hidden w-full ">
        <!--Slide 1-->
        <input class="hidden carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
            checked="checked">
        <div class="carousel-item absolute opacity-0">
            <div class="block h-full w-full bg-indigo-500 text-white text-5xl text-center">
                <img src="https://www.teknik.warmadewa.ac.id/public/uploads/slider/slider_222502020225_slider-1.jpg"
                    alt="" srcset="">
            </div>
        </div>
        <label for="carousel-3"
            class="prev opacity-50 control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-2"
            class="next opacity-50 control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!--Slide 2-->
        <input class="hidden carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true"
            hidden="">
        <div class="carousel-item absolute opacity-0" style="height:70vh;">
            <div class="block h-full w-full bg-orange-500 text-white text-5xl text-center">Slide 2</div>
        </div>
        <label for="carousel-1"
            class="prev opacity-50 control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-3"
            class="next opacity-50 control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!--Slide 3-->
        <input class="hidden carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true"
            hidden="">
        <div class="carousel-item absolute opacity-0" style="height:70vh;">
            <div class="block h-full w-full bg-green-500 text-white text-5xl text-center">Slide 3</div>
        </div>
        <label for="carousel-2"
            class="prev opacity-50 control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-1"
            class="next opacity-50 control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!-- Add additional indicators for each slide-->
        <ol class="carousel-indicators">
            <li class="inline-block mr-3">
                <label for="carousel-1"
                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-2"
                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-3"
                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
            </li>
        </ol>

    </div>
</div>
