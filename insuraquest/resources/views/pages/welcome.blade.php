<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>InsuraQuest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

         <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

        @livewireStyles
        @stack('styles')

    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-blue-100">

            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    {{-- Logo --}}
                    <div class="row px-6 py-4">
                        <x-jet-application-mark class="h-200 w-auto" /> &emsp;

                    {{-- Login - Register - Dashboard opties --}}
                        @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 underline">Login</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-gray-700 underline">Register</a>
                            @endif
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" p-8 bg-white overflow-hidden shadow-xl sm:rounded-lg border-8">
                        {{-- Titel --}}
                        <h1 class="text-center">InsuraQuest</h1><hr>
                        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
                            The easy-to-use search engine application for all your insurance documents,
                            <br>based on the algorythms of the Elasticsearch framework.
                        </h2>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="flex fixed fixed-bottom">
                  <span class="text-muted">© 2020 Erasmus Hogeschool Brussel.  ~ Made by Mathieu Tulpinck, Olivier Thas, Elias Joostens, Bart Tassignon and Maaike Dupont ~ </span>
                </div>
            </footer>
        </div>

    </body>
</html>
