<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasakums;
use App\Models\Komentars;

class MainPageController extends Controller
{
    public function index()
    {
        $pasakumi = Pasakums::all()->toArray(); //change to last month after datetime database change
        $komentari = Komentars::join('users', 'users.id', '=','users_id')
                                ->join('pasakums', 'pasakums.id', '=', 'pasakums_id')
                                ->orderBy('komentars.created_at', 'desc')
                                ->take(3)
                                ->select('users.id as userid', 'users.name as username',
                                        'komentars.id as komentarsid', 'komentars.teksts as komentars',
                                        'pasakums.id as pasakumsid', 'pasakums.nosaukums as pasakumsnosaukums')
                                ->get()->toArray();
        return view('mainpage', compact('pasakumi','komentari'));   
    }
}
