<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donor extends Model
{
    use HasFactory;
    public $table = "donors";
    protected $fillable = [
        'name',
        'work',
        'period',
        'number_orphans',
        'start_date',
        'Residence_place',
        'number_phone',
        'password'
    ];
}
