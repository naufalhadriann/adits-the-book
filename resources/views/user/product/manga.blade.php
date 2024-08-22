<h2 class="section-title">Manga Favorit</h2>

        <div class="row">
        @foreach ($mangaBook as $item)
            
            <a class="col-md-2" href="{{route('book.show', ['title' => urlencode($item->title)])}}">
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
                
                </div>

