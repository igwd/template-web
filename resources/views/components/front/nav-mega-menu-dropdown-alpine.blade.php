<div
    x-bind:id="'mega-'+navbar.slug" 
    x-data="{ toggled : false, openid:null}" 
    x-init="
        window.addEventListener('megaMenuToggled', (event) => {
            toggled = event.detail.open;
            openid = event.detail.id;
        });"   
    class="w-full bg-white border-gray-200 shadow-sm border-y dark:bg-gray-800 dark:border-gray-600 absolute z-50">
    <div x-show="toggled && openid === 'mega-'+navbar.slug"
        class="grid max-h-96 overflow-y-auto md:overflow-hidden md:max-w-screen-xl px-4 py-5 mx-auto text-sm text-gray-500 dark:text-gray-400 md:grid-cols-3 md:px-6">
        <template x-for='(item, index) in navbar.children' :key="index">
            <template x-if="index % 4 === 0">
                <ul class="mb-4 space-y-4 md:mb-0 md:block" x-bind:aria-labelledby="'mega-'+navbar.slug">
                    <template x-for='(subItem, subIndex) in Array.from({ length: 4 }).map((_, i) => navbar.children[index + i]).filter(Boolean)' :key="subIndex">
                        <li>
                            <a x-bid:href="navbar.link" class="hover:cursor-pointer hover:underline hover:text-blue-600 dark:hover:text-blue-500" x-text="subItem.name">
                        </li>
                    </template>
                </ul>
            </template>
        </template>
    </div>
</div>