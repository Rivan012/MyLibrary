<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Denda;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('pinjam.index');
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

        $name = $request->user_id;
        $petugas = User::where('name', $name)->first();

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);

        $tanggal_kembali_peminjaman = Carbon::parse($peminjaman->tanggal_kembali);
        $tanggal_kembali_aktual = Carbon::parse($request->tanggal_kembali);

        $selisih_hari = 0;
        $denda = 0;
        $status = 'dikembalikan';

        if ($tanggal_kembali_aktual->gt($tanggal_kembali_peminjaman)) {
            $selisih_hari = $tanggal_kembali_aktual->diffInDays($tanggal_kembali_peminjaman);
            $denda = $selisih_hari * 10000;
            $status = 'terlambat';
        }

        // Buat data denda (jika ada keterlambatan)
        $dendaRecord = null;
        if ($selisih_hari > 0) {
            $dendaRecord = Denda::create([
                'nama_denda' => 'Denda Keterlambatan',
                'nominal_per_hari' => 10000,
                'keterangan' => $selisih_hari,
            ]);
        }

        // Update user_id peminjaman jadi petugas_id
        Peminjaman::where('id', $request->peminjaman_id)->update([
            'petugas_id' => $petugas->id,
            'status' => $status,
        ]);

        // Simpan data pengembalian
        Pengembalian::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tanggal_pengembalian' => $request->tanggal_kembali,
            'kondisi_buku' => $request->kondisi_buku,
            'denda_id' => $dendaRecord?->id,
            'petugas_id' => $petugas->id,
        ]);

        Buku::where('id', $request->id_buku)->increment('stok', 1);

        return redirect()->route('pinjam.index')->with('success', 'Pengembalian berhasil ditambahkan');
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
