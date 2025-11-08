<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // kalau user anggota → filter by user_id
        if (auth()->user()->role === 'anggota') {
            $pinjam = Peminjaman::where('user_id', auth()->id())
                ->with(['user', 'petugas', 'detail.buku'])
                ->latest()
                ->get();
        } else {
            $pinjam = Peminjaman::with(['user', 'petugas', 'detail.buku'])
                ->latest()
                ->get();
        }

        return view('peminjaman.anggota-minjam', compact('pinjam'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $denda = Pengembalian::with('denda')->where('peminjaman_id', $id)->first();

        $total = optional($denda->denda)->nominal_per_hari * optional($denda->denda)->keterangan ?? 0;

        // dd($total);


        $detail = Peminjaman::with(['detail.buku', 'user', 'petugas'])->findOrFail($id);
        return view('peminjaman.detail-peminjaman', compact('detail','total'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kembalikan = Peminjaman::with(['detail.buku', 'user', 'petugas'])->findOrFail($id);
        return view('peminjaman.kembalikan-buku', compact('kembalikan'));
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
        Peminjaman::find($id)->delete();
        return redirect()->route('pinjam.index')->with("success", "Data Berhasil Dihapus");
    }
}
