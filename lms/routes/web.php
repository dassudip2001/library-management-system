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

// Books 
// get books
Route::get('books', [BookController::class, 'index'])->name('books.index');
// post books
Route::post('books', [BookController::class, 'create'])->name('books.create');
// edit books
Route::get('books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
// update books
Route::put('books/edit/{id}', [BookController::class, 'update'])->name('books.update');
// delete books
Route::get('books/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');



// publications
// get publications
Route::get('publications', [PublicationController::class, 'index'])->name('publications.index');
// post publications
Route::post('publications', [PublicationController::class, 'create'])->name('publications.create');
// edit publications
Route::get('publications/edit/{id}', [PublicationController::class, 'edit'])->name('publications.edit');
// update   publications
Route::put('publications/edit/{id}', [PublicationController::class, 'update'])->name('publications.update');
// delete publications
Route::get('publications/delete/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy');


Route::get('create-student', [StudentController::class, 'index'])->name('create-student.index');


// branches
// get branches
Route::get('create-branch', [BranchController::class, 'index'])->name('create-branch.index');
// post branches
Route::post('create-branch', [BranchController::class, 'create'])->name('create-branch.create');
// edit branches
Route::get('create-branch/edit/{id}', [BranchController::class, 'edit'])->name('create-branch.edit');
// update branches
Route::put('create-branch/edit/{id}', [BranchController::class, 'update'])->name('create-branch.update');
// delete branches
Route::post('create-branch/delete/{id}', [BranchController::class, 'destroy'])->name('create-branch.destroy');



// penalties routes
Route::get('penalties', [StudentController::class, 'index'])->name('penalties.index');
// book issues
Route::get('book-issue', [StudentController::class, 'index'])->name('book-issue.index');

// book return
Route::get('book-return', [StudentController::class, 'index'])->name('book-return.index');





require __DIR__ . '/auth.php';