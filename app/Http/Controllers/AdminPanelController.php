<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Komentars;
use App\Models\Pasakums;
use App\Http\Controllers\KomentarsController;
use App\Http\Controllers\PasakumsController;

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
                            ->where('approved_status', '=', '0')
                            ->get()
                            ->toArray();

        $events = Pasakums::orderBy('updated_at', 'desc')
                            ->orderBy('id', 'desc')
                            ->where('approved_status', '=', '0')
                            ->get()
                            ->toArray();

        
        return view('adminpanel', compact('users', 'comments', 'events'));   
    }

    public function approveKomentars($id, $status)
    {
        //validation rules
        $rules = array(
            'id' => 'required|exists:komentars',
            'status' => 'required|boolean'
        );

        //validator instance
        $validator = Validator::make(
            array('id' => $id, 'status' => $status),
            $rules
        );

        //if validator fails, it means that another admin has already taken action, refresh page
        if($validator->fails())
        {
            return redirect('adminpanel');
        }

        if($status == true)
        {
            $komentars = Komentars::findOrFail($id);
            $komentars->approved_status = true;
        }
        else
        {
            $komentarsController = new KomentarsController();
            $komentarsController->destroy($id);
        }
    }

    public function approvePasakums($id, $status)
    {
        //validation rules
        $rules = array(
            'id' => 'required|exists:pasakums',
            'status' => 'required|boolean'
        );

        //validator instance
        $validator = Validator::make(
            array('id' => $id, 'status' => $status),
            $rules
        );

        //if validator fails, it means that another admin has already taken action, refresh page
        if($validator->fails())
        {
            return redirect('adminpanel');
        }

        if($status == true)
        {
            $pasakums = Pasakums::findOrFail($id);
            $pasakums->approved_status = true;
        }
        else
        {
            $pasakumsController = new PasakumsController();
            $pasakumsController->destroy($id);
        }
    }

    public function updateRole($userid, $roleid, $action) //action: true - add, false - delete
    {

    }
}
