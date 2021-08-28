<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\POController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SKUController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\ZoneController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::post('logout', [LogoutController::class, 'store'])->name('logout');


Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('zone', [ZoneController::class, 'index'])->name('zone.index');
    Route::get('zone/create', [ZoneController::class, 'create'])->name('zone.create');
    Route::post('zone', [ZoneController::class, 'store']);
    Route::get('zone/{zone}/edit', [ZoneController::class, 'edit']);
    Route::put('zone/{zone}', [ZoneController::class, 'update'])->name('zone.update');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('register', [RegisterController::class, 'index'])->name('register');
        Route::post('register', [RegisterController::class, 'store']);

        Route::get('region', [RegionController::class, 'index'])->name('region.index');
        Route::get('region/create', [RegionController::class, 'create'])->name('region.create');
        Route::post('region', [RegionController::class, 'store']);
        Route::get('region/{id}/edit', [RegionController::class, 'edit']);
        Route::put('region/{id}', [RegionController::class, 'update'])->name('region.update');
    });


    Route::get('territory', [TerritoryController::class, 'index'])->name('territory.index');
    Route::get('territory/create', [TerritoryController::class, 'create'])->name('territory.create');
    Route::post('territory', [TerritoryController::class, 'store']);
    Route::get('territory/{id}/edit', [TerritoryController::class, 'edit']);
    Route::put('territory/{id}', [TerritoryController::class, 'update'])->name('territory.update');

    Route::get('sku', [SKUController::class, 'index'])->name('sku.index');
    Route::get('sku/create', [SKUController::class, 'create'])->name('sku.create');
    Route::post('sku', [SKUController::class, 'store']);
    Route::get('sku/{id}/edit', [SKUController::class, 'edit']);
    Route::put('sku/{id}', [SKUController::class, 'update'])->name('sku.update');

    Route::get('po/', [POController::class, 'index'])->name('po.index');
    Route::get('po/create', [POController::class, 'create'])->name('po.create');
    Route::post('po', [POController::class, 'store']);
    Route::post('poo', [POController::class, 'search']);
    Route::get('po/excel/{id}', [POController::class, 'exportExcel']);
    Route::get('po-number/{poNumber}', [POController::class, 'poNumber']);

    Route::get('invoice/', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('invoice', [InvoiceController::class, 'store']);
    Route::get('invoice/store/{id}', [InvoiceController::class, 'storeById']);
});


