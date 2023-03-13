<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/categories/softdelete/{id}', [CategoryController::class, 'softDelete'])->name('category.softDelete');
Route::get('/categories/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/brands', [BrandController::class, 'index'])->name('brands');
Route::post('/brands', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
Route::patch('/brands/update/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::get('/brands/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
 
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});
