<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ArtikelTerbit;

class Artikel extends Model
{
    protected $table = 'artikel';

    public function artikelTerbit()
    {
        return $this->hasOne(ArtikelTerbit::class, 'artikel_id');
    }

    public function artikelTinjau()
    {
        return $this->hasMany(ArtikelTinjau::class, 'artikel_id');
    }
}
