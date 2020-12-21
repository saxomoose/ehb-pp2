
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="button"
                id="edit-button" class="btn btn-success inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Edit
        </button>
        <a href="{{route('document.delete', ['id' => $result['_id'], 'filename' => $result['_source']['file']['filename']])}}"
                class="btn btn-danger inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete
        </a>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <label class="block">
            <div class="panel panel-primary">
                <div class="panel-body">
                    @if ($message = Session::get('success-edit'))
                        <div class="alert alert-success alert-block ">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong><br> There were some problems with your
                            input.
                            <ul><br>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </label>
    </div>
    <div id="edit-form" style="display: none">
        <div class="container mx-auto px-32">
            <div class="py-12">
                <form action="{{ route('document.edit', ['id' => $result['_id']]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class=" p-8 bg-white overflow-hidden shadow-xl sm:rounded-lg border-8">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">
                                    <h1 class="text-2xl">Edit Document</h1><br>
                                </label>
                                <div
                                    class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <label class="block" for="title">
                                            <span class="text-gray-700">Title</span>
                                            <input class="form-input mt-1 block w-full" placeholder="{{$result['_source']['external']['title']}}" name="title"
                                                   value="{{ old('title')}}">
                                        </label>

                                        <label class="block">
                                            <span class="text-gray-700">Language</span>
                                            <select class="form-select block w-full mt-1" name="language">
                                                <option value="{{$result['_source']['external']['language']}}" selected hidden>{{$result['_source']['external']['language']}}</option>
                                                <option value="dutch">Dutch</option>
                                                <option value="french">French</option>
                                            </select>
                                        </label>

                                        <label class="block">
                                            <span class="text-gray-700">Date Published</span>
                                            <input class="form-input mt-1 block w-full" name="date"
                                                   type="date" value="{{$result['_source']['external']['date_published']}}">
                                        </label>

                                        <label class="block">
                                            <span class="text-gray-700">Issuer</span>
                                            <select class="form-select block w-full mt-1 " name="issuer">
                                                <option value="{{$result['_source']['external']['issuer']}}" selected hidden>{{$result['_source']['external']['issuer']}}</option>
                                                <option value="eu">EU</option>
                                                <option value="be">BE</option>
                                                <option value="vlaamsgewest">Vlaams Gewest</option>
                                                <option value="waalsgewest">Waals Gewest</option>
                                                <option value="brusselshoofdstedelijkgewest">Brussels Hoofdstedelijk Gewest
                                                </option>
                                                <option value="grondwettelijkhof">Grondwettelijk hof</option>
                                                <option value="hofvancassatie">Hof van cassatie</option>
                                                <option value="raadvanstaat">Raad van staat</option>
                                                <option value="hofvanberoep">Hof van beroep</option>
                                                <option value="arbeidshof">Arbeidshof</option>
                                                <option value="rechtbankvaneersteaanleg">Rechtbank van eerste aanleg
                                                </option>
                                                <option value="arbeidsrechtbank">Arbeidsrechtbank</option>
                                                <option value="ondernemingsrechtbank">Ondernemingsrechtbank</option>
                                                <option value="politierechtbank">Politierechtbank</option>
                                                <option value="vredegerecht">Vredegerecht</option>
                                            </select>
                                        </label>

                                        <label class="block">
                                            <span class="text-gray-700">Category</span>
                                            <select class="form-select block w-full mt-1" name="category">
                                                <option value="{{$result['_source']['external']['category']}}" selected hidden>{{$result['_source']['external']['category']}}</option>
                                                <option value="wetgeving">Wetgeving</option>
                                                <option value="rechtspraak">Rechtspraak</option>
                                                <option value="rechtsleer">Rechtsleer</option>
                                            </select>
                                        </label>

                                        <label class="block">
                                            <span class="text-gray-700">Tag</span>
                                            <select class="form-select block w-full mt-1" name="tag">
                                                <option value="{{$result['_source']['external']['tag']}}" selected hidden>{{$result['_source']['external']['tag']}}</option>
                                                <option value="auto">Auto</option>
                                                <option value="brand">Brand</option>
                                                <option value="leven">Leven</option>
                                                <option value="gezondheidszorgen">Gezondheidszorgen</option>
                                                <option value="rechtsbijstand">Rechtsbijstand</option>
                                                <option value="annulatie">Annulatie</option>
                                                <option value="bijstand">Bijstand</option>
                                                <option value="nvt">NVT</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                        class="btn btn-success inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

