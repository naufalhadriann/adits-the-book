
<div class="d-flex justify-content-between">
<h2 class="section-title">Karnaval Buku Seru </h2>
@php
    $currentUrl = $_SERVER['REQUEST_URI'];
    @endphp
        @if($currentUrl == '/diskon')
        <a href="/" class="section-view text-primary"> Kembali</a>
        @else
                <a href="/diskon" class="section-view text-primary">Lihat Semua</a>
               @endif
               
                </div>
               <div class="row ">
        @foreach ($discountBook as $item )
              
              <a class="col-md-3 mb-5" href="{{route('book.show', ['title' => urlencode($item->title)])}}">
                  <div class="card book-card border-0  ">
                  <span class="badge badge-discount">{{ceil($item->discount)}}%</span>
                      <img src="{{ asset('storage/' . $item->image)}}" class="card-img-top">
                      <div class="card-body">
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

                    
