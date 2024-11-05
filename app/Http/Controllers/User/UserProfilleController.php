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

    // Update the name if provided
    if ($request->filled('name')) {
        $user->name = $request->input('name');
    }

    // Update the email if provided
    if ($request->filled('email')) {
        $user->email = $request->input('email');
    }

    // Update the profile image if a file is uploaded
    $imagePath = $request->file('profile_image')->store('images/profile', 'public');
    $user->profile_image = $imagePath;

    // Save the updated user information
    $user->save();

    // Show a success message based on what was updated
    if ($request->filled('name')) {
        Alert::success('success', 'Update Name telah Berhasil!');
    } elseif ($request->filled('email')) {
        Alert::success('success', 'Update Email telah Berhasil!');
    } elseif ($request->hasFile('profile_image')) {
        Alert::success('success', 'Update Profile Image telah Berhasil!');
    }

    return Redirect::back();
}

}
