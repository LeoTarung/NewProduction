<?php

namespace App\Http\Controllers;

use App\Models\DB_Furnace;
use App\Models\DB_Kereta;
use App\Models\DB_HenkatenMelting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

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
        return view('prod-dashboard-melting');
    }

    //==============================['Dashboard Melting']==============================//
    public function henkatenModal()
    {
        $data = DB_HenkatenMelting::where('status', '=', 'open')->get();
        return view('partial.modal', compact('data'));
    }

    public function AddhenkatenModal()
    {
        return view('partial.modal');
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
        return view('partial.modal', compact('data'));
    }

    public function addkereta()
    {
        return view('partial.modal');
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
    public function modalLevelMolten()
    {
        return view('partial.modal');
    }



    //==============================['Furnace']==============================//
    public function modalFurnaceMelting()
    {
        $data = DB_Furnace::all();
        return view('partial.modal', compact('data'));
    }
    public function addFurnace()
    {
        return view('partial.modal');
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
}
