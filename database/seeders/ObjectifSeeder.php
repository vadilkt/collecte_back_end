<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Objectif;
use App\Models\assignation_objectif;
use App\Models\Score;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class ObjectifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("scores")->delete();
        DB::table("assignation_objectif")->delete();
        DB::table("objectif")->delete();
         
        $objectifs = [
            [
                'intitule_obj'=> "Taux de transformation des prospects en clients 
                Entrée en relation",
                'intitule_eval'=> "Nbre de prospects rencontrés"
            ],
            [
                'intitule_obj'=> "Entrée en relation",
                'intitule_eval'=> "Nombre d'EER effectuées"
            ]
        ];

        foreach($objectifs as $item){
            $objectif = Objectif::create([
                'intitule_obj'=> $item['intitule_obj'],
                'intitule_eval'=> $item['intitule_eval'],
            ]);
            // Pour chaque objectif enregistrer une assignation.
            $assignation = assignation_objectif::create([
                "date_deb" => "2022-09-27",
                "date_fin" => "2022-09-27",
                "valeur_eval" => 100,
                "objectif_id" => $objectif->id
            ]);

            // Enregister un score pour chaque utilisateur concernant cette assignation.
            $users = User::all();

            foreach($users as $user){
                Score::create([
                    "user_id" => $user->id,
                    "assignation_id" => $assignation->id,
                    "valeur" => Arr::random([40,50,70,80,90,100]),
                    "moyens" => "Téléphone, Internet"
                ]);
            }

        }

        
    }
}
