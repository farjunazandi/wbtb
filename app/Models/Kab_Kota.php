<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kab_Kota extends Model
{
    use HasFactory;

    protected $table = 'kab_kotas';
    protected $guarded = ['id'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
    }

    public function kab_kota_alt()
    {
        return $this->hasMany(Alternatif::class, 'kab_kota');
    }
}
