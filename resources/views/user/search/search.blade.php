@extends('user.layouts.app')

@section('content')
                
 <div class="container">
    <div class="row">
        <div class="col-md-4 ">
        <aside class="filters col-lg-6 ">
            <div class="header-filter mb-4">
            <h3 >Filter</h3>
            </div>
                    <div class="category-filter mb-4">
                   
                        <h2>Kategori</h2>
                        <select class="form-select" name="category">
                            <option value="">All</option>
                            <option value="book">Books</option>
                            <option value="electronics">Electronics</option>
                        </select>
                    </div>

                    <div class="price-filter mb-4">
                        <h2>Price</h2>
                        <input type="number" class="form-control mb-2" name="min_price" placeholder="Min Price">
                        <input type="number" class="form-control" name="max_price" placeholder="Max Price">
                    </div>

                    <div class="stock-filter mb-4">
                        <h2>Stock</h2>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="stock" value="in_stock" checked>
                            <label class="form-check-label">In Stock</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="stock" value="out_of_stock">
                            <label class="form-check-label">Out of Stock</label>
                        </div>
                    </div>

                    <div class="keyword-filter mb-4">
                        <h2>Keyword</h2>
                        <input type="text" class="form-control" name="keyword" placeholder="Search by name...">
                    </div>

                    
                </aside>
        </div>
        
        <div class="col-md-8      ">
            <div class="container search-container">
            <p class="search-title ">
            {{count($books)}} dari {{$totalBooks}} Hasil Pencarian untuk: "{{ $query }}"
            <!-- <select class="form-select-md " name="sort">
                            <option value="latest">Latest</option>
                            <option value="old">Old</option>
                        </select> -->
        </p>
      
                      
                    </div>

            <div class="row">
        @foreach ($books as $item)
            
            <a class="col-md-3 mb-4" href="{{route('book.show', ['title' => urlencode($item->title)])}}">
                <div class="card book-card">
                    <img src="{{asset('storage/' . $item->image)}}" class="card-img-top" alt="Popular Book 1">
                    <div class="card-body">
                        <h5 class="popular-book-title">{{$item->title}}</h5>
                        <p class="popular-book-author">{{$item->author}}</p>
                        <div class="d-flex justify-content-between ">
                                <span >Price </span>
                                <span>Stock </span>
                            </div>
                            <div class="d-flex justify-content-between ">
                        <span >Rp {{number_format($item->price,0 ,',', '.')}}</span>
                        <span class="mx-3">{{$item->stock}}</span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            {{ $books->links('pagination::bootstrap-5') }}

                </div>
                </div>
             </div>
         </div>
        </div>
            
        </div>
    </div>
@endsection
