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
    // Show the form to create a new query
    public function create()
    {
        return view('pages.query.create', [
                        'languages' => Language::all(),
                        'issuers' => Issuer::all(),
                        'categories' => Category::all(),
                        'keywords' => Tag::all(),
                        ]);
    }

    //
    public function show(Request $request)
    {
        // Searchtext field is required
        $this->validate($request, [
            'searchtext' => 'required'], [
            'searchtext.required' => 'You need to enter some text or a word to search for.'
        ]);

        // Configure extended host for client
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
        $query->setParams(); // Set search parameters

        $response = $client->search($query->params);
        //print_r($query->params);
        //dump($response);

        $request->flash();

        return view('pages.query.create', [
                        'languages' => Language::all(),
                        'issuers' => Issuer::all(),
                        'categories' => Category::all(),
                        'keywords' => Tag::all(),
                        'hits' => $response['hits']['total'],
                        'results' => $response['hits']['hits']
                        ]);
    }

}
