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
        $data = DB_PrintQRFG::where('status', 'abnormality')->orderBy('id', 'desc')->get();
        return view('partial.QRFG-modal', compact('data'));
    }

    public function openModal($id, $copies, $status)
    {
        // KODEAUTO QRTAG
        $last_kodeauto = null;
        $a = date('Y-m-d');
        $max = DB_PrintQRFG::selectRaw('max(qrtag) AS ed')->whereDate('created_at', '>=', $a)->get()->first();;
        $kode = substr($max->ed, 15);
        $ed = 'NM1301';
        $date = date("dmY") . "A";

        $kode_array = array();
        $gabungan_array = array();
        $id_array = array();

        if ($status == 'normal') {
            $data = DB_NamaPart::find($id);
            for ($i = 1; $i <= $copies; $i++) {
                $kode++;
                $kodeauto = $ed . $date . sprintf("%04s", $kode);
                $last_kodeauto = $kodeauto;
                array_push($kode_array, $kodeauto);
                $gabungan = $data->customer_material . "|" . $data->kode_customer . "|" . $data->std_packaging . "|" . $kodeauto . "|";
                array_push($gabungan_array, $gabungan);
                $insert = DB_PrintQRFG::create([
                    'tanggal' => Carbon::now(),
                    'nama_part' => $data->nama_part,
                    'material' => $data->material,
                    'customer_material' => $data->customer_material,
                    'kode_customer' => $data->kode_customer,
                    'std_packaging' => $data->std_packaging,
                    'location' => 'FSCM',
                    'status' => 'normal',
                    'qrtag' => $last_kodeauto,
                ]);
                array_push($id_array, $insert);
            }
        } else if ($status == 'EditQty') {
            $data = DB_PrintQRFG::find($id);
            $gabungan = $data->customer_material . "|" . $data->kode_customer . "|" . $data->std_packaging . "|" . $data->qrtag . "|";
        }
        return view('partial.QRFG-modal', compact('data', 'gabungan', 'gabungan_array', 'kode_array',  'copies', 'id_array', 'status'));
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
        // KODEAUTO QRTAG
        $a = date('Y-m-d');
        $max = DB_PrintQRFG::selectRaw('max(qrtag) AS ed')->whereDate('created_at', '>=', $a)->get()->first();;
        $kode = substr($max->ed, 15);
        $ed = 'NM1301';
        $date = date("dmY") . "A";

        $kode++;

        $kodeauto = $ed . $date . sprintf("%04s", $kode);

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
            'status' => 'abnormality',
            'qrtag' => $kodeauto,
        ]);

        if ($insert) {
            return redirect("/qr/printQR/$insert->id/1/EditQty");
            return redirect('/qr/finishgood')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function FS_index()
    {
        dd("TEST");
    }
}
