<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestroysController;
use App\Http\Controllers\MyApiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ChangeActiveController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\MyloginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsertypesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogitemtypesController;
use App\Http\Controllers\LogitemsController;
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
//    return view('frontend');
//});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('login', [MyloginController::class, 'login'])->name('myLogin');
Route::get('myLogout', [MyloginController::class, 'myLogout'])->name('myLogout');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('index', [DashboardController::class, 'index'])->name('dashboard');
Route::get('adminIndex', [AdminController::class, 'adminIndex'])->name('adminIndex');

Route::get('destroy/{table}/{id}/{route}', [DestroysController::class, 'destroy'])->name('destroys');
Route::get('destroyWithParam/{table}/{id}/{route}/{param}', [DestroysController::class, 'destroyWithParam'])->name('destroyWithParam');

Route::get('beforeDestroys/{table}/{id}/{route}', [DestroysController::class, 'beforeDestroys'])->name('beforeDestroys');
Route::get('beforeDestroysWithParam/{table}/{id}/{route}/{param}', [DestroysController::class, 'beforeDestroysWithParam'])->name('beforeDestroysWithParam');

Route::get('beforeActivation/{id}/{table}/{route}', [ChangeActiveController::class, 'beforeActivation'])->name('beforeActivation');
Route::get('beforeActivationWithParam/{table}/{id}/{route}/{param}', [ChangeActiveController::class, 'beforeActivationWithParam'])->name('beforeActivationWithParam');

Route::get('Activation/{id}/{table}/{route}', [ChangeActiveController::class, 'Activation'])->name('Activation');
Route::get('ActivationWithParam/{table}/{id}/{route}/{param}', [ChangeActiveController::class, 'ActivationWithParam'])->name('ActivationWithParam');
Route::get('deActivating', [ChangeActiveController::class, 'deActivating'])->name('deActivating');

Route::get('settingIndex', [SettingController::class, 'index'])->name('settingIndex');
Route::get('communicationIndex', [SettingController::class, 'communicationIndex'])->name('communicationIndex');

Route::resource('usertypes',UsertypesController::class);

Route::resource('users',UsersController::class);

Route::get('validating/{active}/{validated}', [ValidationController::class, 'validating'])->name('validating');
Route::get('beforeValidation/{id}/{table}/{route}', [ValidationController::class, 'beforeValidation'])->name('beforeValidation');
Route::get('beforeValidatingValidation/{id}/{table}', [ValidationController::class, 'beforeValidatingValidation'])->name('beforeValidatingValidation');
Route::get('Validation/{id}/{table}/{route}', [ValidationController::class, 'Validation'])->name('Validation');
Route::get('validatingValidation/{id}/{table}', [ValidationController::class, 'validatingValidation'])->name('validatingValidation');


Route::get('insertValidPostcodesRecord', [MyApiController::class, 'insertValidPostcodesRecord'])->name('insertValidPostcodesRecord');

Route::resource('logitemtypes',LogitemtypesController::class);

Route::resource('logitems',LogitemsController::class);

