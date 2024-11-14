@extends('user.layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-md-12 py-5">
            <div class="payment-timer ms-5 text-center">
                <h5>Waktu untuk membayar: <span id="countdown" class="text-danger"></span></h5>
                <input type="hidden" id="order-date" value="{{$orders->first()->created_at}}">
                <input type="hidden" id="order-id" value="{{ $orders->first()->id }}">
            </div>

            <div class="card border-0 mt-4">
                <div class="card-body text-center">
                    <h4>Silakan Selesaikan Pembayaran Anda</h4>

                    <div class="card border-0">
                        <div class="card-body">

                            @php
                                $subtotal = 0;
                                $discount = 0;
                                $totalPriceBeforeDiscount = 0;
                                $bookDiscount = false;
                            @endphp
                                <p class="fs-5 fw-bold d-flex align-items-start ms-3">Order ID : {{$orders->first()->id}}</p>

                            @foreach ($orders as $order)
                                @foreach ($order->orderItems as $item)

                                    <div class="d-flex align-items-start">
                                        
                                        <figure class="itemside">
                                            <div class="aside">
                                                <img src="{{ asset('storage/' . $item->book->image) }}" class="img-sm rounded-2 fit" style="height: 100px;">
                                            </div>
                                            <figcaption class="info">
                                                <a href="#" class="title text-dark" data-abc="true">{{ $item->book->title }}</a>
                                                <p class="text-muted small">{{ $item->book->author }}</p>
                                            </figcaption>
                                        </figure>
                                        <div class="price-payment">
                                            @php
                                                $price = $item->book->hasDiscount() ? $item->book->discountedPrice : $item->book->price;
                                                if ($item->book->hasDiscount()) {
                                                    $discount += ($item->book->price - $item->book->discountedPrice) * $item['quantity'];
                                                    $bookDiscount = true;

                                                }
                                                $totalPriceBeforeDiscount += $item->book->price * $item->quantity; 

                                            @endphp
                                            <p>Rp {{ number_format($price, 0, ',', '.') }} x {{ $item['quantity'] }}</p>
                                            @php
                                                $subtotal += $price * $item['quantity'];
                                            @endphp
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                            <hr>
                            <div class="d-flex justify-content-between">
                                <p>Payment Method</p>
                                <p>{{ $order->payment_method }}</p>
                            </div>
                            @if ($bookDiscount)
                            <div class="d-flex justify-content-between">
                                <p>Subtotal</p>
                                <p>Rp {{ number_format($totalPriceBeforeDiscount, 0, ',', '.') }}</p>
                            </div>
                                <div class="d-flex justify-content-between">
                                    <p>Diskon</p>
                                    <p class="text-danger">- Rp {{ number_format($discount, 0, ',', '.') }}</p>
                                </div>
                                <div class="d-flex justify-content-between fw-bold">
                                <p>Total</p>
                                <p>Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                            </div>
                            @else
                            <div class="d-flex justify-content-between fw-bold">
                                <p>Total</p>
                                <p>Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($order->payment_method == 'QRIS')
                        <img src="{{ asset('images/qrcode.png') }}" alt="QR Code">
                    @endif

                    <form action="{{ route('user.payment', $orders->first()->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark mb-4">Bayar</button>
                    </form>

                    <p>Anda memiliki waktu hingga <strong id="deadline">{{ $orders->first()->created_at->addMinutes(120) }}</strong> untuk menyelesaikan pembayaran.</p>

                    <div class="mt-1">
                        <p>Jika Anda mengalami masalah, jangan ragu untuk menghubungi kami di:</p>
                        <p><strong>Email:</strong> <a href="mailto:support@example.com">support@ymail.com</a></p>
                    </div>

                    <div>
                        <img src="{{ asset('images/logo2.png') }}" width="40" alt="Logo">
                        <span class="fw-bold" style="color: #650f2c;">Adit's The Book</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.payment.countdown')
@endsection
