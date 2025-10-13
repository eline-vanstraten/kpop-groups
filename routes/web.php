<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', function () {
    $name = 'hello';
//    return view('contact', [
//        'name' => $name]);
    return view('contact', compact('name'));
})->name('contact');

Route::get('groups/{id}', function (int $id) {
    return view('groups', compact('id'));
})->name('groups');

Route::get('homepage/{id}', function (int $id) {
    return view('homepage', compact('id'));
})->name('homepage');

Route::get('/status', function () {
    return view('status');
})->name('status');

Route::get('/favorites', function () {
    return view('favorites');
})->name('favorites');

Route::resource('groups', GroupController::class);

require __DIR__ . '/auth.php';
