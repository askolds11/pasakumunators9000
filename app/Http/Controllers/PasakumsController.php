<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasakums;
use App\Models\Komentars;
use Auth;

class PasakumsController extends Controller
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
        return view('new_pasakums');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**********
            $table->string('nosaukums',50);
            $table->string('apraksts',100);
            $table->date('datums')->format('d/m/Y');
            $table->time('norises_ilgums');
            $table->string('norises_vieta',100);
            $table->decimal('cena',5,2);
            $table->foreignId('veidotajs_id')->constrained('lietotajs');
            $table->foreignId('kategorija_id')->constrained('kategorija');
        **********/

        //Need auth check
        //Need language

        //dd($request); //for testing

        $nosaukums = $request->nosaukums;
        $apraksts = $request->apraksts;
        $datums = $request->datums;
        $norises_ilgums = $request->norises_ilgums;
        $norises_vieta = $request->norises_vieta;
        $cena = $request->cena;
        $veidotajs_id = $request->veidotajs_id; //may be different - checking which user
        $kategorija = $request->kategorija;

        $rules = array(
            'nosaukums' => 'required|string|min:1|max:50',
            'apraksts' => 'required|string|min:1|max:100',
            'datums' => 'required|date|after:yesterday',
            'norises_ilgums' => 'required|date_format:H:i',
            'norises_vieta' => 'required|string|min:1|max:100',
            'cena' => 'required|min:0|max:999.99',
            'veidotajs_id' => 'required|exists:users,id|integer',
            'kategorija.*' => 'required|exists:kategorija|integer',
        );
        $this->validate($request, $rules);

        $pasakums = new Pasakums();
        $pasakums->nosaukums = $request->nosaukums;
        $pasakums->apraksts = $request->apraksts;
        $pasakums->datums = $request->datums;
        $pasakums->norises_ilgums = $request->norises_ilgums;
        $pasakums->norises_vieta = $request->norises_vieta;
        $pasakums->cena = $request->cena;
        $pasakums->veidotajs_id = $request->veidotajs_id; //may be different - checking which user
        $pasakums->save();

        return redirect('pasakums/' . $pasakums->id); //not sure if id exists
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasakums = Pasakums::findOrFail($id);
        $komentari = Komentars::where('pasakums_id', '=', $id)->get();

        return view('show_pasakums', compact('pasakums', 'komentari'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasakums = Pasakums::findOrFail($id);
        return view('update_pasakums', compact('pasakums'));
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
        $pasakums = Pasakums::findOrFail($id);

        $nosaukums = $request->nosaukums;
        $apraksts = $request->apraksts;
        $datums = $request->datums;
        $norises_ilgums = $request->norises_ilgums;
        $norises_vieta = $request->norises_vieta;
        $cena = $request->cena;
        $veidotajs_id = $request->veidotajs_id; //may be different - checking which user, does it need to change in update?
        $kategorijas = $request->kategorijas;
        

        $rules = array(
            'nosaukums' => 'required|string|min:1|max:50',
            'apraksts' => 'required|string|min:1|max:100',
            'datums' => 'required|date|after:yesterday',
            'norises_ilgums' => 'required|date_format:H:i',
            'norises_vieta' => 'required|string|min:1|max:100',
            'cena' => 'required|min:0|max:999.99',
            'veidotajs_id' => 'required|exists:users|integer',
            'kategorijas.*' => 'required|exists:kategorija|integer',
        );
        $this->validate($request, $rules);

        $pasakums->nosaukums = $request->nosaukums;
        $pasakums->apraksts = $request->apraksts;
        $pasakums->datums = $request->datums;
        $pasakums->norises_ilgums = $request->norises_ilgums;
        $pasakums->norises_vieta = $request->norises_vieta;
        $pasakums->cena = $request->cena;
        $pasakums->veidotajs_id = $request->veidotajs_id; //may be different - checking which user
        $pasakums->kategorijas = $request->kategorijas;
        $pasakums->save();

        return redirect('pasakums/' . $pasakums->id); //not sure if id exists
    }

    public function showFilter() 
    {
        $pasakumi = Pasakums::all()->map(function ($pasakums) {
            return $pasakums;
	    });
        return view('filter', compact('pasakumi'));        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Will need to delete registration entries
        Komentars::where('pasakums_id',$id)->delete();
        Pasakums::findOrFail($id)->delete();
        return redirect('mainpage');
    }
}
