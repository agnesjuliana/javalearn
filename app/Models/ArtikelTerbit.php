<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelTerbit extends Model
{
    protected $table = 'artikel_terbit';

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }
}
