<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donor_orphan extends Model
{
    use HasFactory;
    public $table = "donor_orphans";
    public function orphan()
    {
        return $this->belongsTo('App\Models\Orphan','id_orphan');
    }
    public function donor()
        {
            return $this->belongsTo('App\Models\donor','id_donor');
        }
}
