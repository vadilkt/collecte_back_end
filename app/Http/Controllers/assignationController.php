<?php

namespace App\Http\Controllers;

use App\Models\assignation_objectif;
use Illuminate\Http\Request;

class assignationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(assignation_objectif::All());
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
        $assignation=assignation_objectif::create([
            'date_deb'=>$request->date_deb,
            'date_fin'=>$request->date_fin,
            'valeur_eval'=>$request->valeur_eval,
            'objectif_id'=> $request->objectif_id,
        ]);

        return response()->json($assignation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignation=assignation_objectif::findorFail($id);
        return response()->json($assignation);
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
        $amodifier=assignation_objectif::find($id);
        $amodifier->update([
            'date_deb'=>$request->date_deb,
            'date_fin'=>$request->date_fin,
            'valeur_eval'=>$request->valeur_eval
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
        $asupprimer=assignation_objectif::find($id);
        $asupprimer->delete();
    }
}
