    @foreach ($books as $book )
    
  
    <div class="col-sm-6 col-sms-6 col-md-3">
      <div class="card" style="width: 250px;">
  <img src="{{$book->image}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h6 class="card-author mb-2 text-muted " style="font-size:15px;">{{$book->author}}</h6>
    <h5 class="card-tittle" style="margin-bottom:40px;">{{ $book->title}}</h5>
        
    <h5>Rp. {{$book->price}}</h5>
    <button type="button" class="btn btn-primary btn-sm  edit-btn" data-bs-toggle="modal" data-bs-target="#modalForm" 
											data-entity="book" data-action="edit" data-id="{{ $book->id }}">
                                            <i class='bx bxs-edit'></i></button>

  </div>
  </div>
</div>
@endforeach

 
