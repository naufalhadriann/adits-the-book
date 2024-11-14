<?php

namespace App\Http\Controllers;

use App\Models\SocialLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;


class SocialLoginController extends Controller
{
    public function toProvider($driver) {
        return Socialite::driver($driver)->redirect();
    }

    public function handleCallback($driver) { // Corrected method name
        $user = Socialite::driver($driver)->user();
        $user_account = SocialLogin::where('providers', $driver)->where('providers_id', $user->getId())->first();
        if ($user_account) {
            Auth::login($user_account->user); 
            Session::regenerate();
            return redirect()->intended('/');
        }

        $db_user = User::where('email', $user->getEmail())->first();
        if ($db_user) {
            SocialLogin::create([
                'providers' => $driver,
                'providers_id' => $user->getId(),
                'user_id' => $db_user->id,
            ]);
        } else {
            $imageUrl = $user->getAvatar();
            $imageContent = file_get_contents($imageUrl);
             
            if($imageContent === false){
                return response()->json(['msg'=>'ERROR']);
            }
            $imageName = "PP".$user->getName().".png";
        
            $path ='images/profile/'. $imageName;
            
            $imageSave = Storage::disk('public')->put($path,$imageContent); 


            if(!$imageSave){
                return response()->json(['msg'=>'error']);
            }
            
            $db_user = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt(rand(1000, 9999)),
                'profile_image' => $path,
            ]);

            SocialLogin::create([
                'providers' => $driver,
                'providers_id' => $user->getId(),
                'user_id' => $db_user->id,
            ]); 

            Auth::login($db_user); 
            Session::regenerate();
            return redirect()->intended('/');
        }
    }
}
