<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_MesinCasting extends Model
{
    use HasFactory;
    protected $table = "db_mesincasting";
    protected $guarded = [];

    public function DB_Namapart()
    {
        return $this->belongsTo(DB_Namapart::class, 'db_namapart_id', 'id');
    }
}
