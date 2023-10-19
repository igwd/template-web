<style>
    .carousel {
        margin-top: 72px;
        position: relative;
        box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.64);
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
        background-color: #191919
    }

    .carousel-item div {
        height: calc(100vh - 72px);
    }

    .carousel-item img {
        /* display: block;
        height: 100%;
        object-fit: contain;
        object-position: center; */
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
        top: 2%;
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
            <div class="flex h-full w-full text-white text-5xl text-center ">
                <div class="w-1/2 flex-col p-6 justify-center items-center flex" data-aos="fade-up"
                    data-aos-duration="3000">
                    <p class="text-3xl font-poppins">Selamat datang di</p>
                    <p class="text-5xl mb-4 mt-4 text-yellow-300 font-lobster">Fakultas Teknik dan Perencanaan</p>
                    <p class="text-4xl">Universitas Warmadewa</p>
                    <p class="mt-20 text-base font-poppins">Fakultas Teknik dan Perencanaan di Universitas Warmadewa
                        adalah
                        salah satu
                        fakultas yang berfokus
                        pada pendidikan dan penelitian di bidang teknik dan perencanaan. Universitas Warmadewa sendiri
                        adalah sebuah perguruan tinggi di Indonesia.</p>

                    <ul
                        class=" mt-20 space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400 text-lg flex items-center h-10 gap-5 ">
                        <li class="text-gray-200 hover:text-blue-500 transition cursor-pointer text-xl">Teknik Sipil
                        </li>
                        <li class="text-gray-200 hover:text-blue-500 transition cursor-pointer text-xl">Arsitektur</li>
                        <li class="text-gray-200 hover:text-blue-500 transition cursor-pointer text-xl">Teknik Komputer
                        </li>
                    </ul>
                </div>
                <div class=" w-1/2">
                    <img src="{{ asset('img/gwk.jpg') }}" alt="" srcset=""
                        class="h-full object-cover object-center">
                </div>

            </div>
        </div>
        <label for="carousel-3"
            class="prev opacity-50 control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-2"
            class="next opacity-50 control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
        <!--Slide 2-->
        <input class="hidden carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true"
            hidden="">
        <div class="carousel-item absolute opacity-0">
            <div class="flex h-full w-full text-white text-5xl text-center ">
                <div class="w-1/2 flex-col p-6 justify-center items-center flex">
                    <p class="text-3xl font-poppins">Selamat datang</p>
                    <p class="text-5xl mb-4 mt-4 text-yellow-300 font-lobster">Calon Technopreneur Muda</p>
                    <p class="text-4xl">Universitas Warmadewa</p>
                    <p class="mt-14 text-lg font-poppins">Technopreneur adalah seorang individu atau wirausaha yang
                        sangat
                        berorientasi pada teknologi dan inovasi. Mereka memiliki kemampuan untuk mengidentifikasi
                        peluang bisnis di dalam dunia teknologi dan menciptakan produk atau layanan berbasis teknologi
                        yang inovatif untuk memenuhi kebutuhan pasar.</p>

                </div>
                <div class=" w-1/2">
                    <img src="{{ asset('img/arsitekur.jpg') }}" alt="" srcset=""
                        class="h-full object-cover object-center ">
                </div>

            </div>
        </div>
        <label for="carousel-1"
            class="prev opacity-50 control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-3"
            class="next opacity-50 control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!--Slide 3-->
        <input class="hidden carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true"
            hidden="">
        <div class="carousel-item absolute opacity-0">
            <div class="flex h-full w-full text-white text-5xl text-center ">
                <div class="w-1/2 flex-col p-6 justify-center items-center flex">
                    <p class="text-3xl font-poppins">Fakultas Teknik dan Perencanaan</p>
                    <p class="text-5xl mb-4 mt-4 text-yellow-300 font-lobster">Berwawasan Ekowisata</p>
                    <p class="text-4xl">Berlandaskan Sapta Bayu</p>
                    <p class="mt-14 text-lg font-poppins">Berwawasan ekowisata adalah konsep pengembangan yang berfokus
                        pada upaya melestarikan alam dan budaya setempat sambil tetap memungkinkan aktivitas pariwisata.
                        Ini bertujuan untuk menciptakan pengalaman wisata yang berkelanjutan dan berdampak positif bagi
                        lingkungan, komunitas lokal, dan ekonomi.</p>
                </div>
                <div class=" w-1/2">
                    <img src="{{ asset('img/arduino.jpg') }}" alt="" srcset=""
                        class="h-full object-cover object-center">
                </div>

            </div>
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
