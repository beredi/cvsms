<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware('auth')->group(function () {
//    Customers
    Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.all');
    Route::get('/customers/add',[\App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store',[\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/edit/{customer}',[\App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::patch('/customers/update/{customer}',[\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/delete/{customer}',[\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.delete');


    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
});
