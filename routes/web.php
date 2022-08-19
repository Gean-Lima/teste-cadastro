<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Login;
use App\Http\Livewire\Pages\Register;
use Illuminate\Support\Facades\Auth;

Route::get('/', Login::class)
    ->name('login')
    ->middleware('guest');

Route::get('/cadastro', Register::class)
    ->name('register')
    ->middleware('guest');;

Route::get('/home', fn() => view('home'))
    ->name('home')
    ->middleware('auth');

Route::get('/logout', function() {
    Auth::logout();

    return redirect()->route('login');
})
    ->name('logout')
    ->middleware('auth');
