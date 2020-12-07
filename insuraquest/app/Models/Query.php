<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    var $params;

    public function setParams($search, $cb1, $cb2)
    {
        $this->params = [
                            'index' => 'insuraquest',
                            'body' => [
                                'query' => [
                                    'match' => [
                                        'content' => $search
                                    ],
                                    'match' => ['external.tag' => $cb1]
                                ]
                            ]
                        ];
    }
}
