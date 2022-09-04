<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Score;
use Illuminate\Support\Facades\Validator;

class ScoreController extends Controller
{
    public function assignation(Request $request){
        $scores = Score::where("assignation_id", $request->id)->get();
        $scores->load("user");
        return response()->json($scores);
    }

    public function index(Request $request){
        $scores = Score::all();
        $scores->load("user");
        return response()->json($scores);
    }

    public function show(Request $request){
        $score = Score::find($request->id);
        $score->load("assignation.objectif");
        return response()->json($score);
    }
    
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            "valeur_score" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "errors" => $validator->errors()->getMessages(),
                ],
                422
            );
        }

        $score = Score::create([
            "user_id" => $request->user_id,
            "assignation_id" => $request->assignation_id,
            "valeur_score" => $request->valeur_score,
            "moyens" => json_encode($request->moyens)
        ]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            "valeur_score" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "errors" => $validator->errors()->getMessages(),
                ],
                422
            );
        }   

        $score = Score::find($request->id);

        $score->update([
            "valeur_score" => $request->valeur_score,
            "moyens" => json_encode($request->moyens)
        ]);

        return response()->json($score);
    }
}
