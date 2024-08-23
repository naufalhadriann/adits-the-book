<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    public function index()
    {
        $admin = User::where('role',1)->orderBy('id')->paginate(10);
        return view("admin.data-admin.admin", compact("admin"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
            'profile_image' => 'images/admin.png'
        ]);
        Alert::success('Success','Admin Add Successfuly');

        return response()->json(['success' => true]);
    }
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return response()->json($admin);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        User::where('id', $id)->update([ 
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role' => $request->role,
         ]);
         Alert::success('Success','Admin Update Successfuly');

         return response()->json(['success' => true, 'message' => 'User added successfully']);
        
    }
    public function destroy($id): RedirectResponse{
        $user = User::where('role',1)->find($id);

        $user->delete();
        Alert::success('Success','Admin Delete Successfuly');
        return redirect()->route('admin.index');
    }
}