<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsableController extends Controller
{
    // ============================= // MENENTUKAN SHIFT // ================================= //
    function Shift()
    {
        $time = date('H:i:s');
        // $time = '00:00:00';
        if ($time >= '00:00:00' && $time < '07:10:00') {
            $shift = "SHIFT-1";
        } else if ($time >= '07:10:00' && $time < '16:00:00') {
            $shift = "SHIFT-2";
        } else if ($time >= '16:00:00' && $time <= '23:59:59') {
            $shift = "SHIFT-3";
        } else {
            $shift = "SHIFT TIDAK TERDEFINISI";
        }
        return $shift;
    }

    // ============================= // MENENTUKAN JAM KERJA // ================================= //
    function Jam_kerja()
    {
        $shift = $this->Shift();
        if ($shift == "SHIFT-1") {
            $jam_kerja = 7;
        } elseif ($shift == "SHIFT-2") {
            $jam_kerja = 9;
        } elseif ($shift == "SHIFT-3") {
            $jam_kerja = 8;
        } else {
            $jam_kerja = 1;
        }
        return $jam_kerja;
    }

    function Jam_kerja_Efektif()
    {
        $shift = $this->Shift();
        if ($shift == "SHIFT-1") {
            $jam_kerja = '06:20:00';
        } elseif ($shift == "SHIFT-2") {
            $jam_kerja = '07:40:00';
        } elseif ($shift == "SHIFT-3") {
            $jam_kerja = '06:45:00';
        } else {
            $jam_kerja = '00:00:00';
        }
        return $jam_kerja;
    }

    // ============================= // MENENTUKAN TANGGAL // ================================= //
    function date()
    {
        $date = date('Y-m-d');
        return $date;
    }

    // ============================= // MENENTUKAN JAM // ================================= //
    function hour()
    {
        $hour = date('H:i');
        return $hour;
    }

    function ConvertMaterialToID($material)
    {
        if($material == "AC2B"){
            $data = 1;
        }else if($material == "AC2BF"){
            $data = 2;
        }else if($material == "AC4B"){
            $data = 3;
        }else if($material == "AC4CH"){
            $data = 4;
        }else if($material == "ADC 12"){
            $data = 5;
        }else if($material == "ADC 12 NK"){
            $data = 6;
        }else if($material == "HD-2"){
            $data = 7;
        }else if($material == "HD-4"){
            $data = 8;
        }else if($material == "YH3R"){
            $data = 9;
        }else if($material == "BM HD-2"){
            $data = 10;
        }else{
            $data = 0;
        }
        return $data;
    }
}
