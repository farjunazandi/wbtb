<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rnk_alt()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }
}
