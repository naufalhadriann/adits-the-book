@extends('admin.layouts.app')

@section('title' ,'Transaksi')

@section('content')
<div class="head-title">
				<div class="left">
					<h1>Transaction</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<p class="active" href="#">Transaction</p>
						</li>
					</ul>
				</div>
			</div>

            <div class="container">
			<div class="row">
			<div class="col-md-12">
			<div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                         <x-modal-transaction></x-modal-transaction>
                        <table class="table  text-center">
                            <thead>
                           
                                
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User</th>
                                <th scope="col">Book</th>
                                <th scope="col">Status</th>
                                <th scope="col">Pay Date</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                           
                           
                          
                            <tbody>
                                
								<td></td>
                                <td></td>
                                <td></td>
								<td></td>
								<td></td>
								<td class="text-center">    
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                                            <button type="button" class="btn btn-sm btn-dark"  data-bs-toggle="modal" data-bs-target="#modalTransaction"><i class='bx bxs-show'></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </td>
                                    <div class="alert alert-danger">
                                      Data Transaction belum Tersedia.
                                  </div>
								</tbody>
              
								</table>
                                
			</div>
			</div>
		</div>
 
@endsection

