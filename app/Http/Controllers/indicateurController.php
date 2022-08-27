<?php

namespace App\Http\Controllers;

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
        $item=indicateurU::All();
        return response()->json($item);
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
        $indicateur=indicateurU::create([
            'intitule_score'=>$request->intitule_score,
            'valeur_score'=>$request->valeur_score
        ]);
        return response()->json($indicateur);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indicateur=indicateurU::findorFail($id);
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
        $amodifier=indicateurU::find($id);
        $amodifier->update([
            'intitule_score'=>$request->intitule_score,
            'valeur_score'=>$request->valeur_score,
            'objectif_id'=> $request->objectif_id,
            'user_id'=>$request->user_id
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
        $item=indicateurU::find($id);
        $item->delet();
    }
}
