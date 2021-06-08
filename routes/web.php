<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('products')->namespace('myTask')->group(function () {
    Route::get('/', 'ProductController@index')->name('products');
    Route::get('/show/{id}', 'ProductController@show')->name('showProduct');
    Route::get('/create', 'ProductController@create')->name('createProduct');
    Route::post('/store', 'ProductController@store')->name('storeProduct');
    Route::get('/edit/{id}', 'ProductController@edit')->name('editProduct');
    Route::put('//update/{id}', 'ProductController@update')->name('updateProduct');
    Route::get('/delete/{id}', 'ProductController@destroy')->name('deleteProduct');
});

Route::get('/google/sheet', function(\App\Services\GoogleSheet $googleSheet){
    $values = [
        [4, 'Car', 'Description', '1230', '12'],
        [5, 'Van', 'Description', '1030', '102'],
    ];

    $saveData = $googleSheet->saveDataToSheet($values);

    dump($saveData);

    dd($googleSheet->readGoogleSheet());
});

/*
|--------------------------------------------------------------------------
| Google Login Routes
|--------------------------------------------------------------------------
*/

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/our-location', 'Map\MapController@index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
