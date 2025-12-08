<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'] );


Route::get('/produtos/add-produto', [ProductController::class, 'create']);
Route::get('/produtos/{id}', [ProductController::class, 'show']);
Route::post('/produtos/add-lista/{id}', [ProductController::class, 'addLista'])->middleware('auth');
Route::delete('/produtos/remove-lista/{id}', [ProductController::class, 'removeLista'])->middleware('auth');


Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('/produtos/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/produtos/update/{id}', [ProductController::class, 'update'])->middleware('auth');


Route::post('/produtos', [ProductController::class, 'store']);



Route::get('/dashboard', [ProductController::class, 'dashboard'])->middleware('auth');


Route::get('/produtos', function () {
    return view('produtos');
});
