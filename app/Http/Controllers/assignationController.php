<?php

namespace App\Http\Controllers;

use App\Models\assignation_objectif;
use App\Models\Objectif;
use Illuminate\Http\Request;

class assignationController extends Controller
{
    public function creer_assignation(request $request, $id){
       $ite=Objectif::find($id);
        $item=assignation_objectif::create([
             'date_deb'=>$request->date_deb,
             'date_fin'=>$request->date_fin,
             'valeur_eval'=>$request->valeur_eval
         ]);
 
         return response()->json($item);
     }

     public function liste_assignation(request $request){
        return response()->json(assignation_objectif::all());
     }
 
}
