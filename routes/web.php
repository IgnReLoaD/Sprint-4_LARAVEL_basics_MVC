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

// show store create index edit update destroy

// CLUBS
Route::resource('clubs','App\Http\Controllers\ClubController'); 
// Route::get('clubs', [ClubController::class, 'index'])->name('club.list');
Route::put('clubs/{club}/edit', [ClubController::class, 'edit'])->name('club.details');
Route::put('clubs/{club}/update', [ClubController::class, 'update'])->name('club.update');
Route::delete('clubs/{club}/destroy', [TeamController::class, 'destroy'])->name('club.destroy');

// TEAMS
// Route::resource('team',TeamController::class)->names('team');
Route::resource('clubs/{club}/teams','App\Http\Controllers\TeamController'); 
Route::get('clubs/{club}/teams', [TeamController::class, 'index'])->name('teams.list');
Route::put('clubs/{club}/teams/{team}/edit', [TeamController::class, 'edit'])->name('team.details');
Route::put('clubs/{club}/teams/{team}/update', [ClubController::class, 'update'])->name('team.update');
Route::delete('clubs/{club}/teams/{team}/destroy', [TeamController::class, 'destroy'])->name('teams.destroy');

// PLAYERS
Route::resource('clubs/{club}/teams/{team}/players','App\Http\Controllers\PlayerController'); 
Route::get('clubs/{club}/teams/{team}/players', [PlayerController::class, 'index'])->name('players.list');
// Route::resource('player', PlayerController::class)->names('player');
// Route::get('clubs/{club}/teams/{team}/players', [PlayerController::class, 'index'])->name('player.index');


// GESTIO USUARIS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
