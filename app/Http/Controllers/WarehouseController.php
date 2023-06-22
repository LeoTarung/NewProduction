<?php

namespace App\Http\Controllers;

use App\Models\DB_FromTimbanganIngot;
use App\Models\DB_Stockmaterial;
use App\Models\DB_Material;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class WarehouseController extends Controller
{
    public function index_dashboard()
    {
        $title = "WAREHOUSE";
        $data = DB_Stockmaterial::with(['DB_Material'])->get();
        return view('prod-Dashboard-warehouse',compact('title', 'data'));
    }

    public function TV_index()
    {
        $title = "WAREHOUSE";
        $judul = "STOK INGOT - 1001";
        $data = DB_Stockmaterial::where('sloc', 1001)->with(['DB_Material'])->get();
        return view('TV-WarehouseIngot',compact('title', 'judul', 'data'));
    }

    public function api_stockingot(Request $request)
    {
        return DB_Stockmaterial::find($request->id);
    }

    public function openModal(Request $request){
        $Route = Route::current()->getName();
        if($Route == 'Warehouse.setupstockingot'){
            $data = DB_Stockmaterial::with(['DB_Material'])->get();
        }else if($Route == 'Warehouse.Addsetupstockingot'){
            $data = "";
        }else if($Route == 'Warehouse.tpingot'){
            $data = "";
        }else if($Route == 'Warehouse.FromTimbangan'){
            $data = "";

        }elseif($Route == 'Warehouse.editstockingot'){
            $data = DB_Material::all();
        }else{
            $data = "";
        }
        return view('partial.warehouse-modal',compact('data'));
    }

    public function DT_FromTimbangan(Request $request){
            if ($request->ajax()) {
                $data = DB_FromTimbanganIngot::orderByDesc('id')->get();
                return DataTables::of($data)->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="lihatDataTimbang(' . $data->id . ')"></a>';
                        return $btn;
                    })
                    ->addColumn('kedatangan', function ($row) {
                        $date = date("Y-m-d", strtotime($row->kedatangan));
                        return $date;
                    })
                    ->addColumn('jam', function ($row) {
                        $jam = date("h:i:s", strtotime($row->kedatangan));
                        return $jam;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            }
    }

    public function update_stockingot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "actual_stock" => 'required',
            "kebutuhan_mrp" => 'required',
            "kebutuhan_daily" => 'required',
            "min_stock" => 'required',
            "max_stock" => 'required',
            "id" => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_Stockmaterial::find($request->id)->update([
            'actual_stock' => $request->actual_stock,
            'kebutuhan_mrp' => $request->kebutuhan_mrp,
            'kebutuhan_daily' => $request->kebutuhan_daily,
            'min_stock' => $request->min_stock,
            'max_stock' => $request->max_stock,
        ]);
        if ($insert) {
            return redirect('/prod/warehouse')->with('berhasil_input', 'berhasil_input');
        }
        return back()->with('gagal_validasi', 'gagal_validasi');
    }
}
