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
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');

Route::resource('cordinates' , CordinateController::class)->only(['index']);
Route::view('/home'  , 'index');
Route::resource('Main' , MainController::class)->only(['index' , 'create']);
Route::get('search/{city}/{need}', [MainController::class , 'index' ] );

Route::view('lay' , 'client.selectP');
Route::view('layout' , 'client.child');

Route::get('map/client/{city}/{need}' ,[MainController::class , 'mapPick'] )->middleware('auth');