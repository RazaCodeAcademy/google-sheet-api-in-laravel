<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->namespace('API')->group(function () {
    Route::post('/', 'ProductController@index')->name('products');
    Route::post('/show', 'ProductController@show')->name('showProduct');
    Route::post('/create', 'ProductController@create')->name('createProduct');
    Route::post('/store', 'ProductController@store')->name('storeProduct');
    Route::post('/edit', 'ProductController@edit')->name('editProduct');
    Route::post('//update', 'ProductController@update')->name('updateProduct');
    Route::post('/delete', 'ProductController@destroy')->name('deleteProduct');
});


Route::post('/google/sheet', function(\App\Services\GoogleSheet $googleSheet){
    $googleSheet->readGoogleSheet();
});
