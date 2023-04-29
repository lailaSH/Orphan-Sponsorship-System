<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Orphan extends Model
{
    use HasFactory;

    public $table = "orphans";
    protected $fillable = [
        'name',
        'class',
        'birth_date',
        'gender'
    ];
    protected $primary_key = 'id';

    public function warrentyrequest()
    {
        return $this->belongsTo(WarrantyRequest::class, 'foreign_key', 'warrentyrequest_id');
    }
    public function health_status()
    {
        return $this->belongsToMany(HealthtStatus::class, 'orphan_health_status');
    }
    public function Health_Help()
    {
        return $this->hasMany(Health_Help::class);
    }
}
