
<nav>
	@auth
			<i class='bx bx-menu' ></i>
			<p>Halo, {{Auth::user()->name}}</p>
				<a href="/profile" class="profile" >
					<img src="{{ Auth::user()->profile_image}}">
				</a>
				@endauth
		</nav>