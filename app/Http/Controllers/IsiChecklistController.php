<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\FormChecklist;
use App\Models\IsiChecklist;
use App\Models\UserChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsiChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Isi Checklist';

        $bulan = $request->query('bulan');
        $dealer = $request->query('dealer');
        $user_checklist_id = $request->query('user_checklist_id');

        if (!$bulan || !$dealer || !$user_checklist_id) {
            return redirect()->route('isichecklist.create');
        }

        $query = IsiChecklist::where('user_id', auth()->id())
        ->where('bulan', $bulan)
        ->where('dealer', $dealer)
        ->where('user_checklist_id', $user_checklist_id);

        $exists = $query->exists();

        if ($exists) {
            return redirect()->back()->with('alert', [
            'title' => 'Data sudah ada!',
            'message' => 'Data checklist pada bulan dan dealer yang Anda pilih sudah ada',
            'type' => 'warning'
        ]);
        } else {
            session([
                'bulan' => $bulan,
                'dealer' => $dealer,
                'user_checklist_id' => $user_checklist_id,
            ]);
            $form_checklist = FormChecklist::where('user_checklist_id', $user_checklist_id)->get();
            return view('checklist.isi', compact('title','form_checklist'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Isi Checklist';
        $user_checklist = UserChecklist::where('user_id', auth()->id())->get();
        $dealer = Dealer::all();
        return view('checklist.formisi', compact('title', 'user_checklist','dealer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama                   = $request->nama;
        $hondaID                = $request->hondaID;
        $dealer                 = session('dealer');
        $bulan                  = session('bulan');
        $user_checklist_id      = session('user_checklist_id');

        $pertanyaan = $request->pertanyaan;
        $indikator  = $request->indikator;
        $keterangan = $request->keterangan;

        foreach ($pertanyaan as $index => $p) {
            IsiChecklist::create([
                'user_id'               => auth()->id(),
                'nama'                  => $nama,
                'hondaID'               => $hondaID,
                'pertanyaan'            => $p,
                'indikator'             => $indikator[$index],
                'keterangan'            => $keterangan[$index],
                'dealer'                => $dealer,
                'bulan'                 => $bulan,
                'user_checklist_id'     => $user_checklist_id,
            ]);
        }

        return redirect()->route('hasilchecklist.view', [
            'bulan' => $bulan,
            'dealer' => $dealer,
            'user_checklist_id' => $user_checklist_id
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
