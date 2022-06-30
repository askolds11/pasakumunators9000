<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Komentars;
use App\Models\Pasakums;
use App\Models\LietotajsLoma;
use App\Models\Loma;
use App\Http\Controllers\KomentarsController;
use App\Http\Controllers\PasakumsController;
use Illuminate\Support\Facades\Validator;

class AdminPanelController extends Controller
{
    public function index()
    {
        $usersroles = User::join('lietotajsloma', 'lietotajsloma.users_id', '=', 'users.id')
                            ->join('loma', 'lietotajsloma.loma_id', '=', 'loma.id')
                            ->select('users.id as userid', 'users.name as username', 'loma.id as lomaid', 'loma.nosaukums as lomanosaukums', 'users.banned_status as banned_status')
                            ->orderBy('users.name', 'asc')
                            ->get();

        $lietotaji = [];
        foreach(User::orderBy('users.name', 'asc')->get() as $user)
        {
            $roles = array();
            foreach($usersroles as $userrole)
            {
                if($userrole->username == $user->name)
                {
                    array_push($roles, array('lomaid' => $userrole->lomaid, 'lomanosaukums' => $userrole->lomanosaukums));
                }
            }
            array_push($lietotaji, array(
                'user.id' => $user->id,
                'user.name' => $user->name,
                'banned_status' => $user->banned_status,
                'roles' => $roles
            ));
        }

        $komentari = Komentars::orderBy('updated_at', 'desc')
                            ->orderBy('id', 'desc')
                            ->where('approved_status', '=', '0')
                            ->join('users', 'users_id', '=', 'users.id')
                            ->select('komentars.*', 'users.name as username')
                            ->get()
                            ->toArray();

        $pasakumi = Pasakums::orderBy('updated_at', 'desc')
                            ->orderBy('id', 'desc')
                            ->where('approved_status', '=', '0')
                            ->join('attels', 'pasakums.attels_id', '=', 'attels.id')
                            ->join('users', 'veidotajs_id', '=', 'users.id')
                            ->select('pasakums.*', 'attels.picture', 'users.name as username')
                            ->get()
                            ->toArray();

        $lomas = Loma::select('id','nosaukums')->get()->toArray();

        return view('adminpanel', compact('lietotaji', 'komentari', 'pasakumi', 'lomas'));   
    }

    public function approveKomentars(Request $request)
    {
        //validation rules
        $id = $request->id;
        $status = $request->status;

        if($status == 'false') {$status = false; }
        else if($status == 'true') $status = true;

        $rules = array(
            'id' => 'required|exists:komentars,id',
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

        //data seems fine, continue
        if($status == true)
        {//approve
            $komentars = Komentars::findOrFail($id);
            $komentars->approved_status = true;
            $komentars->save();
        }
        else
        {//remove
            $komentarsController = new KomentarsController();
            $komentarsController->destroy($id);
        }

        return redirect('adminpanel');
    }

    public function approvePasakums(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        if($status == 'false') {$status = false; }
        else if($status == 'true') $status = true;

        //validation rules
        $rules = array(
            'id' => 'required|exists:pasakums,id',
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

        //validated, continue
        if($status == true)
        {//approve
            $pasakums = Pasakums::findOrFail($id);
            $pasakums->approved_status = true;
            $pasakums->save();
        }
        else
        {//remove
            $pasakumsController = new PasakumsController();
            $pasakumsController->destroy($id);
        }

        return redirect('adminpanel');
    }

    public function updateRole(Request $request) //action: true - add, false - delete
    {
        $userid = $request->userid;
        $lomaid = $request->lomaid;
        $action = $request->action;
        if($action == 'false') {$action = false; }
        else if($action == 'true') $action = true;


        //validation rules
        $rules = array(
            'userid' => 'required|exists:users,id',
            'lomaid' => 'required|exists:loma,id|not_in:1', //can't add or remove invidivuals role
            'action' => 'required|boolean'
        );

        //validator instance
        $validator = Validator::make(
            array('userid' => $userid, 'lomaid' => $lomaid, 'action' => $action),
            $rules
        );

        //refresh page, something went wrong
        if($validator->fails())
        {
            return redirect('adminpanel');
        }

        //everything works out so far
        //query should return empty if role needs to be added, with something if needs to be removed
        $userrole = LietotajsLoma::where('users_id', '=', $userid)
                        ->where('loma_id', '=', $lomaid)
                        ->get();
        
        //if role needs to be added, but already exists, refresh
        if($action == true && !$userrole->isEmpty())
        {
            return redirect('adminpanel');
        }
        //if role needs to be removed, but it doesn't exist, refresh
        elseif($action == false && $userrole->isEmpty())
        {
            return redirect('adminpanel');
        }

        //can remove or add safely here
        if($action == true)
        { //add role
            $lietotajsloma = new LietotajsLoma;
            $lietotajsloma->users_id = $userid;
            $lietotajsloma->loma_id = $lomaid;
            $lietotajsloma->save();
        }
        else
        { //remove role
            $userrole->first()->delete();
        }
        return redirect('adminpanel');
    }

    public function banUser(Request $request)
    {
        $id = $request->id;

        $rules = array(
            'id' => 'required|exists:users,id',
        );

        $validator = Validator::make(
            array('id' => $id),
            $rules
        );

        //refresh page, something went wrong
        if($validator->fails())
        {
            return redirect('adminpanel');
        }

        $user = User::findOrFail($id);
        $user->banned_status = !$user->banned_status;
        $user->save();

        return redirect('adminpanel');
    }
}
