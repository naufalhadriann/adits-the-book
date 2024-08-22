

<h2 class="section-title">Diskon HUT RI </h2>
<?php
    $currentUrl = $_SERVER['REQUEST_URI'];
    ?>
        @if($currentUrl == '/diskon')
        <a href="/" class="section-view"> < Back</a>
        @else
                <a href="/diskon" class="section-view ">View All</a><div class="row">
               @endif
                
               <div class="row ">
        @foreach ($discountBook as $item )
              
              <a class="col-md-3 mb-5" href="{{route('book.show', ['title' => urlencode($item->title)])}}">
                  <div class="card book-card ">
                  <span class="badge badge-discount">30%</span>
                      <img src="{{ asset('storage/' . $item->image)}}" class="card-img-top" alt="Book 1">
                      <div class="card-body">
                          <h5 class="book-title">{{$item->title}}</h5>
                          <p class="book-author">{{$item->author}}</p>
                      
                          <div class="d-flex justify-content-between ">
                          <span >Price </span>
                          <span>Stock </span>
                      </div>
                  <div class="d-flex justify-content-between ">
                  <span style="text-decoration: line-through;">Rp {{ number_format($item->price, 0, ',', '.')}}</span>
                  <span class="mx-3">{{$item->stock}}</span>
                  </div>
                     <span style="color:red;">Rp    {{ number_format($item->discountedPrice, 0, ',', '.') }}</span>
               </div>
                  </div>
              </a>
        @endforeach
              

          </div>
      </div>

  </div>
                    
