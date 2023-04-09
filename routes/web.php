<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CastingController;
use App\Http\Controllers\MeltingController;
use App\Http\Controllers\BadNewsFirstController;
use App\Http\Controllers\CalenderOfEventController;

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

Route::get('/dashboard', function () {
    $title = "DASHBOARD";
    return view('prod-template', compact('title'));
});
Route::get('/prod', function () {
    $title = "DASHBOARD";
    return view('prod-menu-prod', compact('title'));
});
Route::get('/lhp', function () {
    $title = "Template";
    $mesin = "MESIN 1";
    $id = 1;
    $nrp = 3551;
    return view('lhp-template', compact('title', 'mesin', 'id', 'nrp'));
});

// Route::get('/lhp/{id}', function ($id) {
//     $title = "Melting";
//     return view('lhp-template', compact('id', 'title'));
// })->name('lhpberid');


Route::get('/tv', function () {
    $judul = "NANTI JUDUL AKAN ADA DISINI";
    return view('TV-template', compact('judul'));
});

Route::get('/tv/Rmeeting', function () {
    $judul = "RUANG MEETING";
    $title = "R-MEETING";
    return view('TV-RuangMeeting', compact('judul', 'title'));
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'cek']);

// Route::group(['middleware' => ['auth']], function () {
Route::get('/login/des', [LoginController::class, 'destroy']);
Route::get('/adm/mp', [UserController::class, 'index']);
Route::get('/modal/mpadd', [UserController::class, 'modaladd']);
Route::get('/modal/ChangePassword', [UserController::class, 'modalChangePassword']);
Route::post('/adm/api/mp', [UserController::class, 'mpApi']);
Route::get('/adm/api/{nrp}', [UserController::class, 'NRPApi']);
Route::post('/modal/mpadd/save', [UserController::class, 'save']);
Route::post('/modal/mpadd/update', [UserController::class, 'update']);
Route::post('/modal/ChangePassword/save', [UserController::class, 'modalChangePassword_save']);
// });

//==========[FOR MELTING]==========\\
Route::name('melting')->group(function () {
    //==========[FOR MELTING - HENKATEN]==========\\
    Route::get('/prod/melting/{furnace}', [MeltingController::class, 'furnace_data']);
    Route::get('/prod/meltingHenkaten/{furnace}', [MeltingController::class, 'furnace_henkaten']);
    Route::get('/modal/detail-lhp', [MeltingController::class, 'modal_detail_lhp']);
    //==========[FOR MELTING - HENKATEN]==========\\
    Route::get('/prod/melting', [MeltingController::class, 'index']);
    Route::get('/tv/Melting', [MeltingController::class, 'tv_index']);
    Route::get('/modal/henkatenMelting', [MeltingController::class, 'henkatenModal']);
    Route::get('/modal/addhenkatenMelting', [MeltingController::class, 'AddhenkatenModal']);
    Route::post('/modal/henkatenMelting/save', [MeltingController::class, 'henkaten_save']);
    Route::post('/modal/henkatenMelting/update', [MeltingController::class, 'henkaten_update']);
    Route::post('/prod/api/henkaten', [MeltingController::class, 'henkatenAPI']);
    //==========[FOR MELTING - KERETA]==========\\
    Route::get('/modal/keretaMelting', [MeltingController::class, 'keretaModal']);
    Route::get('/modal/addKereta', [MeltingController::class, 'addkereta']);
    Route::post('/modal/addKereta/save', [MeltingController::class, 'addkereta_save']);
    Route::post('/modal/addKereta/update', [MeltingController::class, 'addkereta_update']);
    Route::post('/prod/api/kereta', [MeltingController::class, 'keretaApi']);
    //==========[FOR MELTING - FURNACE]==========\\
    Route::get('/modal/furnaceMelting', [MeltingController::class, 'modalFurnaceMelting']);
    Route::get('/modal/addFurnace', [MeltingController::class, 'addFurnace']);
    Route::post('/modal/addFurnace/save', [MeltingController::class, 'addFurnace_save']);
    Route::post('/modal/addFurnace/update', [MeltingController::class, 'addFurnace_update']);
    Route::post('/prod/api/furnace', [MeltingController::class, 'furnaceApi']);
    //==========[FOR MELTING - LEVEL MOLTEN]==========\\
    Route::get('/modal/levelmoltenMelting', [MeltingController::class, 'modalLevelMolten']);
    //==========[FOR MELTING - BUNDLE LOT INGOT]==========\\
    Route::get('/modal/addLotIngot', [MeltingController::class, 'modalLotingot_index']);
    Route::post('/modal/addLotIngot/save', [MeltingController::class, 'modalLotingot_save']);
    Route::post('/modal/addLotIngot/update', [MeltingController::class, 'modalLotingot_update']);
});


Route::name('lhpmelting.')->group(function () {
    //==========[FOR MELTING - LHP]==========\\
    Route::get('/lhp/melting', [MeltingController::class, 'lhp_index'])->name('index');
    Route::post('/lhp/meltingRAW/api', [MeltingController::class, 'lhpRAW_api']);
    Route::post('/lhp/melting/api', [MeltingController::class, 'lhp_api']);
    Route::post('/lhp/melting/check', [MeltingController::class, 'lhp_check']);
    Route::get('/lhp-modal/melting', [MeltingController::class, 'lhp_preparation'])->name('preparation');
    Route::get('/lhp/melting/{area}/{id}', [MeltingController::class, 'lhp_input'])->name('input');
    Route::get('/lhp-modal/melting/kereta/{material}', [MeltingController::class, 'lhp_buttonkereta'])->name('buttonkereta');
    Route::post('/lhp-modal/pre-melting/save', [MeltingController::class, 'Pre_lhp_save']);
    Route::post('/lhp-modal/melting/save', [MeltingController::class, 'lhp_save']);
    Route::get('/lhp-modal/resume-melting/{id}', [MeltingController::class, 'resume_lhp'])->name('resume');
});




//==========[FOR CASTING]==========\\
Route::get('/prod/casting', [CastingController::class, 'index']);

//==========[FOR CALENDER OF EVENT]==========\\
Route::get('/calenderEvent', [CalenderOfEventController::class, 'index']);
Route::get('/modal/calenderEvent', [CalenderOfEventController::class, 'modal']);
Route::post('/calenderEvent/api', [CalenderOfEventController::class, 'api']);
Route::get('/calenderEvent/apiAll/{group}', [CalenderOfEventController::class, 'apiAll']);
Route::post('/modal/calenderEvent/save', [CalenderOfEventController::class, 'save']);
Route::post('/modal/calenderEvent/update', [CalenderOfEventController::class, 'update']);

//==========[FOR BAD NEW FIRST]==========\\
Route::name('BadNewsFirst.')->group(function () {
    Route::get('/BadNewsFirst', [BadNewsFirstController::class, 'index']);
    Route::get('/BadNewsFirst/DataDeliveryTable', [BadNewsFirstController::class, 'index_datatable']);
    Route::post('/BadNewsFirst/api', [BadNewsFirstController::class, 'apiID']);
    Route::get('/modal/bnfQuality', [BadNewsFirstController::class, 'modal_form']);
    Route::get('/modal/deliveryQuality', [BadNewsFirstController::class, 'modal_form']);
    Route::post('/modal/bnfQuality/save', [BadNewsFirstController::class, 'modal_save']);
    Route::post('/modal/bnfQuality/update', [BadNewsFirstController::class, 'modal_update']);
    Route::post('/modal/deliveryQuality/save', [BadNewsFirstController::class, 'modal_delivery_save']);
    Route::post('/modal/deliveryQuality/update', [BadNewsFirstController::class, 'modal_delivery_update']);
});
//==========[FOR TV MONITORING]==========\\
Route::get('/tv/calenderEvent', [CalenderOfEventController::class, 'TV_index']);
Route::get('/tv/BadNewsFirst', [BadNewsFirstController::class, 'TV_index']);
Route::get('/ftp', [BadNewsFirstController::class, 'ftp']);
