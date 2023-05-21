<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_LhpMeltingSupply extends Model
{
    use HasFactory;
    protected $table = "db_lhpmeltingsupply";
    protected $guarded = [];

    public function LhpMeltingSupplyRAW()
    {
        return $this->hasMany(DB_LhpMeltingSupplyRAW::class, 'id_lhp', 'id'); //Has to many
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_nrp'); //One to one
    }
}
