<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'work_shift',
        'floor_manager',
        'date',
        'status',
        'leave_reason',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
