<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtikelTinjau extends Model
{
    protected $table = 'artikel_tinjau';

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }
}
