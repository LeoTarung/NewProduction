<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CastingController extends Controller
{
    public function index()
    {
        $title = "CASTING";
        return view('prod-dashboard-casting', compact('title'));
    }
}
