<?php

namespace App\Models;

use App\Models\Petugas; // P kapital
use App\Models\Absensi;
use App\Models\Shift; // Tambahkan ini jika ada model Shift
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    // Pastikan nama tabelnya benar jika bukan 'jadwals'
    // protected $table = 'jadwal';

    protected $fillable = ['petugas_id', 'shift', 'tanggal'];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id'); // Tambahkan foreign key 'petugas_id'
    }

    // Ubah nama relasi shift agar tidak bentrok dengan nama kolom 'shift'
    public function dataShift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function absensi()
    {
        return $this->hasOne(Absensi::class, 'jadwal_id');
    }
}
