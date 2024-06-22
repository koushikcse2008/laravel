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

Route::resource('user', UserController::class);

# Different methods
Route::get('/helper-process', function () {
    return view('process.helper-process');
})->name('helper-process');

Route::get('/helper', 'HelperController@index')->name('helper');

Route::get('/routes-process', function () {
    return view('process.routes-process');
})->name('routes-process');

Route::get('/softdelete-process', function () {
    return view('process.softdelete-process');
})->name('softdelete-process');

Route::get('/pagination-process', function () {
    return view('process.pagination-process');
})->name('pagination-process');

Route::get('/pagination', 'ContactusController@index')->name('pagination');

Route::get('/faker-seeder-process', function () {
    return view('process.faker-seeder-process');
})->name('faker-seeder-process');

Route::get('/db-seeder-process', function () {
    return view('process.db-seeder-process');
})->name('db-seeder-process');

Route::get('/trait-process', function () {
    return view('process.trait-process');
})->name('trait-process');

Route::get('/event-listener-process', function () {
    return view('process.event-listener-process');
})->name('event-listener-process');

Route::get('/send-email-process', function () {
    return view('process.send-email-process');
})->name('send-email-process');

Route::get('/form-validation-process', function () {
    return view('process.form-validation-process');
})->name('form-validation-process');

Route::get('/image-upload-process', function () {
    return view('process.image-upload-process');
})->name('image-upload-process');

Route::get('/custom-route-process', function () {
    return view('process.custom-route-process');
})->name('custom-route-process');

Route::get('/custom-artisan-process', function () {
    return view('process.custom-artisan-process');
})->name('custom-artisan-process');

Route::get('/register-login-process', function () {
    return view('process.register-login-process');
})->name('register-login-process');

Route::get('/middleware-process', function () {
    return view('process.middleware-process');
})->name('middleware-process');

Route::get('/multiple-route-process', function () {
    return view('process.multiple-route-process');
})->name('multiple-route-process');

Route::get('/mail-process', function () {
    return view('process.mail-process');
})->name('mail-process');

Route::get('/csv-import-process', function () {
    return view('process.csv-import-process');
})->name('csv-import-process');

Route::get('/csv-export-process', function () {
    return view('process.csv-export-process');
})->name('csv-export-process');

