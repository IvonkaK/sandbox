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
    return "Usage:<br>
            type: /encode  --> for more details on how to generate short code<br>
            type: /decode  --> for more details on how to display long link<br>
            type: /'short code generated'  --> to be redirected to the page based on short code generated previously<br>
            ";
});

# Encode link
Route::get('/encode', [App\Http\Controllers\ShortUrlController::class, 'encode'])->name('urlForm');
Route::post('/encode', [App\Http\Controllers\ShortUrlController::class, 'encode'])->name('encode');

# Decode short code
Route::get('/decode', function () {
    return "Usage: after decode/ paste created short code to get full link";
});
Route::get('/decode/{slug}', [App\Http\Controllers\ShortUrlController::class, 'decode']);

# Use below route to test redirect short link
Route::get('/{slug}', [App\Http\Controllers\ShortUrlController::class, 'handleRedirect']);


