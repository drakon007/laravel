<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

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

Route::get('/', function () {
    return view('welcome');
});

// USER DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');

// ADMIN DASHBOARD
Route::get('/admin_dashboard', function () {
    return view('admin_dashboard');
})->middleware(['auth', 'admin'])->name('admin_dashboard');

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

Route::controller(VideoController::class)->group(function () {
    Route::get('/upload', 'index' )->name('upload');
    Route::post('/upload', 'uploadVideo')->name('upload');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/render', 'renderVideo')->name('render');
    Route::post('/like-video/{id}', 'like')->name('like');
    Route::post('/dislike-video/{id}', 'dislike')->name('dislike');
    Route::get('/getvideo/{id}', 'getvideo')->name('getvideo');
    // Route::post('/show', 'like')->name('like');


});

require __DIR__.'/auth.php';
