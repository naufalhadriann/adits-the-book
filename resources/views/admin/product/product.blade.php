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
            <button type="button " class="btn btn-primary ms-5 mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#modalForm"  data-entity="book" data-action="add">
                     Add Book
                        </button>
						<x-modal modalType="book" />

                    <div class="card-header ms-5 text-center">
                        <h2>List of Book</h2>
                        </div>
                        <div class="row ms-4 ">
                        @include('admin.product.book')
                      
                    </div>
    </div>




  


          
@endsection

