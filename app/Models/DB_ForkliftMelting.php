<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_ForkliftMelting extends Model
{
    use HasFactory;
    protected $table = "db_forkliftmelting";
    protected $guarded = [];

    public function DB_Material()
    {
        return $this->belongsTo(DB_Material::class, 'material_id', 'id');
    }
}
