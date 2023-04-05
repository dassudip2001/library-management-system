<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\StudentController;
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

Route::get('books', [BookController::class, 'index'])->name('books.index');

// get
Route::get('publications', [PublicationController::class, 'index'])->name('publications.index');
// post
Route::post('publications', [PublicationController::class, 'create'])->name('publications.create');
// edit
Route::get('publications/edit/{id}', [PublicationController::class, 'edit'])->name('publications.edit');
Route::put('publications/edit/{id}', [PublicationController::class, 'update'])->name('publications.update');
Route::get('publications/delete/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy');


Route::get('create-student', [StudentController::class, 'index'])->name('create-student.index');
Route::get('create-branch', [BranchController::class, 'index'])->name('create-branch.index');



require __DIR__ . '/auth.php';