<?php

namespace App\Http\Controllers;

use App\Models\Objectif;
use Illuminate\Http\Request;

class ObjectifController extends Controller
{
    public function creer_objectif(request $request){
       $item=Objectif::create([
            'intitule_obj'=>$request->intitule_obj,
            'intitule_eval'=>$request->intitule_eval
        ]);

        return response()->json($item);
    }

    public function liste_objectif(request $request){
        return response()->json(Objectif::all());

    }
    
    public function supprimer_objectif($id){
        $item_to_delete=Objectif::find($id);
        if($item_to_delete){
            $item_to_delete->delete();
            return response()->json(["status"=>"success"]);
        }else{
            return response()->json(["status"=>"failed"]);
        }
    }

    public function update_objectif($id, request $request){
        $item_to_update=Objectif::find($id);
        if($item_to_update){
            $item_to_update->intitule_obj= $request->intitule_obj;
            $item_to_update->intitule_eval= $request->intitule_eval;
            return response()->json($item_to_update);
        }
        else{
            return response(view('errors.404'), 404);
        }
    }
}
