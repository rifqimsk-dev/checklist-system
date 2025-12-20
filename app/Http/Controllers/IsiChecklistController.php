<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\IsiChecklist;
use Illuminate\Http\Request;
use App\Models\FormChecklist;
use App\Models\UserChecklist;
use Mews\Purifier\Facades\Purifier;
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
        $dealer_id = $request->query('dealer_id');
        $user_checklist_id = $request->query('user_checklist_id');

        if (!$bulan || !$dealer_id || !$user_checklist_id) {
            return redirect()->route('isichecklist.create');
        }

        $query = IsiChecklist::where('user_id', auth()->id())
        ->where('bulan', $bulan)
        ->where('dealer_id', $dealer_id)
        ->where('user_checklist_id', $user_checklist_id);

        $dealer_name = Dealer::select('nama')->find($dealer_id);

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
                'dealer_id' => $dealer_id,
                'user_checklist_id' => $user_checklist_id,
            ]);
            $form_checklist = FormChecklist::where('user_checklist_id', $user_checklist_id)->get();
            return view('checklist.isi', compact('title','form_checklist','dealer_name'));
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
        $dealer_id              = session('dealer_id');
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
                'pertanyaan'            => Purifier::clean($p),
                'indikator'             => $indikator[$index],
                'keterangan'            => $keterangan[$index],
                'dealer_id'                => $dealer_id,
                'bulan'                 => $bulan,
                'user_checklist_id'     => $user_checklist_id,
            ]);
        }

        return redirect()->route('hasilchecklist.view', [
            'bulan' => $bulan,
            'dealer_id' => $dealer_id,
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
