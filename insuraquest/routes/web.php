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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('pages/dashboard');
})->name('dashboard');

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

 //SEARCH route

Route::post('/search.blade', 'SearchDocumentsController@postSearch')->name('documentsearch')->middleware('can:isUser,App\Models\User');

