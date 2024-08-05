<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['pendaftar_id', 'sudah_dinilai'];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'pendaftar_id', 'pendaftar_id');
    }
}
