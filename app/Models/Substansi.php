<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Substansi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function subs_alt()
    {
        return $this->hasMany(SubstansiAlternatif::class, 'id_substansi');
    }
}
