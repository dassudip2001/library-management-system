<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\IssueBooksController;
use App\Http\Controllers\PanaltiesController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ReturnBooksController;
use App\Http\Controllers\StudentController;
use Carbon\Carbon;
// use Illuminate\Support\Carbon;
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
    // current time and date
    $now = Carbon::now();
    $today = Carbon::today();
    $dayOfWeek = $today->dayOfWeek;
    $daysInMonth = $today->daysInMonth;
    $weekNumber = $today->weekOfMonth;
    $dayOfMonth = 1;

    $formattedDateTime = $now->format('Y-m-d H:i:s');

    return view('dashboard', compact('formattedDateTime', 'today', 'dayOfWeek', 'daysInMonth', 'weekNumber', 'dayOfMonth'));
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
Route::post('books', [BookController::class, 'create'])->name('books.create')->middleware('can:manage_users');
// edit books
Route::get('books/edit/{id}', [BookController::class, 'edit'])->name('books.edit')->middleware('can:manage_users');
// update books
Route::put('books/edit/{id}', [BookController::class, 'update'])->name('books.update')->middleware('can:manage_users');
// delete books
Route::get('books/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('can:manage_users');



// publications
// get publications
Route::get('publications', [PublicationController::class, 'index'])->name('publications.index')->middleware('can:manage_users');
// post publications
Route::post('publications', [PublicationController::class, 'create'])->name('publications.create')->middleware('can:manage_users');
// edit publications
Route::get('publications/edit/{id}', [PublicationController::class, 'edit'])->name('publications.edit')->middleware('can:manage_users');
// update   publications
Route::put('publications/edit/{id}', [PublicationController::class, 'update'])->name('publications.update')->middleware('can:manage_users');
// delete publications
Route::get('publications/delete/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy')->middleware('can:manage_users');

// students
// get students
Route::get('create-student', [StudentController::class, 'index'])->name('create-student.index');
// get students
Route::post('create-student', [StudentController::class, 'create'])->name('create-student.create');
// edit students
Route::get('create-student/edit/{id}', [StudentController::class, 'edit'])->name('create-student.edit');
// update students
Route::put('create-student/edit/{id}', [StudentController::class, 'update'])->name('create-student.update');
// delete students
Route::get('create-student/delete/{id}', [StudentController::class, 'destroy'])->name('create-student.destroy');



// branches
// get branches
Route::get('create-branch', [BranchController::class, 'index'])->name('create-branch.index')->middleware('can:manage_users');
// post branches
Route::post('create-branch', [BranchController::class, 'create'])->name('create-branch.create')->middleware('can:manage_users');
// edit branches
Route::get('create-branch/edit/{id}', [BranchController::class, 'edit'])->name('create-branch.edit')->middleware('can:manage_users');
// update branches
Route::put('create-branch/edit/{id}', [BranchController::class, 'update'])->name('create-branch.update')->middleware('can:manage_users');
// delete branches
Route::get('create-branch/delete/{id}', [BranchController::class, 'destroy'])->name('create-branch.destroy')->middleware('can:manage_users');



// penalties routes
// get penalty routes
Route::get('penalties', [PanaltiesController::class, 'index'])->name('penalties.index');
// create penalty routes
Route::post('penalties', [PanaltiesController::class, 'create'])->name('penalties.create')->middleware('can:manage_users');
// edit penalty routes
Route::get('penalties/edit/{id}', [PanaltiesController::class, 'edit'])->name('penalties.edit')->middleware('can:manage_users');
// update penalty routes
Route::put('penalties/edit/{id}', [PanaltiesController::class, 'update'])->name('penalties.update')->middleware('can:manage_users');
// delete penalty routes
Route::get('penalties/delete/{id}', [PanaltiesController::class, 'destroy'])->name('penalties.destroy')->middleware('can:manage_users');

// book issues
// get issues bookstore
Route::get('book-issue', [IssueBooksController::class, 'index'])->name('book-issue.index');
// create issues book
Route::post('book-issue', [IssueBooksController::class, 'create'])->name('book-issue.create');
// edit issues book
Route::get('book-issue/edit/{id}', [IssueBooksController::class, 'edit'])->name('book-issue.edit')->middleware('can:manage_users');
// update issues book
Route::put('book-issue/edit/{id}', [IssueBooksController::class, 'update'])->name('book-issue.update')->middleware('can:manage_users');
// delete issues book
Route::get('book-issue/delete/{id}', [IssueBooksController::class, 'destroy'])->name('book-issue.destroy')->middleware('can:manage_users');


// book return
// get book return
Route::get('book-return', [ReturnBooksController::class, 'index'])->name('book-return.index');
// create book return
Route::post('book-return', [ReturnBooksController::class, 'create'])->name('book-return.create');
// edit book return
Route::get('book-return/edit/{id}', [ReturnBooksController::class, 'edit'])->name('book-return.edit');
// update book return
Route::put('book-return/edit/{id}', [ReturnBooksController::class, 'update'])->name('book-return.update');
// delete book return
Route::get('book-return/delete/{id}', [ReturnBooksController::class, 'destroy'])->name('book-return.destroy');






require __DIR__ . '/auth.php';
