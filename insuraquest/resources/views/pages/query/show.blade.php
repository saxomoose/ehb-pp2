<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class=" p-8 bg-white overflow-hidden shadow-xl sm:rounded-lg border-8">
                <div>

                    <div class="container mt-2 col-md-12">
                            <h1 class="display-4">Total search results: {{ $hits }}</h1>
                            @forelse ($results as $result)
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container container-fluid">
                                    <h1 class="display-4">Doc id: {{ $result['_id'] }}</h1>
                                    <h1 class="display-4">Score: {{ $result['_score'] }}</h1>
                                    <hr class="my-4">
                                    @foreach ($result['highlight']['content'] as $highlight)
                                    <p class="lead">{!! $highlight !!}</p>
                                    @endforeach
                                    <div class="container col text-right">
                                        <a class="btn btn-primary btn-sm " href="{{route('document', ['id' => $result['_id']])}}" type="submit">Read the full document</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container container-fluid">
                                    <p class="lead">No relevant documents for your query</p>
                                </div>
                            </div>
                            @endforelse
                    </div>
                <div>
           </div>
        </div>
    </div>
</x-app-layout>
