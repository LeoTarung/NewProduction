<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_LhpMeltingSupplyRAW extends Model
{
    use HasFactory;
    protected $table = "db_lhpmeltingsupplyraw";
    protected $guarded = [];

    public function LhpMeltingSupply()
    {
        return $this->belongsTo(DB_LhpMeltingSupply::class, 'id_lhp', 'id'); //One To Many (Inverse) / Belongs To
    }
}
