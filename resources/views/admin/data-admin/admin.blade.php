@extends('admin.layouts.app')
@section('title', 'Admin')
@section('content')
<div class="mx-4">
					<h1>Admin</h1>
         
				{{ Breadcrumbs::render('admin')}}
        </div>
            <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#modalForm" 
        data-entity="admin" data-action="add">
                     Add Admin
                        </button>
                    <x-modal modalType="admin"></x-modal> 

                    <div class="  mb-5 d-flex justify-content-between w-100">
					<form method="GET" action="{{route('admin.index')}}" class="d-flex w-75">
				<i class="bx bx-search mt-3"></i>
				<input type="text" class="search form-control" placeholder="Search Admin..." name="query" value="{{ request('query')}}">
				</form>

                <label for="filter-latest" class="filter-admin">Urutkan</label>
                <form action="{{ route('admin.index') }}" method="GET">
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
                                
                            @foreach ($admin as $user)
                          <td>{{ $user->id}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email}}</td>
                                    <td class="fw-bold text-danger">{{ $user->role_label}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.destroy',$user->id)}}" method="POST">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm" 
                                                    data-entity="admin" data-action="edit" data-id="{{$user->id}}">
                                                    <i class='bx bxs-edit'></i>
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </td>
                                
                            </tbody>
                            @endforeach
                          </table>  
                          @include('sweetalert::alert')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection