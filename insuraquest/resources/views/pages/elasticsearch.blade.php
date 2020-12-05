<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>ElasticSearch</title>
  </head>
  <body>
    <h1>ElasticSearch - first result</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

    <?php
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

        use Elasticsearch\ClientBuilder;

        $hosts = [
          'host' => '10.3.50.7',
          'port' => '9200',
          'scheme' => 'http',
          ];

        $client = ClientBuilder::create()
        ->setHosts($hosts)
        ->build();

/*        $params = [
          'index' => 'test-api',
          'type' => '_doc',
          'id' => '66c8b2693fa7d4a737beec8b9ad2726' // let op --> id is hier zonder underscore!!!
          ];

        //These parameters are translated to the following command in the Kibana console: GET /test-api/_doc/66c8b2693fa7d4a737beec8b9ad2726
        // or alternatively (note the similar structure): curl -X GET "localhost:9200/children/child/child3?human&pretty"

        $response = $client->get($params);
*/
/*
        $params = [
          'index' => 'insuraquest',
          'body' => [
            'query' => [
              'bool' => [
                'must' => [
                  ['match' => ['_id' => '3a5ff5beea3bf83f0b4bb7c6d33e921']] // let op --> id_ is hier met underscore!!!
                ]
              ]
            ]
          ]
        ];
*/
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

        //print_r(json_encode($params['body']));
        $response = $client->search($params);




        print_r($response);
    ?>
  </body>
</html>