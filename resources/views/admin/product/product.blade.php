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
						<div class="d-flex  ms-5 justify-content-between align-items-center">

				<span class="font-weight-bold fs-3">List of Book</span>
				</div>

				<div class="mt-3 ms-5 inputs">
					<form method="GET" action="{{route('book.index')}}">
				<i class="bx bx-search"></i>
				<input type="text" class="search " placeholder="Search Book..." name="query" value="{{ request('query')}}">
				</form>

				</div>
			

                        <div class="row ms-4 ">
                        @include('components.admin.book')
					{{$books->links('pagination::bootstrap-5')}}
						@include('sweetalert::alert')
						
                    </div>
    </div>




  


          
@endsection

