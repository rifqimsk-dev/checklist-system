<?php

namespace App\Http\Controllers;

use App\Models\FormChecklist;
use App\Models\IsiChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsiChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Isi Checklist';
        $form_checklist = FormChecklist::where('user_id', Auth::id())->get();
        return view('checklist.isi', compact('title','form_checklist'));
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
        $pertanyaan = $request->pertanyaan;
        $indikator = $request->indikator;
        $keterangan = $request->keterangan;

        foreach ($pertanyaan as $index => $p) {
            IsiChecklist::create([
                'user_id'       => auth()->id(),
                'pertanyaan' => $p,
                'indikator'       => $indikator[$index],
                'keterangan'    => $keterangan[$index],
            ]);
        }

        return redirect()->route('isichecklist.index')
            ->with('success', 'Checklist berhasil disimpan!');
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
