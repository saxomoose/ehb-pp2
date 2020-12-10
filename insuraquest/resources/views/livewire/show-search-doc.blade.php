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
                <p> Select filters before quering search. Press shift to select multiple values. </p>

                <div class="form-row">
                     <div class="form-group col-auto">
                        <label  for="language[]">Language</label>
                        <select multiple="multiple"  class="selectpicker" name="language[]">
                            <option value="dutch">Dutch</option>
                             <option value="french">French</option>
                         </select>
                    </div>
                    <div class="form-group col-auto">
                        <label for="issuer[]">Issuer</label>
                        <select multiple = "multiple" class="selectpicker" name="issuer[]">
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
                 </div>
                <div class="form-row">
                    <div class="form-group col-auto">
                        <label for="category[]">Category</label>
                        <select multiple class="selectpicker" name="category[]">
                            <option value="wetgeving">Wetgeving</option>
                            <option value="rechtspraak">Rechtspraak</option>
                            <option value="rechtsleer">Rechtsleer</option>
                        </select>
                    </div>
                    <div class="form-group col-auto">
                        <label for="keyword[]">Keyword</label>
                        <select multiple class="selectpicker"  name="keyword[]">
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
</div>
@push('scripts')
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endpush
