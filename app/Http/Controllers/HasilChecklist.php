<?php

namespace App\Http\Controllers;

use App\Models\IsiChecklist;
use Illuminate\Http\Request;

class HasilChecklist extends Controller
{
    public function index()
    {
        $title = 'Hasil Checklist';
        $hasil = IsiChecklist::where('user_id', auth()->id())->get();
        return view('checklist.hasil', compact('title','hasil'));
    }
}
