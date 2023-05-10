<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\staff\StaffController;
use App\Http\Controllers\user\UserController;
use App\Http\Livewire\Details;
use App\Http\Livewire\Keranjang;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('frontend.first', ['title'=>'Marahobina Store']);
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}',Details::class)->name('product.details');
// Route::get('/cart', Keranjang::class)->name('product.cart');
Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/member/home', [UserController::class, 'index'])->name('home.member');
    // Route::get('/product/{slug}',Details::class)->name('product.details');
    Route::get('/cart', Keranjang::class)->name('product.cart');
});

Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff/home', [StaffController::class, 'index'])->name('home.staff');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Product
    Route::get('/admin/product', [AdminController::class, 'index'])->name('home.admin');
    Route::get('/admin/product-add',[ProductController::class, 'index'])->name('product.add');
    Route::get('/admin/product/edit/{id}',[ProductController::class, 'edited'])->name('product.edit');
    
    // Kategori
    Route::get('/admin/kategori', [AdminController::class, 'kategori_view'])->name('kategori.admin');

    // Pre-Order
    Route::get('/admin/preorder', [AdminController::class, 'po_view'])->name('preorder.admin');

    // Request Order
    Route::get('/admin/request', [AdminController::class, 'request_view'])->name('request.admin');
});
