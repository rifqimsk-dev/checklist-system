<?php

namespace App\Http\Controllers;

use App\Models\FormChecklist;
use App\Models\UserChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Form Checklist';
        if ($request->id) {
            session(['form_checklist_id' => $request->id]);
            return redirect()->route('formchecklist.index');
        }

        $user_checklist = UserChecklist::find(session('form_checklist_id'));
        $form_checklist = FormChecklist::where('user_id', Auth::id())
        ->where('user_checklist_id', session('form_checklist_id'))
        ->get();

        return view('checklist.form', compact('title','form_checklist','user_checklist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|min:6'
        ]);

        FormChecklist::create([
            'pertanyaan' => $request->pertanyaan,
            'user_id' => Auth::id(),
            'user_checklist_id' => session('form_checklist_id')
        ]);

        return redirect()->route('formchecklist.index')->with('alert', [
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $form_checklist = FormChecklist::findOrFail($id);
        $request->validate([
            'pertanyaan' => 'required|min:6'
        ]);

        $form_checklist->update($request->all());

        return redirect()->route('formchecklist.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil disimpan.',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form_checklist = FormChecklist::findOrFail($id);
        $form_checklist->delete();

        return redirect()->route('formchecklist.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil dihapus.',
            'type' => 'success'
        ]);
    }
}
