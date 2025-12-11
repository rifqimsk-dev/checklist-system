<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function form_password()
    {
        $title = 'Ubah Password';
        return view('akun.ubahpassword', compact('title'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $request->validate([
            'password_lama'             => 'required|min:6',
            'password_baru'             => 'required|min:6',
            'konfirmasi_password_baru'  => 'required|min:6|same:password_baru'
        ]);

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors([
                'password_lama' => 'Password lama tidak sesuai.'
            ])->withInput();
        }

        $user->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect('/')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Password berhasil diubah.',
            'type' => 'success'    
        ]);
    }
}
