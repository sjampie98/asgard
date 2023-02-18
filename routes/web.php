<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\CategoryController;

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
Route::get('/', [PreviewController::class, 'preview'])->name('preview');
Route::get('/view/{id}', [PreviewController::class, 'previewCategory'])->name('previewCategory');
Route::get('/contacts', [PreviewController::class, 'contacts'])->name('contacts');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/image-upload-preview', [ImageUploadController::class, 'index']);
Route::post('/upload-image', [ImageUploadController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/add-category', [CategoryController::class, 'add'])->name('add-category');


