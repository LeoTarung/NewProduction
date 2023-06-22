<?php

use App\Models\DB_Jenis_NG;
use App\Models\DB_Jenis_Downtime;
use App\Models\DB_Timbangan;
use App\Models\DB_LhpMelting;
use App\Models\DB_MesinCasting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/timbangan/{id}', function ($id, Request $request) {
    DB_Timbangan::where('id', $id)->update(['berat' => $request->berat]);
    $berhasil =  DB_Timbangan::find($id);
    return $berhasil;
});

Route::get('/timbangan/{id}', function ($id) {
    $berhasil =  DB_Timbangan::find($id);
    return $berhasil;
});

Route::get('/mesincastingbyline/{id}', function ($id) {
    $berhasil =  DB_MesinCasting::where('line', $id)->get();
    return $berhasil;
});

Route::get('/lhpmelting/{id}', function ($id) {
    $berhasil = DB_LhpMelting::find($id);
    return $berhasil;
});

Route::get('/rejection/group', function () {
    $berhasil = DB_Jenis_NG::groupBy('jenis_reject')->get();
    return $berhasil;
});
Route::get('/downtime/group', function () {
    $berhasil = DB_Jenis_Downtime::all();
    return $berhasil;
});
