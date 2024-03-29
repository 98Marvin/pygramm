<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ChangePass;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
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
    $clients = DB::table('clients')->get();
    $services = DB::table('services')->get();
    $portfolios = DB::table('portfolios')->get();

    return view('home', compact('clients', 'services', 'portfolios'));
});

Route::get('/portfolio', [HomeController::class, 'all'])->name('portfolio');
Route::get('/portfolio/{id}', [HomeController::class, 'single'])->name('single');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact.form');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/categories/softdelete/{id}', [CategoryController::class, 'softDelete'])->name('category.softDelete');
Route::get('/categories/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::post('/clients', [ClientController::class, 'store'])->name('client.store');
Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
Route::patch('/clients/update/{id}', [ClientController::class, 'update'])->name('client.update');
Route::get('/clients/delete/{id}', [ClientController::class, 'delete'])->name('client.delete');

Route::get('/home/slider', [HomeController::class, 'index'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'create'])->name('add.slider');
Route::post('/slider/store', [HomeController::class, 'store'])->name('slider.store');
Route::get('/slider/edit/{id}', [HomeController::class, 'edit'])->name('slider.edit');
Route::patch('/slider/update/{id}', [HomeController::class, 'update'])->name('slider.update');
Route::get('/slider/delete/{id}', [HomeController::class, 'delete'])->name('slider.delete');

Route::get('/home/services', [HomeController::class, 'services'])->name('home.services');
Route::get('/home/portfolio', [HomeController::class, 'portfolio'])->name('home.portfolio');
Route::get('/add/portfolio', [HomeController::class, 'addPortfolio'])->name('add.portfolio');
Route::post('/portfolio/store', [HomeController::class, 'storePortfolio'])->name('portfolio.store');

Route::get('admin/contact', [ContactController::class, 'contact'])->name('admin.contact');
Route::get('add/contact', [ContactController::class, 'add'])->name('add.contact');
Route::post('store/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::get('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
Route::get('admin/message', [ContactController::class, 'message'])->name('admin.message');
Route::get('message/delete/{id}', [ContactController::class, 'deleteMessage'])->name('message.delete');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('admin.index', compact('users'));
    })->name('dashboard');
});

Route::get('/user/password', [ChangePass::class, 'index'])->name('change.password');
Route::post('/password/update', [ChangePass::class, 'updatePassword'])->name('update.password');
Route::get('/user/profile', [ChangePass::class, 'profile'])->name('profile.update');
Route::post('/user/profile/update', [ChangePass::class, 'updateProfile'])->name('update.profile');
