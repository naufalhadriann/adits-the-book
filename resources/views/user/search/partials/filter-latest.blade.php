
    <label for="filter-latest">Urutkan</label>
    <form action="{{route('search' ,['query' => $query, 'sort'=>$sort ,'category'=>$category])}}" method="POST">
    @csrf
    <select id="filter-latest" class="form-select" name="sort" onchange="this.form.submit()">
        <option value="0">Sesuai</option>
        <option value="1" {{ request('sort') == '1' ? 'selected' : '' }}>Harga Terendah</option>
        <option value="2" {{ request('sort') == '2' ? 'selected' : '' }}>Harga Tertinggi</option>
        <option value="3" {{ request('sort') == '3' ? 'selected' : '' }}>Terbaru</option>
        <option value="4" {{ request('sort') == '4' ? 'selected' : '' }}>Terlama</option>
    </select>
</form>
