<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaptopProcurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'model',
        'date',
        'shift',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
