<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding: 2%">
                {{-- tab titels --}}
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general"
                            role="tab" aria-controls="nav-general" aria-selected="true">General</a>
                        <a class="nav-item nav-link" id="nav-search-tab" data-toggle="tab" href="#nav-search" role="tab"
                            aria-controls="nav-search" aria-selected="false">Search</a>
                        @can('isLibrarian', App\Models\User::class)<a class="nav-item nav-link" id="nav-upload-tab"
                            data-toggle="tab" href="#nav-upload" role="tab" aria-controls="nav-upload"
                            aria-selected="false">Upload files</a>@endcan
                        @can('isAdmin', App\Models\User::class)<a class="nav-item nav-link" id="nav-user-tab"
                            data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user"
                            aria-selected="false">User administration</a>@endcan
                    </div>
                </nav>
                {{-- tab contents --}}
                <div class="tab-content" id="nav-tabContent">
                    {{-- tab General  --}}
                    <div class="tab-pane fade show active" id="nav-general" role="tabpanel"
                        aria-labelledby="nav-general-tab">
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Wat is InsuraQuest? </h2>
                                    <p>Dossierbeheerders en juristen willen snel relevante informatie vinden om hun argumentatie te onderbouwen. De benodigde documentatie is enerzijds zeer specifiek, anderzijds is het tijdsrovend om alle documenten in te lezen en te evalueren.</p> 
                                    <p>InsuraQuest laat toe om net die eigen bibliotheek op te bouwen en er vervolgens snel en efficiënt de voor jou relevante informatie terug te vinden.</p>
                                    <p>Beschouw het als je eigen Google zoekmachine voor je eigen documentatiecentrum!</p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Werking in het kort </h2>
                                <p>Een document wordt opgeladen naar een server locatie. Een toepassing genaamd FSCrawler detecteert nieuwe documenten, parsed de inhoud in json formaat, en stelt die ter beschikking van Elasticsearch. Die json wordt in Elasticsearch als een nieuw document geïndexeerd. 
                                <p>Elasticsearch is een krachtige zoekmachine die in functie van jouw zoekcriteria de meest relevante documenten kan ophalen. Bij elke zoekopdracht wordt een score toegekend en de hoogste score krijg je als eerste te zien.</p>    
                                <p>Meer weten? Technische informatie vind je <a href="https://github.com/mathieu-tulpinck/insuraquest">hier</a>.</p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2>Ik wil een nieuw document opladen of labels van een bestaand document aanpassen.</h2>
                                <p>Ga naar de tab "Upload files" in het menu. Zie je die niet staan, heb je vast niet de nodige rechten.</p>
                                <p>Denk je dat je deze acties moet kunnen uitvoeren, neem dan contact op met de administrator.</p>
                            </div>
                        </div>
                    </div>
                    {{-- tab Search  --}}
                    <div class="tab-pane fade" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2>Hoe zoek ik een document?</h2>
                                <p class="p-2">Op de zoekpagina vind je een aantal velden terug waarmee je je zoekopdracht kan verfijnen.</p>
                                    <ul class="pl-4 list-disc">
                                        <b>Verplichte velden:</b>
                                        <li>Search for: geef hier je trefwoord(en) die je document moeten bevatten. Vb. Brussel. </li>
                                        <br/>
                                        <b>Optionele parameters (meedere opties tegelijk mogelijk): </b>
                                        <li>Exclude from search: geef hier je trefwoorden in die <b>niet</b> mogen
                                            voorkomen in de zoekresultaten.</li>
                                        <li>Language: de taal waarin het document is opgesteld</li>
                                        <li>Issuer: de instantie die het document heeft opgesteld: Europese Unie, Federale overheid, ...</li>
                                        <li>Category: behoort het document tot wetgeving, rechtspraak of rechtsleer</li>
                                        <li>Keyword: het type verzekering waarover het document verteld. vb. brand</li>
                                        <li>Date published from: de datum vanaf wanneer het document werd gepubliceerd</li>
                                        <li>Date published until: de datum tot en met wanneer het document werd gepubliceerd</li>
                                    </ul>
                                    <br/>
                                    <p>De zoekresultaten worden getoond in volgorde van relevantie. De relevantie hangt af van de trefwoorden en de geselecteerde opties.</p>
                                    <p>Wat betreft de opties Language, Issuer, Category en Keyword is het niet verplicht dat alle opties geldig moeten zijn voor elk document. De betrokken zoekresultaten zullen enkel hoger in de lijst komen te staan (lees: hogere score hebben). De parameters worden gezocht volgens de logica : optie of optie of optie.</p>
                                    <p>De velden "Search for", "Exclude from search" en "Date published" filteren de zoekresultaten daarentegen</p>
                            </div>
                        </div>
                    </div>
                    {{-- tab Upload files --}}
                    <div class="tab-pane fade" id="nav-upload" role="tabpanel" aria-labelledby="nav-upload-tab">
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Hoe voeg ik een document toe aan de bibliotheek? </h2>
                                <p>
                                    In de navigatiebalk bovenaan, vind je een knop 'Upload file'.
                                    Wanneer je hierop klikt, dan kom je terecht op het formulier waar je een nieuw document kan uploaden.
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Hoe wijzig ik de tags van een document? </h2>
                                <p>
                                    Zoek eerst het document op via de 'Search' pagina.
                                    Wanneer je het document openklikt, krijg je onderaan de knop 'edit' te zien, waarmee je een formulier opent om de tags te wijzigen.
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Hoe verwijder ik een document? </h2>
                                <p>
                                    Zoek eerst het document op via de 'Search' pagina.
                                    Wanneer je het document openklikt, krijg je onderaan de knop 'delete' te zien, waarmee je het document verwijderd.
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- tab User administration --}}
                    <div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Waar vind ik de gebruikers terug? </h2>
                                <p>
                                    In de navigatiebalk bovenaan, vind je een knop 'User administration'.
                                    Wanneer je hierop klikt, kom je terecht op het overzicht van alle gebruikers.
                                    Gebruik de navigatieknoppen onderaan, om naar de volgende pagina te gaan.
                                    <br/>
                                    Bovenaan in de zoekbalk kan je ook filteren op de gebruikers. Geef een woord of letter in
                                    om te filteren op 'naam', 'voornaam', 'e-mailadres' of 'type'.
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Hoe zie ik welk type een gebruiker heeft? </h2>
                                <p>
                                    Wanneer je in het overzicht van de gebruikers kijkt bij de betreffende gebruiker,
                                    zie je langs de rechterzijde verschillende knoppen met types. De knop die ingekleurd is, duidt het type van de gebruiker aan.
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Wat betekenen de verschillende types ? </h2>
                                <p>
                                    Iemand die zich nieuw aanmeldt, krijgt automatisch het type guest.
                                    Dit type kan nog geen zoekopdrachten uitvoeren. De ingelogde gebruiker kan echter wel het dashboard,
                                    de documentatie en de teampage bekijken. De overige pagina's zijn verborgen.
                                    <br/>
                                    Een gebruiker die het type ‘user’ krijgt, kan gebruik maken van de ‘Search’ pagina.
                                    Hij kan dus zoekopdrachten doen naar de documenten in de bibliotheek en deze ook bekijken.
                                    Daarnaast kan hij de documenten ook doormailen.
                                    <br/>
                                    Een gebruiker die het type ‘librarian’ krijgt, kan gebruik maken de ‘Librarian’ pagina.
                                    Op deze pagina kan een nieuw document worden toegevoegd aan de bibliotheek.
                                    Bij het toevoegen van het document, dient ook de additionele informatie over het
                                    document te worden aangevuld.
                                    Ook de functies van een 'user' zijn beschikbaar.
                                    <br/>
                                    Een gebruiker die het type ‘admin’ krijgt kan naast de pagina’s die de ‘guest’, 'user' en 'librarian'
                                    te zien krijgt, ook nog de ‘Admin’ pagina bekijken. Op deze pagina worden alle
                                    gebruikers van de applicatie vermeld: zowel de gebruikers met type ‘guest’,
                                    ‘user’, ‘librarian’ als ‘admin’.
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Hoe wijzig ik het type een gebruiker ? </h2>
                                <p>
                                    Wanneer je in het overzicht van de gebruikers kijkt bij de betreffende gebruiker,
                                    zie je langs de rechterzijde verschillende knoppen met types. De knop die ingekleurd is, duidt het type van de gebruiker aan.
                                    Klik op de knop van het gewenste type om de gebruiker dit type toe te kennen.
                                    De kleur van de knop zal wijzigen, dit wil zeggen dat je wijzigingen zijn doorgevoerd.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>




                {{-- <h1> Used resources </h1>
                <ul>
                    <li>https://laravel.com/ </li>
                    <li>https://getbootstrap.com/</li>
                    <li>https://jetstream.laravel.com/1.x/stacks/livewire.html#components</li>
                    <li>https://laravel-livewire.com/</li>
                    <li><a href="https://www.itsolutionstuff.com/post/laravel-8-file-upload-example-tutorialexample.html">Laravel 8 file upload tutorial</a></li>
                    <li>https://gist.github.com/simonhamp/549e8821946e2c40a617c85d2cf5af5e</li>
                </ul> --}}
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>@endpush
</x-app-layout>
