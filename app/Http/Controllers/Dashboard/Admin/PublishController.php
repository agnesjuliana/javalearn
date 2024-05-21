<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Artikel;
use App\Models\ArtikelTerbit;
use Illuminate\Http\Request;
use App\Models\ArtikelTinjau;

class PublishController
{
    public function index()
    {
        $artikels = Artikel::join('artikel_terbit', 'artikel.id', '=', 'artikel_terbit.id_artikel')
            ->select('artikel.*', 'artikel_terbit.id', 'artikel_terbit.id_artikel', 'artikel_terbit.penerbit', 'artikel_terbit.tanggal_terbit')
            ->where('artikel.status', 'published')
            ->get();

        return view('dashboard.admin.published-article', compact('artikels'));
    }

    // post published artikel
    public function store (Request $request)
    {
        //validate request
        $validatedData = $request->validate([
            'id_artikel' => 'required',
            'penerbit' => 'required'
        ]);

        $artikel = ArtikelTerbit::create([
            'id_artikel' => $validatedData['id_artikel'],
            'penerbit' => $validatedData['penerbit']
        ]);

        Artikel::where('id', $artikel->id_artikel)->update([
            'status' => 'published'
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil di publish');
    }

    // delete published artikel
    public function destroy($id)
    {
        $artikel = ArtikelTerbit::find($id);
        $artikel->delete();

        Artikel::where('id', $artikel->id_artikel)->update([
            'status' => 'draft'
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil di unpublish');
    }
}
