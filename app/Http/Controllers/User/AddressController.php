<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class AddressController extends Controller
{
    public function show()
    {
        $userId = Auth::user()->id;
        $address = address::where('user_id', $userId)->get();
        return view('user.profile.address', compact('address'));
    }
    public function create(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'kota' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
            'negara' => 'required|string|max:100',
            'nomor_telp' => 'required|string|max:15', 
            'address_type' => 'required',
        ]);
    
        Address::create([
            'user_id' => $userId,
            'name' => $request->name,
            'street' => $request->street,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'postal_code' => $request->postal_code,
            'address_type' => $request->input('address_type'),
            'negara' => $request->negara, 
            'nomor_telp' => $request->nomor_telp,
            'status' => 0,
        ]);
        
        Alert::success('success', 'Kamu telah berhasil menambahkan alamat');
        return redirect()->back();
    }
    public function useAddress($addressId)
        {
            $userId = Auth::id();

        
            Address::where('user_id', $userId)->update(['status' => 0]);

        
            $address = Address::find($addressId);
            if ($address && $address->user_id == $userId) {
                $address->status = 1;
                $address->save();
            }

            return redirect()->back()->with('success', 'Alamat telah diperbarui!');
        }

    
}
