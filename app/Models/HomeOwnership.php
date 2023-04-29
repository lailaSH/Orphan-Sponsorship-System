<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeOwnership extends Model
{
    use HasFactory;

    public $table = "home_ownerships";
    protected $fillable = [
        'type_ownerships',
        'number_room',
        'number_people_in_home',
        'health_status'
    ];
    protected $primary_key = 'id';
    public function warrentyrequest()
    {
        return $this->belongsTo(WarrantyRequest::class, 'foreign_key', 'warrentyrequest_id');
    }
}
