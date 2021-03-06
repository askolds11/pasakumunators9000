<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasakums;
use App\Models\Komentars;
use App\Models\LietotajsPasakums;
use App\Models\Novertejums;
use Carbon\Carbon;

class MainPageController extends Controller
{
    public function index()
    {
        $pasakumi = Pasakums::where('pasakums.datums', '>=', Carbon::now()->subDays(30)->toDateTimeString()) //last 30 days and newer
                            ->join('attels', 'pasakums.attels_id', '=', 'attels.id')
                            ->select('pasakums.*', 'attels.picture')
                            ->get()->toArray();
        foreach($pasakumi as &$pasakums) {
            $pasakums['pieteikusies'] = count(LietotajsPasakums::where('pasakums_id', '=', $pasakums['id'])->get());
            $pasakums['novertejums'] = Novertejums::where('pasakums_id', '=', $pasakums['id'])->groupBy('novertejums')->avg('novertejums');
        }

        $komentari = Komentars::join('users', 'users.id', '=','users_id')
                                ->join('pasakums', 'pasakums.id', '=', 'pasakums_id')
                                ->orderBy('komentars.created_at', 'desc')
                                ->orderBy('komentars.id', 'desc')
                                ->take(3) //3 newest comments
                                ->select('users.id as userid', 'users.name as username',
                                        'komentars.id as komentarsid', 'komentars.teksts as komentars',
                                        'komentars.created_at as komentarstime',
                                        'pasakums.id as pasakumsid', 'pasakums.nosaukums as pasakumsnosaukums')
                                ->get()->toArray();

        return view('mainpage', compact('pasakumi','komentari'));   
    }
}
