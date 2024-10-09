<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function show()
    {
        $userId = Auth::user();
        $address = address::where('user_id', $userId)->get();

        return view('user.profile.address', compact('address'));
    }
}
