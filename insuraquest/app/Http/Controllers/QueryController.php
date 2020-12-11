<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use App\Models\Language;
use App\Models\Issuer;
use App\Models\Category;
use App\Models\Keyword;

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
        $keywords = Keyword::get();
        
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
    public function show(Query $query)
    {
        //Create variables coming from the http request
            //dump(request()->all());
        $search = request('searchtext');
        $exclude = request('excludetext');
            //$cb1 = request('leven');
            //$cb2 = request('Nederlands');
            //$arr = [[ 'match' => [ 'external.tag' => $cb1 ] ], [ 'match' => [ 'external.language' => $cb2 ] ]];
            //$languages = request('language');
            //$languages = [ 'dutch', 'french' ];
        $languages = [ 'dutch' ];
            /*         $arr = [];
            if ($languages != null)
            {
                foreach($languages as $key => $value)
                {
                    array_push($arr, [ 'match' => [ 'external.language' => $value ] ]);
                }
            } */
            //print_r($languages);
            //print_r($arr);

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
        $query->setParams($search, $languages, $exclude); // Set search parameters

        $response = $client->search($query->params);

        print_r($query->params);

        //dump($response);
        return view('pages.query.show', [
                            'hits' => $response['hits']['total'],
                            'results' => $response['hits']['hits']
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
