<?php

namespace App\Http\Controllers;

use App\Models\Objectif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class objectifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objectif = Objectif::latest()->paginate(10);
        return response()->json($objectif);
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
        // Validation 
        // Les messages personnalises en francais sont dans le fichier /lang/fr/validation dans le champ custom
        $validator = Validator::make($request->all(), [
            "intitule_obj" => "required",
            "intitule_eval" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "errors" => $validator->errors()->getMessages(),
                ],
                422
            );
        }

        $item = Objectif::create([
            'intitule_obj'=>$request->intitule_obj,
            'intitule_eval'=>$request->intitule_eval
        ]);

        return response()->json($item);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $objectif=Objectif::find($id);
        return response()->json($objectif);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function edit($id)
    {
        //
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $amodifier=Objectif::find($id);
        $amodifier->update([
            'intitule_obj'=>$request->intitule_obj,
            'intitule_eval'=>$request->intitule_eval
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
        $adetruire=Objectif::find($id);
        $adetruire->delete();
        return response()->json($adetruire);
    }
}
