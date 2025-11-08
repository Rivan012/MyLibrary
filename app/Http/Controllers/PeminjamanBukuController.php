<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Peminjaman::create([
            'user_id' => auth()->user()->id,
            'kode_peminjaman' => 'PNJM' . date('YmdHis'),
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'petugas_id' => $request->petugas_id,
        ]);
        DetailPeminjaman::create([
            'peminjaman_id' => $data->id,
            'buku_id' => $request->id_buku,
        ]);
        Buku::where('id', $request->id_buku)->decrement('stok', 1);
        return redirect()->route('pinjam.index')->with('success', 'Berhasil melakukan peminjaman buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = User::whereIn('role', ['petugas', 'admin'])->get();
        // dd($petugas);
        $buku = Buku::where('kode_buku', $id)->first();
        return view('peminjaman.edit', compact('buku','petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
