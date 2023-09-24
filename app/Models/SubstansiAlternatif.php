<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubstansiAlternatif extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function alt_substansi()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }
    public function subs_substansi()
    {
        return $this->belongsTo(Substansi::class, 'id_substansi');
    }
}
