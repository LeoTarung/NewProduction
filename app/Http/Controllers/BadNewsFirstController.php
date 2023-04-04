<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\DB_BadNewsFirst;
use App\Models\DB_BnfDeliveryQuality;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class BadNewsFirstController extends Controller
{
    public function index(Request $request)
    {
        $title = "BNF";
        if ($request->ajax()) {
            $data = DB_BadNewsFirst::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editBNF(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('prod-BadNewsFirst', compact('title'));
    }

    public function index_datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = DB_BnfDeliveryQuality::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editQualityDelivery(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }


    public function modal_form()
    {
        return view('partial.modal');
    }

    public function apiID(Request $request)
    {
        if ($request->db == 'editbnf') {
            $data =  DB_BadNewsFirst::find($request->id);
        } else if ($request->db == 'editqualitydelivery') {
            $data = DB_BnfDeliveryQuality::find($request->id);
        }
        return $data;
    }

    public function modal_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'nama_customer' => 'required',
            'nama_part' => 'required',
            'problem' => 'required',
            'pic' => 'required',
            'pic_qc' => 'required',
            'occure' => 'required',
            'outflow' => 'required',
            'kategori_claim' => 'required',
            'kejadian_claim' => 'required',
            'kategori_claim_market' => 'required',
            'status_bnf' => 'required',
            'opl' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/BadNewsFirst')->with('gagal_validasi', 'gagal_validasi');
        }
        $totalNG = $request->bocor + $request->flowline + $request->mach_other + $request->no_tap +  $request->paint_meler + $request->paint_tipis + $request->dent + $request->gompal + $request->ng_assy + $request->other + $request->paint_other + $request->porosity + $request->dimensi_cast + $request->jamur + $request->ng_assy_mach + $request->o_proses_f + $request->paint_peel_off + $request->retak + $request->dimensi_mach + $request->k_proses_fin + $request->ng_assy_sc + $request->paint_kotor + $request->paint_scratch + $request->undercut;
        $stock = $request->customer + $request->selog + $request->delsi + $request->PDC + $request->FSCM + $request->NM;

        $insert = DB_BadNewsFirst::create([
            'tanggal' => $request->tanggal,
            'nama_customer' => $request->nama_customer,
            'nama_part' => $request->nama_part,
            'problem' => $request->problem,
            'pic' => $request->pic,
            'pic_qc' => $request->pic_qc,
            'pic_penerima' => $request->pic_penerima,
            'occure' => $request->occure,
            'occure_deskripsi' => $request->occure_deskripsi,
            'outflow' => $request->outflow,
            'outflow_deskripsi' => $request->outflow_deskripsi,
            'bocor' => $request->bocor,
            'flowline' => $request->flowline,
            'mach_other' => $request->mach_other,
            'no_tap' => $request->no_tap,
            'paint_meler' => $request->paint_meler,
            'paint_tipis' => $request->paint_tipis,
            'dent' => $request->dent,
            'gompal' => $request->gompal,
            'ng_assy' => $request->ng_assy,
            'other' => $request->other,
            'paint_other' => $request->paint_other,
            'porosity' => $request->porosity,
            'dimensi_cast' => $request->dimensi_cast,
            'jamur' => $request->jamur,
            'ng_assy_mach' => $request->ng_assy_mach,
            'o_proses_f' => $request->o_proses_f,
            'paint_peel_off' => $request->paint_peel_off,
            'retak' => $request->retak,
            'dimensi_mach' => $request->dimensi_mach,
            'k_proses_fin' => $request->k_proses_fin,
            'ng_assy_sc' => $request->ng_assy_sc,
            'paint_kotor' => $request->paint_kotor,
            'paint_scratch' => $request->paint_scratch,
            'undercut' => $request->undercut,
            'kategori_claim' => $request->kategori_claim,
            'kejadian_claim' => $request->kejadian_claim,
            'kategori_claim_market' => $request->kategori_claim_market,
            'no_dpwc' => $request->no_dpwc,
            'status_bnf' => $request->status_bnf,
            'opl' => $request->opl,
            'customer' => $request->customer,
            'selog' => $request->selog,
            'delsi' => $request->delsi,
            'PDC' => $request->PDC,
            'FSCM' => $request->FSCM,
            'NM' => $request->NM,
            'total_ng' =>  $totalNG,
            'stock' =>  $stock,
        ]);
        if ($insert) {
            return redirect('/BadNewsFirst')->with('berhasil_input', 'berhasil_input');
        }
        return redirect('/BadNewsFirst')->with('gagal_validasi', 'gagal_validasi');
    }

    public function modal_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_bnf' => 'required',
            'tanggal' => 'required',
            'nama_customer' => 'required',
            'nama_part' => 'required',
            'problem' => 'required',
            'pic' => 'required',
            'pic_qc' => 'required',
            'occure' => 'required',
            'outflow' => 'required',
            'kategori_claim' => 'required',
            'kejadian_claim' => 'required',
            'kategori_claim_market' => 'required',
            'status_bnf' => 'required',
            'opl' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/BadNewsFirst')->with('gagal_validasi', 'gagal_validasi');
        }
        $totalNG = $request->bocor + $request->flowline + $request->mach_other + $request->no_tap +  $request->paint_meler + $request->paint_tipis + $request->dent + $request->gompal + $request->ng_assy + $request->other + $request->paint_other + $request->porosity + $request->dimensi_cast + $request->jamur + $request->ng_assy_mach + $request->o_proses_f + $request->paint_peel_off + $request->retak + $request->dimensi_mach + $request->k_proses_fin + $request->ng_assy_sc + $request->paint_kotor + $request->paint_scratch + $request->undercut;
        $stock = $request->customer + $request->selog + $request->delsi + $request->PDC + $request->FSCM + $request->NM;

        $insert = DB_BadNewsFirst::where('id', '=', $request->id_bnf)->update([
            'tanggal' => $request->tanggal,
            'nama_customer' => $request->nama_customer,
            'nama_part' => $request->nama_part,
            'problem' => $request->problem,
            'pic' => $request->pic,
            'pic_qc' => $request->pic_qc,
            'pic_penerima' => $request->pic_penerima,
            'occure' => $request->occure,
            'occure_deskripsi' => $request->occure_deskripsi,
            'outflow' => $request->outflow,
            'outflow_deskripsi' => $request->outflow_deskripsi,
            'bocor' => $request->bocor,
            'flowline' => $request->flowline,
            'mach_other' => $request->mach_other,
            'no_tap' => $request->no_tap,
            'paint_meler' => $request->paint_meler,
            'paint_tipis' => $request->paint_tipis,
            'dent' => $request->dent,
            'gompal' => $request->gompal,
            'ng_assy' => $request->ng_assy,
            'other' => $request->other,
            'paint_other' => $request->paint_other,
            'porosity' => $request->porosity,
            'dimensi_cast' => $request->dimensi_cast,
            'jamur' => $request->jamur,
            'ng_assy_mach' => $request->ng_assy_mach,
            'o_proses_f' => $request->o_proses_f,
            'paint_peel_off' => $request->paint_peel_off,
            'retak' => $request->retak,
            'dimensi_mach' => $request->dimensi_mach,
            'k_proses_fin' => $request->k_proses_fin,
            'ng_assy_sc' => $request->ng_assy_sc,
            'paint_kotor' => $request->paint_kotor,
            'paint_scratch' => $request->paint_scratch,
            'undercut' => $request->undercut,
            'kategori_claim' => $request->kategori_claim,
            'kejadian_claim' => $request->kejadian_claim,
            'kategori_claim_market' => $request->kategori_claim_market,
            'no_dpwc' => $request->no_dpwc,
            'status_bnf' => $request->status_bnf,
            'opl' => $request->opl,
            'customer' => $request->customer,
            'selog' => $request->selog,
            'delsi' => $request->delsi,
            'PDC' => $request->PDC,
            'FSCM' => $request->FSCM,
            'NM' => $request->NM,
            'total_ng' =>  $totalNG,
            'stock' =>  $stock,
        ]);
        if ($insert) {
            return redirect('/BadNewsFirst')->with('berhasil_input', 'berhasil_input');
        }
        return redirect('/BadNewsFirst')->with('gagal_validasi', 'gagal_validasi');
    }

    public function modal_delivery_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'all_customer' => 'required',
            'adm' => 'required',
            'ahm_p1' => 'required',
            'ahm_p2' => 'required',
            'ahm_p3' => 'required',
            'ahm_p4' => 'required',
            'ahm_p5' => 'required',
            'ahm_rem' => 'required',
            'aisin' => 'required',
            'aspira' => 'required',
            'cai' => 'required',
            'denso' => 'required',
            'dnp' => 'required',
            'hino' => 'required',
            'hpm' => 'required',
            'igp' => 'required',
            'j_tekt' => 'required',
            'kawasaki' => 'required',
            'kubota' => 'required',
            'kayaba' => 'required',
            'mhask' => 'required',
            'mii' => 'required',
            'mkm' => 'required',
            'nissan' => 'required',
            'nki' => 'required',
            'okamoto' => 'required',
            'suzuki' => 'required',
            'skc' => 'required',
            'tmmin' => 'required',
            'toyoda_gosai' => 'required',
            'yamaha' => 'required',
            'yutaka' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/BadNewsFirst')->with('gagal_validasi', 'gagal_validasi');
        }


        $insert = DB_BnfDeliveryQuality::create([
            'tanggal' => $request->tanggal,
            'all_customer' => $request->all_customer,
            'adm' => $request->adm,
            'ahm_p1' => $request->ahm_p1,
            'ahm_p2' => $request->ahm_p2,
            'ahm_p3' => $request->ahm_p3,
            'ahm_p4' => $request->ahm_p4,
            'ahm_p5' => $request->ahm_p5,
            'ahm_rem' => $request->ahm_rem,
            'aisin' => $request->aisin,
            'aspira' => $request->aspira,
            'cai' => $request->cai,
            'denso' => $request->denso,
            'dnp' => $request->dnp,
            'hino' => $request->hino,
            'hpm' => $request->hpm,
            'igp' => $request->igp,
            'j_tekt' => $request->j_tekt,
            'kawasaki' => $request->kawasaki,
            'kubota' => $request->kubota,
            'kayaba' => $request->kayaba,
            'mhask' => $request->mhask,
            'mii' => $request->mii,
            'mkm' => $request->mkm,
            'nissan' => $request->nissan,
            'nki' => $request->nki,
            'okamoto' => $request->okamoto,
            'suzuki' => $request->suzuki,
            'skc' => $request->skc,
            'tmmin' => $request->tmmin,
            'toyoda_gosai' => $request->toyoda_gosai,
            'yamaha' => $request->yamaha,
            'yutaka' => $request->yutaka,
        ]);
        if ($insert) {
            return redirect('/BadNewsFirst')->with('berhasil_input', 'berhasil_input');
        }
        return redirect('/BadNewsFirst')->with('gagal_validasi', 'gagal_validasi');
    }

    public function modal_delivery_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'all_customer' => 'required',
            'adm' => 'required',
            'ahm_p1' => 'required',
            'ahm_p2' => 'required',
            'ahm_p3' => 'required',
            'ahm_p4' => 'required',
            'ahm_p5' => 'required',
            'ahm_rem' => 'required',
            'aisin' => 'required',
            'aspira' => 'required',
            'cai' => 'required',
            'denso' => 'required',
            'dnp' => 'required',
            'hino' => 'required',
            'hpm' => 'required',
            'igp' => 'required',
            'j_tekt' => 'required',
            'kawasaki' => 'required',
            'kubota' => 'required',
            'kayaba' => 'required',
            'mhask' => 'required',
            'mii' => 'required',
            'mkm' => 'required',
            'nissan' => 'required',
            'nki' => 'required',
            'okamoto' => 'required',
            'suzuki' => 'required',
            'skc' => 'required',
            'tmmin' => 'required',
            'toyoda_gosai' => 'required',
            'yamaha' => 'required',
            'yutaka' => 'required',
            'id_deliveryQuality' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/BadNewsFirst')->with('gagal_validasi', 'gagal_validasi');
        }


        $insert = DB_BnfDeliveryQuality::where('id', '=', $request->id_deliveryQuality)->update([
            'tanggal' => $request->tanggal,
            'all_customer' => $request->all_customer,
            'adm' => $request->adm,
            'ahm_p1' => $request->ahm_p1,
            'ahm_p2' => $request->ahm_p2,
            'ahm_p3' => $request->ahm_p3,
            'ahm_p4' => $request->ahm_p4,
            'ahm_p5' => $request->ahm_p5,
            'ahm_rem' => $request->ahm_rem,
            'aisin' => $request->aisin,
            'aspira' => $request->aspira,
            'cai' => $request->cai,
            'denso' => $request->denso,
            'dnp' => $request->dnp,
            'hino' => $request->hino,
            'hpm' => $request->hpm,
            'igp' => $request->igp,
            'j_tekt' => $request->j_tekt,
            'kawasaki' => $request->kawasaki,
            'kubota' => $request->kubota,
            'kayaba' => $request->kayaba,
            'mhask' => $request->mhask,
            'mii' => $request->mii,
            'mkm' => $request->mkm,
            'nissan' => $request->nissan,
            'nki' => $request->nki,
            'okamoto' => $request->okamoto,
            'suzuki' => $request->suzuki,
            'skc' => $request->skc,
            'tmmin' => $request->tmmin,
            'toyoda_gosai' => $request->toyoda_gosai,
            'yamaha' => $request->yamaha,
            'yutaka' => $request->yutaka,
        ]);
        if ($insert) {
            return redirect('/BadNewsFirst')->with('berhasil_input', 'berhasil_input');
        }
        return redirect('/BadNewsFirst')->with('gagal_validasi', 'gagal_validasi');
    }

    public function TV_index()
    {
        $judul = "BAD NEW FIRST";
        $title = "BNF";
        return view('TV-BadNewsFirst', compact('judul', 'title'));
    }

    public function ftp()
    {
        $judul = "BAD NEW FIRST";
        $title = "TESTING AJA";
        // $ftp = Storage::disk('ftp')->allFiles();  //INI BERHASIL BUAT LIHAT ISI FOLDER
        // $ftp = Storage::disk('ftp')->get('example.txt');  //INI BERHASIL BUAT BACA ISI FILE
        // dd($ftp);
        // $ftp = Storage::disk('ftp')->put('/TXT/example1.txt', 'Ini adalah isi dari si exampletext barusan dan ini fardu ain1'); //INI BERHASIL BUAT SIMPAN
        // $ftp = Storage::disk('ftp')->put('testing.jpg', 'testing.jpg');
        // dd($file);
        return view('TV-BadNewsFirst', compact('judul', 'title'));
    }
}
