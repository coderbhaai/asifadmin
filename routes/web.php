<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Pages\Home;



Route::get('/', Home::class)->name('home');

Route::get('/admin/dashboard', function () { return view('dashboard'); })->name('dashboard');