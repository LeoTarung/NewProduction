<?php

namespace App\Http\Controllers;

use App\Models\DB_LhpMelting;
use App\Models\DB_LhpMeltingRAW;
use App\Models\DB_Furnace;
use App\Models\DB_Kereta;
use App\Models\DB_HenkatenMelting;
use App\Models\DB_TransaksiIngot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class MeltingController extends Controller
{
    public function index(Request $request)
    {
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.fonnte.com/send',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => array(
        //         'target' => '087808780844',
        //         'message' => 'test message FROM LARAVEL 8',
        //         'countryCode' => '62', //optional
        //     ),
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: Nd_jy3I15uzS31UHx6bj' //change TOKEN to your actual token
        //     ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // echo $response;
        $title = "MELTING";
        return view('prod-dashboard-melting', compact('title'));
    }

    public function tv_index()
    {
        $judul = "MELTING SECTION";
        $title = "TV MELTING";
        return view('TV-Melting', compact('judul', 'title'));
    }

    public function OpenModal()
    {
        return view('partial.melting-modal');
    }

    //==============================['Dashboard Melting furnace']==============================//
    public function furnace_data(Request $request, $furnace)
    {
        $title = $furnace;
        if ($request->ajax()) {
            $data = DB_LhpMelting::where('mesin', '=', $furnace)->orderBy('id', 'DESC')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="lihatLhp(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('prod-melting-detail', compact('title'));
    }

    public function furnace_henkaten(Request $request, $furnace)
    {
        if ($request->ajax()) {
            $data = DB_HenkatenMelting::where('furnace', '=', $furnace)->orderBy('id', 'DESC')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="DetailsHenkaten(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('tanggal', function ($row) {
                    $date = date("Y-m-d", strtotime($row->created_at));
                    return $date;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function modal_detail_lhp_update(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'ingot' => 'required',
            'reject_parts' => 'required',
            'tapping' => 'required',
            'alm_treat' => 'required',
            'fluxing' => 'required',
            'dross' => 'required',
            'id_raw_lhp' => 'required',
            'mesin' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/melting/' . $request->mesin)->with('gagal_validasi', 'gagal_validasi');
        }

        DB_LhpMeltingRAW::where('id', $request->id_raw_lhp)
            ->update([
                'ingot' => $request->ingot,
                'exgate' => $request->exgate,
                'reject_parts' => $request->reject_parts,
                'tapping' => $request->tapping,
                'alm_treat' => $request->alm_treat,
                'fluxing' => $request->fluxing,
                'dross' => $request->dross
            ]);
        //INI UNTUK AMBIL ID LHP dri LHPRAW
        $rawr = DB_LhpMeltingRAW::where('id', '=', $request->id_raw_lhp)->get('id_lhp');

        //JUMLAHKAN SEMUA COLOUMS DI TABEL
        $update = DB_LhpMeltingRAW::where('id_lhp', '=', $rawr[0]->id_lhp)
            ->selectRaw(
                "id_lhp,
                SUM(ingot) as ingots,
                SUM(exgate) as exgates,
                SUM(reject_parts) as reject_partss,
                SUM(alm_treat) as alm_treats,
                SUM(basemetal) as basemetals,
                SUM(oil_scrap) as oil_scraps,
                SUM(fluxing) as fluxings,
                SUM(tapping) as tappings,
                SUM(dross) as drosss,
                SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap) as total_return_rs,
                SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) as total_charging_rs,
                SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing) as total_charging,
                IFNULL(SUM(fluxing) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 100) as persen_fluxing,
                IFNULL(SUM(ingot) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 100) as persen_ingot,
                IFNULL(SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 100) as persen_rs,
                IFNULL(SUM(dross) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing) * 100, 100) as persen_losdros_material,
                IFNULL(SUM(alm_treat) / SUM(dross) * 100, 100) as persen_alm_treat,
                IFNULL(SUM(tapping) / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) * 100, 100) as machine_performance,
                SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) / 18250 * 100 as machine_utilization,
                IFNULL(gas_akhir / SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot + fluxing) * 100, 100) as gas_consum"
            )
            ->get();

        //LAKUKAN UPDATE SESUAI RUMUS DARI EXCEL
        DB_LhpMelting::where([['id', '=', $rawr[0]->id_lhp]])->update([
            'ingot' => $update[0]->ingots,
            'exgate' => $update[0]->exgates,
            'reject_parts' => $update[0]->reject_partss,
            'alm_treat' => $update[0]->alm_treats,
            'basemetal' => $update[0]->basemetals,
            'oil_scrap' => $update[0]->oil_scraps,
            'fluxing' => $update[0]->fluxings,
            'tapping' => $update[0]->tappings,
            'dross' => $update[0]->drosss,
            'total_return_rs' => $update[0]->total_return_rs,
            'total_charging_rs' => $update[0]->total_charging_rs,
            'total_charging' => $update[0]->total_charging,
            'persen_fluxing' => $update[0]->persen_fluxing,
            'persen_ingot' => $update[0]->persen_ingot,
            'persen_rs' => $update[0]->persen_rs,
            'total_loss' => $update[0]->drosss,
            'persen_losdros_material' => $update[0]->persen_losdros_material,
            'persen_alm_treat' => $update[0]->persen_alm_treat,
            'machine_performance' => $update[0]->machine_performance,
            'machine_utilization' => $update[0]->machine_utilization,
            'gas_consum' => $update[0]->gas_consum,
            // 'melting_rate' => $update[0]->melting_rate
        ]);

        // GET LHP LAGI
        $nih = DB_LhpMelting::find($rawr[0]->id_lhp);
        // HITUNG MELTING RATE
        $melting_rate =  $nih->total_charging_rs / $nih->jam_kerja; // H / X1
        // UPDATE LAGI
        DB_LhpMelting::where([['id', '=', $rawr[0]->id_lhp]])->update(['melting_rate' => $melting_rate]);

        return redirect('/prod/melting/' . $request->mesin)->with('berhasil_input', 'berhasil_input');
    }

    //==============================['Henkaten']==============================//
    public function henkatenModal()
    {
        $data = DB_HenkatenMelting::where('status', '=', 'open')->get();
        return view('partial.melting-modal', compact('data'));
    }

    public function henkatenAPI(Request $request)
    {
        $data = DB_HenkatenMelting::find($request->id);
        return $data;
    }

    public function henkaten_save(UsableController $useable, Request $request)
    {
        $shift = $useable->Shift();
        $validator = Validator::make($request->all(), [
            'jenis_henkaten' => 'required',
            'deskripsi' => 'required',
            'furnace' => 'required',
            'problem' => 'required',
            'countermeasure' => 'required',
            'status' => 'required',
            'plan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/melting')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_HenkatenMelting::create([
            'jenis_henkaten' => $request->jenis_henkaten,
            'furnace' => $request->furnace,
            'shift' => $shift,
            'deskripsi' => $request->deskripsi,
            'problem' => $request->problem,
            'countermeasure' => $request->countermeasure,
            'status' => $request->status,
            'plan' => $request->plan,
            'safety' => $request->safety,
            'kakotora' => $request->kakotora,
            'job_setup' => $request->job_setup,
            'wi_proses' => $request->wi_proses,
            'trial_ns' => $request->trial_ns,
            'cp_cpk' => $request->cp_cpk,
            'trial_proses' => $request->trial_proses,
            'cycle_time' => $request->cycle_time,
            'verifikasi_proses' => $request->verifikasi_proses,
        ]);

        if ($insert) {
            return redirect('/prod/melting')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function henkaten_update(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'jenis_henkaten' => 'required',
            'id_henkaten' => 'required',
            'deskripsi' => 'required',
            'problem' => 'required',
            'countermeasure' => 'required',
            'status' => 'required',
            'plan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/melting')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_HenkatenMelting::where('id', '=', $request->id_henkaten)->update([
            'deskripsi' => $request->deskripsi,
            'problem' => $request->problem,
            'countermeasure' => $request->countermeasure,
            'status' => $request->status,
            'plan' => $request->plan,
            'safety' => $request->safety,
            'kakotora' => $request->kakotora,
            'job_setup' => $request->job_setup,
            'wi_proses' => $request->wi_proses,
            'trial_ns' => $request->trial_ns,
            'cp_cpk' => $request->cp_cpk,
            'trial_proses' => $request->trial_proses,
            'cycle_time' => $request->cycle_time,
            'verifikasi_proses' => $request->verifikasi_proses,
        ]);

        if ($insert) {
            return redirect('/prod/melting')->with('berhasil_input', 'berhasil_input');
        }
    }

    //==============================['Kereta']==============================//
    public function keretaModal()
    {
        $data = DB_Kereta::all();
        return view('partial.melting-modal', compact('data'));
    }

    public function keretaAPI(Request $request)
    {
        $data = DB_Kereta::find($request->id);
        return $data;
    }

    public function addkereta_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_kereta' => 'required',
            'material' => 'required',
            'berat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/melting')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_Kereta::create([
            'no_kereta' => $request->no_kereta,
            'material' => $request->material,
            'berat' => $request->berat,
        ]);
        if ($insert) {
            return redirect('/prod/melting')->with('berhasil_input', 'berhasil_input');
        }
    }
    public function addkereta_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'no_kereta' => 'required',
            'material' => 'required',
            'berat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/melting')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_Kereta::find($request->id)->update([
            'no_kereta' => $request->no_kereta,
            'material' => $request->material,
            'berat' => $request->berat,
        ]);
        if ($insert) {
            return redirect('/prod/melting')->with('berhasil_input', 'berhasil_input');
        }
    }

    //==============================['Level Molten']==============================//

    //==============================['Furnace']==============================//
    public function modalFurnaceMelting()
    {
        $data = DB_Furnace::all();
        return view('partial.melting-modal', compact('data'));
    }

    public function furnaceApi(Request $request)
    {
        $data = DB_Furnace::find($request->id);
        return $data;
    }

    public function addFurnace_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'furnace' => 'required',
            'material' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/melting')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_Furnace::create([
            'furnace' => $request->furnace,
            'material' => $request->material,
        ]);
        if ($insert) {
            return redirect('/prod/melting')->with('berhasil_input', 'berhasil_input');
        }
    }
    public function addFurnace_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'furnace' => 'required',
            'material' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/melting')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_Furnace::find($request->id)->update([
            'furnace' => $request->furnace,
            'material' => $request->material,
        ]);
        if ($insert) {
            return redirect('/prod/melting')->with('berhasil_input', 'berhasil_input');
        }
    }


    //==============================['Bundle Lot Ingot']==============================//
    public function lotingot_data(Request $request)
    {
        $title = "LOT INGOT";
        if ($request->ajax()) {
            $data = DB_TransaksiIngot::orderByDesc('id')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="lihatLhp(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('tanggal', function ($row) {
                    $date = date("Y-m-d", strtotime($row->created_at));
                    return $date;
                })
                ->addColumn('jam', function ($row) {
                    $jam = date("h:i:s", strtotime($row->created_at));
                    return $jam;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('prod-melting-lotingot', compact('title'));
    }

    public function modalLotingot_save(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'nama_vendor' => 'required',
            'material' => 'required',
            'berat_bundle' => 'required',
            'lot_ingot' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/melting')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_TransaksiIngot::create([
            'nama_vendor' => $request->nama_vendor,
            'material' => $request->material,
            'store_location' => $request->penyimpanan_bundle,
            'berat' => $request->berat_bundle,
            'lot_bundle' => $request->lot_ingot,
            'kode_sap' => $request->kode_sap,
            'nrp_penimbang' => $request->nrp_penimbang,
            'nama_penimbang' => $request->nama_penimbang,
            'id_vendor' => $request->id_vendor,
            'kedatangan' => $request->kedatangan,
            'bisnis_unit' => $request->bisnis_unit,
            'digunakan' => Carbon::now(),
        ]);
        if ($insert) {
            return redirect('/prod/melting')->with('berhasil_input', 'berhasil_input');
        }
    }


    //=================[LHP MELTING]=================\\

    public function lhp_index(UsableController $useable)
    {
        $shift = $useable->Shift();
        $title = "MELTING";
        $furnace = DB_Furnace::all();
        return view('lhp-pre-melting', compact('shift', 'title', 'furnace'));
    }

    public function lhp_check(UsableController $useable, Request $request)
    {
        $shift = $useable->Shift();
        $date = $useable->date();
        $data = DB_LhpMelting::where([['tanggal', '=', $date], ['mesin', '=', $request->furnace], ['shift', '=', $shift]])->orderBy('id', 'DESC')->first();
        return $data;
    }

    public function lhp_preparation()
    {
        return view('partial.lhp-modal');
    }

    public function lhp_input(UsableController $useable, $area, $id)
    {
        $title = "MELTING";
        $shift = $useable->Shift();
        $date = $useable->date();
        $data = DB_LhpMelting::find($id);

        return view('lhp-ipt-melting', compact('area', 'shift', 'id', 'title', 'data'));
    }

    public function lhp_buttonkereta($material)
    {
        $data =  DB_Kereta::where('material', '=', $material)->get();
        return view('partial.lhp-modal', compact('data'));
    }

    public function Pre_lhp_save(UsableController $useable, Request $request)
    {
        $shift = $useable->Shift();
        $date = $useable->date();
        $jam_kerja = $useable->Jam_kerja();
        $validator = Validator::make($request->all(), [
            'nrp' => 'required',
            'nama' => 'required',
            'furnace' => 'required',
            'material' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/lhp/melting')->with('gagal_validasi', 'gagal_validasi');
        }
        $old = DB_LhpMelting::where([['mesin', '=', $request->furnace]])->orderBy('id', 'DESC')->first();
        if ($old == null) {
            $insert = DB_LhpMelting::create([
                'tanggal' => $date,
                'nrp' => $request->nrp,
                'nama' => $request->nama,
                'shift' => $shift,
                'jam_kerja' => $jam_kerja,
                'mesin' => $request->furnace,
                'material' => $request->material,
                'gas_awal' => 0,
                'stok_molten' => 0
            ]);
            return redirect("/lhp/melting/$request->furnace/$insert->id")->with('berhasil_input', 'berhasil_input');
        } else {
            $insert = DB_LhpMelting::create([
                // 'nama kolom' => 'name di html'
                'tanggal' => $date,
                'nrp' => $request->nrp,
                'nama' => $request->nama,
                'shift' => $shift,
                'jam_kerja' => $jam_kerja,
                'mesin' => $request->furnace,
                'material' => $request->material,
                'gas_awal' => $old->gas_akhir,
                'stok_molten' => $old->stok_molten
            ]);
            return redirect("/lhp/melting/$request->furnace/$insert->id")->with('berhasil_input', 'berhasil_input');
        }
    }
    public function lhp_save(UsableController $useable, Request $request)
    {

        $shift = $useable->Shift();
        $date = $useable->date();
        $hour = $useable->hour();
        $validator = Validator::make($request->all(), [
            'berat_kereta' => 'required',
            'material' => 'required',
            'berat' => 'required',
            'id_lhp' => 'required',
            'furnace' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/lhp/melting')->with('gagal_validasi', 'gagal_validasi');
        }
        $netto = $request->berat - $request->berat_kereta;
        $data = DB_LhpMelting::find($request->id_lhp);
        $material = $request->material;
        if ($data != null) {
            DB_LhpMeltingRAW::create([
                'id_lhp' => $request->id_lhp,
                'tanggal' => $date,
                'jam' => $hour,
                'shift' => $shift,
                'mesin' => $request->furnace,
                'berat_kereta' => $request->berat_kereta,
                $request->material => $netto
            ]);
            $beratA = $data->$material;
            $total = $beratA +  $netto;
            DB_LhpMelting::find($request->id_lhp)->update([$material => $total]);

            $data1 = DB_LhpMelting::find($request->id_lhp);

            // LOGIC PENJUMLAHAN VIA BACKEND IN HERE (mengacu diExcel Program)
            $total_return_rs = $data1->exgate + $data1->reject_parts + $data1->alm_treat + $data1->basemetal + $data1->oil_scrap; // C+ D + E + F + F1
            $total_charging_rs = $data1->ingot + $total_return_rs; // B + G
            $total_charging = $total_charging_rs + $data1->fluxing; // H + I
            if ($total_charging_rs == 0) {
                $persen_fluxing = 100;
            } else {
                $persen_fluxing = ($data1->fluxing / $total_charging_rs) * 100; // ( I / H ) x 100%
            }
            if ($total_charging_rs == 0) {
                $persen_ingot = 100;
            } else {
                $persen_ingot = ($data1->ingot /  $total_charging_rs) * 100; // (B / H ) x 100%
            }
            if ($total_charging_rs == 0) {
                $persen_rs = 100;
            } else {
                $persen_rs = ($total_return_rs /  $total_charging_rs) * 100; // (G / H ) x 100%
            }



            if ($material == 'gas_akhir' ||  $material == 'fluxing') {
                $stok_molten = $data1->stok_molten;
            } else if ($material == 'tapping') {
                $stok_molten = $data1->stok_molten - $netto;
            } else if ($material == 'dross') {
                $stok_molten = $data1->stok_molten - $netto;
            } else {
                $stok_molten = $data1->stok_molten + $netto; // H - ( N + Q )
            }



            // $total_loss = $data1->dross - $data1->alm_treat; // ( Q - E )
            $total_loss = $data1->dross; // UPDATED PER 2023
            if ($total_charging == 0) {
                $persen_losdros_material = 100;
            } else {
                $persen_losdros_material = ($data1->dross / $total_charging) * 100;  //( Q / J ) x 100%
            }
            if ($data1->dross == 0) {
                $persen_alm_treat = 100;
            } else {
                $persen_alm_treat = ($data1->alm_treat / $data1->dross) * 100; // ( E / Q ) x 100%
            }
            if ($total_charging_rs == 0) {
                $machine_performance = 0.00;
            } else {
                $machine_performance = ($data1->tapping / $total_charging_rs) * 100; // N / H x 100%
            }
            $machine_utilization = ($total_charging_rs / $data1->supply_capacity) * 100; // ( H / A ) x 100%

            $gas_consum = $data1->gas_akhir - $data1->gas_awal;

            $melting_rate = $total_charging_rs / $data1->jam_kerja; // H / X1
            DB_LhpMelting::find($request->id_lhp)->update([
                'total_return_rs' =>  $total_return_rs,
                'total_charging_rs' =>  $total_charging_rs,
                'total_charging' => $total_charging,
                'persen_fluxing' =>  $persen_fluxing,
                'persen_ingot' =>  $persen_ingot,
                'persen_rs' =>  $persen_rs,
                'stok_molten' =>  $stok_molten,
                'total_loss' =>  $total_loss,
                'persen_losdros_material' =>  $persen_losdros_material,
                'persen_alm_treat' =>  $persen_alm_treat,
                'machine_performance' =>  $machine_performance,
                'machine_utilization' =>  $machine_utilization,
                'gas_consum' =>  $gas_consum,
                'melting_rate' =>  $melting_rate,
            ]);
        }
        return redirect()->route('lhpmelting.index')->with('berhasil_input', 'berhasil_input');
    }

    public function resume_lhp($id)
    {
        $data =  DB_LhpMeltingRAW::groupBy(DB_LhpMeltingRAW::raw('hour(jam)'))->where('id_lhp', '=', $id)->selectRaw("jam, tanggal, shift, SUM(ingot) as ingots, SUM(dross) as drosss, SUM(tapping) as tappings, SUM(exgate) as exgates, SUM(reject_parts) as reject_partss, SUM(alm_treat) as alm_treats, SUM(oil_scrap) as oil_scraps, SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap) as total_return_rs, SUM(exgate + reject_parts + alm_treat + basemetal + oil_scrap + ingot) as total_charging_rs")->get();
        return view('partial.lhp-modal', compact('data'));
    }

    public function lhp_api(Request $request)
    {
        $data = DB_LhpMeltingRAW::where('id', '=', $request->id)->get();
        return $data;
    }
    public function lhpRAW_api(Request $request)
    {
        $data = DB_LhpMeltingRAW::where('id_lhp', '=', $request->id_lhp)->get();
        return $data;
    }
}
