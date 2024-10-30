<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'real_name',
        'user_email',
        'password',
        'email',
        'phone',
        'cnic',
        'dob',
        'bank_no',
        'jd',
        'picture',
        'about_me',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function leads() {
        return $this->hasMany(Lead::class);
    }

    public function todos() {
        return $this->hasMany(Todo::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
    public function reminders() {
        return $this->hasMany(Reminder::class);
    }

}
