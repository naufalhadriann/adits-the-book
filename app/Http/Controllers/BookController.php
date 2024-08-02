<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id')->paginate(10);
        $categorys = Category::get();
        return view("admin.product.product", compact("books","categorys"));
    }
    public function store(Request $request){
        $request->validate([
            "title"=> "required|string|max:255",
            "description"=> "required|string|max:255",
            "author"=> "required|string|max:255",
            "penerbit"=> "required|string|max:255",
            "price"=> "required|numeric",
            "stock"=> "required|integer",
            
          

        ]);
         Book::create([
            "title"=> $request->title,
            "description"=> $request->description,
            "author"=> $request->author,
            "penerbit"=> $request->penerbit,
            "price"=> $request->price,
            "stock"=> $request->stock,
           
        
       
         ]);
         dd($request);
    }
 
    public function edit($id){
        $book = Book::findOrFail($id);
        return response()->json($book);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "title"=> "required|string|max:255",
            "description"=> "required|string|max:255",
            "author"=> "required|string|max:255",
            "penerbit"=> "required|string|max:255",
            "price"=> "required|int|max:255",
            "stock"=> "required|int|max:255",
            "category_id"=> "required",


        ]);

         Book::where('id',$id)->update([
            "title"=> $request->title,
            "description"=> $request->description,
            "author"=> $request->author,
            "penerbit"=> $request->penerbit,
            "price"=> $request->price,
            "stock"=> $request->stock,
            "category_id" => $request->category_id,


         ]);
    }
    public function destroy($id): RedirectResponse{
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('product.index')->with('success','Berhasil Menghapus data User');
    }
}
