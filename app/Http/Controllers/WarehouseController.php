<?php

namespace App\Http\Controllers;

use App\Models\DB_Stockmaterial;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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

    public function openModal(){
        $Route = Route::current()->getName();
        if($Route == 'Warehouse.setupstockingot'){
            $data = DB_Stockmaterial::with(['DB_Material'])->get();
        }else if($Route == 'Warehouse.Addsetupstockingot'){
            $data = "";
        }else if($Route == 'Warehouse.tpingot'){
            $data = "";
        }else{
            $data = "";
        }
        return view('partial.warehouse-modal',compact('data'));
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
