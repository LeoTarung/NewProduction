<?php

namespace App\Http\Controllers;

use App\Models\DB_Masterpartsto;
use App\Models\DB_Mpsto;
use App\Models\DB_Partsto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class STOController extends Controller
{
    public function dashboard()
    {
        $title = "STO";
        return view('prod-Dashboard-STO',compact('title'));
    }

    public function menu()
    {
        $title = "STO";
        $judul = "STOCK OPNAME";
        return view('lhp-pre-STO',compact('title','judul'));
    }

    public function openModal()
    {
        return view('partial.STO-modal');
    }

    public function openModalWithID($id)
    {
        return view('partial.STO-modal',compact('id'));

        // $data =  DB_Partsto::where('tag', $id)->first();
        // if($data != null){
        //     return view('partial.STO-modal',compact('id','data'));
        // }
        // return back()->with('gagal_validasi', 'gagal_validasi');
    }

    public function preparation_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nrp' => 'required',
            'nama' => 'required',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/sto/menu')->with('gagal_validasi', 'gagal_validasi');
        }

        $cek = DB_Mpsto::where([['nrp', '=', $request->nrp], ['role', '=', $request->role]])->orderBy('id', 'DESC')->first();

        if ($cek) {
            return redirect("/sto/$cek->role/$cek->id")->with('berhasil_input', 'berhasil_input');
        }

        $insert = DB_Mpsto::create([
            'nrp' => $request->nrp,
            'nama' => $request->nama,
            'role' => $request->role,

        ]);

        if ($insert) {
            return redirect("/sto/$request->role/$insert->id")->with('berhasil_input', 'berhasil_input');
        }
    }

    public function inputSTO($id)
    {
        $title = "STO";
        $judul = "STOCK OPNAME";
        $parts = explode(".", Route::current()->getName()); //ambilnya $parts[1]
        $data = DB_Mpsto::where([['id','=',$id], ['role','=', $parts[1]]])->first();
        if($data != null){
            return view('lhp-ipt-STO',compact('title','judul','id','data'));
        }
        return redirect('/sto/menu')->with('preulang', 'preulang');
    }

    public function Counter_Save(Request $request)
    {
        //KODE AUTO
        $a = date('Y-m-d');
        $max = DB_Partsto::selectRaw('max(tag) AS ed')->whereDate('created_at', '>=', $a)->get()->first();
        $kode = substr($max->ed, 12);
        // $kode = substr("STO210520230000", 11);
        $ed = 'STO';
        $date = date("dmY");
        $kode++;
        $kodeauto = $ed . $date . sprintf("%05s", $kode);
        dd($kodeauto);

        $validator = Validator::make($request->all(), [
            'sloc' => 'required',
            'status' => 'required',
            'nama_part' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'area' => 'required',
            'id_mpsto' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_Partsto::create([
            'tag' => $kodeauto,
            'kode_part' => $request->kode_part,
            'nama_part' => $request->nama_part,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'sloc' => $request->sloc,
            'area' => $request->area,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'counter_id' => $request->id_mpsto,
            'status_sto' => 'OPEN',
        ]);
        if($insert){
            return back()->with('berhasil_input', 'berhasil_input');
        }
    }

    public function Counter_Update(Request $request)
    {
        dd($request);
    }

    public function api_from(Request $request, $from)
    {
        switch ($from) {
            case 'sloc':
                $data = DB_Masterpartsto::where('sloc', $request->sloc)->get();
                break;
            // case 'area':
            //     $data = DB_Masterpartsto::where('kode_part', 'like', '%'.$request->area)->get();
            //     break;
            case 'nama-part':
                $data = DB_Masterpartsto::where('nama_part', $request->nama_part)->get();
                break;
            default:
                $data ="";
                break;
        }
        return $data;
    }

    public function print_tag($id)
    {
        return view('partial.PrintOnImin');
    }
}
