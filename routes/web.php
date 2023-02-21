<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditPreviewController;
use App\Http\Controllers\EditContactController;

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
Route::get('/contact', [PreviewController::class, 'contact'])->name('contact');
Route::post('/contact', [PreviewController::class, 'sendContact'])->name('post-contact');



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/image-upload-preview', [ImageUploadController::class, 'index']);
Route::post('/upload-image', [ImageUploadController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/edit-preview', [EditPreviewController::class, 'index'])->name('edit-preview');
Route::post('/edit-preview', [EditPreviewController::class, 'editSort'])->name('edit-sort-preview');
Route::post('/add-category', [CategoryController::class, 'add'])->name('add-category');
Route::get('/edit-contact', [EditContactController::class, 'index'])->name('index-contact');
Route::post('/edit-contact', [EditContactController::class, 'editContact'])->name('edit-contact');

