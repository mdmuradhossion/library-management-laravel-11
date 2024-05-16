<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IssueBooksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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
Route::get('/cash-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return back()->with('success','Clear cache successful!');

})->name('cash-clear');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('user-login');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth','user'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user-profile');
    Route::post('user/profile_update', [UserController::class, 'update'])->name('user-profile-update');
    Route::get('user/password/change', [UserController::class, 'password'])->name('user-password-change');
    Route::post('user/password/update', [UserController::class, 'password_update'])->name('user-password-update');
    Route::get('user/issued/books', [UserController::class, 'books'])->name('user-issued-books');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('admin/change/password', [AdminController::class, 'change_password'])->name('admin-change-password');
    Route::post('admin/password/action', [AdminController::class, 'password'])->name('admin-password-action');


    //category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin-category');
    Route::get('admin/add/category', [CategoryController::class, 'create'])->name('admin-add-category');
    Route::post('admin/category/action', [CategoryController::class, 'store'])->name('admin-category-action');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin-category-edit');
    Route::post('admin/category/update/action', [CategoryController::class, 'update'])->name('admin-category-update-action');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin-category-delete');


    //author
    Route::get('admin/author', [AuthorController::class, 'index'])->name('admin-author');
    Route::get('admin/add/author', [AuthorController::class, 'create'])->name('admin-add-author');
    Route::post('admin/author/action', [AuthorController::class, 'store'])->name('admin-author-action');
    Route::get('admin/author/edit/{id}', [AuthorController::class, 'edit'])->name('admin-author-edit');
    Route::post('admin/author/update/action', [AuthorController::class, 'update'])->name('admin-author-update-action');
    Route::get('admin/author/delete/{id}', [AuthorController::class, 'destroy'])->name('admin-author-delete');


    //books
    Route::get('admin/books', [BooksController::class, 'index'])->name('admin-books');
    Route::get('admin/add/books', [BooksController::class, 'create'])->name('admin-add-books');
    Route::post('admin/books/action', [BooksController::class, 'store'])->name('admin-books-action');
    Route::get('admin/books/edit/{id}', [BooksController::class, 'edit'])->name('admin-books-edit');
    Route::post('admin/books/update/action', [BooksController::class, 'update'])->name('admin-books-update-action');
    Route::get('admin/books/delete/{id}', [BooksController::class, 'destroy'])->name('admin-books-delete');

    //books
    Route::get('admin/issueBooks', [IssueBooksController::class, 'index'])->name('admin-issueBooks');
    Route::get('admin/add/issueBooks', [IssueBooksController::class, 'create'])->name('admin-add-issueBooks');
    Route::post('admin/issueBooks/get_student', [IssueBooksController::class, 'get_student'])->name('admin-issueBooks-get_student');
    Route::post('admin/issueBooks/get_book', [IssueBooksController::class, 'get_book'])->name('admin-issueBooks-get_book');
    Route::post('admin/issueBooks/action', [IssueBooksController::class, 'store'])->name('admin-issueBooks-action');
    Route::get('admin/issueBooks/edit/{id}', [IssueBooksController::class, 'edit'])->name('admin-issueBooks-edit');
    Route::post('admin/issueBooks/update/action', [IssueBooksController::class, 'update'])->name('admin-issueBooks-update-action');

    //books
    Route::get('admin/student', [StudentController::class, 'index'])->name('admin-student');
    Route::get('admin/student/status_update/{id}/{status}', [StudentController::class, 'edit'])->name('admin-student-status');




});
