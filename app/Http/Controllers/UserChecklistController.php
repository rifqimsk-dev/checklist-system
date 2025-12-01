<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserChecklist;
use Illuminate\Http\Request;

class UserChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'User Checklist';
        $user_checklist = UserChecklist::with('user')->get();
        return view('user_checklist.index', compact('title','user_checklist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah User Checklist';
        $user = User::where('role', 'auditor')->get();
        return view('user_checklist.create', compact('title','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'auditor' => 'required',
            'user_id' => 'required',
        ]);

        UserChecklist::create($request->all());

        return redirect()->route('userchecklist.index')->with('alert', [
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
        $title = 'Detail dan Update User Checklist';
        $user = User::where('role', 'auditor')->get();
        $checklist = UserChecklist::findOrFail($id);
        return view('user_checklist.edit', compact('title','user','checklist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $checklist = UserChecklist::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'auditor' => 'required',
            'user_id' => 'required',
        ]);

        $checklist->update($request->all());

        return redirect()->route('userchecklist.index')->with('alert', [
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
        $checklist = UserChecklist::findOrFail($id);
        $checklist->delete();

        return redirect()->route('userchecklist.index')->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil dihapus.',
            'type' => 'success'
        ]);
    }
}
