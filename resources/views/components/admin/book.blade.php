@foreach ($books as $book )
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
      
      <div class="card">
  <img src="{{ asset('storage/' . $book->image)}}" class="card-img-top" alt="">
  <div class="card-body">
    <h6 class="card-author mb-2 text-muted fs-5">{{$book->author}}</h6>
    <h5 class="card-title mb-5">{{ $book->title}}</h5>
        
    <div class="d-flex justify-content-between ">
                <span >Price </span>
                <span>Stock </span>
            </div>
        <div class="d-flex justify-content-between mb-4">
        <span>Rp. {{ number_format($book->price, 0, ',', '.') }}</span>
        <span class="mx-3">{{$book->stock}}</span>
        </div>
           
    <div class="d-flex justify-content-between mt-2">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalForm" 
                            data-entity="book" data-action="edit" data-id="{{ $book->id }}">
                            <i class='bx bxs-edit'></i> 
                        </button>
                        <form action="{{route('product.destroy',$book->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class='bx bxs-trash'></i> 
                            </button>
                        </form>
                    </div>

  </div>
  </div>
</div>
@endforeach

 
