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
    public function edit(Request $request): View
    {
        return view('user.profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
       
        $user =  $request->user()->fill($request->validated());;

        if($request->filled('name')){
            $user->name = $request->input('name');
            $user->save();
            Alert::success('success','Update Name telah Berhasil! ');
        return Redirect::back();
        }elseif($request->filled('email')){
            $user->email = $request->input('email');
            $user->save();
            Alert::success('success','Update Email telah Berhasil! ');
        return Redirect::back();
        }
        

        return Redirect::back();
    }
}
