<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelTinjau extends Model
{
    protected $table = 'artikel_tinjau';

    protected $fillable = [
        'id_artikel',
        'status',
        'reviewer',
        'komentar'
    ];

    public $timestamps = false;

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }
}
