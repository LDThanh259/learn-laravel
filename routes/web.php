<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::prefix('product')->group(function () {

//     Route::get('/', [ProductController::class, "index"])->name('product.index');

//     Route::get('/add', [ProductController::class, "add"])->name('product.add');

//     Route::get('/{id?}', [ProductController:: class, "detail"])->where('id', '[A-Za-z0-9]+')
//     ->name('product.detail');
// });

Route::prefix('product')->group(function () {

    Route::controller(ProductController::class)->group(function(){

        Route::get('/',  "index")->name('product.index');
    
        Route::get('/add',  "add")->name('product.add');
    
        Route::get('/{id?}',  "detail")->where('id', '[A-Za-z0-9]+')
        ->name('product.detail');

        Route::post('/store', "store")->name('product.store');

    });
});

Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', "login")->name('login');
        Route::post('/checkLogin', "checkLogin")->name('checkLogin');
    });
});

Route::get('/sinhvien/{name?}/{mssv?}', function (
    $name = 'Le Duc Thanh',
    $mssv = '0321067'
) {
    return view('sinhvien', compact('name', 'mssv'));
})->name('sinhvien');

Route::get('/banco/{n?}', function ($n = 8) {
    return view('banco', compact('n'));
})->name('banco');

Route::fallback(function () {
    return response()->view('error.404', [], 404);
});
