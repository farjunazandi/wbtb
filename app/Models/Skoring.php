<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skoring extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function skr_alt()
    {
        return $this->hasMany(Alternatif::class, 'id_alternatif');
    }
    public function skr_krt()
    {
        return $this->hasMany(Kriteria::class, 'id_kriteria');
    }
}
