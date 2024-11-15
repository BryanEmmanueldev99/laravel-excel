<?php

use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/excel', [ImportExcelController::class,'index'])->name('index');

Route::post('/excel', [ImportExcelController::class,'import_excel_registers'])->name('import_excel_registers');

Route::get('users/export/', [ImportExcelController::class, 'export'])->name('export');

Route::get('productos/{id}', [ProductoController::class, 'edit'])->name('edit');


Route::get('/productos', [ProductoController::class,'index'])->name('index.productos');

Route::post('/productos', [ProductoController::class,'store'])->name('import_excel_productos');

