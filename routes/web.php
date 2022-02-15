<?php

use Illuminate\Support\Facades\App;
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
    return redirect(\route('admin'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware('auth')->group(function () {
    $session = new Symfony\Component\HttpFoundation\Session\Session();
    App::setLocale($session->get('lang'));
//    Customers
    Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.all');
    Route::get('/customers/add',[\App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store',[\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/edit/{customer}',[\App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::patch('/customers/update/{customer}',[\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/delete/{customer}',[\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.delete');
    Route::get('/customers/show/{customer}',[\App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
    Route::post('/customer/vehicle/handle', [\App\Http\Controllers\CustomerController::class, 'vehicleHandler'])->name('customer.vehicleHandler');

    Route::get('/employees', [\App\Http\Controllers\UserController::class, 'index'])->name('employees.all');
    Route::get('/employees/add',[\App\Http\Controllers\UserController::class, 'create'])->name('employees.create');
    Route::get('/employees/show/{user}',[\App\Http\Controllers\UserController::class, 'show'])->name('employees.show');
    Route::post('/employees/store',[\App\Http\Controllers\UserController::class, 'store'])->name('employees.store');
    Route::get('/employees/edit/{user}',[\App\Http\Controllers\UserController::class, 'edit'])->name('employees.edit');
    Route::patch('/employees/update/{user}',[\App\Http\Controllers\UserController::class, 'update'])->name('employees.update');
    Route::delete('/employees/delete/{user}',[\App\Http\Controllers\UserController::class, 'destroy'])->name('employees.delete');
    Route::get('/employees/settings/{user}',[\App\Http\Controllers\UserController::class, 'settings'])->name('employees.settings');

    Route::post('/settings/store',[\App\Http\Controllers\SettingController::class, 'store'])->name('settings.store');

    Route::get('/permissions', [\App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.all');
    Route::post('/permissions/handle', [\App\Http\Controllers\PermissionController::class, 'ajaxHandler'])->name('permissions.ajax-handler');
    Route::post('/permissions/attach', [\App\Http\Controllers\PermissionController::class, 'roleAttach'])->name('permissions.attach');

    Route::get('/vehicles/config/{topic}', [\App\Http\Controllers\VehicleController::class, 'config'])->name('vehicles.config');
    Route::post('/vehicles/config/handle', [\App\Http\Controllers\VehicleBrandController::class, 'ajaxHandler'])->name('vehicles.ajax');

    Route::get('/vehicles', [\App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.all');
    Route::get('/vehicles/create', [\App\Http\Controllers\VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/vehicles/store', [\App\Http\Controllers\VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles/edit/{vehicle}', [\App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::patch('/vehicles/update/{vehicle}', [\App\Http\Controllers\VehicleController::class, 'update'])->name('vehicles.update');
    Route::post('/vehicles/models/handle', [\App\Http\Controllers\VehicleController::class, 'ajaxHandler'])->name('vehicles.ajax-handler');
    Route::delete('/vehicles/delete', [\App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicles.delete');
    Route::get('/vehicles/show/{vehicle}', [\App\Http\Controllers\VehicleController::class, 'show'])->name('vehicles.show');

    Route::get('/vehicles/config/type/create', [\App\Http\Controllers\VehicleTypeController::class, 'create'])->name('vehicletype.create');
    Route::post('/vehicles/config/type/store', [\App\Http\Controllers\VehicleTypeController::class, 'store'])->name('vehicletype.store');
    Route::get('/vehicles/config/type/edit/{type}', [\App\Http\Controllers\VehicleTypeController::class, 'edit'])->name('vehicletype.edit');
    Route::patch('/vehicles/config/type/update/{type}', [\App\Http\Controllers\VehicleTypeController::class, 'update'])->name('vehicletype.update');
    Route::delete('/vehicles/config/type/delete',[\App\Http\Controllers\VehicleTypeController::class, 'destroy'])->name('vehicletype.delete');

    Route::get('/vehicles/config/brand/create', [\App\Http\Controllers\VehicleBrandController::class, 'create'])->name('vehiclebrand.create');
    Route::post('/vehicles/config/brand/store', [\App\Http\Controllers\VehicleBrandController::class, 'store'])->name('vehiclebrand.store');
    Route::get('/vehicles/config/brand/edit/{type}', [\App\Http\Controllers\VehicleBrandController::class, 'edit'])->name('vehiclebrand.edit');
    Route::patch('/vehicles/config/brand/update/{type}', [\App\Http\Controllers\VehicleBrandController::class, 'update'])->name('vehiclebrand.update');
    Route::delete('/vehicles/config/brand/delete',[\App\Http\Controllers\VehicleBrandController::class, 'destroy'])->name('vehiclebrand.delete');

    Route::get('/vehicles/config/model/create', [\App\Http\Controllers\VehicleModelController::class, 'create'])->name('vehiclemodel.create');
    Route::post('/vehicles/config/model/store', [\App\Http\Controllers\VehicleModelController::class, 'store'])->name('vehiclemodel.store');
    Route::get('/vehicles/config/model/edit/{type}', [\App\Http\Controllers\VehicleModelController::class, 'edit'])->name('vehiclemodel.edit');
    Route::patch('/vehicles/config/model/update/{type}', [\App\Http\Controllers\VehicleModelController::class, 'update'])->name('vehiclemodel.update');
    Route::delete('/vehicles/config/model/delete',[\App\Http\Controllers\VehicleModelController::class, 'destroy'])->name('vehiclemodel.delete');

    Route::get('/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services.all');
    Route::get('/services/create', [\App\Http\Controllers\ServiceController::class, 'create'])->name('services.create');
    Route::post('/services/store', [\App\Http\Controllers\ServiceController::class, 'store'])->name('services.store');
    Route::delete('/services/delete', [\App\Http\Controllers\ServiceController::class, 'destroy'])->name('services.delete');
    Route::get('/services/edit/{service}', [\App\Http\Controllers\ServiceController::class, 'edit'])->name('services.edit');
    Route::patch('/services/update/{service}', [\App\Http\Controllers\ServiceController::class, 'update'])->name('services.update');
    Route::get('/services/show/{service}', [\App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

    Route::get('/stock', [\App\Http\Controllers\StockItemController::class, 'index'])->name('stock-item.all');
    Route::get('/stock-item/create', [\App\Http\Controllers\StockItemController::class, 'create'])->name('stock-item.create');
    Route::post('/stock-item/create', [\App\Http\Controllers\StockItemController::class, 'store'])->name('stock-item.store');
    Route::delete('/stock-item', [\App\Http\Controllers\StockItemController::class, 'destroy'])->name('stock-item.delete');
    Route::get('/stock-item/{stockItem}', [\App\Http\Controllers\StockItemController::class, 'edit'])->name('stock-item.edit');
    Route::patch('/stock-item/{stockItem}', [\App\Http\Controllers\StockItemController::class, 'update'])->name('stock-item.update');

    Route::get('/changelog', [\App\Http\Controllers\HomeController::class, 'changelog'])->name('changelog');
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
});
