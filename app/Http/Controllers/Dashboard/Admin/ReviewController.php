<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Models\ArtikelTinjau;

class ReviewController
{
    public function index()
    {

        $artikels = Artikel::join('artikel_tinjau', 'artikel.id', '=', 'artikel_tinjau.id_artikel')
            ->select('artikel.*', 'artikel_tinjau.id', 'artikel_tinjau.id_artikel', 'artikel_tinjau.status as status_tinjau', 'artikel_tinjau.reviewer', 'artikel_tinjau.komentar')
            ->where('artikel.status', 'draft')
            ->orWhere('artikel.status', 'review')
            ->get();

        return view('dashboard.admin.review-article', compact('artikels'));
    }

    public function update(Request $request, $id)
    {
        //validaterewuest
        $validatedData = $request->validate([
            'status' => 'required',
            'reviewer' => 'required',
            'komentar' => 'required'
        ]);

        $artikel = ArtikelTinjau::find($id);
        $artikel->update([
            'status' => $validatedData['status'],
            'reviewer' => $validatedData['reviewer'],
            'komentar' => $validatedData['komentar']
        ]);

        $artikel->save();

        Artikel::where('id', $artikel->id_artikel)->update([
            'status' => 'review'
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil di tinjau');
    }
}
