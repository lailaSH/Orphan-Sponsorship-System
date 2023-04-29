<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialDepart extends Model
{
    use HasFactory;
    public $table = "financial_departs";
    protected $primary_key = 'id';
    public function warrentyrequest()
    {
        return $this->belongsTo(WarrantyRequest::class, 'foreign_key', 'warrentyrequest_id');
    }
}
