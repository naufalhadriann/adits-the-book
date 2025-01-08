@php
$groupedCategories = $categorys->groupBy('name');
$uniqueCategorys = $categorys->unique('name');
$uniqueCart = $cart->pluck('book_id')->unique('user_id')->count();
@endphp

<!-- Navbar atas -->
<nav id="navbar-home-top" class="navbar navbar-expand-lg navbar-light fixed-top">
<div class="container">
        <!-- Logo -->
        <div class="logo">
            <a href="/"><img src="{{asset('images/logo2.png')}}">Adit's the Book</a>
        </div> 
        <!-- Navbar Links -->
            <ul class="navbar-nav ml-auto">
            
                <!-- Menu Item: Kategori -->
                <li class="nav-item menu-item my-2">
                    <a href="#" class="menu-link" id="toggle-menu">Kategori</a>
                    <div class="sub-menu" id="sub-menu">
                        <div class="sub-menu-header">
                            <form action="{{route('search')}}" method="GET">
                                <ul>
                                    @foreach ($uniqueCategorys as $item)
                                    <li class="category" data-category-id="{{ $item->id }}">
                                        <a href="{{route('search', ['category'=>$item->name])}}" class="category-link">{{ $item->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </form>
                        </div>
                        <div class="sub-menu-item">
                            @foreach ($uniqueCategorys as $item)
                            <div class="category-genres" id="category-genres-{{ $item->id }}" style="display: none;">
                                @foreach ($categorys->where('name', $item->name) as $genre)
                                <a href="{{route('search', ['category'=>$genre->genre])}}">{{ $genre->genre }}</a>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </li>

                <!-- Search Bar -->
                <li class="nav-item  ">
                    <div class="inputs">
                        <form class="form-inline   my-lg-0" action="{{route('search')}}" method="GET">
                            <i class="bx bx-search"></i>
                            <input type="text" class="search form-control " placeholder="Search Book...." aria-label="Search" name="query" value="{{ request('query')}}">
                        </form>
                    </div>
                </li>

                <!-- Cart -->
                <li class="nav-item">
                    <div class="icon-container">
                        <a href="/cart" class="icon"><i class="bx bx-cart"></i><span class="badge">{{$totalBooks}}</span></a>
                    </div>
                </li>

                <!-- Profile Dropdown -->
                @if(Auth::check())
                <li class="nav-item profile">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span>{{Auth::user()->name}}</span>
                        <img src="{{asset('storage/'. Auth::user()->profile_image)}}">
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('user.edit')}}">Profile</a>
                        <a class="dropdown-item" href="{{route('history')}}">Pembelian</a>

                        @if(Auth::user()->role_label == "Admin")
                        <a class="dropdown-item" href="/dashboard">Dashboard Admin</a>
                        @endif

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf 
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </form>
                    </div>
                </li>
                @else
                <div class="nav-item auth">
                    <a class="nav-link active" href="{{ route('login')}}">Login</a>
                    <a class="nav-link active mx-5 text-danger" href="{{ route('register')}}">Register</a>
                </div>
                </div>
                @endif
            </ul>

</div>
    
</nav>

<!-- Navbar bawah -->
<nav id="navbar-home-bottom" class="navbar navbar-light fixed-bottom">
    <div class="container">
        <ul class="navbar-nav w-100 d-flex justify-content-around">
            <li class="nav-item-bottom">
                <a href="/" class="nav-link"><img src="{{asset('images/logo2.png')}}"><span>Home</span> </a>
            </li>
            <li class="nav-item-bottom">
                <a href="#" class="nav-link"><i class='bx bx-category'></i>Kategori</a>
            </li>
            <li class="nav-item-bottom">
                <a href="{{ route('user.edit') }}" class="nav-link"><i class='bx bx-user'></i>Profile</a>
            </li>
            <li class="nav-item-bottom">
                <a href="{{ route('history') }}" class="nav-link"><i class='bx bx-shopping-bag '></i>Pesanan</a>
            </li>
        </ul>
    </div>
</nav>


<!--Navbar detail  -->
<nav id="navbar-detail-top" class="navbar  fixed-top">
  <div class="container">
    <ul class="navbar-nav w-100 d-flex justify-content-between">
      <li class="nav-item nav-detail">
        <a href="/" class="detail-back "> <i class='bx bx-arrow-back'></i> </a>
      </li>
      <li class="nav-item nav-detail">
        <div class="icon-container">
          <a href="/cart" class="icon"><i class="bx bx-cart"></i><span class="badge">{{$totalBooks}}</span></a>
        </div>
      </li>
    </ul>
  </div>
</nav>






