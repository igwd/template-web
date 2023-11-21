<div class=" min-h-screen">
    <style>
        .container-sub {
            margin-top: 112px;
        }

        .container-news {
            max-height: 550px;
        }
    </style>
    <div class="flex flex-col min-h-screen bg-white dark:bg-gray-800">
        @livewire('component.front.navbar')

        <div class="container-sub text-gray-500 px-5 md:px-36">

            <div id="about" class="relative bg-white dark:bg-gray-800 overflow-hidden mt-16">

                <div class="max-w-7xl mx-auto">
                    <div
                        class="relative z-10 pb-8 bg-white dark:bg-gray-800 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                            fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="50,0 100,0 50,100 0,100" class="fill-white dark:fill-gray-800"></polygon>
                        </svg>

                        <div class="pt-1"></div>

                        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28 ">
                            <div class="sm:text-center lg:text-left ">
                                <h2
                                    class=" text-gray-800 dark:text-white my-2 text-2xl tracking-tight font-extrabold  sm:text-3xl md:text-4xl">
                                    Sarah S.T, M.Sc
                                </h2>
                                <div>
                                    <p>Lektor Kepala</p>
                                    <p><span class="fa fa-envelope"></span> <a href="mailto:suranata10@gmail.com "
                                            target="_blank">sarah32343@gmail.com </a> </p>
                                    <p><a href="" target="_new">Google Scholar</a> <span
                                            class="fa fa-external-link"></span> </p>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img class="h-56 w-full object-cover object-top sm:h-72 md:h-96 lg:w-full lg:h-full"
                        src="https://cdn.pixabay.com/photo/2016/03/23/04/01/woman-1274056_960_720.jpg" alt="">
                </div>
            </div>
            <div class="mt-5">
                <div id="accordion-open" data-accordion="open" class="">
                    <h2 id="accordion-open-heading-6">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-open-kurikulum-6" aria-expanded="true"
                            aria-controls="accordion-open-kurikulum-1">
                            <span class="flex items-center">Biografi</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-kurikulum-6" class="hidden" aria-labelledby="accordion-open-heading-6">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi explicabo dolor veritatis quas
                            non
                            corporis quis vero reiciendis blanditiis distinctio ipsa a vitae maxime amet eaque
                            cupiditate
                            facilis, libero sit ut! Ex, libero corrupti. Nulla eaque neque error facilis, odit magni
                            saepe
                            ullam dolor sunt blanditiis asperiores adipisci officia iste maxime, expedita iusto quam
                            illo
                            atque temporibus, a earum sint inventore. Labore maiores ut reiciendis alias voluptatibus
                            provident tempore deserunt soluta, consequatur illum quos molestiae perspiciatis non,
                            dolorem
                            quisquam ea deleniti blanditiis repellendus, id dolor odit voluptatum consequuntur pariatur
                            quo.
                            Aspernatur voluptatum accusamus est dolor non corrupti delectus, voluptatibus et.
                        </div>
                    </div>
                    <h2 id="accordion-open-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-open-kurikulum-2" aria-expanded="false"
                            aria-controls="accordion-open-kurikulum-2">
                            <span class="flex items-center">Education</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-kurikulum-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                                <li>Pancasila dan Kewarganegaraan</li>
                                <li>Kalkulus II</li>
                                <li>Fisika II</li>
                                <li>Dasar Rangkaian Elektronika</li>
                                <li>Pengantar Basis Data</li>
                                <li>Rangkaian Listrik</li>
                                <li>Praktikum Rangkaian Listrik</li>
                                <li>Algoritma dan Pemrograman (PBO)</li>
                                <li>Praktikum Algoritma dan Pemrograman (PBO)</li>
                            </ul>

                        </div>
                    </div>
                    <h2 id="accordion-open-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-open-kurikulum-3" aria-expanded="false"
                            aria-controls="accordion-open-kurikulum-3">
                            <span class="flex items-center">Book</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-open-kurikulum-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                                <li>Aljabar Linear</li>
                                <li>Matematika Diskrit</li>
                                <li>Jaringan Komputer dan Komunikasi</li>
                                <li>Praktikum Jaringan Komputer dan Komunikasi</li>
                                <li>Rekayasa Perangkat Lunak</li>
                                <li>Arsitektur dan Organisasi Komputer</li>
                                <li>Teknologi Basis Data</li>
                                <li>Praktikum Teknologi Basis Data</li>
                                <li>Imaging System</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @livewire('component.front.footer.footer-base')
    </div>
</div>
