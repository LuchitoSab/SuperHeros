<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomLoginController;

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

// VER TIEMPO DE EJECUCION DE LOS QUERY
// DB::listen(function($query){
//     echo "<pre>{$query->time}</pre>";
// });


Auth::routes();

Route::match(['get', 'post'],'/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sort/{sortBy}', [App\Http\Controllers\HomeController::class, 'sort'])->name('sort');


// Route::get('json', [App\Http\Controllers\JsonheroController::class, 'index'])->name('json');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::match(['get', 'post'],'superheros', [App\Http\Controllers\ImportController::class, 'index']);

Route::match(['get', 'post'],'superheros/importar', [App\Http\Controllers\ImportController::class, 'import'])->name('importar');






