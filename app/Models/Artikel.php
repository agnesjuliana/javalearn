<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ArtikelTerbit;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'kategori',
        'konten',
        'tanggal_pembuatan',
        'status',
        'jumlah_like'
    ];

    public $timestamps = false;

    public function artikelTerbit()
    {
        return $this->hasOne(ArtikelTerbit::class, 'artikel_id');
    }

    public function artikelTinjau()
    {
        return $this->hasMany(ArtikelTinjau::class, 'artikel_id');
    }
}
