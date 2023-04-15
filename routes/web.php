<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    $blogs = Blog::latest()->Simplepaginate(6);
    return view('index', compact('blogs'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create')->middleware('user');
Route::post('/add', [App\Http\Controllers\HomeController::class, 'add'])->name('add')->middleware('user');
Route::post('/view/{id}', [App\Http\Controllers\HomeController::class, 'view']);
Route::put('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update')->middleware('user');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit')->middleware('user');
Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('delete')->middleware('admin');
