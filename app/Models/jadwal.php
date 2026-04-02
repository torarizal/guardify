<?php

namespace App\Models;
use App\Models\petugas;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{

protected $fillable = ['petugas_id', 'shift', 'tanggal'];

public function petugas()
{
    return $this->belongsTo(Petugas::class);
}

public function shift()
{
    return $this->belongsTo(Shift::class);
}
}
