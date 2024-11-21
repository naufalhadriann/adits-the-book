<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
        ]);

    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        $user = $request->user();
        $alertMessage = [];

        if($request->filled('email')){
            $user->email = $request->input('email');
            $alertMessage[] = 'Ganti Email telah berhasil!';
        }
        
        if($request->filled('name')){
            $user->name = $request->input('name');
            $alertMessage[] = 'Ganti Nama telah berhasil!';
        }

        if($request->hasFile('profile_image')){
            $imagePath = $request->file('profile_image')->store('images/profile', 'public');
            $user->profile_image = $imagePath;
            $alertMessage[] = 'Ganti Photo Profile telah berhasil!';
        }
        $user->save();
        foreach($alertMessage as $message){
            Alert::success('success', $message);
        }
        return Redirect::back();
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
