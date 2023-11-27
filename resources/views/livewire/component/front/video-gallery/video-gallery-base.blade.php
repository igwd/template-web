<div class=" p-10 flex justify-center items-center flex-col bg-white dark:bg-gray-900">
    <h1 class="border-b-4 text-3xl text-center text-gray-700 mb-8 dark:text-gray-300">Video Galeri</h1>
    <div class="w-full grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 lg:gap-4 md:p-2 sm:gap-1 md:pl-20 md:pr-20">
        @if(!empty($medias))
        @foreach($medias as $row => $video)
        @php
            $media = json_decode($video->media_video);
            $index = rand(0, count($media) - 1);  
        @endphp
            <div x-data="{ isLoading: true, isPlaying:false }" x-init="() => { setTimeout(() => { isLoading = false; }, 2000) }" class="card-zoom">
                <div x-bind:class="{ 'hidden': isPlaying }" x-show="!isPlaying" class="aspect-w-16 aspect-h-9 bg-gray-300 animate-pulse">
                    <!-- Display video thumbnail -->
                    <img src="{{Storage::disk('gallery_video')->url($video->media_video_thumb)}}" alt="{{$video->slug}}" class="aspect-w-16 aspect-h-9 object-cover">
                    <button @click="isPlaying = true" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9L5 21V3z"/>
                        </svg>
                    </button>
                </div>
                <video x-ref="videoPlayer" 
                       @play="isPlaying = true; isLoading = false" 
                       @pause="isPlaying = false" 
                       @ended="isPlaying = false; $refs.videoPlayer.currentTime = 0" 
                       x-show="isPlaying"
                       x-bind:class="{ 'hidden': !isPlaying }"
                       class="card-zoom-image mtz-vlc-ihack" alt="{{$video->slug}}" controls>
                    <source src="{{Storage::disk('gallery_video')->url($media[$index])}}" type="video/mp4">
                </video>     
            </div>
        @endforeach
        @endif
    </div>
    <div class="item-center justify-center mb-5" wire:loading.delay>
        <div role="status" class="item-center">
            <svg aria-hidden="true"
                class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="flex mt-auto items-center">
        <!-- Previous Button -->
        @if ($currentPage > 1)
            <button wire:click="prev"
                class="flex items-center mr-auto justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                Next
            </button>
        @endif
        @if ($medias->count() >= $perPage)
            <button wire:click="next"
                class="flex items-center ml-auto justify-center px-3 h-8 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                Prev
            </button>
        @endif
    </div>
</div>
