<?php

use App\Jobs\MqttJobs;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/solar', function () {
    return view('solar');
})->middleware(['auth', 'verified'])->name('solar');

Route::get('/batt', function () {
    return view('batteries');
})->middleware(['auth', 'verified'])->name('batt');

Route::get('/wind', function () {
    return view('winds');
})->middleware(['auth', 'verified'])->name('wind');

require __DIR__ . '/auth.php';
