<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    public $table = "payments";
    protected $fillable = [
        'id_orphan',
        'id_donor',
        'date_payment',
        'statue',
        'amount'
        ];
        public function orphan()
        {
            return $this->belongsTo('App\Models\Orphan','id_orphan');
        }
        public function donor()
        {
            return $this->belongsTo('App\Models\donor','id_donor');
        }
}
