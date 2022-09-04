<?php

namespace App\Http\Controllers;

use App\Models\assignation_objectif;
use App\Models\Objectif;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class assignationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignations = assignation_objectif::all();

        $assignations->load("objectif");

        return response()->json($assignations);
    }

    /**
     *  Display assignation of a specific user. 
     *  The difference is that this set if the user has register or not an objectif.
     */
    public function user(Request $request){
        $assignations = assignation_objectif::all();
        $assignations->load("objectif");
        // Get all already register by the user.
        $scores = Score::where("user_id",$request->id)->get();
        foreach($assignations as $item){
            $item->filled = false;
            foreach($scores as $score){
                if($score->assignation_id == $item->id){
                    $item->filled = true;
                    $item->score_id = $score->id;
                }
            }
        }
        return response()->json($assignations);
    }

    public function score(Request $request){
        $score = Score::create([
            "user_id" => $request->userId,
            "assignation" => $request->assignation_id,
            "valeur" => $request->valeur,
            "moyens" => $request->moyens
        ]);
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
            "date_deb" => "required",
            "date_fin" => "required",
            "valeur_eval" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "errors" => $validator->errors()->getMessages(),
                ],
                422
            );
        }

        $assignation = assignation_objectif::create([
            'date_deb' => $request->date_deb,
            'date_fin' => $request->date_fin,
            'valeur_eval' => $request->valeur_eval,
            'objectif_id' => $request->objectif_id,
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
        $assignation = assignation_objectif::findorFail($id);
        $assignation->load("objectif");
        $assignation->load("scores.user");
        // Pour chaque utilisateur celui qui n'a pas encore enregistrer les scores pour l'objectif.
        // On va le marque en attente.
        $pending = [];
        foreach(User::all() as $user){
            $asfilled = false;
            foreach($assignation->scores as $filled){
                if($filled["user_id"] == $user->id){
                    $asfilled = true;
                }
            }
            if(!$asfilled){
                $pending[] = (object)[
                    "user" => $user
                ];
            }
        }
        $assignation->pending = $pending;
        return response()->json($assignation);
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
        $amodifier = assignation_objectif::find($id);
        $amodifier->update([
            'date_deb' => $request->date_deb,
            'date_fin' => $request->date_fin,
            'valeur_eval' => $request->valeur_eval
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
        $asupprimer = assignation_objectif::find($id);
        $asupprimer->delete();
    }

   
}
