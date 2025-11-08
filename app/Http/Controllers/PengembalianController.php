<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalian = Pengembalian::all();
        dd($pengembalian);
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
        // dd($request->all());
        $peminjaman = Peminjaman::find($request->peminjaman_id);
        // dd($peminjaman);
        $tanggal_kembali_peminjaman = Carbon::parse($peminjaman->tanggal_kembali);
        $tanggal_kembali_aktual = Carbon::parse($request->tanggal_kembali);

        $selisih_hari = $tanggal_kembali_aktual->diffInDays($tanggal_kembali_peminjaman);
        $denda = 0;

        if ($tanggal_kembali_aktual > $tanggal_kembali_peminjaman) {
            $denda = $selisih_hari * 10000;
            Peminjaman::where('id', $request->peminjaman_id)->update(['status' => 'terlambat']);
        }
        Peminjaman::where('id', $request->peminjaman_id)->update(['status' => 'dikembalikan']);
        Denda::create([
            'nama_denda' => 'Denda Keterlambatan',
            'nominal_per_hari' => 10000,
            'keterangan' => $selisih_hari,
        ]);

        Pengembalian::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_pengembalian' => $request->tanggal_kembali,
            'kondisi_buku' => $request->kondisi_buku,
            'denda_id' => Denda::latest()->first()->id,
        ]);

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil ditambahkan');
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
        //
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
