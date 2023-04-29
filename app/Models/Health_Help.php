<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health_Help extends Model
{
    use HasFactory;

    public $table = "health_helps";

    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'foreign_key', 'orphan_id');
    }
}
