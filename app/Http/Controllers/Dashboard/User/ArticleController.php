<?php

namespace App\Http\Controllers\Dashboard\User;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\ArtikelTinjau;

class ArticleController
{
    public function index()
    {
        $artikels = Artikel::all();
        return view('dashboard.user.list-article', compact('artikels'));
    }

    public function create()
    {
        return view('dashboard.user.create-article');
    }

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'articleTitle' => 'required|string',
            'articleCategory' => 'required|string',
            'summernote' => 'required',
        ]);

        // Create new artikel
        $artikel = Artikel::create([
            'judul' => $validatedData['articleTitle'],
            'kategori' => $validatedData['articleCategory'],
            'konten' => $validatedData['summernote'],
            'tanggal_pembuatan' => now(),
            'status' => 'Draft',
            'jumlah_like' => 0
        ]);

        ArtikelTinjau::create([
            'id_artikel' => $artikel->id,
            'status' => 'pending',
            'reviewer' => null,
            'komentar' => null
        ]);

        // Redirect to artikel index page with success message
        return redirect()->route('dashboard.user.article.index')->with('success', 'Artikel created successfully!');
    }

    public function edit($id)
    {
        $article = Artikel::findOrFail($id);
        return view('dashboard.user.edit-article', compact('article'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $validatedData = $request->validate([
            'articleTitle' => 'required|string',
            'articleCategory' => 'required|string',
            'summernote' => 'required',
        ]);

        // Find artikel by id and update it
        $artikel = Artikel::findOrFail($id);
        $artikel->update([
            'judul' => $validatedData['articleTitle'],
            'kategori' => $validatedData['articleCategory'],
            'konten' => $validatedData['summernote']
        ]);

        // Redirect to artikel index page with success message
        return redirect()->route('dashboard.user.article.index')->with('success', 'Artikel updated successfully!');
    }

    public function destroy($id)
    {
        // Find artikel by id and delete it
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        // Redirect to artikel index page with success message
        return redirect()->route('dashboard.user.article.index')->with('success', 'Artikel deleted successfully!');
    }
}
