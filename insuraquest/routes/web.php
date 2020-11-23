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


Route::get('/librarian.blade', 'App\Http\Controllers\FileUploadController@fileUpload')->name('file.upload.post');
Route::post('/librarian.blade', 'App\Http\Controllers\FileUploadController@fileUploadPost');