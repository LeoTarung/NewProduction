<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BadNewsFirstController extends Controller
{
    public function index(Request $request)
    {
        return view('prod-BadNewsFirst');
    }

    public function TV_index()
    {
        return view('TV-BadNewsFirst');
    }
}
