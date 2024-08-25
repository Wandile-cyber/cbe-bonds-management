<?php

use App\Http\Controllers\BondHolderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Livewire\Account\Settings;
use App\Livewire\Admin\Bonds;
use App\Livewire\Admin\ViewBond;
use App\Livewire\Bonds\Calender;
use App\Livewire\Bonds\Portfolio;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

//Login
Route::view('/', 'login')->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

//Registration
Route::view('/register', 'register')->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

//Dashboard
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/Settings', Settings::class)->name('settings');

//Bonds
Route::get('/portfolio', Portfolio::class)->name('portfolio');
Route::get('/bond-calendar', Calender::class)->name('calendar');

//Admin
Route::get('/bonds', Bonds::class)->name('bonds');
Route::get('/bond-details/{bond_id}', ViewBond::class)->name('bond.details');

//Bond Holder
Route::get('/remove-holder/{id}', [BondHolderController::class, 'destroy'])->name('holder.delete');