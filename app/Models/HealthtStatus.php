<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthtStatus extends Model
{
    use HasFactory;
    public $table = "healtht_statuses";
    protected $fillable = [
        'statue'
    ];

    public function orphan ()
    {
        return $this->belongsToMany(Orphan::class,'orphan_health_status');
    }
    public function Warranty_request ()
    {
        return $this->belongsToMany(WarrantyRequest::class,'warranty_health_status');
    }
}
