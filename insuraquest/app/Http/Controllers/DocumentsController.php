<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

class DocumentsController extends Controller
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
        //
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
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $hosts = [
          'host' => '10.3.50.7',
          'port' => '9200',
          'scheme' => 'http',
          ];

        $client = ClientBuilder::create()
        ->setHosts($hosts)
        ->build();

        $params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'match' => [
                        'content' => 'specifieke verzekering levensverzekering'
                    ]
                ]
            ]
        ];

        $response = $client->search($params);
        echo('totaal aantal resultaten: '.$response['hits']['total']);

        $indices = $response['hits']['hits'];
        foreach($indices as $index)
        {
            print_r($index['_source']['content']);
        }

        return view('documents.show', ['document' => $response]); //te checken hoe deze structuur in elkaar zit!!!


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
