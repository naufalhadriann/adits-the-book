<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class BookController extends Controller
{
    public function index(Request $request )
    {
     
        $query = $request->input('query');
        $sort = $request->input('sort');
        $search = Book::query();
        if ($query) {
            $search = Book::where('title', 'like', "%{$query}%")
            ->orWhere('author', 'like', "%{$query}%")
            ->orWhere('id','like', "%{$query}%")
            ->orWhereHas('category', function($querys) use ($query) {
                $querys->where('genre', 'like', "%{$query}%");
            });
        } 
           
        switch($sort){
            case 1:
                $search->orderBy('price', 'asc');
                break;
            case 2:
                $search->orderBy('price', 'desc');
                break;
            case 3:
                $search->orderBy('created_at', 'desc');
                break;
            case 4:
                $search->orderBy('created_at','asc');       
                break;
            case 5:
                $search->where('stock', '>', 0 );
                break;
            case 6:
                $search->where('stock', '=', 0);
        }
        $books = $search->orderBy('id')->paginate(12);
        $books->appends(['query' => $query, 'sort' => $sort]);
        return view("admin.product.product", compact("books"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "author" => "required|string|max:255", 
            "price" => "required|numeric",
            "stock" => "required|integer",
            "category_id" => "nullable|exists:category,id", 
            "image" => "nullable|image|mimes:jpg,jpeg,png,gif|max:2048",
            "publish_date" => "required|date",

        ]);
        $imagePath = $request->file('image')->store('images', 'public');
    
        
        Book::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "penerbit" => $request->penerbit,
            "price" => $request->price,
            "stock" => $request->stock,
            "category_id" => $request->category_id,
            "image" => $imagePath,
            "publish_date" =>$request->publish_date,
            "discount" => $request->discount,
        ]);
        Alert::success('success', 'Book created successfully.');

       return response()->json(['success' => true]);
       
    }
 
    public function edit($id){
        $book = Book::findOrFail($id);
        return response()->json($book);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "title"=> "required|string|max:255",
            "description"=> "required|string",
            "author"=> "required|string|max:255",
            "penerbit"=> "required|string|max:255",
            "price"=> "required|numeric",
            "stock"=> "required|integer",
            "category_id" => "nullable|exists:category,id",
            "image" => "nullable|image|mimes:jpg,jpeg,png,gif|max:2048",
            "publish_date" => "required|date",

        ]);
        $book = Book::find($id);
        $currentImagePath = $book->image;

  
        if ($request->hasFile('image')) {
           
            if ($currentImagePath && Storage::disk('public')->exists($currentImagePath)) {
                Storage::disk('public')->delete($currentImagePath);
            }
            $newImagePath = $request->file('image')->store('images', 'public');

            $book->image = $newImagePath;
            $book->save();
        }
         Book::where('id',$id)->update([
            "title"=> $request->title,
            "description"=> $request->description,
            "author"=> $request->author,
            "penerbit"=> $request->penerbit,
            "price"=> $request->price,
            "stock"=> $request->stock,
            "category_id" => $request->category_id,
            "publish_date" =>$request->publish_date,
            "discount" => $request->discount,


         ]);
         Alert::success('success', 'Book Update successfully.');
         return response()->json(['success' => true]);
    }
    public function destroy($id): RedirectResponse{
        $book = Book::find($id);

        $book->delete();
        Alert::success('success', 'Book Delete successfully.');
        return redirect()->back();
    }
}
