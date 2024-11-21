@extends('admin.layouts.app')

@section('title' ,'Transaksi')

@section('content')
<div class="mx-5">
					<h1>Transaksi</h1>
         
				{{ Breadcrumbs::render('transaction')}}
        </div>

        
            <div class="container">
           
			<div class="row">
			<div class="col-md-12">
			<div class="card border-0 shadow-sm rounded">
                    <div class="card-body">

                    <div class="mb-4 mt-2 d-flex justify-content-between w-100">
    <form method="GET" action="{{ route('transaction.index') }}" class="d-flex w-75">
        <i class="bx bx-search mt-3"></i>
        <input type="text" class="search form-control" placeholder="Cari Transaksi..." name="query" value="{{ request('query') }}">
    </form>

    <form action="{{ route('book.index') }}" method="GET">
    <select id="filter-latest" class="form-select border-black" name="sort" onchange="this.form.submit()" style="border: 1px solid black;"> 
            <option value="0">Sesuai</option>
            <option value="1" {{ request('sort') == '1' ? 'selected' : '' }}>Harga Terendah</option>
            <option value="2" {{ request('sort') == '2' ? 'selected' : '' }}>Harga Tertinggi</option>
            <option value="3" {{ request('sort') == '3' ? 'selected' : '' }}>Terbaru</option>
            <option value="4" {{ request('sort') == '4' ? 'selected' : '' }}>Terlama</option>
            <option value="5" {{ request('sort') == '5' ? 'selected' : '' }}>Stok Tersedia</option>
            <option value="6" {{ request('sort') == '6' ? 'selected' : '' }}>Stok Kosong</option>
            <option value="7" {{ request('sort') == '7' ? 'selected' : '' }}>Buku Diskon</option>
        </select>
    </form>
</div>

        
                        <table class="table  text-center">
                            <thead>
                           
                                
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User</th>
                                <th scope="col">Pay Date</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                           
                           
                          
                            <tbody>
                                @foreach ($transactions as $transaction )
                <td>{{$transaction->id}}</td>
                <td>{{$transaction['order']->user->name}}</td>
								<td>{{$transaction->created_at->format('d F Y H:i')}}</td>
								<td>{{$transaction->payment_method}}</td>
                <td>Rp {{number_format($transaction->amount,0 ,'','.')}}</td>
								<td class="text-center">    
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                                            <button type="button" class="btn btn-sm btn-dark"  data-bs-toggle="modal" data-bs-target="#modalTransaction{{$transaction->id}}" ><i class='bx bxs-show'></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </td>
                                   
                                  @include('sweetalert::alert')
                                  @include('components.admin.modal-transaction')

								</tbody>
                @endforeach
              
								</table>
                                
			</div>
			</div>
		</div>
 
@endsection

