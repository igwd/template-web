<div id="mega-{{ $slug }}" x-data="{ toggled: false, openid: null }" x-init="window.addEventListener('megaMenuToggled', (event) => {
    toggled = event.detail.open;
    openid = event.detail.id;
});"
    class="w-full bg-white border-gray-200 shadow-sm border-y dark:bg-gray-800 dark:border-gray-600 absolute z-40">
    <div x-show="toggled && openid === 'mega-{{ $slug }}'"
        class="grid max-h-96 overflow-y-auto md:overflow-hidden md:max-w-screen-xl px-4 py-5 mx-auto text-sm text-gray-500 dark:text-gray-400 md:grid-cols-3 md:px-6">
        @php $itemCount = count($navitem); @endphp
        @for ($i = 0; $i < $itemCount; $i += 4)
            <ul class="mb-4 space-y-4 md:mb-0 md:block" aria-labelledby="mega-{{ $slug }}">
                @for ($j = $i; $j < $i + 4 && $j < $itemCount; $j++)
                    <li>
                        @if (count($navitem[$j]['children']))
                            <a href="javascript:void(0)"
                                class="hover:underline hover:text-blue-600 dark:hover:text-blue-500"
                                data-collapse-toggle="mega-child-{{ $navitem[$j]['slug'] }}">
                                {{ $navitem[$j]['name'] }}
                                <svg class=" inline w-2.5 h-2.5 ml-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </a>
                            <ul id="mega-child-{{ $navitem[$j]['slug'] }}" class="hidden">
                                @foreach ($navitem[$j]['children'] as $navmegachild)
                                    <li class="mb-1 mt-1 ml-4">
                                        <a href="{{ $navmegachild['link'] }}"
                                            class="hover:underline hover:text-blue-600 dark:hover:text-blue-500 m-2"
                                            wire:navigate>
                                            {{ $navmegachild['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a href="{{ $navitem[$j]['link'] }}"
                                class="hover:cursor-pointer hover:underline hover:text-blue-600 dark:hover:text-blue-500"
                                wire:navigate>{{ $navitem[$j]['name'] }}</a>
                        @endif
                    </li>
                @endfor
            </ul>
        @endfor
    </div>
</div>
