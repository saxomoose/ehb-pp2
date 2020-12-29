<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Elasticsearch\ClientBuilder;

class Connection extends Model
{
    use HasFactory;

    public function __construct($hosts) {
        $this->hosts = $hosts;
    }

    public static function handle() {
        // Configure extended host for client
        $hosts = [
            'host' => '10.3.50.7',
            'port' => '9200',
            'scheme' => 'http', // other option: 'https'
            'user' => 'elastic', // relevant when using https
            'pass' => 'insuraquest', // relevant when using https
        ];

        $client = ClientBuilder::create() // Instantiate a new ClientBuilder
                    ->setHosts($hosts) // Set the hosts
                    ->build(); // Build the client object

        return $client;
    }
}
