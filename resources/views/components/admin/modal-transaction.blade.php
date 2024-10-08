
<div class="modal fade" id="modalTransaction" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body ">
                <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                
                <div class="px-4 py-5">

                    <h5 class="text-uppercase" id="order-name">{{$transaction['order']->user->name}}</h5>

                <h4 class="mt-5 theme-color mb-5">Thanks for your order</h4>

                <span class="theme-color">Payment Summary</span>
                <div class="mb-3">
                    <hr class="new1">
                </div>
                
                <div class="d-flex justify-content-between">
                    <span class="font-weight-bold" id="book-title">Cerita Laut</span>
                    <br>
                    <span class="text-muted d-flex justify-content-between">123</span>
                </div>
               <span class="font-weight-bold" id="book-price">Rp 120.000 x <span id="book-quantity">1 </span></span>
    <hr>

    <div class="d-flex justify-content-between">
                    <small>Total harga (2 buku )</small>
                    <small>Rp 120.000</small>
                </div>
                
                <div class="d-flex justify-content-between">
                    <small>Discount</small>
                    <small>Rp 120.000</small>
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