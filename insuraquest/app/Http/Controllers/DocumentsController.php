<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use Illuminate\Session\Store;

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
     * @param Store $session
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
                            '_id' => $id
                    ]
                ]
            ]
        ];

        $response = $client->search($params);
        $result = $response['hits']['hits'][0];

        return view('pages.document.show', ['result' => $result]);


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
