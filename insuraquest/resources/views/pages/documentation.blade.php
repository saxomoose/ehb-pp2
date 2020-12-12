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
                                <p>
                                    InsuraQuest kan je vergelijken met een bibliotheek, waarin je snel en gemakkelijk de
                                    voor jou relevante documenten kan terugvinden.
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Hoe werkt het? </h2>
                                <p>
                                    In het kort: documenten worden opgeladen naar een map.
                                    Een applicatie genaamd FSCrawler indexeert alles die in deze map staat,
                                    zodat we het document later terug kunnne ophalen, en voegt het document toe aan
                                    ElasticSearch.
                                    Zoals de naam verklapt, zorgt ElasticSearch ervoor dat je documenten terug kan gaan
                                    opzoeken.
                                    Meer zelfs, de kracht van Elastic Search is dat hij aan alle documenten een score
                                    zal toekennen,
                                    zodat jij de documenten te zien krijgt die voor jouw zoekopdracht het meest relevant
                                    zijn.
                                    Een beetje zoals Google werkt dus!
                                    <br />
                                    Meer weten? LINK GITHUB!
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Ik wil de tags bij een document editen of een nieuw document uploaden. </h2>
                                <p>
                                    Om een document te kunnen uploaden, of de bijhorende tags te editen, heb je de
                                    juiste rechten nodig.
                                    Zie je bovenaan in de navigatiebalk niet 'Upload file' staan, dan heb je dit recht
                                    niet.
                                    Denk je dat je dit toch zou moeten kunnen, neem dan contact op met de admin.
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- tab Search  --}}
                    <div class="tab-pane fade" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">
                        <div class="mt-2 flex px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1">
                                <h2> Hoe zoek ik een document? </h2>
                                <p>
                                    Op de zoekpagina vind je een aantal velden terug waarmee je je zoekopdracht kan
                                    verfijnen.
                                    <ul>
                                        <li><b>Verplichte velden:</b></li>
                                        <li>Search for: hierin geef je je trefwoord in waarop je wenst te zoeken. vb.
                                            Brussel. </li>
                                        <li><b>Optionele parameters:</b></li>
                                        <li>Exclude from search: hierin geef je de trefwoorden in die <b>niet</b> mogen
                                            voorkomen in de zoekresultaten.</li>
                                        <li>Language: de taal waarin het document is opgesteld</li>
                                        <li>Issuer: de instantie die het document heeft opgesteld</li>
                                        <li>Category: de categorie waartoe het document behoort</li>
                                        <li>Keyword: het soort van tak waartoe het document behoort. vb. brand</li>
                                        <li>Date published from: de datum vanaf wanneer het document werd gepubliceerd
                                        </li>
                                        <li>Date until: de datum tot en met wanneer het document werd gepubliceerd</li>
                                    </ul>
                                </p>
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
