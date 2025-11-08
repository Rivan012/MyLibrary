<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.profile', compact('user'));
    }
    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update($request->all());
        // dd($request->all());
        return redirect()->route('profile.index')->with('success', 'Berhasil Update');
    }
    public function ubahpw(Request $request, $id)
    {
        if (!Hash::check($request->pw_lama, Auth::user()->password)) {
            return back()->with(['error' => 'Password lama tidak sesuai']);
        } elseif ($request->pw_baru != $request->pw_baru_komfirm) {
            return back()->with(['error' => 'Konfirmasi password tidak sesuai']);
        } elseif ($request->pw_baru_komfirm && $request->pw_baru == $request->pw_lama) {
            return back()->with(['error' => 'Password baru tidak boleh sama dengan password lama']);
        }

        User::findOrFail($id)->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('profile.index')->with('success', 'Password berhasil diubah');
    }
    public function updateFoto(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto/profile'), $filename);

            if ($user->foto) {
                $oldFoto = public_path('foto/profile/' . $user->foto);
                if (file_exists($oldFoto)) {
                    unlink($oldFoto);
                }
            }

            $user->foto = $filename;
            $user->save();
        }

        return redirect()->route('profile.index')->with('success', 'Foto profil berhasil diperbarui!');
    }


}
