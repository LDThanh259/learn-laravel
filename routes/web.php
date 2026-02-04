<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckTimeAccess;
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

// Route::prefix('product')->middleware(CheckTimeAccess::class)->group(function () {

//     Route::controller(ProductController::class)->group(function () {

//         Route::get('/',  "index")->name('product.index');

//         Route::get('/add',  "add")->name('product.add');

//         Route::get('/{id?}',  "detail")->where('id', '[A-Za-z0-9]+')
//             ->name('product.detail');

//         Route::post('/store', "store")->name('product.store');
//     });
// });

Route::prefix('product')->group(function () {

    Route::controller(ProductController::class)->group(function () {

        Route::get('/',  "index")->name('product.index');

        // Route::get('/add',  "add")->name('product.add')->middleware(CheckTimeAccess::class);
        Route::get('/add',  "add")->name('product.add');

        Route::get('/{id?}',  "detail")->where('id', '[A-Za-z0-9]+')
            ->name('product.detail');

        Route::post('/store', "store")->name('product.store');
        Route::put('/update/{id}', "update")->name('product.update');
        Route::delete('/delete/{id}', "destroy")->name('product.destroy');
    });
});

Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', "login")->name('login');
        Route::post('/checkLogin', "checkLogin")->name('checkLogin');
        
        Route::get('/signin', "SignIn")->name('auth.signin');
        Route::post('/check-signin', "CheckSignIn")->name('auth.check_signin');

        Route::get('/input-age', "InputAge")->name('auth.input_age');
        Route::post('/check-age', "PostCheckAge")->name('auth.check_age');
    });
});

Route::middleware(['check.age'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Welcome to Admin Dashboard (Age Verified)";
    })->name('admin.dashboard');
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

Route::get('/admin', function () {
    return view('layout.admin');
})->name('admin');