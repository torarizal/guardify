<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;

class Absensi extends Model
{
    protected $fillable = [
        'petugas_id',
        'jadwal_id',
        'tanggal',
        'foto'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
