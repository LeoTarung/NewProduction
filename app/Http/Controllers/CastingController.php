<?php

namespace App\Http\Controllers;

use App\Models\DB_Jenis_Downtime;
use App\Models\DB_Jenis_NG;
use App\Models\DB_Henkaten;
use App\Models\DB_LhpCasting;
use Illuminate\Http\Request;
use App\Models\DB_MesinCasting;
use App\Models\DB_Namapart;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CastingController extends Controller
{
    public function TV_index()
    {
        $title = "CASTING";
        $judul = "CASTING PERFORMACE";
        return view('TV-CastingPerformance',compact('title', 'judul'));
    }

    public function OpenModal()
    {
        $Route = Route::current()->getName();
        if($Route == 'Casting.SetupMachine'){
            $data = DB_MesinCasting::with(['DB_Namapart', 'DB_Material'])->get();
        }else if($Route == 'Casting.AddSetupMachine'){
            $data = DB_Namapart::where('proses', 'CASTING')->get();
        }else if($Route == 'Casting.DataHenkaten'){
            $data = DB_Henkaten::where('area', 'casting')->where('status', '=', 'open')->latest()->get();
        }else if($Route == 'Casting.SetupHenkaten'){
            $data = DB_MesinCasting::with(['DB_Namapart', 'DB_Material'])->get();
        }else{
            $data = "";
        }
        return view('partial.casting-modal',compact('data'));
    }

    public function OpenModal_LHP(Request $request){
        $Route = Route::current()->getName();
        if($Route == 'lhpcasting.printQR'){
            $data = "";
        }else if($Route == 'lhpcasting.scanQR'){
            $data = "";
        }else{
            $data = "";
        }
        return view('partial.casting-modal',compact('data'));
    }

    public function index()
    {
        $title = "CASTING";
        return view('prod-dashboard-casting', compact('title'));
    }

    //=================[DATATABLES SERVER SIDE]=================\\

    public function DT_downtime(Request $request)
    {
        if ($request->ajax()) {
            $data = DB_Jenis_Downtime::where('casting', true)->select('id', 'jenis_downtime', 'kategori')->orderBy('kategori')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="EditMeasurement(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function DT_rejection(Request $request)
    {
        if ($request->ajax()) {
            $data = DB_Jenis_NG::where('casting', true)->select('id', 'jenis_reject')->groupBy('jenis_reject')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="EditMeasurement(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function Api_idCasting(Request $request)
    {
       return DB_Mesincasting::where('mc', $request->id)->with('DB_Namapart')->get();
    }

    public function addmachine_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'line' => 'required',
            'mc' => 'required',
            'material' => 'required',
            'db_namapart_id' => 'required',
            'dies' => 'required',
            'cycle_time' => 'required',
            'kode_kanban' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_MesinCasting::create([
            'line' => $request->line,
            'mc' => $request->mc,
            'material_id' => $request->material,
            'db_namapart_id' => $request->db_namapart_id,
            'nomor_dies' => $request->dies,
            'cycle_time' => $request->cycle_time,
            'kode_kanban' => $request->kode_kanban,
        ]);
        if ($insert) {
            return redirect('/prod/casting')->with('berhasil_input', 'berhasil_input');
        }
        return back()->with('gagal_validasi', 'gagal_validasi');
    }

    public function updatemachine_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'line' => 'required',
            'mc' => 'required',
            'material' => 'required',
            'db_namapart_id' => 'required',
            'dies' => 'required',
            'cycle_time' => 'required',
            'kode_kanban' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_MesinCasting::where('mc', $request->mc)->update([
            'line' => $request->line,
            'material_id' => $request->material,
            'db_namapart_id' => $request->db_namapart_id,
            'nomor_dies' => $request->dies,
            'cycle_time' => $request->cycle_time,
            'kode_kanban' => $request->kode_kanban,
        ]);
        if ($insert) {
            return redirect('/prod/casting')->with('berhasil_input', 'berhasil_input');
        }
        return back()->with('gagal_validasi', 'gagal_validasi');
    }

    public function addRejection(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reject' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('gagal_validasi', 'gagal_validasi');
        }
        $reset = DB_Jenis_NG::where('casting', 1)->update(['casting' => 0]);
        foreach($request->reject as $reject_id){
            $jenis_reject = DB_Jenis_NG::find($reject_id);
            $update = DB_Jenis_NG::where('jenis_reject', $jenis_reject->jenis_reject)->update(['casting' => 1]);
        }

        if ($update) {
            return redirect('/prod/casting')->with('berhasil_input', 'berhasil_input');
        }

        return back()->with('gagal_validasi', 'gagal_validasi');
    }

    public function addDowntime(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'downtime' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('gagal_validasi', 'gagal_validasi');
        }
        $reset = DB_Jenis_Downtime::where('casting', 1)->update(['casting' => 0]);
        foreach($request->downtime as $downtime_id){
            $jenis_downtime = DB_Jenis_Downtime::find($downtime_id);
            $update = DB_Jenis_Downtime::where([
                ['jenis_downtime', $jenis_downtime->jenis_downtime],
                ['kategori', $jenis_downtime->kategori],
            ])->update(['casting' => 1]);
        }

        if ($update) {
            return redirect('/prod/casting')->with('berhasil_input', 'berhasil_input');
        }

        return back()->with('gagal_validasi', 'gagal_validasi');
    }

    public function addhenkaten_save(UsableController $useable, Request $request)
    {
        $shift = $useable->Shift();
        $validator = Validator::make($request->all(), [
            'jenis_henkaten' => 'required',
            'deskripsi' => 'required',
            'machine' => 'required',
            'problem' => 'required',
            'countermeasure' => 'required',
            'status' => 'required',
            'plan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/casting')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_Henkaten::create([
            'area' => 'casting',
            'jenis_henkaten' => $request->jenis_henkaten,
            'mesin' => $request->machine,
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
        if($request->status == 'open'){
            $status = 1;
        }else{
            $status = 0;
        }
        if ($insert) {
            if($request->jenis_henkaten == 'MAN'){
                $macamhenkaten = 'henkaten_mp';
            }else if($request->jenis_henkaten == 'MACHINE'){
                $macamhenkaten = 'henkaten_mc';
            }else if($request->jenis_henkaten == 'MATERIAL'){
                $macamhenkaten = 'henkaten_mat';
            }else if($request->jenis_henkaten == 'METHODE'){
                $macamhenkaten = 'henkaten_met';
            }else{
                return redirect('/prod/casting')->with('gagal_validasi', 'gagal_validasi');
            }
            $number = preg_replace('/\D/', '', $request->machine);
            DB_MesinCasting::where('mc', $number)->update([
                $macamhenkaten => $status,
            ]);
            return redirect('/prod/casting')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function addhenkaten_update(Request $request)
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

        $insert = DB_Henkaten::where('id', '=', $request->id_henkaten)->update([
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
        $data = DB_Henkaten::find($request->id_henkaten);
        // dd($data->mesin);
        if($data->status == 'open'){
            $status = 1;
        }else{
            $status = 0;
        }
        if ($insert) {

            if($data->jenis_henkaten == 'MAN'){
                $macamhenkaten = 'henkaten_mp';
            }else if($data->jenis_henkaten == 'MACHINE'){
                $macamhenkaten = 'henkaten_mc';
            }else if($data->jenis_henkaten == 'MATERIAL'){
                $macamhenkaten = 'henkaten_mat';
            }else if($data->jenis_henkaten == 'METHODE'){
                $macamhenkaten = 'henkaten_met';
            }else{
                return redirect('/prod/casting')->with('gagal_validasi', 'gagal_validasi');
            }
            $number = preg_replace('/\D/', '', $data->mesin);
            DB_MesinCasting::where('mc', $number)->update([
                $macamhenkaten => $status,
            ]);
            return redirect('/prod/casting')->with('berhasil_input', 'berhasil_input');
        }
    }

    //=================[LHP CASTING]=================\\
    public function lhp_index(UsableController $useable)
    {
        $title = "CASTING";
        $shift = $useable->Shift();
        return view('lhp-pre-casting',compact('title','shift'));
    }

    public function preparation_save(UsableController $useable, Request $request){
        $shift = $useable->Shift();
        $date = $useable->date();
        $jam_available = $useable->Jam_kerja_Efektif();
        $validator = Validator::make($request->all(), [
            'nrp_1' => 'required',
            'line' => 'required',
            'mc' => 'required',
            'nama_part' => 'required',
            'cavity' => 'required',
            'dies' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('gagal_validasi', 'gagal_validasi');
        }

        $ceking = DB_LhpCasting::where([
            ['nrp1', '=', $request->nrp_1],
            ['tanggal', '=', $date],
            ['shift', '=', $shift],
            ['nama_part', '=', $request->nama_part],
            ['nomor_dies', '=', $request->dies],
            ['cavity', '=', $request->cavity],
        ])->orderBy('id', 'DESC')->first();

        if ($ceking != null) {
            return redirect("/lhp/casting/$request->mc/$ceking->id")->with('berhasil_input', 'berhasil_input');
        }
        $insert = DB_LhpCasting::create([
            'id_mesincasting' => $request->mc,
            'nrp1' => $request->nrp_1,
            'nrp2' => $request->nrp_2,
            'nrp3' => $request->nrp_3,
            'nrp4' => $request->nrp_4,
            'nrp5' => $request->nrp_5,
            'nrp6' => $request->nrp_6,
            'tanggal' => $date,
            'shift' => $shift,
            'jam_available' => $jam_available,
            'jam_running' => $jam_available,
            'nama_part' => $request->nama_part,
            'nomor_dies' => $request->dies,
            'cavity' => $request->cavity,
        ]);

        if($insert){
            return redirect("/lhp/casting/$request->mc/$insert->id")->with('berhasil_input', 'berhasil_input');
        }
        return back()->with('gagal_validasi', 'gagal_validasi');
    }

    public function lhpInput_index(UsableController $useable, $mc, $id_lhp){
        $title = "CASTING";
        $area = $mc;
        $shift = $useable->Shift();
        $date = $useable->date();
        $hour = $useable->hour();
        $validLhp = DB_LhpCasting::where([
            ['id', '=', $id_lhp],
            ['tanggal', '=', $date],
            ['shift', '=', $shift],
            ['id_mesincasting', '=', $mc],
        ])->orderBy('id', 'DESC')->first();
        if($validLhp == null){
            return redirect("/lhp/casting")->with('gagal_validasi', 'gagal_validasi');
        }
        $data = DB_LhpCasting::where('id', $id_lhp)->with(['DB_MesinCasting', 'DB_Jenis_Downtime'])->get();
        return view('lhp-ipt-casting',compact('title','shift','data','area'));

    }
}
