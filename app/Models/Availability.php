<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = ['petugas_id', 'tanggal', 'status'];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
