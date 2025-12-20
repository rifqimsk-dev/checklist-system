<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Departemen';
        $departemen = Departemen::all();
        return view('departemen.index', compact('title','departemen'));
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
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        Departemen::create($request->all());

        return redirect()->route('departemen.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil disimpan.',
            'type' => 'success'    
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departemen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $departemen = Departemen::findOrFail($id);
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $departemen->update($request->all());

        return redirect()->route('departemen.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil diperbarui.',
            'type' => 'success'    
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->delete();

        return redirect()->route('departemen.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil dihapus.',
            'type' => 'success'
        ]);
    }
}
