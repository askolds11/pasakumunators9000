<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Attels;

class AttelsController extends Controller
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
    public function store(Request $request)
    {
        $rules = array(
            'apraksts' => 'required|string|min:1|max:300',
            'datums' => 'required|date|before:tomorrow',
            'pasakums_id' => 'required|exists:pasakums,id|integer',
            'attels' => 'required|mimes:jpeg,jpg,png,gif,svg|max:10000'
        );
        $this->validate($request, $rules);

        $file = $request->file('attels');
        $filename = $file->hashName();
        $file->move(public_path('images'), $filename);

        $attels = new Attels();
        $attels->apraksts = $request->apraksts;
        $attels->pasakums_id = $request->pasakums_id;
        $attels->datums = Carbon::parse($request->datums)->format('Y-m-d');
        $attels->picture = 'images/' .$filename;
        $attels->save();


        return redirect('pasakums/' . $request->pasakums_id);
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
        //
    }
}
