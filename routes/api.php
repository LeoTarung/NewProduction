<?php

use App\Models\DB_Timbangan;
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
