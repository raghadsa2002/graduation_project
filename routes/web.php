<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::get('/login', function () {
   return view('auth.login');
});
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/dash', function () {
    return view('auth.dash');
})->name('dash');

Route::post('/dash', function () {
    return view('auth.dash');
})->name('dash');

Route::post('/pharma', function () {
    return view('auth.pharma');
})->name('pharma');

Route::post('/warehouse', function () {
    return view('auth.warehouse');
})->name('warehouse');

Route::post('/addpharma', function () {
    return view('auth.addpharma');
})->name('addpharma');

Route::post('/addwarehouse', function () {
    return view('auth.addwarehouse');
})->name('addwarehouse');

Route::post('/editpharma', function () {
    return view('auth.editpharma');
})->name('editpharma');

Route::post('/editwarehouse', function () {
    return view('auth.editwarehouse');
})->name('editwarehouse');













require __DIR__.'/auth.php';
