<x-app-layout>
    @push('styles')
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js">
        </script>
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js">
        </script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" p-8 bg-white overflow-hidden shadow-xl sm:rounded-lg border-8">
                <div style="margin: 20px">
                    <div>
                        <form action="{{ route('documentsearch') }}" method="GET" enctype="multipart/form-data">
                            @csrf
                            @if (count($errors) > 0)
                            <div class="form-row">
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <div class="form-row" style="display: flex">
                                    <label style="padding: .4em" for="searchtext">SEARCH FOR : </label>
                                    <input type="text" class="form-control" style="flex: 1" name="searchtext"
                                        placeholder="Search for document..." value="{{ old('searchtext')}}">
                            </div>
                            <div class="form-row" style="display: flex">
                                    <label for="excludetext" style="padding: .4em" >EXCLUDE FROM SEARCH : </label>
                                    <input type="text" class="form-control" style="flex: 1" name="excludetext"
                                        placeholder="Words to exclude from search" value="{{ old('excludetext')}}">
                            </div>
                            <p><i> Select filters before quering search.</i> </p>

                            <div class="form-row">
                                <div class="form-group col-auto">
                                    <label for="language[]">Language</label>
                                    <select multiple="multiple" class="selectpicker" name="language[]"
                                        value="{{ old('language[]')}}">
                                        @foreach($languages as $language )
                                            <option value="{{ $language->name }}"
                                            {{in_array($language->name, old("language") ?: []) ? "selected": ""}}>
                                            {{ $language->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-auto">
                                    <label for="issuer[]">Issuer</label>
                                    <select multiple="multiple" data-size="5" class="selectpicker" name="issuer[]">
                                        @foreach($issuers as $issuer )
                                            <option value="{{ $issuer->name }}"
                                            {{in_array($issuer->name, old("issuer") ?: []) ? "selected": ""}}>
                                            {{ $issuer->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto">
                                    <label for="category[]">Category</label>
                                    <select multiple="multiple" class="selectpicker" name="category[]">
                                        @foreach($categories as $category )
                                            <option value="{{ $category->name }}"
                                            {{in_array($category->name, old("category") ?: []) ? "selected": ""}}>
                                            {{ $category->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-auto">
                                    <label for="keyword[]">Keyword</label>
                                    <select multiple="multiple" data-size="5" class="selectpicker" name="keyword[]">
                                        @foreach($keywords as $keyword )
                                            <option value="{{ $keyword->name }}"
                                            {{in_array($keyword->name, old("keyword") ?: []) ? "selected": ""}}>
                                            {{ $keyword->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto">
                                    <label for="date-from">Date published from</label>
                                    <input type="date" class="form-control" name="date-from"
                                        value="{{ old('date-from')}}">
                                </div>
                                <div class="form-group col-auto">
                                    <label for="date-until">Date until</label>
                                    <input type="date" class="form-control" name="date-until"
                                        value="{{ old('date-until')}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-auto" style="align-content: space-around">
                                    <button type="submit" style="align-items: flex-end"
                                        class="btn btn-success inline-flex  py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Search
                                    </button>
                                </div>
                                <div class="form-group col-auto" style="align-content: space-around">
                                    <a href="{{ Route('search')}}" role="button" style="align-items: flex-end"
                                        class="btn btn-warning inline-flex  py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Clear form
                                    </a>
                                </div>
                            </div>
                        </form>
                         @isset($results)
                        <?php
                        $collection = (new App\View\Components\Collection($results))->paginate(2);
                        ?>
                        {{ $collection->links()}}
                        @endisset
                        @include('pages.query.show')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    @endpush
</x-app-layout>
