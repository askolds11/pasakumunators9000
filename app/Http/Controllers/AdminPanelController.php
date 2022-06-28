<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Komentars;
use App\Models\Pasakums;

class AdminPanelController extends Controller
{
    public function index()
    {
        $users = User::join('lietotajsloma', 'lietotajsloma.users_id', '=', 'users.id')
                            ->join('loma', 'lietotajsloma.loma_id', '=', 'loma.id')
                            ->select('users.id as user.id', 'users.name as user.name', 'loma.id as loma.id', 'loma.nosaukums as loma.nosaukums')
                            ->orderBy('users.name', 'asc')
                            ->get();

        $comments = Komentars::orderBy('updated_at', 'desc')
                            ->orderBy('id', 'desc')
                            ->get();

        $events = Pasakums::orderBy('updated_at', 'desc')
                            ->orderBy('id', 'desc')
                            ->get();

        return view('adminpanel', compact('users', 'comments', 'events'));   
    }
}
