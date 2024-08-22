@php
     $uniqueCategorys = $categorys->unique('name');
     $uniqueCart = $cart->pluck('book_id')->unique('user_id')->count();
@endphp
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="logo">
        <a href="/"><img src="{{asset('images/logo2.png')}}">Adit's the Book</a>
    </div> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
        <div class="container">
            <div class="row w-100 align-items-center">
                <div class="col-lg-3">
                    
                <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($uniqueCategorys as $category)
                <div class="dropdown-submenu">
                    <a class="dropdown-item" href="#">
                        {{$category->name}}
                    </a>
                    <div class="dropdown-menu">
                        @foreach ($categorys as $subCategory) 
                            <a class="dropdown-item" href="#">
                                {{$subCategory->genre}}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </li>
</ul>

                </div>
                <div class="col-lg-6 ">
                  <div class="inputs">
                    <form class="form-inline my-2 my-lg-0">
                        <i class="bx bx-search"></i>
                        <input type="text" class="search form-control mr-sm-2" placeholder="Search Book...." aria-label="Search">
                    </form>
                    </div>
                </div>
                <div class="col-lg-3 d-flex justify-content-end align-items-center"> 
                <div class="icon-container">
                        <a href="/cart" class="icon"><i class="bx bx-cart"></i><span class="badge ">{{$totalBooks}} </span></a>
                    </div>
                    @if(Auth::check())
                    <div class="profile">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('user.edit')}}">Profile</a>
                            <a class="dropdown-item" href="/history">History</a>
                            @if(Auth::user()->role_label=="Admin")
                            <a class="dropdown-item" href="/dashboard">Dashboard Admin</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                              @csrf 
                         
                          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
                          </a>
                          </form>
                          @else
                          <div class="nav-item mx-5">
                    <a class="nav-link active mx-5 "  href="{{ route('login')}}">Login</a>
                  </d>
                  @endif
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
