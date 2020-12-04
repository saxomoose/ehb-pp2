<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- create compenent for admin page --}}
                {{-- TO DO :: create filter for admin to quickly see guests --}}

                {{-- rendert insuraquest/resources/livewire/search-users-blade.php --}}
                @livewire('search-users')


            </div>
        </div>
    </div>
</x-app-layout>
