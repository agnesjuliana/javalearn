<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class LandingWelcomeController
{
    public function index()
    {
        $articles = Artikel::where('status', 'published')->limit(6)->get();
        return view('landing.welcome', ['articles' => $articles]);
    }
}
