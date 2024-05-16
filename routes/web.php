<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\admin\PharmaController;

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

Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Route::get('/dash', function () {
//     return view('auth.dash');
// })->name('dash');

// Route::post('/dash', function () {
//     return view('auth.dash');
// })->name('dash');

//Route::resource('/pharma', PharmaController::class);

Route::post('/loginAdmin', [UsersController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/addpharmaAdmin', [UsersController::class, 'addpharmaAdmin'])->name('addpharmaAdmin');
Route::post('/addwarehouseAdmin', [UsersController::class, 'addwarehousaAdmin'])->name('addwarehouseAdmin');
Route::post('/editpharmaAdmin', [UsersController::class, 'editpharmaAdmin'])->name('editpharmaAdmin');
Route::post('/editwarehouseAdmin', [UsersController::class, 'editwarehouseAdmin'])->name('editwarehouseAdmin');

Route::get('/pharam',[UsersController::class , 'getAllPharmas'])->name('pharam');
Route::post('/warehouse', [UsersController::class, 'getAllWarehouse'])->name('warehouse');
Route::post('/updateviewwharehouse/{id}', [UsersController::class, 'updateviewwharehouse'])->name('updateviewwharehouse');
Route::get('/editPharamPage/{id}', [UsersController::class, 'editPharamPage'])->name('editPharamPage');


// Route::post('/pharma', function () {
//     return view('auth.pharma');
// })->name('pharma');

// Route::post('/warehouse', function () {
//     return view('auth.warehouse');
// })->name('warehouse');

Route::post('/addpharma', function () {
    return view('auth.addpharma');
})->name('addpharma');

Route::get('/addwarehouse', function () {
    return view('auth.addwarehouse');
})->name('addwarehouse');

Route::get('/editpharma', function () {
    return view('auth.editpharma');
})->name('editpharma');

Route::get('/editwarehouse', function () {
    return view('auth.editwarehouse');
})->name('editwarehouse');

Route::get('/test', function () {
    return var_dump('Hello Marah');
});

Route::get('/test_view', function () {
    return view('test_page', ['name' => 'Maraaah']);
});

Route::resource('users', UsersController::class);

require __DIR__.'/auth.php';
