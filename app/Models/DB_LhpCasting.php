<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_LhpCasting extends Model
{
    use HasFactory;
    protected $table = "db_lhpcasting";
    protected $guarded = [];

    public function DB_MesinCasting()
    {
        return $this->belongsTo(DB_MesinCasting::class, 'id_mesincasting', 'mc'); //One to one
    }

    public function DB_Jenis_Downtime()
    {
        return $this->belongsTo(DB_Jenis_Downtime::class, 'status_dt', 'id'); //One to one
    }
}
