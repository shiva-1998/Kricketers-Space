<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\GroundController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');




Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::resource('tournaments', TournamentController::class);
    Route::get('/player-info/{id}', [TournamentController::class, 'playerInfo'])->name('player.info');
    Route::resource('/teams', TeamController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('matches', MatchController::class);
    Route::resource('/grounds', GroundController::class);
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/pdf', [ReportController::class, 'downloadPdf'])->name('reports.pdf');

    Route::post('/matches/{match}/add-ball', [MatchController::class, 'addBall'])
        ->name('matches.addBall');
    Route::get('/matches/{id}/view', [MatchController::class, 'view'])->name('matches.view');

    // ✅ RESULT UPDATE
    Route::post('/matches/{match}/result', [MatchController::class, 'updateResult'])
        ->name('matches.updateResult');

    Route::post('/matches/{id}/save-toss', [MatchController::class, 'saveToss'])
        ->name('matches.saveToss');
});
