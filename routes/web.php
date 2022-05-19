<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\GymController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\GymatController;
use App\Http\Controllers\admin\FinancialController;
use App\Http\Controllers\admin\food_tableController;
use App\Http\Controllers\admin\MealController;


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
/*-----------------------begin::main interface-----------------------*/
Route::get('/', [HomeController::class, 'index'])->name('index');
/*-----------------------end::main interface-----------------------*/

/*-----------------------begin::gymat URL-----------------------*/
Route::post('/admin/gymat/store', [GymatController::class, 'store'])->name('admin-gym-store');
Route::get('/admin/gymat/edit/{id}', [GymatController::class, 'edit'])->name('admin-gym-edit');
Route::post('/admin/gymat/destroy/{id}', [GymatController::class, 'destroy'])->name('admin-gym-destroy');
Route::post('/admin/gymat/update/{id}', [GymatController::class, 'update'])->name('admin-gym-update');
/*-----------------------end::gymat-----------------------*/

/*-----------------------begin::Menu URL-----------------------*/
Route::get('/{gymname}/dashboard', [AdminController::class, 'index'])->name('gym-dashboard');
Route::get('/admin/gymat', [GymatController::class, 'index'])->name('admin-gymat');
Route::get('/{gymname}/users', [UserController::class, 'index'])->name('gym-users');
Route::get('/{gymname}/packages', [PackageController::class, 'index'])->name('users-packages');
Route::get('/{gymname}/movements', [FinancialController::class, 'index'])->name('gym-movements');
Route::get('/{gymname}/diet/meals', [MealController::class, 'index'])->name('diet-meals');
Route::get('/{gymname}/diet/food-table', [food_tableController::class, 'index'])->name('diet-food_tables');
/*-----------------------end::menu-----------------------*/

/*-----------------------begin::user URL-----------------------*/
Route::post('/{gymname}/user/store', [UserController::class, 'store'])->name('user-store');
Route::get('/{gymname}/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit');
Route::post('/{gymname}/user/destroy/{id}', [UserController::class, 'destroy'])->name('user-destroy');
Route::post('/{gymname}/user/update/{id}', [UserController::class, 'update'])->name('user-update');
/*-----------------------end::user-----------------------*/

/*-----------------------begin::gym URL-----------------------*/
Route::get('/{gymname}/gym/edit/{id}', [GymController::class, 'edit'])->name('gym-edit');
Route::post('/{gymname}/gym/update/{id}', [GymController::class, 'update'])->name('gym-update');
Route::post('/{gymname}/gym/time-table/{id}', [GymController::class, 'update_time'])->name('gym-update-time');
/*-----------------------end::gym-----------------------*/

/*-----------------------begin::packages URL-----------------------*/
Route::post('/{gymname}/package/store', [PackageController::class, 'store'])->name('package-store');
Route::get('/{gymname}/package/{id}', [PackageController::class, 'edit'])->name('package-edit');
Route::post('/{gymname}/package/update/{id}', [PackageController::class, 'update'])->name('package-update');
Route::post('/{gymname}/package/destroy/{id}', [PackageController::class, 'destroy'])->name('package-destroy');
/*-----------------------end::packages-----------------------*/

/*-----------------------begin::gymat URL-----------------------*/
Route::post('/admin/gymat/store', [GymatController::class, 'store'])->name('admin-gym-store');
Route::get('/admin/gymat/edit/{id}', [GymatController::class, 'edit'])->name('admin-gym-edit');
Route::post('/admin/gymat/update/{id}', [GymatController::class, 'update'])->name('admin-gym-update');
Route::post('/admin/gymat/destroy/{id}', [GymatController::class, 'destroy'])->name('admin-gym-destroy');
/*-----------------------end::user-----------------------*/

/*-----------------------begin::Financial URL-----------------------*/
Route::post('/{gymname}/add-receipt', [FinancialController::class, 'store_receipt'])->name('add-receipt');
Route::post('/{gymname}/update-receipt/{id}', [FinancialController::class, 'update_receipt'])->name('update-receipt');
Route::post('/{gymname}/collect-amount', [FinancialController::class, 'collect_amount'])->name('collect_amount');
Route::post('/{gymname}/record-search', [FinancialController::class, 'record_search'])->name('record_search');
Route::get('/{gymname}/financial-record/{id}', [FinancialController::class, 'financial_record'])->name('financial-record');
Route::post('/{gymname}/financial-record/update-receipt/{id}', [FinancialController::class, 'update_receipt'])->name('update-receipt2');
Route::post('/{gymname}/contract-search', [FinancialController::class, 'contract_search'])->name('contract-search');
Route::get('/{gymname}/contract/{id}', [FinancialController::class, 'contract'])->name('contract');
Route::post('/{gymname}/contract/store/{id}', [FinancialController::class, 'store_contract'])->name('store-contract');
/*-----------------------end::Financial URL-----------------------*/

/*-----------------------begin::Diet URL-----------------------*/
/*-----------------------Meal URL-----------------------*/
Route::post('/{gymname}/diet/meal/store', [MealController::class, 'store'])->name('meal-store');
Route::get('/{gymname}/diet/meal/{id}', [MealController::class, 'edit'])->name('meal-edit');
Route::post('{gymname}/diet/meal/update/{id}', [MealController::class, 'update'])->name('meal-update');
Route::post('/{gymname}/diet/meal/destroy/{id}', [MealController::class, 'destroy'])->name('meal-destroy');

/*-----------------------food-table URL-----------------------*/
Route::post('/{gymname}/diet/food-table/store', [DietController::class, 'store'])->name('meal-store');
Route::get('/{gymname}/diet/food-table/{id}', [DietController::class, 'edit'])->name('meal-edit');
Route::post('{gymname}/diet/food-table/update/{id}', [DietController::class, 'update'])->name('meal-update');
Route::post('/{gymname}/diet/food-table/destroy/{id}', [DietController::class, 'destroy'])->name('meal-destroy');
/*-----------------------end::Diet URL-----------------------*/

Auth::routes();
