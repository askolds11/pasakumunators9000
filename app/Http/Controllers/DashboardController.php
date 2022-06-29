<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasakums;
use App\Models\Komentars;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pasakumi = Pasakums::where('veidotajs_id', '=', Auth::user()->id)->get()->toArray();
        $komentari = Komentars::where('users_id', '=', Auth::user()->id)->get()->toArray();

        return view('dashboard', compact('pasakumi', 'komentari'));
    }
}
