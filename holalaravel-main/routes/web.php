<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/ventas/registrar', [VentaController::class, 'registrar'])->name('ventas.registrar')->middleware('can:venta.create');

Route::get( '/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::post('/ventas',[VentaController::class,'store'])->name('ventas.store');

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //ruta categorias
    Route::resource('/categoria', CategoriaController::class) ->parameters(['categoria' => 'categoria']);
    
    //pdf
    Route::get('producto/pdf', [ProductoController::class, 'pdf'])->name('producto.pdf');
    Route::get('/pdfProductos', [PdfController::class, 'pdfProductos'])->name('pdfProductos');
    //ruta productos
    Route::resource('/producto', ProductoController::class);
    //ruta ventas
    Route::resource('/ventas', VentaController::class)->except(['store']);
    
});

require __DIR__.'/auth.php';
