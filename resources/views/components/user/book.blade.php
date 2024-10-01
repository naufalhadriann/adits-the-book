<div class="container">
  @if($book->hasDiscount())
{{Breadcrumbs::render('diskonbook', $book)}}

  @else
{{Breadcrumbs::render('book', $book)}}
@endif
    <div class="row gx-5">
      <aside class="col-lg-6">

      
        <div class=" rounded-4 mb-3 d-flex justify-content-center">
     
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="{{ asset('storage/' . $book->image)}}">
            <img  class="book-image fit" src="{{ asset('storage/' . $book->image)}}" />
          </a>
        </div>
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h5 class="title fw-light">
            {{$book->author}}
          </h5>
          <h3 cass="title">
                {{$book->title}}
          </h3>
          @if($book->hasDiscount())
          <div class="d-flex flex-row mt-4">
            <span style="text-decoration: line-through;">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
            <span class="h5 ms-2 text-danger">Rp {{ number_format($book->discountedPrice, 0, ',', '.') }}</span>
          </div>
          @else
          <div class="d-flex flex-row mt-4">
            <span>Rp {{ number_format($book->price, 0, ',', '.') }}</span>
          </div>
          @endif
          <div class="mb-3">
          <span class="fw-bold">{{$book->stock}}</span>
          <span class="text-success ms-2">In stock</span>
          </div>

          <p>
            {{$book->description}}
          </p>

          <div class="row">
        <div class="col-12">
            <p class="fw-bold fs-4">Detail</p>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <dt class="fw-bold">Penerbit</dt>
            <dd>{{$book->penerbit}}</dd>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <dt class="fw-bold">Author</dt>
            <dd>{{$book->author}}</dd>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <dt class="fw-bold">Genre</dt>
            <dd>{{$book->category->genre}}</dd>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <dt class="fw-bold">Tanggal Terbit</dt>
            <dd>{{$book->publish_date}}</dd>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <dt class="fw-bold">Halaman</dt>
            <dd>140 Halaman</dd>
        </div>
    </div>
          <hr />
          <div class="row mb-4">
          <form action="{{ route('cart') }}" method="POST">
          @csrf
            <div class="col-md-4 col-6 mb-3">
              <label class="mb-2 d-block">Quantity</label>
              <div class="input-group mb-3" style="width: 170px;">
              <button type="button" class="btn btn-dark quantity-change " data-action="decrease">
                <i class="bx bx-minus"></i>
              </button>
                <input id="quantity" name="quantity" type="number" class="form-control text-center border border-secondary "  aria-label="Example text with button addon" value="1" />
                <button type="button" class="btn btn-dark quantity-change " data-action="increase">
                <i class="bx bx-plus"></i>
                </button>
              </div>
            </div>
          </div>
          @include('sweetalert::alert')
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="book_id[]" value="{{ $book->id }}">
    
            <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
        </div>
        
      </main>
      
    </div>
    
  </div>
  