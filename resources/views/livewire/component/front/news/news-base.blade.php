<div>
    <style>
        .container-news {
            width: 100%;
            /* height: 100vh; */
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
        <div class=" grid sm:grid-cols-1 md:grid-cols-2">
            <div class=" text-gray-500 p-5 flex flex-col">

                <figure class="card-zoom-news">
                    <img class="card-zoom-image w-full rounded-lg over:scale-110 transition duration-500 object-cover"
                        src="{{Storage::disk('news')->url($news->thumbnail)}}"
                        alt="">
                </figure>
                <span class=" text-xs text-gray-500 truncate dark:text-gray-400 mt-3">
                    {{\Illuminate\Support\Carbon::parse($news->published_at)->diffForHumans()}}
                </span>
                <h2 class="text-lg text-gray-900 dark:text-white font-bold">
                    {{$news->title}}
                </h2>
                <div class="flex-1 mt-5 h-40 overflow-hidden">
                    <p class="text-gray-600 dark:text-gray-300"
                        style="max-height: 100px; overflow: hidden; text-overflow: ellipsis; ">
                        {{Formatting::limitWords($news->content, 50, '...')}}
                    </p>
                    <button
                        class=" mt-3 h-8 text-sm bg-transparent hover:bg-blue-500 text-gray-500 font-semibold hover:text-white px-4 border border-blue-500 hover:border-transparent rounded">
                        Selengkapnya
                    </button>
                </div>

            </div>
            <div class=" text-gray-500 pt-5 pb-5 text-center grid gap-4 sm:grid-cols-1 md:grid-cols-2">
                @livewire('component.front.news.news-update')
                @livewire('component.front.news.announcement')
            </div>
        </div>

    </section>
</div>