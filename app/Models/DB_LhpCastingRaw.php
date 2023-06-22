<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_LhpCastingRaw extends Model
{
    use HasFactory;

    protected $table = "db_lhpcasting_raw";
    protected $guarded = [];

    public function lhpCasting()
    {
        return $this->belongsTo(DB_LhpCasting::class, 'id_lhp', 'id'); //One to one
    }

    public function reject()
    {
        return $this->belongsTo(DB_Jenis_NG::class, 'id_ng', 'id'); //One to one
    }

    public function downtime()
    {
        return $this->belongsTo(DB_Jenis_Downtime::class, 'id_dt', 'id'); //One to one
    }
}
