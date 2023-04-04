<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_BadNewsFirst extends Model
{
    use HasFactory;
    protected $table = "db_badnewsfirst";
    protected $guarded = [];
}
