<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Pendaftar extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $fillable = [
        'j_nik', 'nik', 'nama_lengkap', 't_lhr', 'tgl_lhr', 'jk', 'usia', 'pd_terakhir',
        'pekerjaan', 'alamat', 'no_tps', 'email', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    // Definisikan relasi dengan model Penilaian
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}
