
<div class="modal fade" id="modalTransaction{{$transaction->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body ">
                <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                
                <div class="px-4 py-5">

                    <h5 class="text-uppercase" id="order-name">{{$transaction['order']->user->name}}</h5>

                <h4 class="mt-5 theme-color mb-5">Transaction ID : {{$transaction->id}}</h4>

                <span class="theme-color">Payment Summary</span>
                <div class="mb-3">
                    <hr class="new1">
                </div>
                @foreach ($transaction['order']->orderItems as $item )
                @php
                $book = App\Models\Book::find($item->book_id);            
                $orderId = $transaction['order']->id; 
                $totalBuku = App\Models\Order::find($orderId)->orderItems->count();

                @endphp
                
              
                <div class="mb-3 ">
                    <span class="font-weight-bold" id="book-title"> {{$book->title}}</span>
                    <br>
              
              
                    <span class="font-weight-bold mb-5" id="book-price">Rp {{number_format($book->price ,0,',','.')}} x <span id="book-quantity">{{$item->quantity}} </span></span>
                    </div>
               @endforeach
    <hr>

    <div class="d-flex justify-content-between">
                    <small>Total harga ({{$totalBuku}} buku )</small>
                    <small>Rp {{number_format($transaction['order']->total_amount,0,',','.')}}</small>
                </div>
                
                <div class="d-flex justify-content-between">
                    <small>Discount</small>
                    <small>Rp 120.000</small>
                </div>
                <div class="d-flex justify-content-between">
                    <small>Pembayaran</small>
                    <small>{{$transaction->payment_method}}</small>
                </div>

               

              
                
                <div class="d-flex justify-content-between mt-3">
                    <span class="font-weight-bold">Total</span>
                    <span class="font-weight-bold theme-color">Rp  {{number_format($transaction->amount,0 ,'','.')}}</span>
                </div>  



                <div class="text-center mt-5">


                    <button class="btn btn-primary">Track your order</button>
                    


                </div>                   

                </div>


            </div>
        </div>
    </div>
</div>