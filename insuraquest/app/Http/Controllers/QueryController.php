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
        //dump(request()->all());
        $search = request('searchtext');
        $exclude = request('excludetext');
        //$cb1 = request('leven');
        //$cb2 = request('Nederlands');
        //$arr = [[ 'match' => [ 'external.tag' => $cb1 ] ], [ 'match' => [ 'external.language' => $cb2 ] ]];
        //$languages = request('language');
        //$languages = [ 'dutch', 'french' ];
        $languages = [ 'Nederlands' , 'french'];
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

        $hosts = [
            'host' => '10.3.50.7',
            'port' => '9200',
            'scheme' => 'http',
            ];

        $client = ClientBuilder::create()
                    ->setHosts($hosts)
                    ->build();

        $query = new Query();
        $query->setParams($search, $languages, $exclude);

        $response = $client->search($query->params);

        print_r($query->params);

        //dump($response);
        //dump($response['hits']['hits'][0]['highlight']['content']);
        $results = $response['hits']['hits'];
        //dump($results);
        return view('pages.query.show', [
                            'hits' => $response['hits']['total'],
                            'results' => $results
                    ]);

/*
        //*Example based on libcurl, a library created by Daniel Stenberg, that allows you to connect and communicate to many different types of servers
        //*with many different types of protocols. libcurl currently supports the http, https, ftp, gopher, telnet, dict, file, and ldap protocols. 
        //*libcurl also supports HTTPS certificates, HTTP POST, HTTP PUT, FTP uploading (this can also be done with PHP's ftp extension), 
        //*HTTP form based upload, proxies, cookies, and user+password authentication.
        //*We, however, will use the Elasticsearch-PHP API, with predefined fuction specific for Elasticsearch.

        // source: https://kb.objectrocket.com/elasticsearch/how-to-use-the-search-api-for-the-elasticsearch-php-client-175
        //require __DIR__ . '/vendor/autoload.php';

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

    public function shortText($string)
    {
        //code van Elias
    }
}
