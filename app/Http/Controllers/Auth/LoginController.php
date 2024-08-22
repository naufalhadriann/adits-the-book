<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view("auth.login");
    }
    public function loginPost(Request $request){
        $request->validate([
            "email"=> "required",
            "password"=> "required",
        ]);
        $user=([
            "email"=> $request->email,
            "password"=> $request->password,
        ]);
        if(Auth::attempt($user)){
            $request ->session()->regenerate();

            return redirect("/");
        }else{
            return back()->withErrors([
                "email"=> "Email atau password tidak cocok"
            ]);
        
           };
        
    }
    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();
        return redirect("/")->with("success","Kamu berhasil logout");
    }
}
