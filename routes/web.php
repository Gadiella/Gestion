<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

//     if (Auth::check())
//         return redirect()->route('dashboard');
//     return view('login');
// })->name('login');

// Route::get('/login', function () {
//     if (Auth::check())
//         return redirect()->route('dashboard');
//     return view('login');
// })->name('login');

// Route::get('/registration', function () {
//     if (Auth::check())
//         return redirect()->route('dashboard');
// })->name('registration');


// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/dashbord', function () {
        return view('dashbord');
    })->name('dashbord');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');


Route::get('/', [AuthenticationController::class, 'login'])->name('login');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');

Route::get('/registration', [AuthenticationController::class, 'register'])->name('registration');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');