<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{
    public function logIn(){
     return view("login");
    }

    public  function postLogIn(Request $request){
        $credentials = $request->except("_token");
        if(Auth::attempt($credentials)){
            return redirect()->route("/");

        }else{
            abort(403);
        }
    }

    public  function register(){
        return view("register");
        // ამ ვიუს ექშენში რეჯისთერ_1 ის როუთს გავუწერთ.

    }

    public function register_1(Request $request){
        $user = new User($request->all());

        $user->save();

        return redirect()->route("/");

    }
    public function logOut(){
        Auth::logout();
        return redirect()->route("login");
    }
}
