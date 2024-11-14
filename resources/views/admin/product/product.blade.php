@extends('admin.layouts.app')
@section('title', 'Product')


@section('content')

<div class="mx-5">
		<h1>Product</h1>		
{{ Breadcrumbs::render('product') }}
</div>

	
                    <div class="container">
            <button type="button " class="btn btn-primary ms-5 mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#modalForm"  data-entity="book" data-action="add">
                     Add Book
                        </button>
						<x-modal modalType="book" />
						<div class="d-flex  ms-5 align-items-center">

				<span class="font-weight-bold fs-3">List of Book</span>
				</div>

				
				<div class="mt-3 ms-5 inputs ">
    <form method="GET" action="{{route('book.index')}}" class="d-flex">
        <i class="bx bx-search"></i>
        <input type="text" class="search ms-2" placeholder="Search Book..." name="query" value="{{ request('query')}}">
    </form>
	</div>
	<div class="d-flex justify-content-end">
    <label for="filter-latest" class="fs-6 mx-2 mt-1">Urutkan</label>
    <form action="{{route('book.index')}}" method="GET">
        <select id="filter-latest" class="form-select" name="sort" onchange="this.form.submit()">
            <option value="0">Sesuai</option>
            <option value="1" {{request('sort') == '1' ? 'selected' : ''}} >Harga Terendah</option>
            <option value="2" {{request('sort') == '2' ? 'selected' : ''}} >Harga Tertinggi</option>
            <option value="3" {{request('sort') == '3' ? 'selected' : ''}} >Terbaru</option>
            <option value="4" {{request('sort') == '4' ? 'selected' : ''}} >Terlama</option>
            <option value="5" {{request('sort') == '5' ? 'selected' : ''}} >Stok Tersedia</option>
            <option value="6" {{request('sort') == '6' ? 'selected' : ''}} >Stok Kosong</option>
            <option value="7" {{request('sort') == '7' ? 'selected' : ''}} >Buku Diskon</option>
	
        </select>
    </form>
</div>
			

                        <div class="row ms-4 ">
                        @include('components.admin.book')
					{{$books->links('pagination::bootstrap-5')}}
						@include('sweetalert::alert')
						
                    </div>
    </div>




  


          
@endsection

