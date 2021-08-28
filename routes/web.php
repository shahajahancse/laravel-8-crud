<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home']);
Route::get('posts', [ PostController::class, 'index' ])->name('posts');
Route::get('post/create', [ PostController::class, 'create' ])->name('posts.create');
Route::post('posts', [ PostController::class, 'store' ])->name('posts.store');
Route::get('post/{id}/edit', [ PostController::class, 'edit' ])->name('posts.edit');
Route::put('post/{id}', [ PostController::class, 'update' ])->name('posts.update');
Route::delete('post/{id}', [ PostController::class, 'destroy' ])->name('posts.destroy');
Route::get('post/{id}', [PostController::class, 'show'])->name('posts.show');

// Student controller
Route::get('students', [StudentController::class, 'index'])->name('students');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('students', [StudentController::class, 'store'])->name('student.store');
Route::get('student/{id}', [StudentController::class, 'show'])->name('student.view');
Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('student/{id}', [StudentController::class, 'destroy'])->name('student.delete');
