<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrdersController as AdminOrdersController;
use App\Http\Controllers\OrderController;


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
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register')->name('auth.register');
});

Route::get('/dashboard', function () {
    return view('admin.products.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//route ten hien thi loi chao
Route::get('/phuong', function () {
    return view('test'); 
});

//route su dung method 
Route::get('/method', function () {
    return view('form'); 
});
//route get
Route::get('/result_get', function (Request $request) {
    return view('result_get', ['data' => $request->all()]);
});
//route post

Route::post('/result_post', function (Request $request) {
    return view('result_post', ['data' => $request->all()]);
});
//route parameters + name
Route::get('/parameters', function () {
    return view('test');
});
Route::get('/parameters/{id}', function ($id) {
    return 'Parameter ' . $id;
})->name('param');

//route conditional 'where' 
Route::get('/person', function () {
    return view('test');
});
Route::get('/person/{age}', function ($age) {
    return 'The baby`s age is: ' . $age;
})->where('age', '[0-9]');


//view trong folder phuon
Route::get('/phuon', function () {
    return view('phuon.test'); 
});

//kiem tra 1 view co ton tai hay k
Route::get('/checkview', function() {
    if (View::exists('phuon.check')) {
        echo '
<script>alert("File check exist");</script>';
    } else {
        echo '
<script>alert("File check is not exist");</script>';
    }
});

//truyen bien vao view
Route::get('/data', function () {
    return view('phuong')
                ->with('name', 'Phuong')
                ->with('age', 23); 
});

//route group
Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    //show list of products
    Route::get('/products',[AdminProductController::class, 'index'])->name('products.index');
    
    //show single product
    Route::get('/products/{id}', [AdminProductController::class, 'show'])->name('product.show');

    Route::get('/', function () {
        return view('admin.products.home');
    });

    //create product
    Route::get('/create',[AdminProductController::class, 'create'])->name('product.create');
    Route::post('/create',[AdminProductController::class, 'store'])->name('product.store');

    //edit product
    Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::patch('/update/{id}', [AdminProductController::class, 'update'])->name('product.update');

    //delete product
    Route::delete('/destroy/{id}', [AdminProductController::class, 'destroy'])->name('product.destroy');

    //search products
    Route::get('/search',[AdminProductController::class, 'search'])->name('products.search');

    Route::get('/edit', function () {
        return 'Edit product';
    });
    Route::get('/delete', function () {
        return 'Delete product';
    });

    //order
    Route::get('/orders',[AdminOrdersController::class, 'index'])->name('orders.index');
});

//add to cart
Route::post('/add-to-cart',[OrderController::class, 'saveDataToSession'])->name('order.save');

//order list
Route::get('/cart-ms',[OrderController::class, 'orderList'])->name('cart-ms');

// remove product
Route::post('remove-product', [OrderController::class, 'removeDataFromSession'])->name('order.remove');
Route::put('order-update', [OrderController::class, 'update'])->name('order.update');
Route::get('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('purchase', [OrderController::class, 'purchase'])->name('order.purchase');

//
Route::get('/home-page', [HomeController::class, 'index'])->name('home-page'); 
//add to love
Route::post('/add-to-love',[HomeController::class, 'saveDataToSession'])->name('love.save');
//remove product love
Route::post('remove-product-love', [HomeController::class, 'removeDataFromSession'])->name('love.remove');
//show love list
Route::get('/wishlist-ms', [HomeController::class, 'loveList'])->name('wishlist-ms');

Route::get('/about-ms', function() {
    return view('my-directory.about-ms');
 });
 Route::get('/blog-ms', function() {
    return view('my-directory.blog-ms');
 });
 Route::get('/blog-single-ms', function() {
    return view('my-directory.blog-single-ms');
 });
 
 Route::get('/contact-ms', function() {
    return view('my-directory.contact-ms');
 });
 Route::get('/product-single-ms/{id}', [ProductController::class, 'productSingle'])->name('product-single-ms');
 
 Route::get('/shop-ms',[ProductController::class, 'shop'])->name('shop-ms');

 Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');

 
 