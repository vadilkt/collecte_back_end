<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        DB::table("users")->delete();

        $users = [
            [
                "noms" => "Momo",
                "email" => "demo@gmail.com",
                "prenoms" => "Albert",
                "poste" => "Poste demo",
                "anciennete" => "10 mois",
                "superieur" => "Demo superieur",
                "agence" => "Demo agence",
                "direction" => "Demo direction",
                "departement" => "Demo departement",
                "classification" => "Demo classification",
                "password" =>  Hash::make("password"),
            ],
            [
                "noms" => "Afrika",
                "email" => "test@gmail.com",
                "prenoms" => "Kemi",
                "poste" => "Poste demo",
                "anciennete" => "10 mois",
                "superieur" => "Demo superieur",
                "agence" => "Demo agence",
                "direction" => "Demo direction",
                "departement" => "Demo departement",
                "classification" => "Demo classification",
                "password" =>  Hash::make("password"),
            ]
        ];

        foreach($users as $user){
            User::create([
                "noms" => $user["noms"],
                "email" => $user["email"],
                "prenoms" => $user["prenoms"],
                "poste" => $user["prenoms"],
                "anciennete" => $user["anciennete"],
                "superieur" => $user["superieur"],
                "agence" => $user["agence"],
                "direction" => $user["direction"],
                "departement" => $user["departement"],
                "classification" => $user["classification"],
                "password" =>  Hash::make("password"),
            ]);
        }
       
    }
}
