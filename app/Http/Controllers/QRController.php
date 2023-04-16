<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DB_NamaPart;
use App\Models\DB_PrintQRFG;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function APINamapart(Request $request)
    {
        $data = DB_NamaPart::find($request->id);
        return $data;
    }

    public function openModal1()
    {
        return view('partial.QRFG-modal');
    }

    public function openModalAbnormality(Request $request)
    {
        $data = DB_PrintQRFG::orderBy('id', 'desc')->get();
        return view('partial.QRFG-modal', compact('data'));
    }

    public function openModal($id, $status)
    {
        if ($status == 'normal') {
            $data = DB_NamaPart::find($id);
            $gabungan = $data->customer_material . "|" . $data->kode_customer . "|" . $data->std_packaging . "|" . 'NM1301' . date('dmY') . "|";
        } else if ($status == 'EditQty') {
            $data = DB_PrintQRFG::find($id);
            $gabungan = $data->customer_material . "|" . $data->kode_customer . "|" . $data->std_packaging . "|" . 'NM1301' . date('dmY') . "|";
        }
        return view('partial.QRFG-modal', compact('data', 'gabungan'));
    }

    public function FG_index(Request $request)
    {
        $title = "QR FG";
        if ($request->ajax()) {
            $data = DB_NamaPart::where('kode_part', 'like', '%-1')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-regular fa-pen-to-square fa-lg text-danger" onclick="EditQty(' . $data->id . ')"></a> | <a class="btn fa-solid fa-print fa-lg text-warning" onclick="PrintQRFG(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('prod-QRfinishgood', compact('title'));
    }

    public function FG_save(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'nama_part' => 'required',
            'material' => 'required',
            'pn_customer' => 'required',
            'qty' => 'required',
            'kode_customer' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/qr/finishgood')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_PrintQRFG::create([
            'tanggal' => Carbon::now(),
            'nama_part' => $request->nama_part,
            'material' => $request->material,
            'customer_material' => $request->pn_customer,
            'kode_customer' => $request->kode_customer,
            'std_packaging' => $request->qty,
            'location' => 'FSCM',
        ]);
        if ($insert) {
            return redirect("/qr/printQR/$insert->id/EditQty");
            return redirect('/qr/finishgood')->with('berhasil_input', 'berhasil_input');
        }

        // $gabungan = $request->customer_material . "|" . $request->kode_customer . "|" . $request->std_packaging . "|" . 'NM1301' . date('dmY') . "|";
    }

    public function FS_index()
    {
        dd("TEST");
    }
}
