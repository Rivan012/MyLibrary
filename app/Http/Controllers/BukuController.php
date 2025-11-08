<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\RakBuku;
use Illuminate\Http\Request;
use Illuminate\Support\ValidatedInput as validate;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::with('rak')->get();
        return view("buku.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = RakBuku::all();
        return view('buku.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|unique:buku,kode_buku',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('picture/book'), $filename);
        }

        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'rak_id' => $request->rak_id,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
        ]);

        return redirect()->route('buku.index')->with('success', 'Berhasil menambahkan data buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::where('id', $id)->first();
        $rak = RakBuku::all();
        return view('buku.edit', compact('buku', 'rak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'kode_buku' => 'required|unique:buku,kode_buku,' . $id,
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric|min:0',
            'rak_id' => 'required|exists:rak_buku,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = $buku->foto; // simpan nama file lama sebagai default

        // jika upload foto baru
        if ($request->hasFile('foto')) {
            // hapus foto lama (jika ada)
            if ($buku->foto && file_exists(public_path('picture/book/' . $buku->foto))) {
                unlink(public_path('picture/book/' . $buku->foto));
            }

            // upload foto baru
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('picture/book'), $filename);
        }

        $buku->update([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'rak_id' => $request->rak_id,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename, // tetap pakai lama jika tidak upload baru
        ]);

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::find($id)->delete();
        return redirect()->route('buku.index')->with("success", "Data Berhasil Dihapus");
    }
}
