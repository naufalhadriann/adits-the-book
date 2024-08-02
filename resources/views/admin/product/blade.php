@extends('admin.layouts.app')
@section('title', 'Product')


@section('content')

<div class="head-title">
				<div class="left">
					<h1>Product</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<p class="active" href="#">Product</p>
						</li>
					</ul>
				</div>
			</div>

		<div class="container">
			<div class="row">
			<div class="col-md-12">
			<div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    <button type="button " class="btn btn-primary mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#modalForm"  data-entity="book" data-action="add">
                     Add Book
                        </button>
				
					@include('components.modal')
						
             
                    
                        <table class="table table-responsive text-center ">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
								<th scope="col">Penerbit</th>
								<th scope="col">Price</th>
								<th scope="col">Stock</th>
								<th scope="col">Category</th>
								<th scope="col">Action</th>
                              </tr>
                            </thead>
							@foreach ( $books as $book )
							
							
                            <tbody>
								<td> {{$book->id}} </td>
								<td> {{ $book->title}} </td>
								<td> {{ $book->author}} </td>
								<td> {{ $book->penerbit}} </td>
								<td> {{ $book->price}} </td>
								<td> {{ $book->stock}} </td>
								<td> {{ $book->category->genre}} </td>
								<td class="text-center">    
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                                            <button href="#" class="btn btn-sm btn-dark"><i class='bx bxs-show'></i></button>
                                            <button type="button" class="btn btn-primary btn-sm  edit-btn" data-bs-toggle="modal" data-bs-target="#modalForm" 
											data-entity="book" data-action="edit" data-id="{{ $book->id }}">
                                            <i class='bx bxs-edit'></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </td>
								</tbody>
								@endforeach
								</table>
			</div>
			</div>
		</div>
 



  


          
@endsection

