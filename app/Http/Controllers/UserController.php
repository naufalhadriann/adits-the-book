<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role',0)->orderBy('id')->paginate(10);
        return view('admin.users.user', compact('users'));
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
            'role' => 0,
            'profile_image' => 'images/user.jpeg'
        ]);

        return response()->json(['success' => true, 'message' => 'User added successfully']);


    }
    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
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
         return response()->json(['success' => true, 'message' => 'User added successfully']);
        
    }
    public function destroy($id): RedirectResponse{
        $user = User::find($id);

        $user->delete();

        return redirect()->route('user.index')->with('success','Berhasil Menghapus data User');
    }
}
