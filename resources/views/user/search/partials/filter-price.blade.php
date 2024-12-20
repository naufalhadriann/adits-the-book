<form method="POST" action="{{ route('search', ['query' => $query, 'min_price' => $minPrice, 'max_price' => $maxPrice, 'category' => $category]) }}">
  @csrf
  <h3>Price</h3>

  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <span class="input-group-text">Rp</span>
    </div>
    <input type="number" class="form-control" name="min_price" placeholder="Min Price" value="{{ old('min_price', $minPrice ? number_format($minPrice ,0, ',','.') : '') }}" aria-label="Min Price">  </div>

  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Rp</span>
    </div>
    <input type="number" class="form-control" name="max_price" placeholder="Max Price"  step="1" value="{{ old( 'max_price', $maxPrice  ? number_format($maxPrice, 0, ',','.') : '' ) }}" aria-label="Max Price">
  </div>

  <button type="submit" class="btn btn-primary mt-2" hidden>Apply Filter</button>
</form>
