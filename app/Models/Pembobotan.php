<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembobotan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bbt_alt()
    {
        return $this->hasMany(Alternatif::class, 'id_alternatif');
    }
    public function bbt_krt()
    {
        return $this->hasMany(Kriteria::class, 'id_kriteria');
    }
}
