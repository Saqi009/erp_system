<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'lead_id',
        'reminder_time',
        'user_id'
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
