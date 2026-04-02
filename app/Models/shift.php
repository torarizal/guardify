<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shift extends Model
{
    protected $fillable = ['petugas_id', 'tanggal', 'shift'];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
