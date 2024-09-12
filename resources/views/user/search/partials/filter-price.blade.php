<form method="POST" action="{{route('search', ['query' => $query , 'min_price'=>$minPrice, 'max_price'=>$maxPrice , 'category'=>$category])}}">
  @csrf
  <h3>Price</h3>
  
 
  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span class="input-group-text ">Rp</span> 
    </div>
    <input type="number" class="form-control" name="min_price" placeholder="Min Price" min="0" step="1" aria-label="Min Price">
  </div>

  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Rp</span> 
    </div>
    <input type="number" class="form-control" name="max_price" placeholder="Max Price" min="0" step="1" aria-label="Max Price">
  </div>

  <button type="submit" class="btn btn-primary mt-2" hidden>Apply Filter</button>
</form>
