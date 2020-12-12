<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    var $params;

    public function setParams($search, $exclude, $languages, $issuers, $categories, $tags)
    {
        // Match query based on content (full text search)
        /*         $this->params = [
                    'index' => 'insuraquest',
                    'body' => [
                        'query' => [
                            'match' => [
                                'content' => $search
                            ]
                        ]
                    ]
                ];
        */
        /*         $this->params = [
                    'index' => 'insuraquest',
                    'body' => [
                        'query' => [
                            'match' => [
                                'content' => $search
                            ]
                        ],
                        'highlight' => [
                            'fields' => [ 'content' => new \stdClass() ]
                        ]
                    ]
                ];
        */
        /* 
        $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'match' => [
                        'content' => $search
                    ]
                ],
                'highlight' => [
                    'fields' => [ 
                        'content' => [
                            'require_field_match' => false,
                            'number_of_fragments' => 5,
                            'fragment_size' => 200
                        ]
                    ]
                ]
            ]
        ];
        */
        /* $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'match' => [
                        'content' => $search
                    ], 
                    ['must_not' => 
                        ['match' => ['content' => 'komaan seg']]
                    
                    ] 
                ]
            ]
        ]; */
        // Bool query based only on content (full text search)
        /* $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            [ 'match' => [ 'content' => $search ] ]
                        ]
                    ]
                ]
            ]
        ];
        */
        /* $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'bool' => [
                    ]
                ]
            ]
        ];
        if($search!=null)
        {
            $this->params['body']['query']['bool'] += ['must' => ['match' => ['content' => $search]]];
        }
        */
        // When you use only one match inside a bool must clause, there is no difference with the match query.
        // The bool clause is useful when you want to combine multiple (boolean) criteria. Bool supports criteria: must, must_not, filter, should.
        // - must means: Clauses that must match for the document to be included.
        // - should means: If these clauses match, they increase the _score; otherwise, they have no effect. They are simply used to refine the relevance score for each document.

        // Bool query with 2 must statements
        /*        $this->params = [
                            'index' => 'insuraquest',
                            'body' => [
                                'query' => [
                                    'bool' => [
                                        'must' => []
                                        ]
                                    ]
                                ]
                            ];
                            
                foreach($arr as $key => $value)
                {
                    array_push($this->params['body']['query']['bool']['must'], $value);
                }
        */
        // Bool query with must and must_not statement
        /* $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            [ 'match' => [ 'content' => $search ] ]
                        ],
                        'must_not' => 
                            ['match' => ['content' => $exclude]]            
                    ]
                ]
            ]
        ];
        */
        // Bool query with must statement and must_not embedded in if-statement 
        /* $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            [ 'match' => [ 'content' => $search ] ]
                        ]     
                    ]
                ]
            ]
        ];

        if($exclude!=null)
        {
            $this->params['body']['query']['bool'] += ['must_not' => ['match' => ['content' => $exclude]]];
        }
        */
        /* 
        $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'bool' => [
                    ]
                ]
            ]
        ];
        if($search!=null)
        {
            $this->params['body']['query']['bool'] += ['must' => []];
            array_push($this->params['body']['query']['bool']['must'], ['match' => ['content' => $search]]);
        }
        if($exclude!=null)
        {
            $this->params['body']['query']['bool'] += ['must_not' => ['match' => ['content' => $exclude]]];
        }
        */
        $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'query' => [
                    'bool' => [
                    ]
                ]
            ]
        ];
        if($search!=null)
        {
            $this->params['body']['query']['bool'] += ['must' => []];
            array_push($this->params['body']['query']['bool']['must'], ['match' => ['content' => $search]]);
            if ($languages || $issuers || $categories || $tags)
            {
                $this->params['body']['query']['bool'] += ['should' => []];
                if ($languages)
                {
                    foreach($languages as $key => $value)
                    {
                        array_push($this->params['body']['query']['bool']['should'], [ 'match' => [ 'external.language' => $value ] ]);
                    }
                }
                if ($issuers)
                {
                    foreach($issuers as $key => $value)
                    {
                        array_push($this->params['body']['query']['bool']['should'], [ 'match' => [ 'external.issuer' => $value ] ]);
                    }
                }
                if ($categories)
                {
                    foreach($categories as $key => $value)
                    {
                        array_push($this->params['body']['query']['bool']['should'], [ 'match' => [ 'external.category' => $value ] ]);
                    }
                }
                if ($tags)
                {
                    foreach($tags as $key => $value)
                    {
                        array_push($this->params['body']['query']['bool']['should'], [ 'match' => [ 'external.tag' => $value ] ]);
                    }
                }
            }
        }
        if($exclude!=null)
        {
            $this->params['body']['query']['bool'] += ['must_not' => ['match' => ['content' => $exclude]]];
        }
        
        /*      //voorbeeld van hardcoded parameters. Let wel: de must array is geen associative array, maar heeft als "keys" een klassieke index met als value opnieuw een array.
                $params = [
                    'index' => 'insuraquest',
                    'body'  => [
                        'query' => [
                            'bool' => [
                                'must' => [
                                    [ 'match' => [ 'content' => $search ] ],
                                    [ 'match' => [ 'external.tag' => $cb1 ] ],
                                ]
                            ]
                        ]
                    ]
                ];
        */
        $this->addHighlight();
    }

    public function addHighlight()
    {
        $highlight = [
            'highlight' => [
            'fields' => [ 
                'content' => [
                    'require_field_match' => false,
                    'number_of_fragments' => 5,
                    'fragment_size' => 300
                    ]
                ]
            ]
        ];
        $this->params['body'] += $highlight;
    }

}
