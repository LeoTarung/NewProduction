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
    return view('prod-template');
});
Route::get('/prod', function () {
    return view('prod-menu-prod');
});
Route::get('/lhp', function () {
    return view('lhp-template');
});

Route::get('/lhp/{id}', function ($id) {
    return view('lhp-template', compact('id'));
})->name('lhpberid');


Route::get('/tv', function () {
    $judul = "NANTI JUDUL AKAN ADA DISINI";
    return view('TV-template', compact('judul'));
});

Route::get('/tv/Rmeeting', function () {
    $judul = "RUANG MEETING";
    return view('TV-RuangMeeting', compact('judul'));
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'cek']);

// Route::group(['middleware' => ['auth']], function () {
Route::get('/login/des', [LoginController::class, 'destroy']);
Route::get('/adm/mp', [UserController::class, 'index']);
Route::get('/modal/mpadd', [UserController::class, 'modaladd']);
Route::get('/modal/ChangePassword', [UserController::class, 'modalChangePassword']);
Route::post('/adm/api/mp', [UserController::class, 'mpApi']);
Route::post('/modal/mpadd/save', [UserController::class, 'save']);
Route::post('/modal/mpadd/update', [UserController::class, 'update']);
Route::post('/modal/ChangePassword/save', [UserController::class, 'modalChangePassword_save']);
// });

//==========[FOR MELTING]==========\\
//==========[FOR MELTING - HENKATEN]==========\\
Route::get('/prod/melting', [MeltingController::class, 'index']);
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


//==========[FOR CASTING]==========\\
Route::get('/prod/casting', [CastingController::class, 'index']);

//==========[FOR CALENDER OF EVENT]==========\\
Route::get('/calenderEvent', [CalenderOfEventController::class, 'index']);
Route::get('/modal/calenderEvent', [CalenderOfEventController::class, 'modal']);
Route::post('/calenderEvent/api', [CalenderOfEventController::class, 'api']);
Route::get('/calenderEvent/apiAll', [CalenderOfEventController::class, 'apiAll']);
Route::post('/modal/calenderEvent/save', [CalenderOfEventController::class, 'save']);
Route::post('/modal/calenderEvent/update', [CalenderOfEventController::class, 'update']);

Route::get('/BadNewsFirst', [BadNewsFirstController::class, 'index']);

//==========[FOR TV MONITORING]==========\\
Route::get('/tv/calenderEvent', [CalenderOfEventController::class, 'TV_index']);
Route::get('/tv/BadNewsFirst', [BadNewsFirstController::class, 'TV_index']);
Route::get('/ftp', [BadNewsFirstController::class, 'ftp']);
