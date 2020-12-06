<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\Str;

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
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        //die($request);
        //dump(request()->all());
        //dump(request('es'));
        //dump(request('leven'));
        //dump(request('Nederlands'));

        $search = request('es');
        $cb1 = request('leven');
        $cb2 = request('Nederlands');
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
        $query->setParams($search, $cb1, $cb2);

        $response = $client->search($query->params);

        $string = $response['hits']['hits'][0]['_source']['content'];

        $term = $search;

        $pos = strpos($string, $term);
        $before = Str::substr($string, ($pos -50), 50);

        $spacePos = strpos($before, ' ');
        $before = Str::substr($before, $spacePos+1);

        $output = '...' . $before . '<b>' .$term . '</b>' . Str::words(Str::after($string, $term), 10);
        
        return $output; 

        //return $response;
        
        /*
        echo('totaal aantal resultaten: '.$response['hits']['total']);
  
          $indices = $response['hits']['hits'];
          foreach($indices as $index)
          {
              print_r($index['_source']['content']);
          }
        
        return view('documents.show', ['document' => $response]); //te checken hoe deze structuur in elkaar zit!!!*/


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
