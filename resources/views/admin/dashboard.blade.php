@extends('admin.layouts.app')
@section('title','Dashboard')



@section('content')
<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<p class="active" href="#">Dashboard</p>
						</li>
					</ul>
				</div>
			</div>



			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{ $totalBook}}</h3>
						<p>Book</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-user' ></i>
					<span class="text">
						<h3>{{ $totalUser}}</h3>
						<p>User</p>
					</span>
				</li>
				
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>

				<li>
				<i class='bx bxs-category'></i>
					<span class="text">
						<h3>{{ $totalCategory}}</h3>
						<p>Category</p>
					</span>
				</li>

				<li>
				<i class='bx bxs-group'></i>
					<span class="text">
						<h3>{{ $totalAdmin }}</h3>
						<p>Admin</p>
					</span>
				</li>

			</ul>
           
				</div>
			</div>
@endsection