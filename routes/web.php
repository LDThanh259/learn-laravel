<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('product')->group(function () {

    Route::get('/', function () {
        $products = [
            ['id' => 1, 'name' => 'iPhone 15', 'price' => 25000000],
            ['id' => 2, 'name' => 'Samsung S24', 'price' => 22000000],
        ];

        return view('product.index', compact('products'));
    })->name('product.index');

    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    Route::get('/{id?}', function ($id = '123') {
        return "Product ID: " . $id;
    })->where('id', '[A-Za-z0-9]+');
});

Route::get('/sinhvien/{name?}/{mssv?}', function (
    $name = 'Le Duc Thanh',
    $mssv = '0321067'
) {
    return view('sinhvien', compact('name', 'mssv'));
});

Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
});

Route::fallback(function () {
    return response()->view('error.404', [], 404);
});