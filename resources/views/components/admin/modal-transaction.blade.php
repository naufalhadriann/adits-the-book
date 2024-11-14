@foreach ($transactions as $transaction)
    <div class="modal fade" id="modalTransaction{{$transaction->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-4 rounded-5" style="background-color: #f9f9f9;">
                    <h5 class="text-center font-weight-bold mb-4">Detail Transaksi</h5>

                    <strong>Status</strong>
                    <p class="text-success">Transaksi Berhasil</p>

                    <div class="mb-3">
                        <strong>Tanggal Transaksi</strong>
                        <p>{{$transaction->created_at->format('d F Y H:i')}} WIB</p>
                    </div>

                    <hr>

                    <p class="fw-bold mb-3">Detail Pembelian</p>

                    @php
                        $totalBook = 0;
                        $totalPriceBeforeDiscount = 0;
                        $totalDiscount = 0;
                        $bookDiscount = false;
                    @endphp

                    @foreach ($transaction->order->orderItems as $item)
                        @php
                            $book = $item->book;
                            $totalBook += $item->quantity;
                            $totalPriceBeforeDiscount += $item->quantity * $book->price;

                            if ($book->hasDiscount()) {
                                $discount = ($book->price - $book->discountedPrice) * $item->quantity;
                                $totalDiscount += $discount;
                                $bookDiscount = true;
                            }
                        @endphp

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="font-weight-bold">{{$book->title}}</span>
                                <span class="text-success">Rp {{number_format($item->quantity * $book->price, 0, ',', '.')}}</span>
                            </div>
                            <span>Rp {{number_format($book->price, 0, ',', '.')}} x {{$item->quantity}}</span>
                        </div>
                    @endforeach

                    <hr>

                    <p class="fw-bold">Informasi Pembayaran</p>
                    <div class="d-flex justify-content-between">
                        <small>Methode Pembayaran</small>
                        <small>{{$transaction->payment_method}}</small>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small>Total Harga ({{$totalBook}} Buku)</small>
                        <small>Rp  {{number_format($totalPriceBeforeDiscount, 0, ',', '.')}}</small>
                    </div>

                    @if ($bookDiscount)
                        <div class="d-flex justify-content-between text-danger">
                            <small>Diskon</small>
                            <small>-Rp {{number_format($totalDiscount, 0, ',', '.')}}</small>
                        </div>
                        <div class="d-flex justify-content-between fw-bold">
                            <small>Total</small>
                            <small>Rp {{number_format($transaction->amount, 0, ',', '.')}}</small>
                        </div>
                    @endif

                    <div class="mt-4 text-center">
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-dismiss="modal">Tutup</button>
                    </div>

                    <div class="mt-3 text-center text-muted">
                        <small>Enjoy Reading!</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
