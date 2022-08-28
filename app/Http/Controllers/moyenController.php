<?php

namespace App\Http\Controllers;

use App\Models\moyen;
use Illuminate\Http\Request;

class moyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(moyen::All());
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
        $moyen=moyen::create([
            'intitule_moyen'=>$request->intitule_moyen,
            'objectif_id'=>$request->objectif_id
        ]);
        return response()->json($moyen);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $moyen=moyen::findorFail($id);
        return response()->json($moyen);
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
        $moyen=moyen::find($id);
        $moyen->update([
            'intitule_moyen'=>$request->intitule_moyen
        ]);
        return response()->json($moyen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moyen=moyen::find($id);
        $moyen->delete();
        return response()->json($moyen);
    }
}
