<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomentarsController extends Controller
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
    public function create($id)
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
        /********
            $table->foreignId('lietotajs_id')->constrained('lietotajs');
            $table->foreignId('pasakums_id')->constrained('pasakums');
            $table->string('teksts',200);
            $table->date('datums')->format('d/m/Y');
        *********/

        //Need auth check
        //Need language

        dd($request); //for testing

        $lietotajs_id = $request->lietotajs_id; //may be done differently - to be seen
        $pasakums_id = $request->pasakums_id;
        $teksts = $request->teksts;
        $datums = $request->datums;
        

        $rules = array(
            'lietotajs_id' => 'required|exists:users|integer',
            'pasakums_id' => 'required|exists:pasakums|integer',
            'teksts' => 'required|string|min:1|max:200',
            'datums' => 'required|date|after:yesterday',
        );
        $this->validate($request, $rules);

        $komentars = new Komentars();
        $komentars->lietotajs_id = $request->lietotajs_id;
        $komentars->pasakums_id = $request->pasakums_id;
        $komentars->teksts = $request->teksts;
        $komentars->datums = $request->datums; //May be an error
        $komentars->save();

        return redirect('pasakums/' . $pasakums_id);
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
        $komentars = Komentars::findOrFail($id);
        return view('update_komentars', compact('komentars'));
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
        $komentars = Komentars::findOrFail($id);

        $lietotajs_id = $request->lietotajs_id; //may be done differently - to be seen, does it need to change in update?
        $pasakums_id = $request->pasakums_id;
        $teksts = $request->teksts;
        $date = $request->date;
        

        $rules = array(
            'lietotajs_id' => 'required|exists:users|numeric',
            'pasakums_id' => 'required|exists:pasakums|numeric',
            'teksts' => 'required|string|min:1|max:200',
            'date' => 'required|date|after:yesterday',
        );
        $this->validate($request, $rules);

        $komentars->lietotajs_id = $request->lietotajs_id;
        $komentars->pasakums_id = $request->pasakums_id;
        $komentars->teksts = $request->teksts;
        $komentars->date = $request->date; //May be an error
        $komentars->save();

        return redirect('pasakums/' . $pasakums_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasakums_id = Komentars::findOrFail($id)->pasakums_id;
        Komentars::findOrFail($id)->delete();
        return redirect('pasakums/' . $pasakums_id);
    }
}
