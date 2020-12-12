@isset($results)
                    <div class="container mt-2 col-md-12">
                            <h1 class="display-6">Total search results: {{ $hits }}</h1>
                            @forelse ($results as $result)
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container container-fluid">
                                    <h1 class="display-8">{{ $result['_source']['external']['title'] }}</h1>
                                    <span class="d-block p-0.1 text-right">id: {{ $result['_id'] }}</span>
                                    <span class="d-block p-0.1 text-right">score: {{ $result['_score'] }}</span>
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

@endisset
