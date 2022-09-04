<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class userController extends Controller
{
    public function show(Request $request){
        return response()->json(User::find($request->id));
    }

    public function admin(Request $request){
        $admin = Admin::find($request->id);
        $admin->password = "";
        return response()->Json($admin);
    }
}
