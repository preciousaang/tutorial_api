<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('guest:api');
    }

    public function index(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users|string|max:255',
            'password'=>'required|string|max:255'
        ]);

        $newUser = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        if($newUser){
            return response()->json($newUser, 200);
        }

    }
}
