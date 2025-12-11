<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\IsiChecklist;
use App\Models\UserChecklist;
use Illuminate\Http\Request;

class HasilChecklist extends Controller
{
    public function index()
    {
        $title = 'Hasil Checklist';
        $user_checklist = UserChecklist::where('user_id', auth()->id())->get();
        $dealer = Dealer::all();
        return view('checklist.formview', compact('title','user_checklist','dealer'));
    }

    public function view(Request $request) 
    {
        $title = 'Hasil Checklist';

        $bulan = $request->query('bulan');
        $tahun = date('Y');
        $dealer = $request->query('dealer');
        $user_checklist_id = $request->query('user_checklist_id');

        $hasil = IsiChecklist::where('user_id', auth()->id())
            ->when($bulan, fn($q) => $q->where('bulan', $bulan))
            ->when($tahun, fn($q) => $q->whereYear('created_at', $tahun))
            ->when($dealer, fn($q) => $q->where('dealer', $dealer))
            ->when($user_checklist_id, fn($q) => $q->where('user_checklist_id', $user_checklist_id))
            ->get();

        $user_checklist = UserChecklist::where('user_id', auth()->id())->get();
        $user_checklist_one = UserChecklist::find($user_checklist_id);
        $dealer = Dealer::all();
        return view('checklist.hasil', compact('title','hasil','user_checklist','user_checklist_one','dealer'));
    }

}
