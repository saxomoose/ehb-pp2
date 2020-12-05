<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchDocumentsController extends Controller
{
    //testen of we dit kunnen doen om gemakkelijker met de json response te werken?
    //(//$collection = collect(json_decode($response));
    //$items = $collection->where('id', 25);

    public function postSearch(Request $request)

    {
        $input = $request->all();
        $searchtext = $request->input('searchtext');
        $language = $request->input('language');
        $issuer = $request->input('issuer');
        $category = $request->input('category');
        $keyword = $request->input('keyword');
        $datefrom = $request->input('date-from');
        $dateuntil = $request->input('date-until');

        $response = $searchtext .',' .implode(",", $language) .',' .implode(",", $issuer).',' .implode(",", $category).',' .implode(",", $keyword) .',' .$datefrom .$dateuntil;

        return back()
            ->with('success', $response);

    }
}
