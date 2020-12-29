<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use App\Models\Connection;
use App\Models\Language;
use App\Models\Issuer;
use App\Models\Category;
use App\Models\Tag;

class QueryController extends Controller
{
    // Show the form to create a new query
    public function create()
    {
        return view('pages.query.create', [
                        'languages' => Language::all(),
                        'issuers' => Issuer::all(),
                        'categories' => Category::all(),
                        'keywords' => Tag::all(),
                        ]);
    }

    public function show(Request $request)
    {
        // Searchtext field is required
        $this->validate($request, [
            'searchtext' => 'required'], [
            'searchtext.required' => 'You need to enter some text or a word to search for.'
        ]);

        $query = new Query(); // Instantiate a new Query - required to invoke static method due to missing facade.
        $query->setParams(); // Set search parameters

        //dd($query->params);
        //$response = $client->search($query->params);
        $response = Connection::handle()
                        ->search($query->params);

        //print_r($query->params);
        //dump($response);

        $request->flash();

        return view('pages.query.create', [
                        'languages' => Language::all(),
                        'issuers' => Issuer::all(),
                        'categories' => Category::all(),
                        'keywords' => Tag::all(),
                        'hits' => $response['hits']['total'],
                        'results' => $response['hits']['hits']
                        ]);
    }

}
