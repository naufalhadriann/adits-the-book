<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\address;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function show() :View
    {
        return view('auth.verify-address');
    }
   public function create(Request $request)
   {
    $user = Auth::user();
    $request->validate([
        'street' => 'required|string|max:255',
        'kota' => 'required|string|max:100',
        'provinsi' => 'required|string|max:100',
        'postal_code' => 'required|string|max:10',
        'negara' => 'required|string|max:100',
        'nomor_telp' => 'required|string|max:15', 
    ]);
    
    address::create([
        'user_id' => $user->id,
        'name' => $user->name,
        'street' => $request->street,
        'kota' => $request->kota,
        'provinsi' => $request->provinsi,
        'postal_code' => $request->postal_code,
        'negara' => $request->negara,
        'nomor_telp' => $request->nomor_telp,
        'status' => 1,
        'address_type'=> "Rumah",
    ]);
    return redirect('/');
   }
}
