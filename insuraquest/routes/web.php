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
    })->name('search');

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

});





