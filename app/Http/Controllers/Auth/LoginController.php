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

            if(Auth::user()->role == 1){
                return redirect('/dashboard');
            }else{
                return redirect('/');
            };
        }else{
            return back()->withErrors([
                "email"=> "Email atau password tidak cocok"
            ]);
        
           };
        
    }
    public function logout(Request $request){

        $user = Auth::user(); // Ambil user yang sedang login

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect berdasarkan role
    if ($user && $user->role === 1) {
        return redirect()->route('login'); // Ganti dengan route yang sesuai
    } else {
        return redirect('/'); // Redirect ke home page
    }
    }
}
