<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\TeamController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [ClubController::class, 'index'])->name('home');
// Route::resource('NOM_TAULA', NomController::class)->names('nomVista');

Route::resource('clubs','App\Http\Controllers\ClubController'); 
Route::resource('teams/{club}/index','App\Http\Controllers\TeamController');
Route::resource('players/{team}/index','App\Http\Controllers\PlayerController');

Route::resource('matches','App\Http\Controllers\MatchController');
Route::resource('actions/{match}/index','App\Http\Controllers\ActionController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
