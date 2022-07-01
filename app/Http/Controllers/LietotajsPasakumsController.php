<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LietotajsPasakums;
use Illuminate\Support\Facades\Validator;
use Auth;

class LietotajsPasakumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $user_id = Auth::user()->id;
        $rules = array(
            'user_id' => 'required|exists:users,id|integer',
            'id' => 'required|exists:pasakums,id|integer'
        );

        $validator = Validator::make(
            array('user_id' => $user_id, 'id' => $id),
            $rules
        );

        if($validator->fails())
        {
            return redirect('pasakums/'.$id);
        }

        $query = LietotajsPasakums::where('pasakums_id', '=', $id)->where('users_id', '=', $user_id)->get()->first();
        if($query == null)
        {
            $lietotajspasakums = new LietotajsPasakums();
            $lietotajspasakums->users_id = $user_id;
            $lietotajspasakums->pasakums_id = $id;
            $lietotajspasakums->save();
        }
        else
        {
            $query->delete();
        }

        

        return redirect('pasakums/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LietotajsPasakums::findOrFail($id)->delete();
    }
}
