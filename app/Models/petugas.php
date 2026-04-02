<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Availability;

class Petugas extends Model
{
    protected $fillable = [
        'user_id',
        'no_hp'
    ];

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi ke jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    // relasi ke availability
    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }
}
