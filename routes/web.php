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

Route::get('/home', function () {
    return view('home', [
        'name'=> 'nvdty',
        'role'=> 'admin',
        'buah'=>['pisang','apel','jeruk', 'semangka', 'kiwi']
]);
});

Route::get('/about', function(){
    return view('about');
});