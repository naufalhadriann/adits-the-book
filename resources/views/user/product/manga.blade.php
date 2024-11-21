<h2 class="section-title">Manga Favorit</h2>

        <div class="row">
        @foreach ($mangaBook as $item)
            
            <a class="col-md-2" href="{{route('book.show', ['title' => urlencode($item->title)])}}">
                <div class="card book-card">
                    <img src="{{asset('storage/' . $item->image)}}" class="card-img-top" alt="Popular Book 1">
                    <div class="card-body">
                    @if($item->hasDiscount())
                <span class="badge badge-discount">{{ceil($item->discount)}}%</span>
                    @endif
                        <h5 class="book-title">{{$item->title}}</h5>
                        <p class="book-author">{{$item->author}}</p>
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
                
                </div>

