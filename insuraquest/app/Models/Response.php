<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    public function search($params)
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

        return $response;
    }
}
