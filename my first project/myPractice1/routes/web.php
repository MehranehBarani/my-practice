<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\searchController;

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
    return view('home');
});

Route::get('/search','searchController@index')->name('searchContoller.index');
Route::post('/search' , 'searchController@getData')->name('getData');

Route::post('/test' , 'searchController@test')->name('test-form');
