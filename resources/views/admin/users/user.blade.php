@extends('admin.layouts.app')
@section('title', 'User')


@section('content')

<div class="mx-5">
					<h1>User</h1>
         
				{{ Breadcrumbs::render('user')}}
        </div>

            <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#modalForm" 
        data-entity="user" data-action="add">
        <i class='bx bx-user-plus'></i>  Add User
                        </button>
                        <x-modal modalType="user"></x-modal>

                        <div class="mb-4 mt-2 d-flex justify-content-between w-100">
    <form method="GET" action="{{ route('user.index') }}" class="d-flex w-75">
        <i class="bx bx-search mt-3"></i>
        <input type="text" class="search form-control" placeholder="Cari Transaksi..." name="query" value="{{ request('query') }}">
    </form>

    <label for="filter-latest" class="filter-admin">Urutkan</label>
    <form action="{{ route('user.index') }}" method="GET">
    <select id="filter-latest" class="form-select border-black" name="sort" onchange="this.form.submit()" style="border: 1px solid black;"> 
            <option value="0">Sesuai</option>
            <option value="1" {{ request('sort') == '1' ? 'selected' : '' }}>Terbaru</option>
            <option value="2" {{ request('sort') == '2' ? 'selected' : '' }}>Terlama</option>
            
        </select>
    </form>
</div>
                        <table class="table table-responsive text-center">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                          @forelse ($users as $user )
                          
                         <tr >
                          <td>{{ $user->id }}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td class="{{ $user ->role == 1 ? " fw-bold text-danger" : "fw-bold text-success" }}">{{ $user->role_label}}</td>
                                    <td class="text-center">    
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('user.destroy',$user->id)}}" method="POST">
                                        
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm" 
                                                    data-entity="user" data-action="edit" data-id="{{$user->id}}">
                                                    <i class='bx bxs-edit'></i>
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </td>
                                </tr>
                         

                                @empty
                                  <div class="alert alert-danger">
                                      Data User belum Tersedia.
                                  </div>
                     
                                  
                            </tbody>
                            @endforelse
                          </table> 
                        
                          {{ $users->links('pagination::bootstrap-5') }}

                          
                          @include('sweetalert::alert')
                    </div>
               
                </div>
            </div>
        </div>
    </div>
    
          
@endsection


