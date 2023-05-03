<?php

namespace App\Http\Controllers;

use App\Models\DB_NamaPart;
use Illuminate\Http\Request;
use App\Models\DB_ScanShipping;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    public function index_dashboard()
    {
        $title = "SHIPPING";
        return view('prod-Dashboard-shipping', compact('title'));
    }

    public function index_scanQR()
    {
        $title = "SHIPPING";
        return view('prod-shipping-scanqr', compact('title'));
    }

    public function history_dashboard(Request $request)
    {
        $title = "HISTORY";
        if ($request->ajax()) {
            $data = DB_ScanShipping::where('status', 2)->orderByDesc('id')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="lihatLhp(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->addColumn('tanggal_pengiriman', function ($row) {
                    $date = date("Y-m-d", strtotime($row->created_at));
                    return $date;
                })
                ->addColumn('jam', function ($row) {
                    $date = date("H:i:s", strtotime($row->created_at));
                    return $date;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('prod-shipping-history', compact('title'));
    }

    public function scanQR_save(Request $request)
    {
        $request->hasilscan; //1136B-K1Z -N000-IN|1100002|25|NM130127042023|
        $pieces = explode("|", $request->hasilscan);
        $pcs = explode(" - ", $request->customer);
        $tanggal = substr($pieces[3], 6, 2);
        $bulan = substr($pieces[3], 8, 2);
        $tahun = substr($pieces[3], 10, 4);
        $gabung = $tahun . "-" . $bulan . "-" . $tanggal;
        $getnama = DB_NamaPart::where('customer_material', $pieces[0])->first();

        if ($getnama->customer == $pcs[0]) {
            if ($getnama == null) {
                $insert = DB_ScanShipping::create([
                    'isiqr' =>  $request->hasilscan,
                    'nama_part' =>   $getnama->nama_part,
                    'customer' => $pcs[0],
                    'plant' => $pcs[1],
                    'customer_material' =>  $pieces[0],
                    'qty' =>  $pieces[2],
                    'lot' =>  $gabung,
                    'status' =>  1,
                ]);
            } else {
                $insert = DB_ScanShipping::create([
                    'isiqr' =>  $request->hasilscan,
                    'nama_part' =>   $getnama->nama_part,
                    'customer' => $pcs[0],
                    'plant' => $pcs[1],
                    'material' =>  $getnama->material,
                    'customer_material' =>  $pieces[0],
                    'qty' =>  $pieces[2],
                    'lot' =>  $gabung,
                    'status' =>  1,
                ]);
            }
        }
    }

    public function scanQR_notrans()
    {
        $data = DB_ScanShipping::where('status', 1)->orderByDesc('id')->get();
        return $data;
    }

    public function scanQR_update(Request $request)
    {
        // dd($request);
        $pieces = explode(" - ", $request->customer);
        for ($i = 0; $i < count($request->qty); $i++) {

            $validator = Validator::make($request->all(), [
                'customer' => 'required',
                'ritase' => 'required',
                'id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('/prod/shipping/scan')->with('gagal_validasi', 'gagal_validasi');
            }

            $update =  DB_ScanShipping::where('id', $request->id[$i])->update([
                'nama_part' => $request->nama_part[$i],
                'customer_material' => $request->customer_material[$i],
                'qty' => $request->qty[$i],
                'lot' => $request->lot[$i],
                'customer' => $pieces[0],
                'plant' => $pieces[1],
                'ritase' => $request->ritase,
                'status' => 2,
            ]);
        }
        if ($update) {
            return redirect('/prod/shipping/scan')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function scanQR_delete(Request $request)
    {
        $product = DB_ScanShipping::find($request->id);
        $product->delete();
    }
}
