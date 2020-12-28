<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    var $params;

    public function setParams()
    {
        //Create variables coming from the http POST request
        //dump(request()->all());
        $search = request('searchtext');
        $exclude = request('excludetext');
        $languages = request('language');
        $issuers = request('issuer');
        $categories = request('category');
        $tags = request('tag');
        $dateFrom = request('date-from');
        $dateUntil = request('date-until');

        // We have 2 types of queries: 'match' query and 'bool' query.
        // When we use only one 'match' statement inside a 'bool'=>'must' clause, there is no difference with the 'match' query.
        // The bool clause is useful when we want to combine multiple (boolean) criteria and make more complex queries.
        // Bool supports the following criteria: 'must', 'must_not', 'filter', 'should'.
        // - must means: The clause (query) must appear in matching documents and will contribute to the score. These clauses must match, like logical AND.
        // - filter: The clause (query) must appear in matching documents. However unlike must the score of the query will be ignored. 
        //   Filter clauses are executed in filter context, meaning that scoring is ignored and clauses are considered for caching.
        // - must_not means: The clause (query) must not appear in matching documents. These clauses must match, like logical NOT.
        // - should means: At least one of these clauses must match, like logical OR. 
        //   If these clauses match, they increase the _score; otherwise, they have no effect. They are simply used to refine the relevance score for each document.
        
        // The parameters are a complex array. We start with a base array and continue to build from there.
        $this->params = [
            'index' => 'insuraquest',
            'body' => [
                'from' => 0, 
                'size' => 100, // to retrieve max 100 hits on the page
                'query' => [
                    'bool' => [ //
                    ]
                ]
            ]
        ];
        // Although the Search page requires the search field, we doublecheck on $search. If $search is not empty, we complete $params for $search 
        if($search!=null)
        {
            $this->params['body']['query']['bool'] += ['must' => []]; // we use 'must': the documents must match with the terms of $search
            array_push($this->params['body']['query']['bool']['must'], ['match' => ['content' => $search]]);
            // if one of the metadata have been selected in te Search page, we prepare $params with 'bool' 
            if ($languages || $issuers || $categories || $tags)
            {
                $this->params['body']['query']['bool'] += ['should' => []]; // we use 'should': the score will increase when matching with these metadata 
                // Note: de should array is no associative array. It has "keys" with a classic index and havin again an array value.
                // if metadata 'language' have been selected, we complete $params with the values of the $languages array 
                if ($languages)
                {
                    foreach($languages as $key => $value)
                    {
                        array_push($this->params['body']['query']['bool']['should'], [ 'match' => [ 'external.language' => $value ] ]);
                    }
                }
                // if metadata 'issuer' have been selected, we complete $params with the values of the $issuers array 
                if ($issuers)
                {
                    foreach($issuers as $key => $value)
                    {
                        array_push($this->params['body']['query']['bool']['should'], [ 'match' => [ 'external.issuer' => $value ] ]);
                    }
                }
                // if metadata 'category' have been selected, we complete $params with the values of the $categories array 
                if ($categories)
                {
                    foreach($categories as $key => $value)
                    {
                        array_push($this->params['body']['query']['bool']['should'], [ 'match' => [ 'external.category' => $value ] ]);
                    }
                }
                // if metadata 'tag' have been selected, we complete $params with the values of the $tags array 
                if ($tags)
                {
                    foreach($tags as $key => $value)
                    {
                        array_push($this->params['body']['query']['bool']['should'], [ 'match' => [ 'external.tag' => $value ] ]);
                    }
                }
            }
            // if some date filters are filled in, we complete $params with extra arrays to include a range clause (to include in the must clause)
            if ($dateFrom || $dateUntil)
            {
                array_push($this->params['body']['query']['bool']['must'], ['range' => ['external.date_published' => []]]);
                if ($dateFrom && !$dateUntil)
                {
                    $this->params['body']['query']['bool']['must'][1]['range']['external.date_published'] += ['gte' => $dateFrom];
                }
                if (!$dateFrom && $dateUntil)
                {
                    $this->params['body']['query']['bool']['must'][1]['range']['external.date_published'] += ['lte' => $dateUntil];
                }
                if ($dateFrom && $dateUntil)
                {
                    $this->params['body']['query']['bool']['must'][1]['range']['external.date_published'] += ['gte' => $dateFrom];
                    $this->params['body']['query']['bool']['must'][1]['range']['external.date_published'] += ['lte' => $dateUntil];
                }
            }
        }
        // if the exclude from search has been filled in, we complete $params with extra arrays to include the must_not clause 
        if($exclude!=null)
        {
            $this->params['body']['query']['bool'] += ['must_not' => ['match' => ['content' => $exclude]]];
        }
        
        // add suffix to $params array for highlighting feature
        $this->addHighlight();
    }

    public function addHighlight()
    {
        $highlight = [
            'highlight' => [
            'fields' => [ 
                'content' => [
                    'require_field_match' => false, // we want to retrieve all matching fields 
                    'number_of_fragments' => 5, // number of fragments matching with the must clause
                    'fragment_size' => 300 // default of 100 characters increased to 300
                    ]
                ]
            ]
        ];
        $this->params['body'] += $highlight;
    }

}
