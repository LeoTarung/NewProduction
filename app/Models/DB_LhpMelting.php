<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_LhpMelting extends Model
{
    use HasFactory;
    protected $table = "db_lhpmelting";
    protected $guarded = [];

    public function LhpMeltingRAW()
    {
        return $this->hasMany(DB_LhpMeltingRAW::class, 'id_lhp', 'id'); //Has to many
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'id_nrp'); //One to one
    }
}
