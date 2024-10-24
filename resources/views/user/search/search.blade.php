@extends('user.layouts.app')

@section('content')
                
 <div class="container">
    <div class="row">
        <div class="col-md-4">
        <aside class="filters col-lg-6 ms-5 ">
            <div class="header-filter mb-4">
            <h3 >Filter</h3>
            </div>
                    <div class="category-filter mb-4">
                    @include('user.search.partials.filter-category')
                    </div>

                    <div class="price-filter mb-4">
                    @include('user.search.partials.filter-price')
                    </div>

                

                    
                </aside>
        </div>
        
        <div class="col-md-8">
            <div class="container search-container">
            @if($books->isEmpty())
                    <p class="search-title ms-5 ">
                        Tidak ada hasil ditemukan untuk pencarian: "{{ $query }}"
                        <div class="lottie  ">
                        <dotlottie-player src="https://lottie.host/7ac12197-94d8-4d7e-9f10-f8c869f7a6e0/PNpnSSkYSW.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                        </div>
                    </p>
                @else
                
            <div class="search-title ">
           
                <div class="filter-latest">
                    @include('user.search.partials.filter-latest')
                </div>
                                        
              
            {{count($books)}} dari {{$totalBooks}} Hasil Pencarian untuk:
            @if($query)
            "{{ $query }}"
            @endif
            @if($category)
            "{{$category}}"
            @endif
        </div>
      
                      
                    </div>

            <div class="row">
        @foreach ($books as $item)
            @if($item->stock == 0)
            <a class="col-md-3 mb-4" >
                <div class="card book-card border-0">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-50 d-flex justify-content-center align-items-center" style="z-index: 10; backdrop-filter: blur(5px); border-radius:10px;">
            <span class="text-white fs-4">Habis</span>
        </div>
        @else
        <a class="col-md-3 mb-4" href="{{route('book.show', ['title' => urlencode($item->title)])}}">
        <div class="card book-card border-0">
        @endif
                    <img src="{{asset('storage/' . $item->image)}}" class="card-img-top" alt="Popular Book 1">
                    <div class="card-body">
                        <h5 class="popular-book-title">{{$item->title}}</h5>
                        <p class="popular-book-author">{{$item->author}}</p>
                        
                                @if($item->hasDiscount())
                                <span >Rp {{number_format($item->discounted_price,0 ,',', '.')}}</span>
                                <div class="price-discount">
                                    <span class="text-danger">{{floor($item->discount) }}%</span>
                                    <span class="text-decoration-line-through text-secondary">Rp{{number_format($item->price,0,',','.')}}</span>
                                </div>       

                                @else
                                <span >Rp {{number_format($item->price,0 ,',', '.')}}</span>
                                @endif


                    </div>
                </div>
            </a>
            @endforeach
            {{ $books->links('pagination::bootstrap-5') }}

                </div>
                @endif
                </div>
             </div>
         </div>
        </div>
            
        </div>
    </div>
@endsection
