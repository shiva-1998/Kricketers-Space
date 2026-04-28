<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('tournaments', [HomeController::class, 'tournaments'])->name('tournaments');




Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::get('/sign-up', [HomeController::class, 'signup'])->name('signup');
Route::get('/otp-verification', [HomeController::class, 'otpverification'])->name('otpverification');
Route::get('/set-your-password', [HomeController::class, 'setyourpassword'])->name('setyourpassword');
Route::get('/lets-get-started', [HomeController::class, 'letsgetstarted'])->name('letsgetstarted');
Route::get('/your-cricket-profile', [HomeController::class, 'yourcricketprofile'])->name('yourcricketprofile');
Route::get('/add-your-profile-pic', [HomeController::class, 'addyourprofilepic'])->name('addyourprofilepic');
Route::get('/create-your-team', [HomeController::class, 'createyourteam'])->name('createyourteam');
Route::get('/all-set', [HomeController::class, 'allset'])->name('allset');
Route::get('/sign-in-otp-verification', [HomeController::class, 'signinotp'])->name('otp-verification');
Route::get('/sign-in', [HomeController::class, 'signin'])->name('sign-in');
Route::get('/forget-password', [HomeController::class, 'forgetpassword'])->name('forget-password');
Route::get('/set-new-password', [HomeController::class, 'setnewpassword'])->name('set-new-password');
Route::get('/team-captain-dashboard', [HomeController::class, 'teamcaptaindashboard'])->name('team-captain-dashboard');
Route::get('/team-captain-matches', [HomeController::class, 'teamcaptainmatches'])->name('team-captain-matches');
Route::get('/team-captain-tournaments', [HomeController::class, 'teamcaptaintournaments'])->name('team-captain-tournaments');
Route::get('/team-captain-players', [HomeController::class, 'teamcaptainplayers'])->name('team-captain-players');
Route::get('/team-captain-profile', [HomeController::class, 'teamcaptainprofile'])->name('team-captain-profile');



Route::post('/save-role', [UserController::class, 'saveRole'])->name('user.role');
Route::post('/user-sign-up', [UserController::class, 'userSignup'])->name('user-signup');
Route::post('/verify-otp', [UserController::class, 'verifyOtp'])->name('user-otp.verify');
Route::post('/save-password', [UserController::class, 'savePassword'])->name("user-password.save");
Route::post('/save-profile', [UserController::class, 'saveProfile'])->name('user-profile.update');
Route::post('/save-profile-pic', [UserController::class, 'saveProfilePic'])->name('user-profile.pic');
Route::post('/save-team', [UserController::class, 'saveTeam'])->name('user.team');





Route::post('/login', [UserController::class, 'login'])->name('user.login.submit');

Route::middleware(['auth', 'verified.email'])->group(function () {
    Route::get('/team-captain-dashboard', [UserController::class, 'teamcaptaindashboard'])->name('team-captain-dashboard');
    Route::post('/user-logout', [UserController::class, 'logout'])->name('user.logout.submit');
    Route::get('/tournament/{id}/pay', [HomeController::class, 'pay'])->middleware('auth')->name('tournament.pay');
    Route::post('/verify-payment', [HomeController::class, 'verifyPayment'])->name('payment.verify');
    Route::get('/team-captain-matches', [HomeController::class, 'teamcaptainmatches'])->name('team-captain-matches');
});
