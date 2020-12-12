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
                    {{-- Create compenent for search page --}}
                    @push('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> @endpush

 <div>
    <form action="{{ route('documentsearch') }}" method="POST" enctype="multipart/form-data">
        @csrf
                <div class="form-row">
                     <div class="form-group col-auto">
                        <label for="searchtext">SEARCH FOR : </label>
                    </div>
                    <div class="form-group col-9">
                         <input type="text" class="form-control" name="searchtext" placeholder="Search for document...">
                    </div>
                </div>
                <div class = "form-row">
                    <div class="form-group col-auto">
                        <label  for="excludetext">EXCLUDE FROM SEARCH : </label>
                    </div>
                    <div class="form-group col-8">
                        <input type="text" class="form-control" name="excludetext" placeholder="Words to exclude from search">
                    </div>
                </div>
                <p> Select filters before quering search. </p>

                <div class="form-row">
                     <div class="form-group col-auto">
                        <label  for="language[]">Language</label>

                         <select multiple="multiple"  class="selectpicker" name="language[]">

                        @foreach($languages as $language )
                        <option value="{{ $language->name }}">{{ $language->value }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label for="issuer[]">Issuer</label>
                        <select multiple="multiple"  class="selectpicker" name="issuer[]">

                        @foreach($issuers as $issuer )
                        <option value="{{ $issuer->name }}">{{ $issuer->value }}</option>
                        @endforeach
                        </select>
                     </div>
                 </div>
                <div class="form-row">
                    <div class="form-group col-auto">
                        <label for="category[]">Category</label>
                        <select multiple="multiple"  class="selectpicker" name="category[]">

                        @foreach($categories as $category )
                        <option value="{{ $category->name }}">{{ $category->value }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label for="keyword[]">Keyword</label>
                        <select multiple="multiple"  class="selectpicker" name="keyword[]">

                        @foreach($keywords as $keyword )
                        <option value="{{ $keyword->name }}">{{ $keyword->value }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-auto">
                        <label for="date-from">Date published from</label>
                        <input type="date" class="form-control" name="date-from">
                        </div>
                        <div class="form-group col-auto">
                        <label for="date-until">Date until</label>
                        <input type="date" class="form-control" name="date-until">
                    </div>
                </div>
                <div class="form-row">
                    <button type="submit"
                        class="btn btn-success inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Search
                    </button>
                </div>
            </div>
            <div class="panel-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block ">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong><br> There were some problems with your input.
                        <ul><br>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                     </div>
                    @endif

    </form>
    @include('pages.query.show')
</div>
@push('scripts')
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endpush



                </div>
           </div>
        </div>
    </div>
</x-app-layout>
