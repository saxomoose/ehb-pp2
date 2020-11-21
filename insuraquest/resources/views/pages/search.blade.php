<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Create compenent for search page --}}
                @can('isUser', App\Models\User::class)
                <p>You are authorized to view search page - IN PROGRESS</p>
    <!-- The Current User Can Create Posts -->
                @endcan
                @cannot('isUser', App\Models\User::class)
                <p>You are not authorized to view search page</p>
                @endcannot
            </div>
        </div>
    </div>
</x-app-layout>
