<?php

namespace App\Http\Controllers;

use App\Models\IsiChecklist;
use Illuminate\Http\Request;

class HasilChecklist extends Controller
{
    public function index()
    {
        $title = 'Hasil Checklist';
        return view('checklist.formview', compact('title'));
    }

    public function view(Request $request) 
    {
        $title = 'Hasil Checklist';

        $bulan = $request->query('bulan');
        $tahun = date('Y');
        $dealer = $request->query('dealer');

        $hasil = IsiChecklist::where('user_id', auth()->id())
            ->when($bulan, fn($q) => $q->where('bulan', $bulan))
            ->when($tahun, fn($q) => $q->whereYear('created_at', $tahun))
            ->when($dealer, fn($q) => $q->where('dealer', $dealer))
            ->get();

        return view('checklist.hasil', compact('title','hasil'));
    }

}
