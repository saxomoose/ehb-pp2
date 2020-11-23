<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileUploadController extends Controller
{
    public function fileUpload()

    {
        return view('librarian');
    }

    public function fileUploadPost(Request $request)

    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv,|max:2048',
        ]);

        $fileName = time().'.'.$request->file->extension();  

        $request->file->move(public_path('uploads'), $fileName);

        return back()

            ->with('success','You have successfully upload file.')

            ->with('file',$fileName);
    }
}