<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UploadFile;

class FileUploadController extends Controller
{
    public function fileUpload(Request $request)

    {
        return view('librarian');
    }

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

        UploadFile::create($request->all());

        $fileName = time().'.'.$request->file->extension();  
    
        $request->file->move(public_path('uploads/pdf'), $fileName);

        // crrate json form UploadForm and store in uploads/json folder
        $data = UploadFile::create($request->all());
        $jsonData = json_encode($data);
        file_put_contents("./uploads/json/".time().'.json', $jsonData);
        

        return back()

            ->with('success','File upload was successfully!')
            ->with('file',$fileName);

    }
}
