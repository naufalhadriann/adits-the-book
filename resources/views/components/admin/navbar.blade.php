
<nav class="navbar">
	@auth
			<i class='bx bx-menu' ></i>
			<p>Halo, {{Auth::user()->name}}</p>
				<a href="{{route('profile.edit')}}" class="profile" >
					<img src="{{asset('storage/'. Auth::user()->profile_image)}}">
				</a>
				@endauth
		</nav>