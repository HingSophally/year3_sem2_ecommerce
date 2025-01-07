<?php

use App\Http\Controllers\ProductController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'product'])->name('user.index');
});


Route::middleware(['auth', 'verified', IsAdmin::class])->group(function () {
    // Route::get('/admin', function () {
    //     //This is for admin interface
    //     return view('auth.index');
    // });
    Route::get('/dashboard', function () {

        return view('admin/main');
    });

    Route::get('/add_product', [\App\Http\Controllers\ProductController::class, 'show_category'])->name('admin.show_category');
    Route::get('/product_variant', function () {

        return view('admin/product_variant');
    });

    Route::get('/product_list', [\App\Http\Controllers\ProductController::class, 'index'])->name('admin.show_product');
    Route::get('/product_variant', [\App\Http\Controllers\ProductController::class, 'show'])->name('admin.show');
    Route::post('/product_variant', [\App\Http\Controllers\ProductController::class, 'create_detail'])->name('admin.create_detail');
    Route::post('/add_product', [\App\Http\Controllers\ProductController::class, 'create'])->name('admin.create');

    Route::get('/category_list', function () {

        return view('admin/category_list');
    });

    Route::get('/new_category', function () {

        return view('admin/new_category');
    });

    Route::get('/attributes', function () {

        return view('admin/attributes');
    });

    Route::get('/add_attribute', function () {

        return view('admin/add_attribute');
    });

    Route::get('/order_list', function () {

        return view('admin/order_list');
    });

    Route::get('/order_detail', function () {

        return view('admin/order_detail');
    });

    Route::get('/order_tracking', function () {

        return view('admin/order_tracking');
    });

    Route::get('/all_user', function () {

        return view('admin/all_user');
    });

    Route::get('/add_new_user', function () {

        return view('admin/add_new_user');
    });

    Route::get('/all_roles', function () {

        return view('admin/all_roles');
    });

    Route::get('/create_role', function () {

        return view('admin/create_role');
    });

    Route::get('/report', function () {

        return view('admin/report');
    });
    Route::get('/marketing', [App\Http\Controllers\EmailController::class, 'index'])->name('marketing.index');
    Route::post('/emails/send', [App\Http\Controllers\EmailController::class, 'send'])->name('emails.send');
});







Route::get('/', [\App\Http\Controllers\UserController::class, 'product'])->name('user.index');


Route::get('/product', function () {
    return view('user/product');
});

Route::get('/blog', function () {
    return view('user/blog');
});

Route::get('/about', function () {
    return view('user/about');
});

Route::get('/contact', function () {
    return view('user/contact');
});
Route::get('/shoping_cart', function () {
    return view('user/shoping_cart');
});


// web.php
Route::get('/product/{id}', [ProductController::class, 'getProduct'])->name('product.get');
Route::post('/shoping_cart', [\App\Http\Controllers\Shopping_cartController::class, 'addToCart'])->name('shpping_cart.addToCart');
Route::get('/show_shopping_cart', [\App\Http\Controllers\Shopping_cartController::class, 'show'])->name('shpping_cart.show');
Route::get('/deleteAllProduct', [\App\Http\Controllers\Shopping_cartController::class, 'delete'])->name('shpping_cart.delete');
Route::post('/apply_coupon', [\App\Http\Controllers\Shopping_cartController::class, 'applyCoupon']);



Route::get('/checkout', function () {
    return view('user.checkout');
})->name('checkout');

Route::get('/cart-summary', [\App\Http\Controllers\Shopping_cartController::class, 'getCartSummary'])->name('cart.summary');

Route::post('/process-paypal-order', [OrderController::class, 'processPayPalOrder'])
    ->name('process.paypal.order')
    ->middleware('auth');

// Route::post('/create-paypal-order', [\App\Http\Controllers\PayPalController::class, 'createOrder'])->name('paypal.create');
// Route::post('/capture-paypal-order', [\App\Http\Controllers\PayPalController::class, 'captureOrder'])->name('paypal.capture');
// make exception
Route::get('/payment-success', [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
