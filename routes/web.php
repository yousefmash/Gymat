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
use App\Http\Controllers\admin\Food_tableController;
use App\Http\Controllers\admin\Gym_PackageController;
use App\Http\Controllers\admin\MealController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\admin\SessionController;
use App\Http\Controllers\PasswordController;

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
Route::get('/{gymname}/dashboard', [AdminController::class, 'index'])->name('gym-dashboard');
/*-----------------------end::main interface-----------------------*/



/*-----------------------begin::gymat URL-----------------------*/
Route::get('/admin/gymat', [GymatController::class, 'index'])->name('admin-gymat')->middleware('UserAuth:2');
Route::post('/admin/gymat/store', [GymatController::class, 'store'])->name('admin-gym-store')->middleware('UserAuth:2');
Route::get('/admin/gymat/edit/{id}', [GymatController::class, 'edit'])->name('admin-gym-edit')->middleware('UserAuth:2');
Route::post('/admin/gymat/destroy/{id}', [GymatController::class, 'destroy'])->name('admin-gym-destroy')->middleware('UserAuth:2');
Route::post('/admin/gymat/update/{id}', [GymatController::class, 'update'])->name('admin-gym-update')->middleware('UserAuth:2');
/*-----------------------end::gymat-----------------------*/

/*-----------------------begin::gym_packages URL-----------------------*/
Route::get('/admin/gym-package', [Gym_PackageController::class, 'index'])->name('users-packages')->middleware('UserAuth:2');
Route::post('/admin/gym-package/store', [Gym_PackageController::class, 'store'])->name('gym-package-store')->middleware('UserAuth:2');
Route::get('/admin/gym-package/{id}', [Gym_PackageController::class, 'edit'])->name('gym-package-edit')->middleware('UserAuth:2');
Route::post('/admin/gym-package/update/{id}', [Gym_PackageController::class, 'update'])->name('gym-package-update')->middleware('UserAuth:2');
Route::post('/admin/gym-package/destroy/{id}', [Gym_PackageController::class, 'destroy'])->name('gym-package-destroy')->middleware('UserAuth:2');
/*-----------------------end::gym_packages-----------------------*/

/*-----------------------begin::gym URL-----------------------*/
Route::get('/{gymname}/gym/edit/{id}', [GymController::class, 'edit'])->name('gym-edit')->middleware('UserAuth:3');
Route::post('/{gymname}/gym/update/{id}', [GymController::class, 'update'])->name('gym-update')->middleware('UserAuth:3');
Route::post('/{gymname}/gym/time-table/{id}', [GymController::class, 'update_time'])->name('gym-update-time')->middleware('UserAuth:3');
/*-----------------------end::gym-----------------------*/

/*-----------------------begin::packages URL-----------------------*/
Route::get('/{gymname}/packages', [PackageController::class, 'index'])->name('users-packages')->middleware('UserAuth:3');
Route::post('/{gymname}/package/store', [PackageController::class, 'store'])->name('package-store')->middleware('UserAuth:3');
Route::get('/{gymname}/package/{id}', [PackageController::class, 'edit'])->name('package-edit')->middleware('UserAuth:3');
Route::post('/{gymname}/package/update/{id}', [PackageController::class, 'update'])->name('package-update')->middleware('UserAuth:3');
Route::post('/{gymname}/package/destroy/{id}', [PackageController::class, 'destroy'])->name('package-destroy')->middleware('UserAuth:3');
/*-----------------------end::packages-----------------------*/

/*-----------------------begin::user URL-----------------------*/
Route::get('/{gymname}/users', [UserController::class, 'index'])->name('gym-users')->middleware('UserAuth:3,4');
Route::get('/{gymname}/profile', [UserController::class, 'profile'])->name('uesr-profile')->middleware('UserAuth:1');
Route::post('/{gymname}/user/store', [UserController::class, 'store'])->name('user-store')->middleware('UserAuth:3,4');
Route::get('/{gymname}/user/edit/{id}', [UserController::class, 'edit'])->name('user-edit')->middleware('UserAuth:3,4');
Route::post('/{gymname}/user/destroy/{id}', [UserController::class, 'destroy'])->name('user-destroy')->middleware('UserAuth:3,4');
Route::post('/{gymname}/user/update/{id}', [UserController::class, 'update'])->name('user-update')->middleware('UserAuth:3,4');
Route::post('/{gymname}/reset-password', [UserController::class, 'reset_password'])->name('user-reset_password')->middleware('UserAuth:1');
Route::post('/{gymname}/user/delete-password/{id}', [UserController::class, 'delete_password'])->name('user-delete_password')->middleware('UserAuth:3,4');
Route::post('/{gymname}/profile/update', [UserController::class, 'profile_update'])->name('user-profile_update')->middleware('UserAuth:1');
/*-----------------------end::user-----------------------*/

/*-----------------------begin::Financial URL-----------------------*/
Route::get('/{gymname}/movements', [FinancialController::class, 'index'])->name('gym-movements')->middleware('UserAuth:3,4');
Route::post('/{gymname}/add-receipt', [FinancialController::class, 'store_receipt'])->name('add-receipt')->middleware('UserAuth:3,4');
Route::post('/{gymname}/update-receipt/{id}', [FinancialController::class, 'update_receipt'])->name('update-receipt')->middleware('UserAuth:3,4');
Route::post('/{gymname}/collect-amount', [FinancialController::class, 'collect_amount'])->name('collect_amount')->middleware('UserAuth:3,4');
Route::post('/{gymname}/record-search', [FinancialController::class, 'record_search'])->name('record_search')->middleware('UserAuth:3,4');
Route::get('/{gymname}/financial-record/{id}', [FinancialController::class, 'financial_record'])->name('financial-record')->middleware('UserAuth:3,4');
Route::post('/{gymname}/financial-record/update-receipt/{id}', [FinancialController::class, 'update_receipt'])->name('update-receipt3,4')->middleware('UserAuth:3,4');
Route::get('/{gymname}/financial-record', [FinancialController::class, 'show'])->name('contract')->middleware('UserAuth:1');
Route::post('/{gymname}/contract-search', [FinancialController::class, 'contract_search'])->name('contract-search')->middleware('UserAuth:3,4');
Route::get('/{gymname}/contract/{id}', [FinancialController::class, 'contract'])->name('contract')->middleware('UserAuth:3,4');
Route::post('/{gymname}/contract/store/{id}', [FinancialController::class, 'store_contract'])->name('store-contract')->middleware('UserAuth:3,4');
/*-----------------------end::Financial URL-----------------------*/

/*-----------------------begin::note URL-----------------------*/
Route::get('/{gymname}/notices', [NoticeController::class, 'index'])->name('notices')->middleware('UserAuth:3,4');
Route::post('/{gymname}/notices/store', [noticeController::class, 'store'])->name('notices-store')->middleware('UserAuth:3,4');
Route::post('/{gymname}/notices/destroy/{id}', [noticeController::class, 'destroy'])->name('notices-destroy')->middleware('UserAuth:3,4');
/*-----------------------end::note URL-----------------------*/

/*-----------------------begin::sessions URL-----------------------*/
Route::get('/{gymname}/sessions', [SessionController::class, 'index'])->name('gym-sessions')->middleware('UserAuth:3,4');
Route::post('/{gymname}/arrival-search', [SessionController::class, 'arrival_search'])->name('session-arrival-search')->middleware('UserAuth:3,4');
Route::post('/{gymname}/leave-search', [SessionController::class, 'leave_search'])->name('session-leave-search')->middleware('UserAuth:3,4');
/*-----------------------end::sessions URL-----------------------*/


/*-----------------------begin::Diet URL-----------------------*/
/*-----------------------Meal URL-----------------------*/
Route::get('/{gymname}/diet/meals', [MealController::class, 'index'])->name('diet-meals')->middleware('UserAuth:3,5');
Route::post('/{gymname}/diet/meal/store', [MealController::class, 'store'])->name('meal-store')->middleware('UserAuth:3,5');
Route::get('/{gymname}/diet/meal/{id}', [MealController::class, 'edit'])->name('meal-edit')->middleware('UserAuth:3,5');
Route::post('{gymname}/diet/meal/update/{id}', [MealController::class, 'update'])->name('meal-update')->middleware('UserAuth:3,5');
Route::post('/{gymname}/diet/meal/destroy/{id}', [MealController::class, 'destroy'])->name('meal-destroy')->middleware('UserAuth:3,5');
/*-----------------------food-table URL-----------------------*/
Route::get('/{gymname}/diet/food-tables', [Food_tableController::class, 'index'])->name('diet-food_tables')->middleware('UserAuth:3,5');
Route::post('/{gymname}/diet/food-table/store/{id}', [Food_tableController::class, 'store'])->name('food-table-store')->middleware('UserAuth:3,5');
Route::get('/{gymname}/diet/food-table/{id}', [Food_tableController::class, 'edit'])->name('food-table-edit')->middleware('UserAuth:3,5');
Route::post('{gymname}/diet/food-table/update/{id}', [Food_tableController::class, 'update'])->name('food-table-update')->middleware('UserAuth:3,5');
Route::post('/{gymname}/diet/food-table/{uesr_id}/destroy/{meal_num}', [Food_tableController::class, 'destroy'])->name('meal-food-table-destroy')->middleware('UserAuth:3,5');
Route::post('/{gymname}/diet/food-table-search', [Food_tableController::class, 'food_table_search'])->name('food-table-search')->middleware('UserAuth:3,5');
Route::get('/{gymname}/diet/food-table/{id}', [Food_tableController::class, 'edit'])->name('Food_table-edit')->middleware('UserAuth:3,5');
Route::post('/{gymname}/diet/food-table/meal/store', [Food_tableController::class, 'store'])->name('Food_table-edit')->middleware('UserAuth:3,5');
Route::get('/{gymname}/diet', [Food_tableController::class, 'show'])->name('Food_table-edit')->middleware('UserAuth:1');
/*-----------------------end::Diet URL-----------------------*/
Route::get('/login/password', [PasswordController::class, 'account'])->name('account');
Route::post('/login/password/set', [PasswordController::class, 'check_account'])->name('check_account');
Route::post('/login/new-password/{id}', [PasswordController::class, 'set_password'])->name('set_password');
Auth::routes();
