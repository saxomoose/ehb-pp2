<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class FileUploadController extends Controller
{
    public function fileUpload(Request $request)

    {
        return view('librarian');
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
            'keyword' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ], [
            'title.required' => 'Title is required',
            'language.required' => 'Language is required',
            'date.required' => 'Published date is required',
            'issuer.required' => 'Issurer is required',
            'category.required' => 'Category is required',
            'keyword.required' => 'Keyword is required',
            'file.required' => 'A file needs to be slected'
        ]);

        $file = $request->file('file');
        $pathname = $file->store('uploads');
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
                                    'keyword' => $request->input('keyword')
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
    }
}
