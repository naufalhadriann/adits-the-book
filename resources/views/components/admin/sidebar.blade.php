
<section id="sidebar">
        
		<a href="#" class="brand">
		<img src="{{asset('images/logo1.png')}}">
			<span class="text">Adit's The Book</span>
		</a>
		<ul class="side-menu top">
			
		<li class="{{ request()->is('dashboard') ? 'active' : '' }}"> 
				<a href="/dashboard" >
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

			<li class="{{ request()->is('product') ? 'active' : '' }}"> 
				<a href="/product" >
				<i class='bx bxs-layout'></i>
					<span class="text">Product</span>
				</a>
		</li>

		<li class="{{ request()->is('category') ? 'active' : '' }}">
			<a href="/category">
			<i class='bx bxs-category-alt' ></i>
			<span class="text">Category</span>
			</a>
		</li>
			
			<li class="{{ request()->is('transaction') ? 'active' : '' }}">
				<a href="/transaction">
					<i class='bx bxs-wallet'></i>
					<span class="text">Transaction</span>
				</a>
			</li>

			<li class="{{ request()->is('user') ? 'active' : '' }}">
				<a href="/user">
					<i class='bx bxs-user'></i>
					<span class="text">User</span>
				</a>
			</li>

			<li class="{{ request()->is('admin') ? 'active' : '' }}">
				<a href="/admin">
					<i class='bx bxs-group' ></i>
					<span class="text">Admin</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
			<form id="logout-form" method="POST" action="{{ route('logout')}}">
			@csrf
				<a href="{{ route('logout')}}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class='bx bx-log-out'></i>
					<span class="text">Log out</span>
				</a></form>
               
			</li>
		</ul>
	</section>