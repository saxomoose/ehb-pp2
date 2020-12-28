<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\UploadFile;
use App\Models\Language;
use App\Models\Issuer;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\DB;


class FileUploadController extends Controller
{
    public function fileUpload(Request $request)
    //we get the tables content and put them into variables to pass to the view, in this case, the librarian view
    {
        $languages = Language::get();
        $issuers = Issuer::get();
        $categories = Category::get();
        $tags = Tag::get();

        return view('pages/librarian', [
                'languages' => $languages,
                'issuers' => $issuers,
                'categories' => $categories,
                'tags' => $tags
                ]);
    }

    //handler method sanitizes user input and posts uploaded file and tags to FSCrawler API for indexation
    public function fileUploadPost(Request $request)

    {
        $this->validate($request, [
            'title' => 'required',
            'language' => 'required',
            'date' => 'required|date',
            'issuer' => 'required',
            'category' => 'required',
            'tag' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ], [
            'title.required' => 'Title is required',
            'language.required' => 'Language is required',
            'date.required' => 'Published date is required',
            'issuer.required' => 'Issurer is required',
            'category.required' => 'Category is required',
            'tag.required' => 'Tag is required',
            'file.required' => 'A file needs to be selected'
        ]);

        $file = $request->file('file');
        $pathname = $file->store('public');
        $fully_qualified_pathname = storage_path('app/' . $pathname);
        $client = new Client();
        try {
            $client->request('POST', 'http://127.0.0.1:8080/fscrawler/_upload',
                ['multipart' =>
                    [
                        [
                            'name' => 'file',
                            'contents' => fopen($fully_qualified_pathname, 'r')
                        ],
                        [
                            'name' => 'tags',
                            'contents' => json_encode([
                                'external' => [
                                    'title' => $request->input('title'),
                                    'language' => $request->input('language'),
                                    'date_published' => $request->input('date'),
                                    'issuer' => $request->input('issuer'),
                                    'category' => $request->input('category'),
                                    'tag' => $request->input('tag')
                                ]
                            ])
                        ]
                    ]
                ]
            );
        } catch (GuzzleException $e) {
            echo $e;
        }

        return back()

            ->with('success','File upload was successful!');
            //error message
    }
}
