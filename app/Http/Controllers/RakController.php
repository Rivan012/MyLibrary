<?php

namespace App\Http\Controllers;

use App\Models\RakBuku;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rakbuku = RakBuku::orderBy("created_at","desc")->get();
        return view("rak.index",compact('rakbuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rak.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        RakBuku::create($request->all());
        return redirect()->route('rak.index')->with('success', 'Berhasil Menambahkan Rak Buku');
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
        $rak = RakBuku::findOrFail($id);
        return view('rak.edit', compact('rak'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        RakBuku::findOrFail($id)->update($request->all());
        return redirect()->route('rak.index')->with('success', 'Berhasil Mengubah Rak Buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RakBuku::where('id',$id)->delete();
        return redirect()->route('rak.index')->with('success','Berhasil Menghapus Rak Buku');
    }
}
