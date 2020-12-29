<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use App\Models\Language;
use App\Models\Issuer;
use App\Models\Category;
use App\Models\Tag;

class DocumentsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param Store $session
     * @return mixed
     */
    public function show($id)
    {

        $languages = Language::get();
        $issuers = Issuer::get();
        $categories = Category::get();
        $keywords = Tag::get();

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
                            '_id' => $id
                    ]
                ]
            ]
        ];

        $response = $client->search($params);
        $result = $response['hits']['hits'][0];

        return view('pages.document.show', [
            'result' => $result, 
            'languages' => $languages,
            'issuers' => $issuers,
            'categories' => $categories,
            'keywords' => $keywords]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string
     *
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'language' => 'required',
            'date' => 'required|date',
            'issuer' => 'required',
            'category' => 'required',
            'tag' => 'required',
        ], [
            'title.required' => 'Title is required',
            'language.required' => 'Language is required',
            'date.required' => 'Published date is required',
            'issuer.required' => 'Issuer is required',
            'category.required' => 'Category is required',
            'tag.required' => 'Tag is required',
        ]);

        $hosts = [
            'host' => '10.3.50.7',
            'port' => '9200',
            'scheme' => 'http',
        ];

        $client = ClientBuilder::create()
            ->setHosts($hosts)
            ->build();

        $params_update = [
            'index' => 'insuraquest',
            'type' => '_doc',
            'id' => $id,
            'body' => [
                'doc' => [
                    'external' => [
                        'title' => $request->input('title'),
                        'language' => $request->input('language'),
                        'date_published' => $request->input('date'),
                        'issuer' => $request->input('issuer'),
                        'category' => $request->input('category'),
                        'tag' => $request->input('tag')
                    ]
                ]
            ]
        ];

        $client->update($params_update);

        return redirect()->route('document', ['id' => $id])

            -> with('success-edit', 'File edit was successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return mixed
     */
    public function destroy($id, $filename)
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
            'type' => '_doc',
            'id' => $id
        ];

        $response = $client->delete($params);

        if($response['result'] == 'deleted') {
            Storage::disk('local')->delete('public/' . $filename);
        }

        return redirect()->route('search')

            -> with('success-delete', 'File deletion was successful');


    }
}
