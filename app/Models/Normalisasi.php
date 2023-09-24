<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normalisasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nrm_alt()
    {
        return $this->hasMany(Alternatif::class, 'id_alternatif');
    }
    public function nrm_krt()
    {
        return $this->hasMany(Kriteria::class, 'id_kriteria');
    }
}
