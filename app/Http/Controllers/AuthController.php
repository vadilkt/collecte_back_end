<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Admin;

class AuthController extends Controller
{
     //
    protected $errors = [
        "email_not_found" => "Il n'existe aucun compte avec cette adresse email",
        "invalid_password" => "Le mot de passe est invalide",
        "email_verification_failed" => "La verification de l'adresse email a echoue",
        "login_error" => "Une erreur c'est produite au cours de la connexion. Veuillez ressayer plus tard.",
        "reset_password_email_failed" => "L'adresse email est invalide",
        "reset_password_failed" => "La réinitialisation du mot de passe a échoué. Le lien n'est pas valide ou le lien a expiré. Veuillez demander un autre lien."
    ];

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "noms" => "required",
            "email" => "required|email",
            "prenoms" => "required",
            "poste" => "required",
            "superieur" => "required",
            "agence" => "required",
            "direction" => "required",
            "departement" => "required",
            "classification" => "required",
            "password" => "required|confirmed"
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "errors" => $validator->errors()->getMessages(),
                ],
                422
            );
        }

        DB::beginTransaction();

        $user = User::create([
            "noms" => $request->noms,
            "email" => $request->email,
            "prenoms" => $request->prenoms,
            "poste" => $request->poste,
            "anciennete" => $request->anciennete,
            "superieur" => $request->superieur,
            "agence" => $request->agence,
            "direction" => $request->direction,
            "departement" => $request->departement,
            "classification" => $request->classification,
            "password" => Hash::make($request->password),
        ]);

        DB::commit();

        return response()->json([
            "user" => $user->id,
            "email" => $user->email
        ]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "email" => "required|string|email",
            "password" => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "errors" => $this->createError("login_error", "L'adresse email ou le mot de passe est invalide"),
                ],
                422
            );
        }

        $user = User::select("password", "id")
            ->where("email", "=", $request->email)
            ->first();

        if ($user == null) {
            return response()->json(
                [
                    "errors" => $this->createError("login_error", "L'adresse email ou le mot de passe est invalide"),
                ],
                422
            );
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    "errors" => $this->createError("login_error", "L'adresse email ou le mot de passe est invalide"),
                ],
                422
            );
        }

        return response()->json([
            "user" => $user->id,
            "email" => $user->email
        ]);
    }

    public function adminLogin(Request $request){

        $validator = Validator::make($request->all(), [
            "username" => "required",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    "errors" => $this->createError("login_error", "Le nom d'utilisateur ou le mot de passe est invalide"),
                ],
                422
            );
        }

        $user = Admin::select("password", "id")
            ->where("username", "=", $request->username)
            ->first();

        if ($user == null) {
            return response()->json(
                [
                    "errors" => $this->createError("login_error", "Le nom d'utilisateur ou le mot de passe est invalide"),
                ],
                422
            );
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    "errors" => $this->createError("login_error", "Le nom d'utilisateur ou le mot de passe est invalide"),
                ],
                422
            );
        }

        return response()->json([
            "admin" => $user->id,
            "username" => $user->username
        ]);
    }
}