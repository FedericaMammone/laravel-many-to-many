<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;

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



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProjectController::class, 'index'])->name('project.index');

Route::get('/show{id}', [ProjectController::class, 'show'])
    ->middleware(['auth'])
    ->name('project.show');

Route::get('/create', [ProjectController::class, 'create'])
    ->middleware(['auth'])
    ->name('project.create');

Route::post('/store', [ProjectController::class, 'store'])
    ->middleware(['auth'])
    ->name('project.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/projects/create', [ProjectController::class, 'create'])
//     ->name('project.create');
// Route::project('/project/store', [ProjectController::class, 'store'])
//     ->name('project.store');

// Route::get('/projects/{id}', [ProjectController::class, 'show'])
//     ->name('project.show');

require __DIR__ . '/auth.php';
