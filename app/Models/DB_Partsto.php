<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB_Partsto extends Model
{
    use HasFactory;
    protected $table = "db_partsto";
    protected $guarded = [];

    public function CounterToMpsto()
    {
        return $this->belongsTo(DB_Mpsto::class, 'counter_id', 'id'); //One to one
    }

    public function VerificatorToMpsto()
    {
        return $this->belongsTo(DB_Mpsto::class, 'verificator_id', 'id'); //One to one
    }
}
