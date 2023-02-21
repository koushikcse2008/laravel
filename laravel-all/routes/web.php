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
    return view('home');
});

Route::get('/master-layout', function () {
    return view('master-layout');
})->name('master-layout');

Route::get('/db-setup', function () {
    return view('db-setup');
})->name('db-setup');

Route::get('/create-migration', function () {
    return view('create-migration');
})->name('create-migration');

Route::get("/accessor-mutator", 'AccessorMutatorController@index')->name('accessor-mutator');
