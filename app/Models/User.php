<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function petugas()
    {
        return $this->hasOne(Petugas::class);
    }

    public function getPhotoUrlAttribute()
    {
    return $this->photo
        ? asset('storage/' . $this->photo)
        : 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }
}
