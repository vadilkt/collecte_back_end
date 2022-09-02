<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function userDashboard()
    {
        $users= User::all();
        return response()->json($users);
    }

    public function adminDashboard()
    {
        $users= Admin::all();
        return response()->json($users);
    }
    
    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>['required','email'],
            'password'=>['required','string']
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        if(auth()->guard('user')->attempt(['email'=> request('email'), 'password'=> request('password')])){
            config(['auth.guards.api.provider'=>'user']);
            $user = User::select('users.*')->find(auth()->guard('user')->user()->id);
            $success = $user;
            $success['token']= $user->createToken('MyApp', ['user'])->accessToken;
            return response()-> json($success, 200);
        } else{
            return response()->json(['error'=>['Email et/ou Mot de passe erroné!']], 200);
        }
    }
    public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'=>['required','email'],
            'password'=>['required','string']
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        if(auth()->guard('user')->attempt(['username'=> request('username'), 'password'=> request('password')])){
            config(['auth.guards.api.provider'=>'admin']);
            $admin = User::select('admins.*')->find(auth()->guard('admin')->user()->id);
            $success = $admin;
            $success['token']= $admin->createToken('MyApp', ['admin'])->accessToken;
            return response()-> json($success, 200);
        } else{
            return response()->json(['error'=>['Email et/ou Mot de passe erroné!']], 200);
        }
    }

}
