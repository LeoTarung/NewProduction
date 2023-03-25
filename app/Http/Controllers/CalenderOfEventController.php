<?php

namespace App\Http\Controllers;

use App\Models\DB_CalenderOfEvent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class CalenderOfEventController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB_CalenderOfEvent::select('id', 'judul', 'tanggal', 'mulai', 'selesai', 'pic', 'location', 'type')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editEvent(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('prod-CalenderOfEvent');
    }

    public function modal()
    {
        return view('partial.modal');
    }

    public function api(Request $request)
    {
        $data =  DB_CalenderOfEvent::find($request->id);
        return $data;
    }

    public function apiAll()
    {
        $data =  DB_CalenderOfEvent::all();
        return $data;
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'pic' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/calenderEvent')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_CalenderOfEvent::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'pic' => $request->pic,
            'location' => $request->location,
            'type' => $request->type,
        ]);
        if ($insert) {
            return redirect('/calenderEvent')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_coe' => 'required',
            'judul' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'pic' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/calenderEvent')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_CalenderOfEvent::where('id', '=', $request->id_coe)->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'pic' => $request->pic,
            'location' => $request->location,
            'type' => $request->type,
        ]);
        if ($insert) {
            return redirect('/calenderEvent')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function TV_index()
    {
        $data =  DB_CalenderOfEvent::all();
        return view('TV-CalenderOfEvent', compact('data'));
    }
}
