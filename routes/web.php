<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/item/store', function () {
  return view('Item.create');
})->name('item.store');

Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::get('/item/import', [ItemController::class, 'import'])->name('item.import');
Route::post('/item/import', [ItemController::class, 'import_post']);