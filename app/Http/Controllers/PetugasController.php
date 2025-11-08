<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::where('role', 'petugas')->get();
        return view("petugas.petugas", compact("petugas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("petugas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $petugas = new User();
        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->password = bcrypt('12345678');
        $petugas->role = 'petugas';
        // Handle foto upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto/profile'), $filename);
            $petugas->foto = 'foto/profile/' . $filename;
            $petugas->save();
        } else {
            $petugas->foto = null;
            $petugas->save();
        }
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan');

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
        $petugas = User::findOrFail($id);
        return view("petugas.edit", compact("petugas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::findOrFail($id);
        $petugas->name = $request->name;
        $petugas->email = $request->email;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            if ($petugas->foto && file_exists(public_path($petugas->foto))) {
                unlink(public_path($petugas->foto));
            }
            $folderPath = public_path('foto/profile');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }
            $filename = uniqid() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move($folderPath, $filename);
            $petugas->foto = $filename;
        }

        $petugas->save();

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
