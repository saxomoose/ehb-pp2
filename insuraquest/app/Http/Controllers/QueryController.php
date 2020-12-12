<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use App\Models\Language;
use App\Models\Issuer;
use App\Models\Category;
use App\Models\Tag;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::get();
        $issuers = Issuer::get();
        $categories = Category::get();
        $keywords = Tag::get();

        return view('pages.query.create', [
                'languages' => $languages,
                'issuers' => $issuers,
                'categories' => $categories,
                'keywords' => $keywords
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Query $query)
    {
        $this->validate($request, [
            'searchtext' => 'required',
        ], [
            'searchtext.required' => 'You need to enter some text or a word to search for.',

        ]);

        //Create variables coming from the http request
            //dump(request()->all());
        //fill searchform
        $language = Language::get();
        $issuer = Issuer::get();
        $categorie = Category::get();
        $keyword = Tag::get();

        $search = request('searchtext');
        $exclude = request('excludetext');
        $languages = request('language');
        $issuers = request('issuer');
        $categories = request('category');
        $tags = request('tag');

        //Configure extended host for client
        $hosts = [
            'host' => '10.3.50.7',
            'port' => '9200',
            'scheme' => 'http', // other option: 'https'
            //'user' => 'username', // relevant when using https
            //'pass' => 'password', // relevant when using https
        ];

        $client = ClientBuilder::create() // Instantiate a new ClientBuilder
                    ->setHosts($hosts) // Set the hosts
                    ->build(); // Build the client object

        $query = new Query(); // Instantiate a new Query
        $query->setParams($search, $exclude, $languages, $issuers, $categories, $tags); // Set search parameters

        $response = $client->search($query->params);
        //print_r($query->params);
        //dump($response);

        return view('pages.query.create', [
                            'hits' => $response['hits']['total'],
                            'results' => $response['hits']['hits'],
                            'languages' => $language,
                'issuers' => $issuer,
                'categories' => $categorie,
                'keywords' => $keyword
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit(Query $query)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Query $query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(Query $query)
    {
        //
    }
}
