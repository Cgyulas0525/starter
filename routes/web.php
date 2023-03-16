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
use App\Http\Controllers\VouchersController;
use App\Http\Controllers\QuestionnairesController;
use App\Http\Controllers\LotteriesController;
use App\Http\Controllers\QuestionnairedetailsController;
use App\Http\Controllers\QuestionnairedetailitemsController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\MyloginController;
use App\Http\Controllers\ClientvouchersController;
use App\Http\Controllers\ClientquestionnariesController;
use App\Http\Controllers\PartnerquestionnariesController;
use App\Http\Controllers\ClientvoucherusedController;

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
Route::get('pqEdit/{id}', [PartnersController::class, 'pqEdit'])->name('pqEdit');

Route::resource('partnercontacts', App\Http\Controllers\PartnercontactsController::class);
Route::get('partnerContactsIndex/{partner}/{active?}', [PartnercontactsController::class, 'partnerContactsIndex'])->name('partnerContactsIndex');
Route::get('partnerContactCreate/{id}', [PartnercontactsController::class, 'partnerContactCreate'])->name('partnerContactCreate');

Route::resource('logitemtypes', App\Http\Controllers\LogitemtypesController::class);

Route::resource('logitems', App\Http\Controllers\LogitemsController::class);

Route::resource('vouchertypes', App\Http\Controllers\VouchertypesController::class);
Route::get('vouchertypesIndex/{local?}', [VouchertypesController::class, 'vouchertypesIndex'])->name('vouchertypesIndex');

Route::resource('clients', App\Http\Controllers\ClientsController::class);
Route::get('clientsIndex/{active?}/{validated?}/{local?}', [ClientsController::class, 'clientsIndex'])->name('clientsIndex');
Route::get('clientVouchers/{id}', [ClientsController::class, 'clientVouchers'])->name('clientVouchers');
Route::get('clientQuestionnaries/{id}', [ClientsController::class, 'clientQuestionnaries'])->name('clientQuestionnaries');

Route::get('validating/{active}/{validated}', [ValidationController::class, 'validating'])->name('validating');
Route::get('beforeValidation/{id}/{table}/{route}', [ValidationController::class, 'beforeValidation'])->name('beforeValidation');
Route::get('beforeValidatingValidation/{id}/{table}', [ValidationController::class, 'beforeValidatingValidation'])->name('beforeValidatingValidation');
Route::get('Validation/{id}/{table}/{route}', [ValidationController::class, 'Validation'])->name('Validation');
Route::get('validatingValidation/{id}/{table}', [ValidationController::class, 'validatingValidation'])->name('validatingValidation');


Route::resource('vouchers', App\Http\Controllers\VouchersController::class);
Route::get('vouchersIndex/{active?}/{partner?}', [VouchersController::class, 'vouchersIndex'])->name('vouchersIndex');

Route::resource('questionnaires', App\Http\Controllers\QuestionnairesController::class);
Route::get('questionnairesIndex/{active?}/{basicpackage?}', [QuestionnairesController::class, 'questionnairesIndex'])->name('questionnairesIndex');
Route::get('questionnairesEdit/{id}', [QuestionnairesController::class, 'questionnairesEdit'])->name('questionnairesEdit');
Route::get('qPartners/{id}', [QuestionnairesController::class, 'qPartners'])->name('qPartners');

Route::resource('lotteries', App\Http\Controllers\LotteriesController::class);
Route::get('lotteriesIndex/{active?}', [LotteriesController::class, 'lotteriesIndex'])->name('lotteriesIndex');


Route::resource('questionnairedetails', App\Http\Controllers\QuestionnairedetailsController::class);
Route::get('qdIndex/{id}', [QuestionnairedetailsController::class, 'qdIndex'])->name('qdIndex');
Route::get('qdCreate/{id}', [QuestionnairedetailsController::class, 'qdCreate'])->name('qdCreate');
Route::get('qdEdit/{id}', [QuestionnairedetailsController::class, 'qdEdit'])->name('qdEdit');

Route::resource('questionnairedetailitems', App\Http\Controllers\QuestionnairedetailitemsController::class);
Route::get('qdiIndex/{id}', [QuestionnairedetailitemsController::class, 'qdiIndex'])->name('qdiIndex');
Route::get('qdiCreate/{id}', [QuestionnairedetailitemsController::class, 'qdiCreate'])->name('qdiCreate');


Route::resource('clientvouchers', App\Http\Controllers\ClientvouchersController::class);
Route::get('cvIndex/{id}', [ClientvouchersController::class, 'cvIndex'])->name('cvIndex');


Route::resource('clientquestionnaries', App\Http\Controllers\ClientquestionnariesController::class);
Route::get('cqIndex/{id}', [ClientquestionnariesController::class, 'cqIndex'])->name('cqIndex');


Route::resource('partnerquestionnaries', App\Http\Controllers\PartnerquestionnariesController::class);
Route::get('pqIndex/{id}', [PartnerquestionnariesController::class, 'pqIndex'])->name('pqIndex');
Route::get('qpIndex/{id}', [PartnerquestionnariesController::class, 'qpIndex'])->name('qpIndex');


Route::resource('clientvoucheruseds', App\Http\Controllers\ClientvoucherusedController::class);
Route::get('clientVoucherUsedindex/{id}', [ClientvoucherusedController::class, 'clientVoucherUsedindex'])->name('clientVoucherUsedindex');
