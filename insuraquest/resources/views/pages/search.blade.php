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
                    <form action="{{ route('documentsearch') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class=container>
                            <div class="form-row">
                                <div class="form-group col-8">
                                    <input type="text" class="form-control" name="searchtext" placeholder="Search for document...">
                                </div>
                                <div class="form-group col">
                                    <button type="submit"
                                    class="btn btn-success inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Search
                                    </button>
                                </div>
                            </div>
                            <p> Select filters before quering search. Press shift to select multiple values. </p>

                            <div class="form-row">
                                <div class="form-group col-auto">
                                    <label for="language[]">Language</label>
                                    <select multiple="multiple" class="form-control" name="language[]" size=2>
                                        <option selected></option>
                                        <option value="dutch">Dutch</option>
                                        <option value="french">French</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-auto">
                                    <label for="issuer[]">Issuer</label>
                                    <select multiple class="form-control" name="issuer[]" size=2>
                                        <option selected></option>
                                        <option value="eu">EU</option>
                                        <option value="be">BE</option>
                                        <option value="vlaamsgewest">Vlaams Gewest</option>
                                        <option value="waalsgewest">Waals Gewest</option>
                                        <option value="brusselshoofdstedelijkgewest">Brussels Hoofdstedelijk Gewest</option>
                                        <option value="grondwettelijkhof">Grondwettelijk hof</option>
                                        <option value="hofvancassatie">Hof van cassatie</option>
                                        <option value="raadvanstaat">Raad van staat</option>
                                        <option value="hofvanberoep">Hof van beroep</option>
                                        <option value="arbeidshof">Arbeidshof</option>
                                        <option value="rechtbankvaneersteaanleg">Rechtbank van eerste aanleg</option>
                                        <option value="arbeidsrechtbank">Arbeidsrechtbank</option>
                                        <option value="ondernemingsrechtbank">Ondernemingsrechtbank</option>
                                        <option value="politierechtbank">Politierechtbank</option>
                                        <option value="vredegerecht">Vredegerecht</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-auto">
                                    <label for="category[]">Category</label>
                                    <select multiple class="form-control" name="category[]" size=2>
                                        <option selected></option>
                                        <option value="wetgeving">Wetgeving</option>
                                        <option value="rechtspraak">Rechtspraak</option>
                                        <option value="rechtsleer">Rechtsleer</option>
                                    </select>
                                 </div>
                                 <div class="form-group col-auto">
                                    <label for="keyword[]">Keyword</label>
                                    <select multiple class="form-control"  name="keyword[]" size=2>
                                        <option selected></option>
                                        <option value="auto">Auto</option>
                                        <option value="brand">Brand</option>
                                        <option value="leven">Leven</option>
                                        <option value="gezondheidszorgen">Gezondheidszorgen</option>
                                        <option value="rechtsbijstand">Rechtsbijstand</option>
                                        <option value="annulatie">Annulatie</option>
                                        <option value="bijstand">Bijstand</option>
                                        <option value="nvt">NVT</option>
                                    </select>
                                 </div>
                                <div class="form-group col-auto">
                                    <label for="date-from">Date published from</label>
                                    <input type="date" class="form-control" name="date-from">
                                </div>
                                <div class="form-group col-auto">

                                    <label for="date-until">Date until</label>
                                    <input type="date" class="form-control" name="date-until">
                                </div>
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
                        </div>
                    </form>
                    @if ($r = Session::get('result'))
                <div >
                    @foreach($r as $item)
                    <p>
                    {{$item}}</p>
                    @endforeach

                </div>
            @endif
                </div>
            </div>


            </div>
        </div>
    </div>
</x-app-layout>
