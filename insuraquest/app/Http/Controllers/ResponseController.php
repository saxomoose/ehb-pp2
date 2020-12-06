<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

class ResponseController extends Controller
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
        return view('pages.response.create');
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
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //die($request);
        dump(request()->all());
        dump(request('es'));
        dump(request('fire'));
        dump(request('car'));

        $search = request('es');
        $cb1 = request('fire');
        $cb2 = request('car');
        //dump($search);
        
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
                        'content' => $search
                    ]
                ]
            ]
        ];
        $response = $client->search($params);

        return $response;

        //Response::create($params);*/
/*
        echo('totaal aantal resultaten: '.$response['hits']['total']);
  
          $indices = $response['hits']['hits'];
          foreach($indices as $index)
          {
              print_r($index['_source']['content']);
          }
  
          return view('documents.show', ['document' => $response]); //te checken hoe deze structuur in elkaar zit!!!*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
