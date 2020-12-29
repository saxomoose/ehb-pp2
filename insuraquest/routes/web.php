<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('pages/welcome');
});

//controleert of de user is ingelogd. Zoniet redirect hij naar de login page.
Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/create', 'QueryController@create');
    Route::post('/create', 'QueryController@show');

    Route::get('/document/{id}', [
        'uses' => 'DocumentsController@show',
        'as' => 'document'
        ]);


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


    //DASHBOARD route
    Route::get('/dashboard', function(){
        return view('pages/dashboard');
    })->name('dashboard');


    //SEARCH routes
    Route::middleware(['can:isUser,App\Models\User'])->group(function(){
            //Once search page is asked for, we get the showSearch function to work
            Route::get('/search', 'QueryController@create')->name('search');

            //Once search button is clicked, we get the postSearch function to work
            Route::post('/search', 'QueryController@show')->name('documentsearch');
        });


    //LIBRARIAN routes
    //Once librarian page is asked for, we get the fileUpload function to work
    Route::middleware(['can:isLibrarian,App\Models\User'])->group(function(){
        Route::get('/librarian', 'FileUploadController@fileUpload')->name('librarian');


        // Routes van librarian page naar Fileuploadcontroller voor het uitsturen van input (inc. file) naar FSCrawler API
        Route::post('/librarian.blade', 'FileUploadController@fileUploadPost')->name('file.upload.post');


        //Route to update single document, redirects to document
        Route::post('/document/{id}', 'DocumentsController@update')->name('document.edit');

        //Route to delete single document, redirects to search page
        Route::get('/delete/{id}/{filename}', 'DocumentsController@destroy')->name('document.delete');

        //Route to mail a single document, redirects to search page
        Route::get('/mail/{id}/{filename}', 'MailController@sendEmail')->name('document.mail');
    });


    //DOCUMENTATION route
    Route::get('/documentation', function(){
        return view('pages/documentation');
    })->name('documentation');


    //TEAM route
    Route::get('/team', function(){
        return view('pages/team');
    })->name('team');

    //EMAIL route
    Route::get('/send-email', 'MailController@sendEmail')->name('send.email');

});
