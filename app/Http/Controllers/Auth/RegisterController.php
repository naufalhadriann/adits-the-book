<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $imageDefault = public_path('images/user.jpeg'); 
        if (!file_exists($imageDefault)) {
            return back()->withErrors(['image' => 'Default profile image not found.']);
        }
        $imageContent = file_get_contents($imageDefault);

        $imageDestination = 'images/profile/'. uniqid(). '.jpg'; 
        
       
       $imageSave = Storage::disk('public')->put($imageDestination,$imageContent);
       if (!$imageSave) {
        return back()->withErrors(['image' => 'Failed to save the profile image.']);
    }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0,
            'profile_image' => $imageDestination,
        ]);

        event(new Registered($user));

        Auth::login($user);

       return redirect()->route('verify.address')->with('success','Kamu berhasil Register');
    }
}
