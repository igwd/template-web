<div>
    <style>
        .container-news {
            width: 100%;
            height: 100vh;
            padding: 20px 20px 0 20px;
        }
    </style>

    <section class="container-news flex flex-col bg-white dark:bg-gray-900">
        <div
            class="text-sm font-medium text-center text-gray-500 border-b border-gray-400 dark:text-gray-400 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px">
                <li class="mr-2">
                    <a href="#"
                        class=" text-2xl inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Berita</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-1">
            <div class="w-1/2 h-ful text-gray-500 p-5 flex flex-col">

                <figure class="card-zoom-news">
                    <img class="card-zoom-image w-full rounded-lg over:scale-110 transition duration-500 object-cover"
                        src="https://www.teknik.warmadewa.ac.id/public/uploads/berita/Berita_232708070811_.jpg"
                        alt="">
                </figure>
                <span class=" text-xs text-gray-500 truncate dark:text-gray-400 mt-3">
                    1 Juni 2023
                </span>
                <h2 class="text-lg text-gray-900 dark:text-white font-bold">Pelatihan BIM oleh Balai Jasa Konstruksi
                    Wilayah IV Surabaya
                </h2>
                <div class="flex-1 mt-5">
                    <p class=" text-gray-600 dark:text-gray-300">Telah berlangsung pelatihan BIM yg difasilitasi oleh
                        Balai Jasa Konstruksi Wilayah
                        IV
                        Surabaya selama 6
                        hari penuh.

                        Diikuti oleh 21 orang mhs prodi sipil (senin depan akan diluncurkan).

                        Jika lulus ujian mereka akan memperoleh sertifikat yg berguna untuk melengkapi Mencari pekerjaan
                        (yg
                        penting mereka memperoleh keterampilan tambahan) untuk mereka bekerja.</p>

                    <button
                        class=" mt-3 h-8 text-sm bg-transparent hover:bg-blue-500 text-gray-500 font-semibold hover:text-white px-4 border border-blue-500 hover:border-transparent rounded">
                        Selengkapnya
                    </button>
                </div>

            </div>
            <div class="w-1/2 h-ful text-gray-500 pt-5 pb-5 text-center flex gap-4">
                @livewire('component.front.news.news-update')
                @livewire('component.front.news.announcement')
            </div>
        </div>

    </section>
</div>
