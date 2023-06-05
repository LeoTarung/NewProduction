<?php

namespace App\Http\Controllers;

use App\Models\DB_QualityDiesApproval;
use Illuminate\Http\Request;
use App\Models\DB_QualityKalibrasi;
use App\Models\DB_Spectromelting;
use App\Models\DB_QualityMeasurementPart;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class QualityController extends Controller
{
    public function index_prod()
    {
        $title = "QUALITY";
        return view('prod-Dashboard-quality',compact('title'));
    }

    public function DTserverkalibrasi(Request $request)
    {
        if ($request->ajax()) {
            $data = DB_QualityKalibrasi::select('id', 'nama_alat', 'no_reg', 'judgement')->latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="EditKalibrasi(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('hasil', function ($row) {
                    if($row->judgement == 0){
                        $hasil = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->judgement == 1){
                        $hasil = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $hasil = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $hasil;
                })
                ->rawColumns(['action', 'hasil'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function DTserverdiesapproval(Request $request)
    {
        if ($request->ajax()){
            $data = DB_QualityDiesApproval::select('id', 'nama_part', 'no_dies', 'sample_approval', 'document_approval', 'status_pengukuran', 'status_submit_sample', 'status_submit_pa', 'status_submit_ipp', 'status_submit_masspro','created_at')->latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="EditDiesApproval(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('sample_approval', function ($row) {
                    if($row->sample_approval == 0){
                        $sample_approval = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->sample_approval == 1){
                        $sample_approval = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $sample_approval = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $sample_approval;
                })
                ->addColumn('document_approval', function ($row) {
                    if($row->document_approval == 0){
                        $document_approval = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->document_approval == 1){
                        $document_approval = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $document_approval = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $document_approval;
                })
                ->addColumn('status_pengukuran', function ($row) {
                    if($row->status_pengukuran == 0){
                        $status_pengukuran = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->status_pengukuran == 1){
                        $status_pengukuran = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $status_pengukuran = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $status_pengukuran;
                })
                ->addColumn('status_submit_sample', function ($row) {
                    if($row->status_submit_sample == 0){
                        $status_submit_sample = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->status_submit_sample == 1){
                        $status_submit_sample = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $status_submit_sample = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $status_submit_sample;
                })
                ->addColumn('status_submit_pa', function ($row) {
                    if($row->status_submit_pa == 0){
                        $status_submit_pa = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->status_submit_pa == 1){
                        $status_submit_pa = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $status_submit_pa = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $status_submit_pa;
                })
                ->addColumn('status_submit_ipp', function ($row) {
                    if($row->status_submit_ipp == 0){
                        $status_submit_ipp = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->status_submit_ipp == 1){
                        $status_submit_ipp = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $status_submit_ipp = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $status_submit_ipp;
                })
                ->addColumn('status_submit_masspro', function ($row) {
                    if($row->status_submit_masspro == 0){
                        $status_submit_masspro = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->status_submit_masspro == 1){
                        $status_submit_masspro = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $status_submit_masspro = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $status_submit_masspro;
                })
                ->addColumn('tanggal', function ($row) {
                    $date = date("Y-m-d", strtotime($row->created_at));
                    return $date;
                })
                ->rawColumns(['action', 'tanggal', 'sample_approval', 'document_approval', 'status_pengukuran', 'status_submit_sample', 'status_submit_pa', 'status_submit_ipp', 'status_submit_masspro'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function DTserverspectro_hpdc(Request $request)
    {
        if ($request->ajax()) {
            $data = DB_Spectromelting::where('area', 'hpdc')->select('id', 'furnace', 'a', 'aa', 'aaa', 'b', 'bb', 'bbb')->latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="EditSpectroHPDC(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('a', function ($row) {
                    if($row->a == 0){
                        $a = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->a == 1){
                        $a = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $a = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $a;
                })
                ->addColumn('aa', function ($row) {
                    if($row->aa == 0){
                        $aa = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->aa == 1){
                        $aa = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $aa = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $aa;
                })
                ->addColumn('aaa', function ($row) {
                    if($row->aaa == 0){
                        $aaa = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->aaa == 1){
                        $aaa = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $aaa = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $aaa;
                })
                ->addColumn('b', function ($row) {
                    if($row->b == 0){
                        $b = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->b == 1){
                        $b = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $b = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $b;
                })
                ->addColumn('bb', function ($row) {
                    if($row->bb == 0){
                        $bb = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->bb == 1){
                        $bb = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $bb = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $bb;
                })
                ->addColumn('bbb', function ($row) {
                    if($row->bbb == 0){
                        $bbb = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->bbb == 1){
                        $bbb = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $bbb = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $bbb;
                })
                ->rawColumns(['action', 'a', 'aa', 'aaa', 'b', 'bb', 'bbb'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function DTserverspectro_gdc(Request $request)
    {
        if ($request->ajax()) {
            $data = DB_Spectromelting::where('area', 'gdc')->select('id', 'furnace', 'a', 'aa', 'aaa')->latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="EditSpectroGDC(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('a', function ($row) {
                    if($row->a == 0){
                        $a = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->a == 1){
                        $a = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $a = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $a;
                })
                ->addColumn('aa', function ($row) {
                    if($row->aa == 0){
                        $aa = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->aa == 1){
                        $aa = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $aa = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $aa;
                })
                ->addColumn('aaa', function ($row) {
                    if($row->aaa == 0){
                        $aaa = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->aaa == 1){
                        $aaa = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $aaa = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $aaa;
                })
                ->rawColumns(['action', 'a', 'aa', 'aaa'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function DTservermeasurement(Request $request)
    {
        if ($request->ajax()) {
            $data = DB_QualityMeasurementPart::select('id', 'shift', 'proses', 'kategori', 'nama_part_dies', 'qty', 'judgement')->latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="EditMeasurement(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('judgement', function ($row) {
                    if($row->judgement == 0){
                        $judgement = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->judgement == 1){
                        $judgement = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $judgement = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $judgement;
                })
                ->rawColumns(['action', 'judgement'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function DTservermeasurementNOSTAT(Request $request){
        if ($request->ajax()) {
            $data = DB_QualityMeasurementPart::where('judgement', 0)->select('id', 'shift', 'proses', 'kategori', 'nama_part_dies', 'qty', 'judgement')->latest()->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="EditMeasurement(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('judgement', function ($row) {
                    if($row->judgement == 0){
                        $judgement = '<a class="fa-solid fa-arrows-spin fa-spin text-secondary fa-2x"></a>';
                    }elseif($row->judgement == 1){
                        $judgement = '<a class="fa-solid fa-circle-check text-success fa-2x"></a>';
                    }else{
                        $judgement = '<a class="fa-solid fa-circle-xmark text-danger fa-2x"></a>';
                    }
                    return $judgement;
                })
                ->rawColumns(['action', 'judgement'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function Api_kalibrasi(Request $request)
    {
        return DB_QualityKalibrasi::find($request->id);
    }

    public function Api_diesapproval(Request $request)
    {
        return DB_QualityDiesApproval::find($request->id);
    }

    public function Api_spectro(Request $request)
    {
        return DB_Spectromelting::find($request->id);
    }

    public function Api_measurement(Request $request){
        return DB_QualityMeasurementPart::find($request->id);
    }

    public function OpenModal()
    {
        return view('partial.Quality-modal');
    }

    public function TV_index_kalibrasi()
    {
        $title = "QUALITY";
        $judul = "ACHIEVEMENT KALIBRASI";
        return view('TV-Quality-Kalibrasi',compact('title', 'judul'));
    }
    public function TV_index_diesapproval()
    {
        $title = "QUALITY";
        $judul = "DIES APPROVAL";
        return view('TV-Quality-DiesApproval',compact('title', 'judul'));
    }
    public function TV_index_spectro()
    {
        $title = "QUALITY";
        $judul = "SPECTRO AND MEASURE";
        return view('TV-Quality-SpectroAndMeasure',compact('title', 'judul'));
    }

    public function kalibrasi_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_alat' => 'required',
            'no_reg' => 'required',
            'judgement' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_QualityKalibrasi::create([
            'nama_alat' => $request->nama_alat,
            'no_reg' => $request->no_reg,
            'judgement' => $request->judgement,
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function kalibrasi_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_alat' => 'required',
            'no_reg' => 'required',
            'judgement' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_QualityKalibrasi::find($request->id)->update([
            'nama_alat' => $request->nama_alat,
            'no_reg' => $request->no_reg,
            'judgement' => $request->judgement,
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function diesapproval_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_part' => 'required',
            'no_dies' => 'required',
            'sample_approval' => 'required',
            'document_approval' => 'required',
            'status_pengukuran' => 'required',
            'status_submit_sample' => 'required',
            'status_submit_pa' => 'required',
            'status_submit_ipp' => 'required',
            'status_submit_masspro' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_QualityDiesApproval::create([
            'nama_part' => $request->nama_part,
            'no_dies' => $request->no_dies,
            'sample_approval' => $request->sample_approval,
            'document_approval' => $request->document_approval,
            'status_pengukuran' => $request->status_pengukuran,
            'status_submit_sample' => $request->status_submit_sample,
            'status_submit_pa' => $request->status_submit_pa,
            'status_submit_ipp' => $request->status_submit_ipp,
            'status_submit_masspro' => $request->status_submit_masspro,
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function diesapproval_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama_part' => 'required',
            'no_dies' => 'required',
            'sample_approval' => 'required',
            'document_approval' => 'required',
            'status_pengukuran' => 'required',
            'status_submit_sample' => 'required',
            'status_submit_pa' => 'required',
            'status_submit_ipp' => 'required',
            'status_submit_masspro' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_QualityDiesApproval::find($request->id)->update([
            'nama_part' => $request->nama_part,
            'no_dies' => $request->no_dies,
            'sample_approval' => $request->sample_approval,
            'document_approval' => $request->document_approval,
            'status_pengukuran' => $request->status_pengukuran,
            'status_submit_sample' => $request->status_submit_sample,
            'status_submit_pa' => $request->status_submit_pa,
            'status_submit_ipp' => $request->status_submit_ipp,
            'status_submit_masspro' => $request->status_submit_masspro,
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function spectro_hpdc_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'furnace' => 'required',
            'a' => 'required',
            'aa' => 'required',
            'aaa' => 'required',
            'b' => 'required',
            'bb' => 'required',
            'bbb' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }
        $insert = DB_Spectromelting::create([
            'furnace' => $request->furnace,
            'a' => $request->a,
            'aa' => $request->aa,
            'aaa' => $request->aaa,
            'b' => $request->b,
            'bb' => $request->bb,
            'bbb' => $request->bbb,
            'area' => 'hpdc',
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function spectro_hpdc_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'furnace' => 'required',
            'a' => 'required',
            'aa' => 'required',
            'aaa' => 'required',
            'b' => 'required',
            'bb' => 'required',
            'bbb' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }
        $insert = DB_Spectromelting::find($request->id)->update([
            'furnace' => $request->furnace,
            'a' => $request->a,
            'aa' => $request->aa,
            'aaa' => $request->aaa,
            'b' => $request->b,
            'bb' => $request->bb,
            'bbb' => $request->bbb,
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function spectro_gdc_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'furnace' => 'required',
            'a' => 'required',
            'aa' => 'required',
            'aaa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }
        $insert = DB_Spectromelting::create([
            'furnace' => $request->furnace,
            'a' => $request->a,
            'aa' => $request->aa,
            'aaa' => $request->aaa,
            'area' => 'gdc'
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function spectro_gdc_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'furnace' => 'required',
            'a' => 'required',
            'aa' => 'required',
            'aaa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }
        $insert = DB_Spectromelting::find($request->id)->update([
            'furnace' => $request->furnace,
            'a' => $request->a,
            'aa' => $request->aa,
            'aaa' => $request->aaa,
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }



    public function measurement_save(UsableController $useable, Request $request)
    {
        $shift = $useable->Shift();
        $validator = Validator::make($request->all(), [
            'proses' => 'required',
            'kategori' => 'required',
            'nama_part_dies' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }
        $insert = DB_QualityMeasurementPart::create([
            'proses' => $request->proses,
            'kategori' => $request->kategori,
            'nama_part_dies' => $request->nama_part_dies,
            'qty' => $request->qty,
            'shift' => $shift,
            'judgement' => 0
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function measurement_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'proses' => 'required',
            'kategori' => 'required',
            'nama_part_dies' => 'required',
            'qty' => 'required',
            'judgement' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/prod/quality')->with('gagal_validasi', 'gagal_validasi');
        }
        $insert = DB_QualityMeasurementPart::find($request->id)->update([
            'proses' => $request->proses,
            'kategori' => $request->kategori,
            'nama_part_dies' => $request->nama_part_dies,
            'qty' => $request->qty,
            'judgement' => $request->judgement
        ]);
        if ($insert) {
            return redirect('/prod/quality')->with('berhasil_input', 'berhasil_input');
        }
    }


}
