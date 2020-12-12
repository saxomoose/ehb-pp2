@isset($results)
<div class="mt-2 px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
    <h3>Total search results: {{ $hits }}</h3>
    @forelse ($results as $result)
    <div class="jumbotron jumbotron-fluid" style="padding: 10px">

            <h5 class="display-8">{{ $result['_source']['external']['title'] }}</h5>
            <span class="d-block p-0.1 text-right">id: {{ $result['_id'] }}</span>
            <span class="d-block p-0.1 text-right">score: {{ $result['_score'] }}</span>
            <hr>
            @foreach ($result['highlight']['content'] as $highlight)
            <p>{!! $highlight !!}</p>
            @endforeach
            <div class="container col text-right">
                <a class="btn btn-primary btn-sm " href="{{route('document', ['id' => $result['_id']])}}"
                    type="submit">Read the full document</a>
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
