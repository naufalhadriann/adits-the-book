@extends('admin.layouts.app')
@section('title','Dashboard')



@section('content')
<div class="head-title">
	<div class="greetings">
				<h1>Welcome <span>{{Auth::user()->name}}</span> </h1>
				<p>Semoga Kabarmu baik baik saja </p>
			</div>

			</div>
			
		

			<ul class="box-info">
				<li>
				<i class='bx bxs-book'></i>
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
						<h3>0</h3>
						<p> Transaksi</p>
					</span>
				</li>

				<li>
				<i class='bx bxs-category'></i>
					<span class="text">
						<h3>{{ $totalCategory}}</h3>
						<p>Genre</p>
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