<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attels;
use App\Models\Pasakums;
use App\Models\Komentars;
use App\Models\Kategorija;
use App\Models\PasakumsKategorija;
use App\Models\LietotajsPasakums;
use App\Models\Novertejums;
use Carbon\Carbon;
use Auth;
use Storage;

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
            'datums' => 'required|date_format:"Y-m-d\TH:i"|after:1 hour',
            'norises_ilgums' => 'required|integer|min:0',
            'norises_vieta' => 'required|string|min:1|max:100',
            'cena' => 'required|numeric|min:0|max:999.99',
            'kategorija' => 'required|min:1',
            'kategorija.*' => 'required|exists:kategorija,id|integer',
            'attels' => 'required|mimes:jpeg,jpg,png,gif,svg|max:10000'
        );
        $this->validate($request, $rules);

        $file = $request->file('attels');
        $filename = $file->hashName();
        $file->move(public_path('images'), $filename);

        $attels = new Attels();
        $attels->apraksts = '';
        $attels->datums = now()->format('Y-m-d');
        $attels->picture = 'images/' .$filename;
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
            $kateg = new PasakumsKategorija();
            $kateg->pasakums_id = $pasakums->id;
            $kateg->kategorija_id = $kat;
            $kateg->save();
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
        $pasakums = Pasakums::where('pasakums.id', '=', $id)
                            ->join('users', 'veidotajs_id', '=', 'users.id')
                            ->join('attels', 'attels_id', '=', 'attels.id')
                            ->select('pasakums.*', 'users.name as username', 'attels.picture')
                            ->get()->toArray();

        $pasakumskategorijas = [];
        $kategorijas = PasakumsKategorija::where('pasakums_id', '=', $id)
                            ->join('kategorija', 'kategorija_id', '=', 'kategorija.id')
                            ->pluck('kategorija.nosaukums')->toArray();

        $pasakums[0]['kategorijas'] = $kategorijas;
        $pasakums = $pasakums[0];

        if(!Auth::check())
        {
            $pasakums['pieteicies'] = false;
        }
        else if(LietotajsPasakums::where('pasakums_id', '=', $id)->where('users_id', '=', Auth::user()->id)->get()->first() == null)
        {
            $pasakums['pieteicies'] = false;
        }
        else
        {
            $pasakums['pieteicies'] = true;
        }

        $pasakums['pieteikusies'] = count(LietotajsPasakums::where('pasakums_id', '=', $id)->get());
        $pasakums['novertejums'] = Novertejums::where('pasakums_id', '=', $pasakums['id'])->groupBy('novertejums')->avg('novertejums');

        $galerija = Attels::where('pasakums_id', '=', $id)->orderBy('datums', 'desc')->orderBy('id', 'desc')->get()->toArray();
        $pasakums['atteli'] = $galerija;

        $komentari = Komentars::where('pasakums_id', '=', $id)
                            ->join('users', 'users_id', '=', 'users.id')
                            ->orderBy('komentars.created_at', 'desc')
                            ->orderBy('komentars.id', 'desc')
                            ->select('komentars.created_at', 'users.name as username', 'teksts')
                            ->get()->toArray();

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
        $pasakums = Pasakums::where('pasakums.id', '=', $id)
                            ->join('attels', 'attels_id', '=', 'attels.id')
                            ->select('pasakums.*', 'attels.picture')
                            ->get()->toArray();

        $pasakumskategorijas = [];
        $kategorijas = PasakumsKategorija::where('pasakums_id', '=', $id)
                            ->join('kategorija', 'kategorija_id', '=', 'kategorija.id')
                            ->pluck('kategorija.nosaukums')->toArray();

        $pasakums[0]['kategorijas'] = $kategorijas;

        $pasakums = $pasakums[0];

        $kategorijas = Kategorija::select('id', 'nosaukums')->get()->toArray();
        dd(compact('pasakums', 'kategorijas'));
        return view('edit_pasakums', compact('pasakums', 'kategorijas'));
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
        $pasakumi = Pasakums::join('users', 'veidotajs_id', '=', 'users.id')
                            ->join('attels', 'attels_id', '=', 'attels.id')
                            ->select('pasakums.*', 'users.name as username', 'attels.picture as attels')
                            ->get()->toArray();
        
        $pasakumskategorijas = [];
        foreach($pasakumi as &$pasakums)
        {   
            $kategorijas = PasakumsKategorija::where('pasakums_id', '=', $pasakums['id'])
                                ->join('kategorija', 'kategorija_id', '=', 'kategorija.id')
                                ->pluck('kategorija.nosaukums')->toArray();

            $pasakums['kategorijas'] = $kategorijas;
        }
        $kategorijas = Kategorija::select('id','nosaukums')->get()->toArray();
        return view('filter', compact('pasakumi', 'kategorijas'));        
    }

    public function filter(Request $request)
    {
        $nosaukums = $request->nosaukums;
        $vieta = $request->vieta;
        $veidotajs = $request->veidotajs;
        $datumsno = $request->datumsno;
        $datumslidz = $request->datumslidz;
        $ilgumsno = $request->ilgumsno;
        $ilgumslidz = $request->ilgumslidz;
        $cenano = $request->cenano;
        $cenalidz = $request->cenalidz;
        $kategorija = $request->kategorija;

        $rules = array(
            'nosaukums' => 'nullable|string|max:50',
            'vieta' => 'nullable|string|max:100',
            'veidotajs' => 'nullable|string',
            'datumsno' => 'nullable|date_format:"Y-m-d\TH:i"',
            'datumslidz' => 'nullable|date_format:"Y-m-d\TH:i"',
            'ilgumsno' => 'nullable|integer|min:0',
            'ilgumslidz' => 'nullable|integer|min:0',
            'cenano' => 'nullable|numeric|min:0|max:999.99',
            'cenalidz' => 'nullable|numeric|min:0|max:999.99',
            'kategorija.*' => 'nullable|required|exists:kategorija,id|integer',
        );
        
        if($request->datumsno != null && $request->datumslidz != null)
        {
            $rules['datumslidz'] = $rules['datumslidz'].'|after_or_equal:'.$datumsno;
        }

        if($request->ilgumsno != null && $request->ilgumslidz != null)
        {
            $rules['ilgumslidz'] = $rules['ilgumslidz'].'|gte:'.$ilgumsno;
        }

        if($request->cenano != null && $request->cenalidz != null)
        {
            $rules['cenalidz'] = $rules['cenalidz'].'|gte:'.$cenano;
        }
        $this->validate($request, $rules);
        
        $pasakumi = Pasakums::join('users', 'veidotajs_id', '=', 'users.id')
                        ->join('attels', 'attels_id', '=', 'attels.id')
                        ->select('pasakums.*', 'users.name as username', 'attels.picture as attels');
                        
        if($request->nosaukums) {
            $pasakumi = $pasakumi->where('nosaukums', 'like', '%'.$nosaukums.'%');
        }
        if($request->vieta) {
            $pasakumi = $pasakumi->where('norises_vieta', 'like', '%'.$vieta.'%');
        }
        if($request->veidotajs) {
            $pasakumi = $pasakumi->where('users.name', 'like', '%'.$veidotajs.'%');
        }
        if($request->datumsno) {
            $pasakumi = $pasakumi->where('pasakums.datums', '>=', $datumsno);
        }
        if($request->datumslidz) {
            $pasakumi = $pasakumi->where('pasakums.datums', '<=', $datumslidz);
        }
        if($request->ilgumsno) {
            $pasakumi = $pasakumi->where('norises_ilgums', '>=', $ilgumsno);
        }
        if($request->ilgumslidz) {
            $pasakumi = $pasakumi->where('norises_ilgums', '<=', $ilgumslidz);
        }
        if($request->cenano) {
            $pasakumi = $pasakumi->where('cena', '>=', $cenano);
        }
        if($request->cenalidz) {
            $pasakumi = $pasakumi->where('cena', '<=', $cenalidz);
        }
        if($request->kategorija) {
            $pasakkat = [];
            foreach($kategorija as $kat) {
                array_push($pasakkat, PasakumsKategorija::where('kategorija_id', '=', $kat)->pluck('pasakums_id')->toArray());
            }
            $pasakkat = call_user_func_array('array_intersect', $pasakkat);
            $pasakumi = $pasakumi->whereIn('pasakums.id', $pasakkat);
        }

        $pasakumi=$pasakumi->get()->toArray();
        
        $pasakumskategorijas = [];
        foreach($pasakumi as &$pasakums)
        {   
            $kategorijas = PasakumsKategorija::where('pasakums_id', '=', $pasakums['id'])
                                    ->join('kategorija', 'kategorija_id', '=', 'kategorija.id')
                                    ->pluck('kategorija.nosaukums')->toArray();
        
            $pasakums['kategorijas'] = $kategorijas;
        }

        $kategorijas = Kategorija::select('id','nosaukums')->get()->toArray();
        session()->flashInput($request->input());
        return view('filter', compact('pasakumi', 'kategorijas'));
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
        $path = Pasakums::join('attels', 'attels_id', '=', 'attels.id')
                        ->pluck('attels.picture')
                        ->first();
        Storage::disk('public')->delete($path);
        LietotajsPasakums::where('pasakums_id', $id)->delete();
        PasakumsKategorija::where('pasakums_id', $id)->delete();
        Novertejums::where('pasakums_id', $id)->delete();
        Pasakums::findOrFail($id)->delete();
        Attels::where('pasakums_id', $id)->delete();
        return redirect('mainpage');
    }
}
