<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 2%">
                {{-- create component for doc detail page: FAQ, howto, ... --}}
                {{-- <x-jet-welcome /> --}}
                <p>Create documentation, FAQ's, ...</p>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 2%">
                <h1> Used resources </h1>
                <ul>
                    <li>https://laravel.com/ </li>
                    <li>https://getbootstrap.com/</li>
                    <li>https://jetstream.laravel.com/1.x/stacks/livewire.html#components</li>
                    <li>https://laravel-livewire.com/</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
