<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BadNewsFirstController extends Controller
{
    public function index(Request $request)
    {
        $title = "BNF";
        return view('prod-BadNewsFirst', compact('title'));
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
