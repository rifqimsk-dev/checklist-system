<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Summary;
use App\Models\IsiChecklist;
use Illuminate\Http\Request;
use App\Models\UserChecklist;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Illuminate\Contracts\Encryption\DecryptException;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Summary';
        if ($request->id == null) {
            return redirect('/');
        }

        $id = $request->id;
        $dealer = Dealer::all();
        $user_checklist = UserChecklist::where('user_id', auth()->id())->find($id);
        return view('summary.index', compact('title','dealer','user_checklist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view(Request $request)
    {
        $title = 'Summary';
        $id = $request->id;
        $bulan = $request->bulan;
        $dealer_id = $request->dealer_id;

        $isi_checklist = IsiChecklist::where('user_id', auth()->id())
        ->where('user_checklist_id', $id)
        ->whereIn('indikator', [2,3])
        ->where('dealer_id', $dealer_id)
        ->where('bulan', $bulan)
        ->get();

        $data_user_checklist = UserChecklist::where('user_id', auth()->id())->get();
        $user_checklist = UserChecklist::where('user_id', auth()->id())->find($id);
        $dealer = Dealer::all();

        $summary = Summary::where('user_id', auth()->id())
        ->where('user_checklist_id', $id)
        ->where('dealer_id', $dealer_id)
        ->where('bulan', $bulan)
        ->get();

        return view('summary.form', compact('title', 'isi_checklist','data_user_checklist','user_checklist','dealer', 'summary'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cek_data = Summary::where('user_id', auth()->id())
        ->where('user_checklist_id', $request->user_checklist_id)
        ->where('dealer_id', $request->dealer_id)
        ->where('bulan', $request->bulan)
        ->get();

        if ($cek_data->isNotEmpty()) {
            return redirect('/');
        } else {
            try {
                DB::transaction(function () use ($request) {
                    foreach ($request->proses as $i => $proses) {
                        Summary::create([
                            'user_id'           => auth()->id(),
                            'user_checklist_id' => $request->user_checklist_id,
                            'proses'            => $proses,
                            'pi'                => $request->pi[$i],
                            'ca'                => $request->ca[$i],
                            'dealer_id'         => $request->dealer_id,
                            'bulan'             => $request->bulan,
                        ]);
                    }
                });

                return redirect()->back()->with('alert', [
                    'title' => 'Berhasil!',
                    'message' => 'Data berhasil disimpan.',
                    'type' => 'success'    
                ]);
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Summary $summary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_checklist_id, $dealer_id, $bulan)
    {
        try {
            $user_checklist_id = decrypt($user_checklist_id);
            $dealer_id         = decrypt($dealer_id);
            $bulan             = decrypt($bulan);
        } catch (DecryptException $e) {
            abort(404);
        }
        
        $summary = Summary::with(['userchecklist','dealer'])
        ->where('user_id', auth()->id())
        ->where('user_checklist_id', $user_checklist_id)
        ->where('dealer_id', $dealer_id)
        ->where('bulan', $bulan)
        ->get();

        return view('summary.edit', [
            'title' => 'Ubah Summary', 
            'summary' => $summary, 
            'user_checklist_id' => $user_checklist_id, 
            'dealer_id' => $dealer_id, 
            'bulan' => $bulan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_checklist_id, $dealer_id, $bulan)
    {
        // 1. Validasi
        $request->validate([
            'id'     => 'required|array',
            'proses' => 'required|array',
            'pi'     => 'required|array',
            'ca'     => 'required|array',
        ]);

        // 2. Update berdasarkan ID (BUKAN index)
        foreach ($request->id as $i => $id) {
            Summary::where('id', $id)
                ->where('user_id', auth()->id())
                ->where('user_checklist_id', $user_checklist_id)
                ->where('bulan', $bulan)
                ->update([
                    'proses' => $request->proses[$i],
                    'pi'     => $request->pi[$i],
                    'ca'     => $request->ca[$i],
                ]);
        }

        return redirect()->back()->with('alert', [
            'title' => 'Berhasil!',
            'message' => 'Data berhasil diperbarui.',
            'type' => 'success'    
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Summary $summary)
    {
        //
    }
}
