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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello', function () {
//     return view('hello');
// });

Route::get('/tests', 'TestController@index')->name('index');
Route::get('/create','TestController@create')->name('create');
Route::post('/store','TestController@store')->name('store');
Route::get('/edit/{test}','TestController@edit')->name('edit');
Route::put('/update/{test}','TestController@update')->name('update');
Route::get('/delete/{test}','TestController@destroy')->name('delete');
// Route::resource('tests','TestController');
Route::resource('posts','PostConroller');
