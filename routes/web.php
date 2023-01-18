<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Models\Consumers;
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

Route::get('qr/{room}', [RoomController::class, 'qr'])->name('main');
Route::post('qr', [RoomController::class, 'store'])->name('store');

Route::middleware('auth')
    ->name('dashboard.')
    ->prefix('dashboard')
    ->group(function (){
        Route::view('/', 'dashboard')->name('index');
        Route::get('/report', [DashboardController::class, 'index'])->name('report');
        Route::get('/room', [DashboardController::class, 'createRoom'])->name('create-room');
        Route::post('/room', [DashboardController::class, 'storeRoom'])->name('store-room');
    });

require __DIR__.'/auth.php';
