<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_Material extends Model
{
    use HasFactory;
    protected $table = "db_material";
    protected $guarded = [];
}
