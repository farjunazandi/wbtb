<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function alt_provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi');
    }
    public function alt_kab_kota()
    {
        return $this->belongsTo(Kab_Kota::class, 'kab_kota');
    }
    public function subs_alt()
    {
        return $this->hasMany(SubstansiAlternatif::class, 'id_alternatif');
    }
}
