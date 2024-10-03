         <form action="{{ route('history', ['sort'=>$sort, 'date'=>$date])}}" >
                <select class="form-select rounded-3 " name="sort" onchange="this.form.submit()">
                <option value="" >Sesuai</option>
                <option value="1" {{ request('sort') == '1' ? 'selected' : '' }}>Terbaru</option>
                <option value="2" {{ request('sort') == '2' ? 'selected' : ''}}>Terlama</option>
                <option value="3" {{ request('sort') == '3' ? 'selected' : ''}}>Harga Tertinggi</option>
                <option value="4" {{ request('sort') == '4' ? 'selected' : ''}}>Harga Terendah</option>
               
                </select>
         </form>
