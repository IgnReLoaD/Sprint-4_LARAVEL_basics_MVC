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

Route::get('/', function () {
    return view('clubs.index');
});

// Route::get('/', [ClubController::class, 'index'])->name('home');
// Route::resource('NOM_TAULA', NomController::class)->names('nomVista');

Route::resource('clubs','App\Http\Controllers\ClubController'); 
Route::get('clubs', [ClubController::class, 'index'])->name('club.index');
Route::put('clubs/{club}/edit', [ClubController::class, 'edit'])->name('club.edit');
// Route::get('clubs', [ClubController::class, 'show'])->name('show');
// Route::delete('clubs', [ClubController::class, 'destroy'])->name('clubs.destroy');

// show store create index edit update destroy

// totes les rutes (edit, index, store....) dels metodes del teamController
// Route::resource('clubs/{club}/teams','App\Http\Controllers\TeamController'); 

Route::get('clubs/{club}/teams', [TeamController::class, 'index'])->name('team.index');
// Route::get('teams', [TeamController::class, 'index'])->name('team.index');
Route::delete('teams', [TeamController::class, 'destroy'])->name('teams.destroy');


// Route::resource('players/{team}/index','App\Http\Controllers\PlayerController');
// Route::resource('matches','App\Http\Controllers\MatchController');
// Route::resource('actions/{match}/index','App\Http\Controllers\ActionController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
