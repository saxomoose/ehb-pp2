<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;

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
        return view('pages.query.create');
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
        //die($request);
        //dump(request()->all());
        //dump(request('es'));
        //dump(request('fire'));
        //dump(request('car'));

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

        //$query = Query::create()
        //            ->setParams($search);
        $query = new Query();
        $query->setParams($search);

        $response = $client->search($query->params);

        //return $response;
        $results = $response['hits']['hits'];
        //return $results;
        return view('pages.query.show', [
                            'hits' => $response['hits']['total'],
                            'results' => $results
                    ]);
        /*
        return view('pages.query.show', [
                            'hits' => $response['hits']['total'],
                            'id' => $response['hits']['hits'][0]['_id'],
                            'score' => $response['hits']['hits'][0]['_score'],
                            'content' => $response['hits']['hits'][0]['_source']['content'],
                    ]);
        */
        /*
        echo('totaal aantal resultaten: '.$response['hits']['total']);
  
          $indices = $response['hits']['hits'];
          foreach($indices as $index)
          {
              print_r($index['_source']['content']);
          }
        



                /*
        // Initialization
        $ch=curl_init();

        //$url='10.3.50.7:9200/_search?pretty';
        $url='10.3.50.7:9200/_search?pretty';
        $timeout=5;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json'
        ));

        // Get URL content
        $lines_string=curl_exec($ch);
        // Close handle to release resources
        curl_close($ch);
        // Output, you can also save it locally on the server
        echo $lines_string;
        */

        // source: https://kb.objectrocket.com/elasticsearch/how-to-use-the-search-api-for-the-elasticsearch-php-client-175
        //require __DIR__ . '/vendor/autoload.php';
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
