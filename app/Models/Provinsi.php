<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kab_kota()
    {
        return $this->hasMany(Kab_Kota::class, 'id_provinsi');
    }

    public function provinsi_alt()
    {
        return $this->hasMany(Alternatif::class, 'provinsi');
    }
}
