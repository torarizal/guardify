<?php

namespace App\Models;
use App\Models\petugas;
use App\Models\Absensi;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

protected $fillable = ['petugas_id', 'shift', 'tanggal'];

public function petugas()
{
    return $this->belongsTo(\App\Models\Petugas::class);
}

public function shift()
{
    return $this->belongsTo(Shift::class);
}

public function absensi()
{
    return $this->hasOne(\App\Models\Absensi::class, 'jadwal_id');
}
}
