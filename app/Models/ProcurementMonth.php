<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementMonth extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'quantity',
        'unit_price',
        'supplier_name',
        'delivery_date',
        'total_price',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
