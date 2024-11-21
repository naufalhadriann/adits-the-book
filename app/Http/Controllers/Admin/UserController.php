<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $query= $request->input('query');
        $sort =  $request->input('sort');
        $search = User::query();
        if ($query) {
            $search = User::where('name', 'like', "%{$query}%")
            ->orWhere('id', 'like', "%{$query}%");
        }
        switch($sort){
            case 1:
                $search->orderBy('created_at', 'desc');
                break;
            case 2: 
                $search->orderBy('created_at', 'asc');
                break;
            default:
                $search->orderBy('id');
                break;
        }
        $users = $search->orderBy('id')->where('role',0)->paginate(10);
            $users->appends(['query' => $query, 'sort'=>$sort]);
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
        Alert::success('Success', 'User Add successfully');

        return response()->json(['success' => true]);


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
         Alert::success('Success', 'User Update successfully');
         return response()->json(['success' => true]);
        
    }
    public function destroy($id): RedirectResponse{
        $user = User::find($id);

        $user->delete();
        Alert::success('Success', 'User Delete successfully');
        return redirect()->route('user.index');
    }
}
