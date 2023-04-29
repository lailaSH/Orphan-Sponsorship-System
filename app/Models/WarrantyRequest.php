<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyRequest extends Model
{
    use HasFactory;

    public $table = "warrantyrequests";
    protected $fillable = [
        'orphan_guardian'
    ];
    protected $primary_key = 'id';



    public function orphans()
    {
        return $this->hasMany(Orphan::class);
    }
    public function homeassets()
    {
        return $this->hasMany(HomeAsset::class);
    }
    public function orphanmore18s()
    {
        return $this->hasMany(OrphanMore18::class);
    }
    public function HomeOwnership()
    {
        return $this->hasOne(HomeOwnership::class);
    }

    public function financial_departs()
    {
        return $this->hasOne(FinancialDepart::class);
    }
    public function basic_info()
    {
        return $this->hasOne(Basic_Info::class);
    }
    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }

    public function health_status()
    {
        return $this->belongsToMany(HealthtStatus::class, 'warranty_health_status');
    }
}
