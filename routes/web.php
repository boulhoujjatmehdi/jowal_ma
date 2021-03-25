<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CordinateController;
use App\Http\Controllers\MainController;

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
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('cordinates' , CordinateController::class);
Route::view('/home'  , 'index');

Route::get('search/{city}/{need}', [MainController::class , 'index' ] );

Route::view('lay' , 'client.selectP');
Route::view('layout' , 'client.child');