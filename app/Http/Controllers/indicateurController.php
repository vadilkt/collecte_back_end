<?php

namespace App\Http\Controllers;

use App\Models\Objectif;
use App\Models\indicateurU;
use Illuminate\Http\Request;

class indicateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = indicateurU::All();
        return response()->json($item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indic = indicateurU::create([
            'intitule_score' => $request->intitule_score,
            'valeur_score' => $request->valeur_score,
            'user_id' => auth()->id(),
            'objectif_id' => $request->objectif_id
        ]); 
        return response()->json($indic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $objectif=Objectif::where('intitule_obj',$request->keywords)->get();
      return response()->json($objectif);
    }

    public function show($id){
        $indicateur=indicateurU::find($id);
        return response()->json($indicateur);
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
        $amodifier = indicateurU::find($id);
        $amodifier->update([
            'intitule_score' => $request->intitule_score,
            'valeur_score' => $request->valeur_score
        ]);

        return response()->json($amodifier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = indicateurU::find($id);
        $item->delete();
    }
}
