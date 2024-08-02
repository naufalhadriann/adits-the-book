<nav class="navbar navbar-expand-lg   fixed-top">
        <div class="container">
            <!-- logo -->
          <a class="logo navbar-brand mx-5" href="#" >Adit's The Book</a>
          <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- sidebar -->
          <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header border-bottom">
              <h5 class="logo navbar-title" id="offcanvasNavbarLabel"></h5>
              <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav pe-3 justify-content-end">
              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"></a></li>
            <li><a class="dropdown-item" href="#"></a></li>
            <li><a class="dropdown-item" href="#"></a></li>
          </ul>
        </li>
        <form class="d-flex ms-5" role="search">
      <input class="search" type="search" placeholder="Cari Produk" aria-label="Search">
    </form>

             <li class="nav-item dropdown mx-5  ">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color:black; font-weight:bold;">
                  {{Auth::user()->name}}
                  
                  </a>
                  <ul class="dropdown-menu ">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                      Profile
                    </a></li>
                    <li>
                      @if(Auth::user()->role_label == "Admin")
                    <li><a class="dropdown-item" href="/dashboard">Dashboard Admin</a></li>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="dropdown-item" href="#"
                      onclick="event.preventDefault();this.closest('form').submit();">
                      Log Out</a> </form></li>

                  </ul>
                </li>
             
              </ul>
            </div>
          </div>
        </div>
      </nav>