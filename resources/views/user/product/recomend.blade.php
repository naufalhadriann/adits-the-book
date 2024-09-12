
        <h2 class="section-title">Recommended Book</h2>
        @php
            $currentUrl = $_SERVER['REQUEST_URI'];

        @endphp
        @if($currentUrl == '/recommend')
        <a href="/" class="section-view"> Back</a>
        @else
            <a href="/recommend" class="section-view"> View All</a>
            
        @endif
        <div class="row">
                @foreach ($recommendBook as $item )
                <a class="col-md-3 mb-5" href="{{route('book.show', ['title' => urlencode($item->title)])}}">
                <div class="card book-card border-0">
                    <img src="{{ asset('storage/' . $item->image)}}" class="card-img-top" alt="Popular Book 1">
                    <div class="card-body">
                        <h5 class="book-title">{{$item->title}}</h5>
                        <p class="book-author">{{$item->author}}</p>
                        <div class="d-flex justify-content-between ">
                                <span >Price </span>
                                <span>Stock </span>
                            </div>
                            <div class="d-flex justify-content-between ">
                        <span >Rp {{ number_format($item->price, 0, ',', '.')}}</span>
                        <span class="mx-3">{{$item->stock}}</span>
                        </div>
                    </div>
                </div>
            </a>
                @endforeach
          
        </div>
          

