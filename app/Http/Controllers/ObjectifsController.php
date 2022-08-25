<?php

namespace App\Http\Controllers;

use App\Models\Objectif;
use Illuminate\Http\Request;

class ObjectifController extends Controller
{
    public function creer_objectif(request $request){
       Objectif::create([
            'intitule_obj'=>$request->intitule_obj,
            'intitule_eval'=>$request->intitule_eval
        ]);
    }

    public function assigner_objectif(request $request, Objectifs $obj ){
        $id=$obj->id;
        $ob=Objectif::find($id);

        $ob->date_deb=$request->date_deb;
        $ob->date_fin=$request->date_fin;
        $ob->valeur_eval=$request->valeur_eval;
        $ob->save();
    }
}
