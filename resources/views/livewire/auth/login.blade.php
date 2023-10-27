<div>
    <div class="flex items-center min-h-screen bg-gray-50">
        <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
            <div class="flex flex-col md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img class="object-cover w-full h-full bg-cover bg-left" src="{{asset('img/slider-1.jpg')}}"
                        alt="img" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-2xl font-bold text-center text-gray-700">
                            Login to Your Account {{$messages}}
                        </h1>
                        <div>
                            <label class="block text-sm">
                                Email {{$email}}
                            </label>
                            <input type="email"
                                class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                placeholder="" wire:model.lazy="email"/>
                        </div>
                        <div>
                            <label class="block mt-4 text-sm">
                                Password
                            </label>
                            <input
                                class="w-full px-4 py-2 text-sm border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                placeholder="" type="password" wire:model="password"/>
                        </div>
                        <button type="button" wire:click="doLogin"
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            Log in
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>