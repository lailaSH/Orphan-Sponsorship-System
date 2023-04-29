<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basic_Info extends Model
{
    use HasFactory;
    public $table = "basic_infos";
    protected $primary_key = 'id';
    public function warrentyrequest()
    {
        return $this->belongsTo(WarrantyRequest::class, 'foreign_key', 'warrentyrequest_id');
    }
}
