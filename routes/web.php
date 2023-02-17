<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestroysController;
use App\Http\Controllers\MyApiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ChangeActiveController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ValidpostcodesController;
use App\Http\Controllers\PartnercontactsController;
use App\Http\Controllers\VouchertypesController;
use App\Http\Controllers\ClientsController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('index', [DashboardController::class, 'index'])->name('dashboard');

Route::get('destroy/{table}/{id}/{route}', [DestroysController::class, 'destroy'])->name('destroys');
Route::get('destroyWithParam/{table}/{id}/{route}/{param}', [DestroysController::class, 'destroyWithParam'])->name('destroyWithParam');

Route::get('beforeDestroys/{table}/{id}/{route}', [DestroysController::class, 'beforeDestroys'])->name('beforeDestroys');
Route::get('beforeDestroysWithParam/{table}/{id}/{route}/{param}', [DestroysController::class, 'beforeDestroysWithParam'])->name('beforeDestroysWithParam');

Route::get('beforeActivation/{id}/{table}/{route}', [ChangeActiveController::class, 'beforeActivation'])->name('beforeActivation');
Route::get('beforeActivationWithParam/{table}/{id}/{route}/{param}', [ChangeActiveController::class, 'beforeActivationWithParam'])->name('beforeActivationWithParam');

Route::get('Activation/{id}/{table}/{route}', [ChangeActiveController::class, 'Activation'])->name('Activation');
Route::get('ActivationWithParam/{table}/{id}/{route}/{param}', [ChangeActiveController::class, 'ActivationWithParam'])->name('ActivationWithParam');

Route::get('settingIndex', [SettingController::class, 'index'])->name('settingIndex');
Route::get('communicationIndex', [SettingController::class, 'communicationIndex'])->name('communicationIndex');

Route::resource('usertypes', App\Http\Controllers\UsertypesController::class);

Route::resource('users', App\Http\Controllers\UsersController::class);

Route::resource('partnerTypes', App\Http\Controllers\PartnerTypesController::class);

Route::resource('detailTypes', App\Http\Controllers\DetailTypesController::class);

Route::resource('validpostcodes', App\Http\Controllers\ValidpostcodesController::class);
Route::get('validPostCodesIndex/{active?}', [ValidpostcodesController::class, 'validPostCodesIndex'])->name('validPostCodesIndex');

Route::get('insertValidPostcodesRecord', [MyApiController::class, 'insertValidPostcodesRecord'])->name('insertValidPostcodesRecord');
Route::get('postcodeSettlementDDDW',[PartnersController::class, 'postcodeSettlementDDDW'])->name('postcodeSettlementDDDW');

Route::resource('partners', App\Http\Controllers\PartnersController::class);
Route::get('partnersIndex/{active?}', [PartnersController::class, 'partnersIndex'])->name('partnersIndex');
Route::get('partnerContactEdit/{id}', [PartnersController::class, 'partnerContactEdit'])->name('partnerContactEdit');


Route::resource('partnercontacts', App\Http\Controllers\PartnercontactsController::class);
Route::get('partnerContactsIndex/{partner}/{active?}', [PartnercontactsController::class, 'partnerContactsIndex'])->name('partnerContactsIndex');
Route::get('partnerContactCreate/{id}', [PartnercontactsController::class, 'partnerContactCreate'])->name('partnerContactCreate');

Route::resource('logitemtypes', App\Http\Controllers\LogitemtypesController::class);

Route::resource('logitems', App\Http\Controllers\LogitemsController::class);


Route::resource('vouchertypes', App\Http\Controllers\VouchertypesController::class);
Route::get('vouchertypesIndex/{local?}', [VouchertypesController::class, 'vouchertypesIndex'])->name('vouchertypesIndex');


Route::resource('clients', App\Http\Controllers\ClientsController::class);
Route::get('clientsIndex/{active?}', [ClientsController::class, 'clientsIndex'])->name('clientsIndex');
