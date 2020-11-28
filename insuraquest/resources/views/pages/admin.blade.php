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
<<<<<<< HEAD
                {{-- TO DO :: create filter for admin to quickly see guests --}}
=======
>>>>>>> 8dfc59c82716c160f55291ea34ec1ba5d36b56fb
                @can('isAdmin', App\Models\User::class)

                @livewire('search-users')

                @endcan
                @cannot('isAdmin', App\Models\User::class)
                <p>You are not authorized to view admin page</p>
                @endcannot

            </div>
        </div>
    </div>
</x-app-layout>
