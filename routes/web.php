<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/clear', [Controller::class, 'clear'])->name('clear');
Route::get('/calendar.ics', [Controller::class, 'calendar'])->name('calendar');
