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
        $usersroles = User::join('lietotajsloma', 'lietotajsloma.users_id', '=', 'users.id')
                            ->join('loma', 'lietotajsloma.loma_id', '=', 'loma.id')
                            ->select('users.id as userid', 'users.name as username', 'loma.id as lomaid', 'loma.nosaukums as lomanosaukums')
                            ->orderBy('users.name', 'asc')
                            ->get();

        $users = [];
        foreach(User::orderBy('users.name', 'asc')->get() as $user)
        {
            $users[$user->name]['user.id'] = $user->id;
            $users[$user->name]['user.name'] = $user->name;
            $users[$user->name]['roles'] = [];
            foreach($usersroles as $userrole)
            {
                if($userrole->username == $user->name)
                {
                    $role = array('lomaid'=>$userrole['lomaid'],'lomanosaukums'=>$userrole['lomanosaukums']);
                    $users[$user->name]['roles'][$userrole->lomanosaukums] = $role;
                }
            }
        }

        $comments = Komentars::orderBy('updated_at', 'desc')
                            ->orderBy('id', 'desc')
                            ->get()
                            ->toArray();

        $events = Pasakums::orderBy('updated_at', 'desc')
                            ->orderBy('id', 'desc')
                            ->get()
                            ->toArray();

        
        return view('adminpanel', compact('users', 'comments', 'events'));   
    }
}
