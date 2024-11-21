@extends('admin.layouts.app')

@section('title','Category')

@section('content')
			<div class="mx-5">
					<h1>Category</h1>
         
				{{ Breadcrumbs::render('categoryy')}}
        </div>
	
            <div class="container">
			<div class="row">
			<div class="col-md-12">
			<div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#modalForm" 
        data-entity="category" data-action="add">
                     Add Category
                        </button>
                        <x-modal modalType="category"></x-modal>
                        <div class="mb-4 mt-2 d-flex justify-content-between w-100">

					<form method="GET" action="{{route('category.index')}}" class="d-flex w-75">
				<i class="bx bx-search mt-3"></i>
				<input type="text" class="search form-control " placeholder="Cari Category..." name="query" value="{{ request('query')}}">
				</form>

        <label for="filter-latest" class="filter-admin">Urutkan</label>
        <form action="{{ route('category.index') }}" method="GET">
    <select id="filter-latest" class="form-select border-black" name="sort" onchange="this.form.submit()" style="border: 1px solid black;"> 
            <option value="0">Sesuai</option>
            <option value="1" {{ request('sort') == '1' ? 'selected' : '' }}>Terbaru</option>
            <option value="2" {{ request('sort') == '2' ? 'selected' : '' }}>Terlama</option>
        </select>
    </form>
				</div>
                   
                        <table class="table table-responsive  text-center">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            @foreach ( $categorys as $category )
                            <tbody>
                                
								<td>{{ $category->id}}</td>
								<td>{{ $category->name}}</td>
								<td>{{ $category->genre}}</td>
								<td class="text-center">    
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('category.destroy',$category->id)}}" method="POST">
                                            <button type="button" class="btn btn-primary btn-sm  edit-btn" data-bs-toggle="modal" data-bs-target="#modalForm" 
                                            data-entity="category" data-action="edit" data-id="{{$category->id}}">
                                            <i class='bx bxs-edit'></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </td>
                                    @endforeach
								</tbody>
								</table>
                {{ $categorys->links('pagination::bootstrap-5') }}
                @include('sweetalert::alert') 
			</div>
			</div>
		</div>
 
@endsection