<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'nrp', 'name', 'role', 'seksi', 'departemen', 'divisi', 'email', 'status')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a class="btn fa-solid fa-pen-to-square fa-lg text-warning" onclick="editEmployee(' . $data->id . ')"></a> | <a class="btn fa-solid fa-key fa-lg text-primary" onclick="editPassword(' . $data->id . ')"></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('prod-Dashboard-admMP');
    }

    public function modaladd()
    {
        return view('partial.modal');
    }

    public function modalChangePassword()
    {
        return view('partial.modal');
    }

    public function mpApi(Request $request)
    {
        $data = User::find($request->id);
        return $data;
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nrp' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/adm/mp')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = User::create([
            'name' => $request->name,
            'nrp' => $request->nrp,
            'role' => $request->role,
            'seksi' => $request->seksi,
            'departemen' => $request->departemen,
            'divisi' => $request->divisi,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);
        if ($insert) {
            return redirect('/adm/mp')->with('berhasil_input', 'berhasil_input');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'id' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/adm/mp')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = User::where('id', '=', $request->id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'seksi' => $request->seksi,
            'departemen' => $request->departemen,
            'divisi' => $request->divisi,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        if ($insert) {
            return redirect('/adm/mp')->with('Berhasil_edit', 'Berhasil_edit');
        }
        return redirect('/adm/mp')->with('gagal_validasi', 'gagal_validasi');
    }



    public function modalChangePassword_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'password1' => 'required',
            'id' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('/adm/mp')->with('gagal_validasi', 'gagal_validasi');
        }

        if ($request->password != $request->password1) {
            return redirect('/adm/mp')->with('gagal_validasi', 'gagal_validasi');
        }

        $insert = User::where('id', '=', $request->id)->update([
            'password' => Hash::make($request->password),
        ]);

        if ($insert) {
            return redirect('/adm/mp')->with('Berhasil_edit', 'Berhasil_edit');
        }
        return redirect('/adm/mp')->with('gagal_validasi', 'gagal_validasi');
    }
}
