<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Util\Json;
use App\View\Components\Collection;

class SearchDocumentsController extends Controller
{

    public function postSearch(Request $request)

    {
        $input = $request->all();
        dump(request()->all());
        // bij het imploden van $input krijg ik een error want er zitten arrays in de array
        // daarom gekozen om elke value apart te gaan uitpakken.
        $searchtext = $request->input('searchtext');
        $language = $request->input('language');
        $issuer = $request->input('issuer');
        $category = $request->input('category');
        $keyword = $request->input('keyword');
        $datefrom = $request->input('date-from');
        $dateuntil = $request->input('date-until');

        $response = 'You searched for: ' .$searchtext .',' .implode(",", $language) .',' .implode(",", $issuer).',' .implode(",", $category).',' .implode(",", $keyword) .',' .$datefrom .$dateuntil;

        // curl -XGET 'localhost:9200/my_index/_search' -d '{"query" : { "match" : {
        //             "testField" : "abc"
        //         }  } }'
    //testen of we dit kunnen doen om gemakkelijker met de json response te werken?
    //(//$collection = collect(json_decode($response));
    //$items = $collection->where('id', 25);
    $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' =>6, 'g' => 7, 'h' => 8, 'i' => 9, 'j' => 10, 'k' => 11 );
    $j = json_encode($arr);
    $json = 'insuraquest\storage\app\MOCK_DATA.json';
    $jsonResponse = collect(json_decode($j));
    $page = (new Collection($jsonResponse))->paginate(5);


        //return back()
            //->with('success', $response)
            //->with('result', $page);
    }
}
