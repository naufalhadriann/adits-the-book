<div class="modal fade" id="modalTransaction{{$orderss->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        @php
            $discount = 0;
            $totalBuku = $order->orderItems->count();
            $order->load('orderItems.book');
            $totalPriceBeforeDiscount = 0;
            $bookDiscount = false;
            $address = implode(', ', [
                $order->address->street, 
                $order->address->kota, 
                $order->address->postal_code, 
                $order->address->provinsi, 
                $order->address->negara
            ]);
        @endphp
        <div class="modal-content">
            <div class="modal-body p-4 rounded-5" style="background-color: #f9f9f9;">
                <h5 class="text-center font-weight-bold mb-4">Detail Pesanan</h5>
                
                <strong >Status<p class="text-success "> Transaksi Berhasil</p></strong>

                <div class="mb-3">
                    <strong>Tanggal Transaksi</strong> <p class="">{{$order->created_at->format('d F Y H:i')}} WIB</p>
                </div>

                <hr>

                <p class="fw-bold mb-3">Detail Penerima</p>
                <div class="mb-2">
                    <strong>Nama:</strong> <span>{{$order->address->name}}</span>
                </div>
                <div class="mb-2">
                    <strong>Alamat:</strong> <span>{{$address}}</span>
                </div>

                <hr>

                <p class="fw-bold mb-3">Detail Pembelian</p>
                @foreach($order->orderItems as $item)
                    @php
                        $book = $item->book; 
                        $price = $book->hasDiscount() ? $book->discountedPrice : $book->price;
                        $totalPriceBeforeDiscount += $book->price * $item->quantity; 
                        
                        if ($book->hasDiscount()) {
                            $discount += ($book->price - $book->discountedPrice) * $item->quantity;
                            $bookDiscount = true;
                        }
                    @endphp
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">{{$book->title}}</span>
                            <span class="text-success">Rp {{number_format($price * $item->quantity, 0, ',', '.')}}</span>
                        </div>
                        <span>Rp {{number_format($price, 0, ',', '.')}} x {{$item->quantity}}</span>
                    </div>
                @endforeach

                <hr>

                <p class="fw-bold">Informasi Pembayaran</p>
                <div class="d-flex justify-content-between">
                    <small>Methode Pembayaran</small>
                    <small>{{$order->payment_method}}</small>
                </div>
                <div class="d-flex justify-content-between">
                    <small>Total Harga ({{$totalBuku}} Buku)</small>
                    <small>Rp {{number_format($totalPriceBeforeDiscount, 0, ',', '.')}}</small>
                </div>
                @if($bookDiscount)
                    <div class="d-flex justify-content-between text-danger">
                        <small>Diskon</small>
                        <small>-Rp {{number_format($discount, 0, ',', '.')}}</small>
                    </div>
                    <div class="d-flex justify-content-between fw-bold">
                        <small>Total</small>
                        <small>Rp {{number_format($order->total_amount, 0, ',', '.')}}</small>
                    </div>
                @endif

                <div class="mt-4 text-center">
                    <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Tutup</button>
                </div>
                
                <div class="mt-3 text-center text-muted">
                    <small>Enjoy Reading!</small>
                </div>
            </div>
        </div>
    </div>
</div>
