<?php

use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimulationController;
use App\Http\Controllers\SoldController;
use App\Models\Outlet;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $outlets = Outlet::all();
    return view('welcome', compact('outlets'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('products', ProductController::class);
    Route::resource('solds', SoldController::class);
    Route::resource('simulations', SimulationController::class);
    Route::resource('outlet', OutletController::class);
    // Route::delete('/outlet/destroy/{outlet}', [ProfileController::class, 'destroy'])->name('outlet.destroy');
});

require __DIR__ . '/auth.php';
