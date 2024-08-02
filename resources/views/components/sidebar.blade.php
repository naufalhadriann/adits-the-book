<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 " style="background-color:black;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <p class="fs-5 d-none d-sm-inline">NAF.ARTICLE</p>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                       <x-nav-link href="#" :active="request()->is('/dashboard')">
                       <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                       </x-nav-link>
                           
                    </li>
                    <li>
                      <x-nav-link href="#" :active="request()->is('')">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Notification</span>
                            </x-nav-link>
                    </li>
                    <li>
                    <x-nav-link href="#" :active="request()->is('/')">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Article</span>
                            </x-nav-link>
                    </li>
                    <li>
                    <x-nav-link href="#" :active="request()->is('category')">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Category</span>
                            </x-nav-link>
                        
                    </li>
                    <li>
                    <x-nav-link href="#" :active="request()->is('user')">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">User</span>
                            </x-nav-link>
                    </li>
                    <li>
                    <x-nav-link href="#" :active="request()->is('roles')">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Roles</span>
                            </x-nav-link>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">User</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-5">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                      @csrf
                     
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();this.closest('form').submit();">
                      Log Out</a></form></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            Content area...
        </div>
    </div>
</div>