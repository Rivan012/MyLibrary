<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(){
        $user = User::where('role', 'anggota')->get();
        return view("dashboard.kelola-anggota", compact('user'));
    }
    public function create(){
        return view("dashboard.tambah-anggota");
    }
    public function store(Request $request){
        $user = User::create($request->all());
        return redirect()->route('anggota.index')->with("success","Data Berhasil Ditambahkan");
    }
    public function edit($id){
        $user = User::find($id);
        return view("dashboard.edit-anggota", compact('user'));
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('anggota.index')->with("success","");
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('anggota.index')->with("success","");
    }
}
