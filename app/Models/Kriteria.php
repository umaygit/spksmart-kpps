<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_kriteria',
        'nama_kriteria',
        'bobot',
        'j_kriteria'
    ];

    public function subKriterias()
    {
        return $this->hasMany(SubKriteria::class);
    }

}
