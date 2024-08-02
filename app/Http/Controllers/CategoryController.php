<?php


namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class CategoryController extends Controller
{
    public function index()
    {
        $categorys = category::orderBy('id')->paginate(10);
        return view('admin.category.category', compact('categorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required',
        ]);

        category::create([
            'name' => $request->name,
            'genre' => $request->genre,
        ]);

        return response()->json(['success' => true, 'message' => 'Category added successfully']);


    }
    public function edit($id)
    {
        $categorys = Category::findOrFail($id);
        return response()->json($categorys);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:50' . $id,
        ]);

        Category::where('id', $id)->update([ 
            'name'=> $request->name,
            'genre'=> $request->genre,
         ]);
         return response()->json(['success' => true, 'message' => 'User added successfully']);
        
    }
    public function destroy($id): RedirectResponse{
        $categorys = Category::find($id);

        $categorys->delete();

        return redirect()->route('category.index')->with('success','Berhasil Menghapus data User');
    }
}
