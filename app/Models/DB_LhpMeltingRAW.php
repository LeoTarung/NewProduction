<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_LhpMeltingRAW extends Model
{
    use HasFactory;
    protected $table = "db_lhpmeltingraw";
    protected $guarded = [];

    public function LhpMelting()
    {
        return $this->belongsTo(DB_LhpMelting::class, 'id_lhp', 'id'); //One To Many (Inverse) / Belongs To
        // return $this->belongsTo(LHPMelting::class, 'id'); //One To Many (Inverse) / Belongs To
    }
}
