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


<<<<<<< HEAD
Route::middleware(['auth:sanctum', 'verified'])->get('/search', function () {
    return view('pages/search');
})->name('search');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('pages/admin');
})->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/librarian', function () {
    return view('pages/librarian');
})->name('librarian');

Route::middleware(['auth:sanctum', 'verified'])->get('/documentation', function () {
    return view('pages/documentation');
})->name('documentation');

Route::middleware(['auth:sanctum', 'verified'])->get('/team', function () {
    return view('pages/team');
})->name('team');

// Routes van librarian page naar Fileuploadcontroller voor het wegschrijven van files naar mapje public/uploads'
// Middleware acts as a bridge between a request and a response. It is a type of filtering mechanism.
// hier gebruiken we het om de librarian page enkel toe te laten voor profiel 'librarian'
Route::get('/librarian.blade', 'FileUploadController@fileUpload')->name('file.upload')->middleware('can:isLibrarian,App\Models\User');
Route::post('/librarian.blade', 'FileUploadController@fileUploadPost')->name('file.upload.post')->middleware('can:isLibrarian,App\Models\User');

// admin routes
 Route::name('admin.')->group(function() {

    Route::get('/changetype/{id}/{newtype}', [
        'uses' => 'AdminController@getType',
        'as' => 'type'
    ])->middleware('can:isAdmin,App\Models\User');

    Route::get('/deleteuser/{id}', [
        'uses' => 'AdminController@getDeleteUser',
        'as' => 'deleteuser'
    ])->middleware('can:isAdmin,App\Models\User');
 });
=======
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


    //DASHBOARD route
    Route::get('/dashboard', function(){
        return view('pages/dashboard');
    })->name('dashboard');

    //SEARCH routes
    Route::get('/search', function(){
        return view('pages/search');
    })->name('search')->middleware('can:isUser,App\Models\User');

    //LIBRARIAN routes
    Route::middleware(['can:isLibrarian,App\Models\User'])->group(function(){
        Route::get('/librarian', function(){
            return view('pages/librarian');
        })->name('librarian');

        // Routes van librarian page naar Fileuploadcontroller voor het wegschrijven van files naar mapje public/uploads'
        Route::get('/librarian.blade', 'FileUploadController@fileUpload')->name('file.upload.post');
        Route::post('/librarian.blade', 'FileUploadController@fileUploadPost');
    });

    //DOCUMENTATION route
    Route::get('/documentation', function(){
        return view('pages/documentation');
    })->name('documentation');

    //TEAM route
    Route::get('/team', function(){
        return view('pages/team');
    })->name('team');
>>>>>>> e5d6a6936d46621b37d76d086e83c4813dfb3b99

});
