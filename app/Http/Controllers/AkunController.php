<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Manajemen Akun';
        $akun = User::with('departemen')->get();
        return view('akun.index', compact('title','akun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Akun';
        $departemen = Departemen::all();
        return view('akun.create', compact('title','departemen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:dns|unique:users,email',
            'telepon' => 'required|numeric|unique:users,telepon',
            'departemen_id' => 'required|numeric',
            'role' => 'required|in:admin,auditor',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'departemen_id' => $request->departemen_id,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('akun.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil disimpan.',
            'type' => 'success'    
        ]);
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
        $title = 'Data Akun';
        $akun = User::findOrFail($id);
        $departemen = Departemen::all();
        return view('akun.edit', compact('akun','title','departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $akun = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:dns|unique:users,email,'. $akun->id,
            'telepon' => 'required|numeric|unique:users,telepon,'. $akun->id,
            'departemen_id' => 'required|numeric',
            'role' => 'required|in:admin,auditor',
            'password' => 'nullable|min:6',
        ]);

        $akun->update([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'departemen_id' => $request->departemen_id,
            'role' => $request->role,
        ]);

        if ($request->filled('password')) {
            $akun->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('akun.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil diperbarui.',
            'type' => 'success'    
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = User::findOrFail($id);
        $obat->delete();

        return redirect()->route('akun.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil dihapus.',
            'type' => 'success'    
        ]);
    }
}
