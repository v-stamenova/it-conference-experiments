<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('area', 'area')
    ->middleware(['auth', 'verified'])
    ->name('area');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('messages/{user}', [MessageController::class, 'show'])->name('messages.show');

require __DIR__.'/auth.php';
