<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerquestionnariesController;
use App\Http\Controllers\MyApiController;

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

Route::get('PartnerQuestionnairesPartnerNotConnected/{id}', [PartnerquestionnariesController::class, 'PartnerQuestionnairesPartnerNotConnected'])->name('PartnerQuestionnairesPartnerNotConnected');
Route::get('PartnerQuestionnariesQuestionnarieNotConnected/{id}', [PartnerquestionnariesController::class, 'PartnerQuestionnariesQuestionnarieNotConnected'])->name('PartnerQuestionnariesQuestionnarieNotConnected');
Route::get('partnerAttachQuestionnarie', [MyApiController::class, 'partnerAttachQuestionnarie'])->name('partnerAttachQuestionnarie');
Route::get('partnerUnhookQuestionnarie', [MyApiController::class, 'partnerUnhookQuestionnarie'])->name('partnerUnhookQuestionnarie');
