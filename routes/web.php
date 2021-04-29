<?php

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


// Route::get('generate', 'ShortLinkController@index');
// Route::post('generate', 'ShortLinkController@store')->name('generate.shorten.link.post');

Route::get(
    'force-download/{nameFile}',
    function ($nameFile) {
        return response()->download("storage/" . $nameFile);
    }
);
Route::get('download/{link}', 'ShortLinkController@downloadFile')->name('download.link');
Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');
