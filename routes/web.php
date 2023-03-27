<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
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
    $brands = DB::table('brands')->get();
    $services = DB::table('services')->get();
    return view('home', compact('brands', 'services'));
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');

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

Route::get('/home/slider', [HomeController::class, 'index'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'create'])->name('add.slider');
Route::post('/slider/store', [HomeController::class, 'store'])->name('slider.store');
Route::get('/slider/edit/{id}', [HomeController::class, 'edit'])->name('slider.edit');
Route::patch('/slider/update/{id}', [HomeController::class, 'update'])->name('slider.update');
Route::get('/slider/delete/{id}', [HomeController::class, 'delete'])->name('slider.delete');

Route::get('/home/services', [HomeController::class, 'services'])->name('home.services');

Route::get('admin/contact', [ContactController::class, 'contact'])->name('admin.contact');
Route::get('add/contact', [ContactController::class, 'add'])->name('add.contact');
Route::post('store/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::get('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
Route::get('admin/message', [ContactController::class, 'message'])->name('admin.message');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('admin.index', compact('users'));
    })->name('dashboard');
});
