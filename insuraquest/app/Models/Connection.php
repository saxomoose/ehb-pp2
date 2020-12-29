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
            'http://elastic:insuraquest@10.3.50.7:9200'
        ];

        $client = ClientBuilder::create() // Instantiate a new ClientBuilder
                    ->setHosts($hosts) // Set the hosts
                    ->build(); // Build the client object

        return $client;
    }
}
