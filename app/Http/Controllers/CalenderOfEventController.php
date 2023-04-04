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
            $data = DB_CalenderOfEvent::select('id', 'group', 'judul', 'tanggal', 'mulai', 'selesai', 'pic', 'location', 'type', 'status')->orderBy('id', 'DESC')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editEvent(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $title = "COE";
        return view('prod-CalenderOfEvent', compact('title'));
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

    public function apiAll($group)
    {
        $data =  DB_CalenderOfEvent::where([['status', '=', 'running'], ['group', '=', $group]])->get();
        return $data;
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group' => 'required',
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
            'group' => $request->group,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'pic' => $request->pic,
            'location' => $request->location,
            'type' => $request->type,
            'status' => 'running',
        ]);
        if ($insert) {
            return redirect('/calenderEvent')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_coe' => 'required',
            'group' => 'required',
            'judul' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'pic' => 'required',
            'location' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/calenderEvent')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = DB_CalenderOfEvent::where('id', '=', $request->id_coe)->update([
            'group' => $request->group,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'pic' => $request->pic,
            'location' => $request->location,
            'type' => $request->type,
            'status' => $request->status,
        ]);
        if ($insert) {
            return redirect('/calenderEvent')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function TV_index()
    {
        $judul = "CALENDER OF EVENT";
        $title = "COE";
        return view('TV-CalenderOfEvent', compact('judul', 'title'));
    }
}
