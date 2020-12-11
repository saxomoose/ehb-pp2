<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('pages/welcome');
});


//controleert of de user is ingelogd. Zoniet redirect hij naar de login page.
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

  // ES Routes
  Route::get('/es', function () {
    return view('pages/elasticsearch');
  });

  Route::get('/create', 'QueryController@create');
  Route::post('/create', 'QueryController@show');
  //Route::get('/edit', 'DocumentsController@edit'); -> om de tags van een document te wijzigen
  //Route::post('/edit', 'DocumentsController@store');


    //ADMIN routes - checks if user has admin type, otherwise throws 403 unauthorized
    Route::middleware(['can:isAdmin,App\Models\User'])->group(function(){
        Route::get('/admin', function(){
            return view('pages/admin');
        })->name('admin');

        Route::get('/changetype/{id}/{newtype}', [
            'uses' => 'AdminController@getType',
            'as' => 'admin.type'
        ]);

        Route::get('/deleteuser/{id}', [
            'uses' => 'AdminController@getDeleteUser',
            'as' => 'admin.deleteuser'
        ]);

    });

    //Route::get('/librarian', 'FileUploadController@fileUpload')->name('librarian');

    //DASHBOARD route
    Route::get('/dashboard', function(){
        return view('pages/dashboard');
    })->name('dashboard');

    //SEARCH routes
    Route::middleware(['can:isUser,App\Models\User'])->group(function(){
        //Once search page is asked for, we get the showSearch function to work
            Route::get('/search', 'SearchDocumentsController@showSearch')->name('search');

            //Once search button is clicked, we get the postSearch function to work
            Route::post('/search', 'SearchDocumentsController@postSearch')->name('documentsearch')
            ;});
   
    //LIBRARIAN routes
    //Once librarian page is asked for, we get the fileUpload function to work
    Route::middleware(['can:isLibrarian,App\Models\User'])->group(function(){
        Route::get('/librarian', 'FileUploadController@fileUpload')->name('librarian');

        // Routes van librarian page naar Fileuploadcontroller voor het wegschrijven van files naar mapje public/uploads'
        Route::post('/librarian.blade', 'FileUploadController@fileUploadPost')->name('file.upload.post');
    }); 

    //DOCUMENTATION route
    Route::get('/documentation', function(){
        return view('pages/documentation');
    })->name('documentation');

    //TEAM route
    Route::get('/team', function(){
        return view('pages/team');
    })->name('team');


});
