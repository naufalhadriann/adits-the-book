@extends('admin.layouts.app')

@section('title' ,'Transaksi')

@section('content')
<div class="mx-5">
					<h1>Transaction</h1>
         
				{{ Breadcrumbs::render('transaction')}}
        </div>

            <div class="container">
			<div class="row">
			<div class="col-md-12">
			<div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                       
                        <table class="table  text-center">
                            <thead>
                           
                                
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User</th>
                                <th scope="col">Pay Date</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                           
                           
                          
                            <tbody>
                                @foreach ($transactions as $transaction )
                <td>{{$transaction->id}}</td>
                <td>{{$transaction['order']->user->name}}</td>
								<td>{{$transaction->created_at->format('d F Y H:i')}}</td>
								<td>{{$transaction->payment_method}}</td>
                <td>Rp {{number_format($transaction->amount,0 ,'','.')}}</td>
								<td class="text-center">    
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                                            <button type="button" class="btn btn-sm btn-dark"  data-bs-toggle="modal" data-bs-target="#modalTransaction{{$transaction->id}}" ><i class='bx bxs-show'></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </td>
                                   
                                  @include('sweetalert::alert')
                                  @include('components.admin.modal-transaction')

								</tbody>
                @endforeach
              
								</table>
                                
			</div>
			</div>
		</div>
 
@endsection

