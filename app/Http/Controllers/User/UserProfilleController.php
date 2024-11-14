<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfilleController extends Controller
{
    public function editProfile(Request $request): View
    {
        return view('user.profile.profile', [
            'user' => $request->user(),
        ]);
    }
    public function editPassword(Request $request) :View 
    {
        return view('user.profile.password', [
            'user' => $request->user(),
        ]);
    }
    public function editAddress(Request $request) :View 
    {
        return view ('user.profile.address', [
            'user' => $request->user(),
        ]);
    }
      public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();
    $alertMessage = [];

    if ($request->filled('name')) {
        $user->name = $request->input('name');
        $alertMessage[] = 'Ganti Nama telah Berhasil!';
    }

   
    if ($request->filled('email')) {
        $user->email = $request->input('email');
        $alertMessage[] = 'Ganti Email telah berhasil!';
        
    }

    if($request->hasFile('profile_image')){
        $imagePath = $request->file('profile_image')->store('images/profile', 'public');
        $user->profile_image = $imagePath;
        $alertMessage[] = 'Ganti Photo Profile telah berhasil!';
    }

    $user->save();
    
    foreach($alertMessage as $message){
        Alert::success('Berhasil', $message);
    }

    return Redirect::back();
}

}
