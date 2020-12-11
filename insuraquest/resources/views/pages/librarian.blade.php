<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Librarian') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-32">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{-- create component for librarian page --}}
                    @can('isLibrarian', App\Models\User::class)
                    <p>You are authorized to view librarian page</p>
                    <!-- The Current User Can Upload files -->
                    @endcan
                    @cannot('isLibrarian', App\Models\User::class)
                    <p>You are not authorized to view librarian page</p>
                    @endcannot
                </div>
               

{{-- 
Velden die toegevoegd moeten worden aan de form en mogelijke waarden:
<> : html element -> voor de labels  ("title", "language", "date of publication", "issuer", "category", "keywords")
" " : name
[ ] : value
( ) : verplichte format 
 "title": <textarea>;
"language": <select><option>[Frans, Nederlands];
 "date_published": <input type="date"> (YYYY-MM-DD);
 "issuer": <select><option> [ EU, BE, Vlaams Gewest, Waals Gewest, Brussels Hoofdstedelijk Gewest, Grondwettelijk hof, Hof van cassatie, Raad van state, Hof van beroep, Arbeidshof, Rechtbank van eerste aanleg, Arbeidsrechtbank, Ondernemingsrechtbank, Politierechtbank, Vredegerecht];
 "category": <select><option>[wetgeving, rechtspraak, rechtsleer];
 "keyword": <select><option>[auto, brand, leven, gezondheidszorgen, rechtsbijstand, annulatie en bijstand, nvt] 
--}}

            </div>
        </div>

        <div class="py-12">            
            <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" p-8 bg-white overflow-hidden shadow-xl sm:rounded-lg border-8">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                <h1 class="text-2xl">File Upload</h1><br>
                            </label>
                            <div
                                class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">

                                    <label class="block" for="title">
                                        <span class="text-gray-700">Title</span>
                                        <input class="form-input mt-1 block w-full" placeholder="Title" name="title" value="{{ old('title')}}">
                                    </label>

                                    <label class="block">
                                        <span class="text-gray-700">Language</span>
                                        <select class="form-select block w-full mt-1 " name="languages" id="languages">
                                        
                                        @foreach($languages as $language )
                                        <option value="{{ $language->name }}">{{ $language->value }}</option>
                                        @endforeach
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span class="text-gray-700">Date Published</span>
                                        <input class="form-input mt-1 block w-full" placeholder="" name="date" type="date">
                                    </label>

                                    <label class="block">
                                        <span class="text-gray-700">Issuer</span>
                                        
                                        <select class="form-select block w-full mt-1 " name="issuer" id="issuer">
                                       
                                        @foreach($issuers as $issuer )
                                        <option value="{{ $issuer->name }}">{{ $issuer->value }}</option>
                                        @endforeach
                                        </select>
                                    </label>

                                    <label class="block">
                                    <span class="text-gray-700">Category</span>
                                        
                                        <select class="form-select block w-full mt-1 " name="categories" id="categories">
                                       
                                        @foreach($categories as $category )
                                        <option value="{{ $category->name }}">{{ $category->value }}</option>
                                        @endforeach
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span class="text-gray-700">Keyword</span>
                                        <select class="form-select block w-full mt-1 " name="keyword" id="keyword">
                                       
                                        @foreach($keywords as $keyword )
                                        <option value="{{ $keyword->name }}">{{ $keyword->value }}</option>
                                        @endforeach
                                        </select>
                                    </label>

                                    <label class="block">

                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                        <div class="panel panel-primary">
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

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="file" name="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <p class="text-xs text-gray-500">
                                                pdf up to 2048kb
                                            </p>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="btn btn-success inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Upload
                            </button>
                        </div>
                    </div>
            </form>

</x-app-layout>
