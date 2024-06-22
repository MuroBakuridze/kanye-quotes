<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 bg-white shadow-md rounded-lg">
                <div class="text-xl font-semibold mb-4">
                    {{ __("You're logged in!") }}
                </div>
                <x-nav-link 
                    :href="route('quotes.index')" 
                    :active="request()->routeIs('quotes.index')" 
                    class="inline-block px-6 py-3 text-white bg-blue-500 rounded-lg hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300"
                >
                    {{ __('Go To Quotes Page') }}
                </x-nav-link>
            </div>
            
        </div>
    </div>
</x-app-layout>
