<?php

namespace App\Http\Controllers;

use App\Models\UserChecklist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $user_checklist = UserChecklist::where('user_id', auth()->id())->get();
        return view('dashboard', compact('title', 'user_checklist'));
    }
}
