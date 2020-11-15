<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Behind the scenes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- create component for doc detail page: FAQ, howto, ... --}}
                {{-- <x-jet-welcome /> --}}
                <p>Create team-page, story on how this application was made, some fun trivia,  ...</p>
            </div>
        </div>
    </div>
</x-app-layout>
