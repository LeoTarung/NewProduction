<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DB_MesinCasting;
use App\Models\DB_Namapart;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
        }else if($Route == 'Casting.SetupHenkaten'){
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

    public function Api_idCasting(Request $request)
    {
       return DB_Mesincasting::where('mc', $request->id)->get();
    }

    public function addmachine_save(Request $request)
    {
        dd($request);
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

    //=================[LHP CASTING]=================\\
    public function lhp_index(UsableController $useable)
    {
        $title = "CASTING";
        $shift = $useable->Shift();
        return view('lhp-pre-casting',compact('title','shift'));
    }
}
