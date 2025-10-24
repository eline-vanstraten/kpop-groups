<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'can:access-dashboard'])->name('dashboard');

Route::get('/admin/groups', [AdminController::class, 'index'])
    ->middleware(['auth', 'can:access-dashboard'])
    ->name('admin.groups.index');


Route::patch('/admin/groups/{group}/status', [AdminController::class, 'status'])
    ->middleware(['auth', 'can:access-dashboard'])
    ->name('admin.groups.status');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Route::get('/homepage', function () {
//    return view('homepage');
//})->name('homepage');


Route::get('/favorites', function () {
    return view('favorites');
})->name('favorites');


Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');

Route::middleware('auth')->group(function () {
    Route::get('/groups/create', [GroupController::class, 'create'])
        ->name('groups.create');

    Route::post('/groups', [GroupController::class, 'store'])
        ->name('groups.store');

    Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])
        ->can('edit-group', 'group')
        ->name('groups.edit');

    Route::patch('/groups/{group}', [GroupController::class, 'update'])
        ->can('edit-group', 'group')
        ->name('groups.update');

    Route::delete('/groups/{group}', [GroupController::class, 'destroy'])
        ->can('edit-group', 'group')
        ->name('groups.destroy');
});

Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');


//Route::resource('groups', GroupController::class);


require __DIR__ . '/auth.php';
