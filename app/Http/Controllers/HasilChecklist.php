<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\IsiChecklist;
use App\Models\UserChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilChecklist extends Controller
{
    public function index()
    {
        $title = 'Hasil Checklist';
        if (Auth::user()->role == "admin") {
            $user_checklist = UserChecklist::all();
        } else {
            $user_checklist = UserChecklist::where('user_id', auth()->id())->get();
        }
        $dealer = Dealer::all();
        return view('checklist.formview', compact('title','user_checklist','dealer'));
    }

    public function view(Request $request) 
    {
        $title = 'Hasil Checklist';
        
        $bulan = $request->query('bulan');
        $tahun = date('Y');
        $dealer_id = $request->query('dealer_id');
        $user_checklist_id = $request->query('user_checklist_id');

        $hasil = IsiChecklist::with('dealer')
        ->when(Auth::user()->role === 'admin', function ($q) {
            $q->whereNotNull('user_id');
        }, function ($q) {
            $q->where('user_id', auth()->id());
        })
        ->when($bulan, fn ($q) => $q->where('bulan', $bulan))
        ->when($tahun, fn ($q) => $q->whereYear('created_at', $tahun))
        ->when($dealer_id, fn ($q) => $q->where('dealer_id', $dealer_id))
        ->when($user_checklist_id, fn ($q) => $q->where('user_checklist_id', $user_checklist_id))
        ->get();


        if (Auth::user()->role == "admin") {
            $user_checklist = UserChecklist::all();
        } else {
            $user_checklist = UserChecklist::where('user_id', auth()->id())->get();
        }
        $user_checklist_one = UserChecklist::find($user_checklist_id);
        $dealer = Dealer::all();
        return view('checklist.hasil', compact('title','hasil','user_checklist','user_checklist_one','dealer'));
    }

}
