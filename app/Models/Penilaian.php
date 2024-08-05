<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaftar_id',
        'kriteria_id',
        'sub_kriteria_id',
        'n_k1',
        'n_k2',
        'n_k3',
        'n_k4'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }

    public function alternatif()
    {
        return $this->hasOne(Alternatif::class, 'pendaftar_id', 'pendaftar_id');
    }

}
