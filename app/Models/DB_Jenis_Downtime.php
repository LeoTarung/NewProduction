<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_Jenis_Downtime extends Model
{
    use HasFactory;
    protected $table = "db_jenis_downtime";
    protected $guarded = [];
}
