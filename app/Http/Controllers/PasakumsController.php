<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasakums;
use App\Models\Komentars;
use App\Models\Kategorija;
use App\Models\PasakumsKategorija;
use Carbon\Carbon;
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
        $kategorijas = Kategorija::select('id', 'nosaukums')->get()->toArray();
        return view('new_pasakums', compact('kategorijas'));
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
            $table->id();//->primary(); --not in form
            $table->timestamps(); --not in form
            $table->string('nosaukums',50);
            $table->string('apraksts',500);
            $table->dateTime('datums', $precision = 0);
            $table->integer('norises_ilgums');
            $table->string('norises_vieta',100);
            $table->decimal('cena',5,2);
            $table->foreignId('veidotajs_id')->constrained('users'); --not in form
            $table->foreignId('attels_id')->constrained('attels');
            $table->boolean('approved_status')->default(0); --not in form
            +kategorijas
        **********/

        $nosaukums = $request->nosaukums;
        $apraksts = $request->apraksts;
        $datums = $request->datums;
        $norises_ilgums = $request->norises_ilgums;
        $norises_vieta = $request->norises_vieta;
        $cena = $request->cena;
        $kategorija = $request->kategorija;
        $attels = $request->attels;

        $rules = array(
            'nosaukums' => 'required|string|min:1|max:50',
            'apraksts' => 'required|string|min:1|max:500',
            'datums' => 'required|date_format:Y-m-d H:i|after:1 hour',
            'norises_ilgums' => 'required|integer|min:0',
            'norises_vieta' => 'required|string|min:1|max:100',
            'cena' => 'required|min:0|max:999.99',
            'kategorija' => 'required|min:1',
            'kategorija.*' => 'required|exists:kategorija,id|integer',
            'attels' => 'required|mimes:jpeg,jpg,png,gif,svg|max:10000'
        );
        $this->validate($request, $rules);

        $request->attels->store('images', 'public');
        $attels = new Attels();
        $attels->apraksts = '';
        $attels->datums = now()->format('d-m-Y')->toDateTimeString();
        $attels->picture = 'public/images/' .$request->file('attels')->getClientOriginalname();
        $attels->save();

        $pasakums = new Pasakums();
        $pasakums->nosaukums = $request->nosaukums;
        $pasakums->apraksts = $request->apraksts;
        $pasakums->datums = $request->datums;
        $pasakums->norises_ilgums = $request->norises_ilgums;
        $pasakums->norises_vieta = $request->norises_vieta;
        $pasakums->cena = $request->cena;
        $pasakums->veidotajs_id = Auth::user()->id; //may be different - checking which user
        $pasakums->attels_id = $attels->id;
        $pasakums->save();

        foreach($kategorija as $kat)
        {
            $kateg = new Kategorija();
            $kateg->pasakums_id = $pasakums_id;
            $kateg->kategorija_id = $kat->id;
            $kateg->save;
        }
        
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
        $kategorija = $request->kategorija;
        $attels = $request->attels;

        $rules = array(
            'nosaukums' => 'required|string|min:1|max:50',
            'apraksts' => 'required|string|min:1|max:500',
            'datums' => 'required|date_format:Y-m-d H:i|after:1 hour',
            'norises_ilgums' => 'required|integer|min:0',
            'norises_vieta' => 'required|string|min:1|max:100',
            'cena' => 'required|min:0|max:999.99',
            'kategorija.*' => 'required|exists:kategorija,id|integer',
            'attels' => 'required|mimes:jpeg,jpg,png,gif,svg|max:10000'
        );
        $this->validate($request, $rules);

        $pasakums->nosaukums = $request->nosaukums;
        $pasakums->apraksts = $request->apraksts;
        $pasakums->datums = $request->datums;
        $pasakums->norises_ilgums = $request->norises_ilgums;
        $pasakums->norises_vieta = $request->norises_vieta;
        $pasakums->cena = $request->cena;
        $pasakums->veidotajs_id = Auth::user()->id; //may be different - checking which user
        $pasakums->attels_id = $attels->id;
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
