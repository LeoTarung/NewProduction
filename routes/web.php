<?php

use App\Models\DB_Mesincasting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;
use App\Http\Controllers\STOController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CastingController;
use App\Http\Controllers\MeltingController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\QualityController;


// TESTING FS
use App\Http\Controllers\BadNewsFirstController;
use App\Http\Controllers\CalenderOfEventController;
// TESTING FS

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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/comingsoon/{mesin}', function ($mesin) {
    return view('TV-Comingsoon',compact('mesin'));
});



Route::get('/dashboard', function () {
    $title = "DASHBOARD";
    // $content1 = Storage::disk('diskG')->get('test.txt');
    // dd($content1);
    // $data = DB_Mesincasting::where('mc', 1)->with('DB_Namapart')->first();
    $data = DB_Mesincasting::where('mc', 2)->first();
    // dd($data->DB_Namapart->nama_part);
    // $config = Storage::disk('diskZ')->put('testing2.txt', 'Gatau, Testing aja');  //untuk save file beranama testing1.txt dengan isi
    // $content = Storage::disk('diskZ')->files(); //Untuk cek ada nama file apa aja didalem direktori Z
    // $content1 = Storage::disk('diskZ')->get('testing1.txt'); // Untuk Lihat isi dari file testing1.txt
    // dd($config);
    return view('prod-template', compact('title', 'data'));
});

Route::get('/prod', function () {
    $title = "DASHBOARD";
    // dd(exec('whoami'));
    $data = "Data yang ingin disimpan";
    $path = "TESTING_SIAPATAU_BETUL.txt";
    // $path = "TESTING_SIAPATAU_BETUL".".txt";
    // dd(Storage::disk('diskG'));
    $config = Storage::disk('diskG')->put("TESTING_SIAPATAU_BETUL.txt", "Data yang ingin disimpan");
    dd($config);
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
    $title = "TEMPLATE";
    return view('TV-template', compact('judul','title'));
});

Route::get('/tv/Rmeeting', function () {
    $judul = "RUANG MEETING";
    $title = "R-MEETING";
    return view('TV-RuangMeeting', compact('judul', 'title'));
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'cek']);

// Route::group(['middleware' => ['auth']], function () {
Route::name('MP.')->group(function () {
    Route::get('/login/des', [LoginController::class, 'destroy']);
    Route::get('/adm/mp', [UserController::class, 'index'])->name('Index');
    Route::get('/modal/mpadd', [UserController::class, 'OpenModal'])->name('AddMP');
    Route::get('/modal/ChangePassword', [UserController::class, 'OpenModal'])->name('ChangePassword');
    Route::post('/adm/api/mp', [UserController::class, 'mpApi']);
    Route::get('/adm/api/{nrp}', [UserController::class, 'NRPApi']);
    Route::post('/modal/mpadd/save', [UserController::class, 'save']);
    Route::post('/modal/mpadd/update', [UserController::class, 'update']);
    Route::post('/modal/ChangePassword/save', [UserController::class, 'modalChangePassword_save']);
});
// });

//==========[FOR MELTING]==========\\
Route::name('Melting.')->group(function () {
    //==========[FOR MELTING - PRODUCTION]==========\\
    Route::get('/prod/melting/{furnace}', [MeltingController::class, 'furnace_data']);
    Route::get('/prod/melting/lot/ingot', [MeltingController::class, 'lotingot_data']);
    Route::get('/prod/meltingHenkaten/{furnace}', [MeltingController::class, 'furnace_henkaten']);
    Route::get('/modal/detail-lhp', [MeltingController::class, 'OpenModal'])->name('DataLhpMeltingRAW');
    Route::get('/modal/edit-detail-lhp', [MeltingController::class, 'OpenModal'])->name('EditLhpMeltingRAW');
    Route::post('/modal/edit-detail-lhp/update', [MeltingController::class, 'modal_detail_lhp_update']);
    //==========[FOR MELTING - FORKLIFT]==========\\
    Route::get('/modal/Forklift', [MeltingController::class, 'ForkliftModal'])->name('DataForklift');
    Route::get('/modal/addForklift', [MeltingController::class, 'OpenModal'])->name('ModalAddForklift');
    Route::post('/modal/addforklift/save', [MeltingController::class, 'addForklift_save']);
    Route::post('/modal/addforklift/update', [MeltingController::class, 'addForklift_update']);
    Route::post('/prod/api/forklift', [MeltingController::class, 'forkliftApi']);

    //==========[FOR MELTING - HENKATEN]==========\\
    Route::get('/prod/melting', [MeltingController::class, 'index']);
    Route::get('/tv/melting', [MeltingController::class, 'tv_index']);
    Route::get('/modal/henkatenMelting', [MeltingController::class, 'henkatenModal'])->name('DataHenkaten');
    Route::get('/modal/addhenkatenMelting', [MeltingController::class, 'OpenModal'])->name('ModalAddHenkaten');
    Route::post('/modal/henkatenMelting/save', [MeltingController::class, 'henkaten_save']);
    Route::post('/modal/henkatenMelting/update', [MeltingController::class, 'henkaten_update']);
    Route::post('/prod/api/henkaten', [MeltingController::class, 'henkatenAPI']);
    //==========[FOR MELTING - KERETA]==========\\
    Route::get('/modal/keretaMelting', [MeltingController::class, 'keretaModal'])->name('DataKereta');
    Route::get('/modal/addKereta', [MeltingController::class, 'OpenModal'])->name('ModalAddKereta');
    Route::post('/modal/addKereta/save', [MeltingController::class, 'addkereta_save']);
    Route::post('/modal/addKereta/update', [MeltingController::class, 'addkereta_update']);
    Route::post('/prod/api/kereta', [MeltingController::class, 'keretaApi']);
    //==========[FOR MELTING - FURNACE]==========\\
    Route::get('/modal/furnaceMelting', [MeltingController::class, 'modalFurnaceMelting'])->name('DataFurnace');
    Route::get('/modal/addFurnace', [MeltingController::class, 'OpenModal'])->name('ModalAddFurnace');
    Route::post('/modal/addFurnace/save', [MeltingController::class, 'addFurnace_save']);
    Route::post('/modal/addFurnace/update', [MeltingController::class, 'addFurnace_update']);
    Route::post('/prod/api/furnace', [MeltingController::class, 'furnaceApi']);
    //==========[FOR MELTING - LEVEL MOLTEN]==========\\UBPURE-AC2B000006 | AC2B | 0275 | AGUS | 31000784 | PT ALUMINDO ALLOY ABADI | 128.5 | 1 | 1001 | Nusametal | 11.04.23 11:39:01
    Route::get('/tv/levelmolten', [MeltingController::class, 'tv_molten']);
    Route::get('/modal/levelmoltenMelting', [MeltingController::class, 'LevelMolten_index'])->name('ModalLevelMolten');
    Route::get('/modal/levelmoltenMelting/edit', [MeltingController::class, 'OpenModal'])->name('ModalAddLevelMolten');
    Route::post('/prod/api/levelmolten', [MeltingController::class, 'LevelMoltenApi']);
    Route::post('/modal/levelmolten/update', [MeltingController::class, 'LevelMoltenupdate']);
    //==========[FOR MELTING - BUNDLE LOT INGOT]==========\\
    Route::get('/modal/addLotIngot', [MeltingController::class, 'OpenModal'])->name('AddLotIngot');
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

    Route::get('/lhp-modal/bundleingot/', [MeltingController::class, 'lhp_preparation'])->name('ScanBundleIngot');
    Route::get('/lhp/meltingsupply', [MeltingController::class, 'lhp_supply_index'])->name('Supplyindex');
    Route::post('/lhp/meltingsupply/check', [MeltingController::class, 'lhp_supply_check']);
    Route::get('/lhp-modal/meltingsupply', [MeltingController::class, 'lhp_preparation'])->name('SupplyPreparation');
    Route::post('/lhp-modal/pre-meltingsupply/save', [MeltingController::class, 'lhp_presupply_save']);
    Route::get('/lhp/meltingsupply/{forklift}/{id}', [MeltingController::class, 'lhp_supply_input'])->name('Supplyinput');
    Route::get('/lhp-modal/meltingsupply/cek/{forklift}/{id}', [MeltingController::class, 'lhp_supply_button_input'])->name('SupplyButton');
    Route::get('/lhp-modal/resume-meltingsupply/{id}', [MeltingController::class, 'lhp_supply_resume'])->name('Supplyresume');
    Route::get('/lhp/modal-meltingsupply/{id}', [MeltingController::class, 'lhp_modal_input'])->name('SupplyInput');
    Route::post('/lhp/modal-meltingsupply/save', [MeltingController::class, 'lhp_supply_save']);
});

//==========[FOR CASTING]==========\\
Route::name('Casting.')->group(function () {
    Route::get('/prod/casting', [CastingController::class, 'index']);

    Route::get('/modal/setupmachine', [CastingController::class, 'OpenModal'])->name('SetupMachine');
    Route::get('/modal/henkatencasting', [CastingController::class, 'OpenModal'])->name('SetupHenkaten');
    Route::get('/modal/addmachine', [CastingController::class, 'OpenModal'])->name('AddSetupMachine');

    Route::post('/modal/addmachine/save', [CastingController::class, 'addmachine_save']);
    Route::post('/modal/addmachine/update', [CastingController::class, 'updatemachine_save']);
    Route::post('/prod/api/machinecasting', [CastingController::class, 'Api_idCasting']);
});

//==========[FOR SHIPPING]==========\\
Route::name('Shipping.')->group(function () {
    Route::get('/prod/shipping', [ShippingController::class, 'index_dashboard']);
    Route::get('/prod/shipping/history', [ShippingController::class, 'history_dashboard']);
    // Route::get('/prod/shipping/scan', [ShippingController::class, 'index_scanQR']);
    Route::get('/prod/shipping/scan/from/{docking}', [ShippingController::class, 'index_scanQR']);
    Route::get('/modal/toscan', [ShippingController::class, 'OpenModal'])->name('PilihDocking');
    Route::get('/prod/shipping/scan/notrans/{docking}', [ShippingController::class, 'scanQR_notrans']);
    Route::get('/prod/shipping/scan/notrans/hapus/{id}', [ShippingController::class, 'scanQR_delete']);
    Route::post('/prod/shipping/scan/save', [ShippingController::class, 'scanQR_save']);
    Route::post('/prod/shipping/scan/delete', [ShippingController::class, 'scanQR_delete']);
    Route::post('/prod/shipping/scan/update', [ShippingController::class, 'scanQR_update']);
});

//==========[FOR WAREHOUSE]==========\\
Route::name('Warehouse.')->group(function () {
    Route::get('/prod/warehouse', [WarehouseController::class, 'index_dashboard'])->name('index');
    Route::post('/prod/api/stockingot', [WarehouseController::class, 'api_stockingot']);

    Route::get('/modal/setupstockingot', [WarehouseController::class, 'openModal'])->name('setupstockingot');
    Route::get('/modal/editstockingot', [WarehouseController::class, 'openModal'])->name('editstockingot');
    Route::post('/modal/editstockingot/update', [WarehouseController::class, 'update_stockingot']);
    Route::get('/modal/tpingot', [WarehouseController::class, 'openModal'])->name('tpingot');
});
//==========[FOR CALENDER OF EVENT]==========\\
Route::name('CalenderOfEvent.')->group(function () {
    Route::get('/calenderEvent', [CalenderOfEventController::class, 'index']);
    Route::get('/modal/calenderEvent', [CalenderOfEventController::class, 'modal']);
    Route::post('/calenderEvent/api', [CalenderOfEventController::class, 'api']);
    Route::get('/calenderEvent/apiAll/{group}', [CalenderOfEventController::class, 'apiAll']);
    Route::post('/modal/calenderEvent/save', [CalenderOfEventController::class, 'save']);
    Route::post('/modal/calenderEvent/update', [CalenderOfEventController::class, 'update']);
});

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

//==========[FOR FINISHGOOD]==========\\
Route::name('QR.')->group(function () {
    Route::get('/qr/finishgood', [QRController::class, 'FG_index']);
    Route::get('/qr/modal/finishgood/abnormality', [QRController::class, 'openModalAbnormality'])->name('Abnormality');
    Route::get('/qr/modal/finishgood', [QRController::class, 'openModal1'])->name('addQRFG');
    Route::post('/qr/modal/finishgood/save', [QRController::class, 'FG_save']);
    Route::get('/qr/printQR/{id}/{copies}/{status}', [QRController::class, 'openModal'])->name('PrintTag');
    // Route::get('/qr/printQR/{id}/{status}', [QRController::class, 'openModal'])->name('PrintTag');
    Route::get('/qr/fromsubcont', [QRController::class, 'FS_index']);
});

//==========[FOR QUALITY ]==========\\
Route::name('Quality.')->group(function () {
    Route::get('/prod/quality', [QualityController::class, 'index_prod']);
    Route::get('/prod/modal-quality/measurement', [QualityController::class, 'OpenModal'])->name('Addmeasurement');
    Route::get('/prod/modal-quality/measurement/table', [QualityController::class, 'OpenModal'])->name('measurement');
    Route::post('/prod/modal-quality/measurement/save', [QualityController::class, 'measurement_save']);
    Route::post('/prod/modal-quality/measurement/update', [QualityController::class, 'measurement_update']);

    Route::get('/prod/modal-quality/kalibrasi', [QualityController::class, 'OpenModal'])->name('AddKalibrasi');
    Route::post('/prod/modal-quality/kalibrasi/save', [QualityController::class, 'kalibrasi_save']);
    Route::post('/prod/modal-quality/kalibrasi/update', [QualityController::class, 'kalibrasi_update']);

    Route::get('/prod/modal-quality/diesapproval', [QualityController::class, 'OpenModal'])->name('AddDiesApproval');
    Route::post('/prod/modal-quality/diesapproval/save', [QualityController::class, 'diesapproval_save']);
    Route::post('/prod/modal-quality/diesapproval/update', [QualityController::class, 'diesapproval_update']);

    Route::get('/prod/modal-quality/spectro-hpdc', [QualityController::class, 'OpenModal'])->name('Addspectro_hpdc');
    Route::post('/prod/modal-quality/spectro-hpdc/save', [QualityController::class, 'spectro_hpdc_save']);
    Route::post('/prod/modal-quality/spectro-hpdc/update', [QualityController::class, 'spectro_hpdc_update']);

    Route::get('/prod/modal-quality/spectro-gdc', [QualityController::class, 'OpenModal'])->name('Addspectro_gdc');
    Route::post('/prod/modal-quality/spectro-gdc/save', [QualityController::class, 'spectro_gdc_save']);
    Route::post('/prod/modal-quality/spectro-gdc/update', [QualityController::class, 'spectro_gdc_update']);

    Route::get('/prod/modal-quality/measurement/data', [QualityController::class, 'DTservermeasurement']); //
    Route::get('/prod/modal-quality/measurement/data/nostat', [QualityController::class, 'DTservermeasurementNOSTAT']); //
    Route::get('/prod/modal-quality/kalibrasi/data', [QualityController::class, 'DTserverkalibrasi']);
    Route::get('/prod/modal-quality/diesapproval/data', [QualityController::class, 'DTserverdiesapproval']);
    Route::get('/prod/modal-quality/spectro-hpdc/data', [QualityController::class, 'DTserverspectro_hpdc']);
    Route::get('/prod/modal-quality/spectro-gdc/data', [QualityController::class, 'DTserverspectro_gdc']);

    Route::post('/prod/modal-quality/measurement/api', [QualityController::class, 'Api_measurement']); //
    Route::post('/prod/modal-quality/kalibrasi/api', [QualityController::class, 'Api_kalibrasi']);
    Route::post('/prod/modal-quality/diesapproval/api', [QualityController::class, 'Api_diesapproval']);
    Route::post('/prod/modal-quality/spectro/api', [QualityController::class, 'Api_spectro']);

});


//==========[FOR STO]==========\\
Route::name('STO.')->group(function () {
    Route::get('/sto', [STOController::class, 'dashboard'])->name('index');
    Route::get('/sto/menu', [STOController::class, 'menu'])->name('Menu');
    Route::get('/sto/modal/preparation', [STOController::class, 'openModal'])->name('preparation');
    Route::post('/sto/modal/save', [STOController::class, 'preparation_save']);
    Route::get('/sto/counter/{id}', [STOController::class, 'inputSTO'])->name('counter');
    Route::get('/sto/verificator/{id}', [STOController::class, 'inputSTO'])->name('verificator');
    Route::get('/sto/modal-verificator/{tag}', [STOController::class, 'openModalWithID'])->name('Input_verificator');
    Route::post('/sto/modal-input/save', [STOController::class, 'Counter_Save']);
    Route::post('/sto/modal-input/update', [STOController::class, 'Counter_Update']);
    Route::post('/sto/api/{from}', [STOController::class, 'api_from']);
    Route::get('/sto/print/{id}', [STOController::class, 'print_tag']);
});

//==========[FOR TV MONITORING]==========\\
Route::get('/tv/quality/spectro', [QualityController::class, 'TV_index_spectro']);
Route::get('/tv/quality/kalibrasi', [QualityController::class, 'TV_index_kalibrasi']);
Route::get('/tv/quality/diesapproval', [QualityController::class, 'TV_index_diesapproval']);
Route::get('/tv/stokingot', [WarehouseController::class, 'TV_index']);
Route::get('/tv/casting', [CastingController::class, 'TV_index']);
Route::get('/tv/shipping', [ShippingController::class, 'TV_index']);
Route::get('/tv/calenderEvent', [CalenderOfEventController::class, 'TV_index']);
Route::get('/tv/BadNewsFirst', [BadNewsFirstController::class, 'TV_index']);
Route::get('/ftp', [BadNewsFirstController::class, 'ftp']);

Route::post('/namapart/api', [QRController::class, 'APINamapart']);
