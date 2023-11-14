<li x-data="{ megaMenuOpen: false }" class="flex items-center">
    @if(count($navitem['children']))
        <a href="javascript:void(0)"
            x-on:click.away="megaMenuOpen = !megaMenuOpen"
            x-on:click="toggleChildComponent('mega-{{$navitem['slug']}}')"
            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
            <span>{{$navitem['name']}}</span>
            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
        </a>
    @else
        <a href="{{url($navitem['link'])}}"
            class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
            wire:navigate>
            {{$navitem['name']}}
        </a>    
    @endif
    <script>
        function toggleChildComponent(id) {
            // Ubah nilai variabel pada komponen child
            this.megaMenuOpen = !this.megaMenuOpen;
            // Dispar (dispatch) event ke parent component dengan pesan 'megaMenuToggled', kirim id mega menu yg ditampilkan
            if(this.megaMenuOpen) {
                window.dispatchEvent(new CustomEvent('megaMenuToggled', { detail: { open: true, id:id } }));
            } else {
                window.dispatchEvent(new CustomEvent('megaMenuToggled', { detail: { open: false, id:id } }));
            }
        }
    </script>
</li>
