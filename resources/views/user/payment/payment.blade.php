@extends('user.layouts.app')

@section('content')
<div class="crumbs ">
    {{ Breadcrumbs::render('payment')}}
</div>
<div class="container">
    
    <div class="row">
        <div class="col-md-8 py-4">
            <div class="card border-0">
                <div class="card-body">
                    @foreach ($cart as $item)
                        @php
                            $book = $item['book'];
                            $quantity = $item['quantity'];
                            $hasDiscount = $book->hasDiscount();
                            $discountedPrice = $book->discounted_price;
                            $totalDiscounted = $discountedPrice * $quantity;
                            $discountBadge = $hasDiscount ? '<span class="badge badge-discount-payment">30%</span>' : '';

                        @endphp
                        <div class="d-flex align-items-start">
                            <figure class="itemside">
                                <div class="aside">
                                    <img src="{{ asset('storage/' . $item['book']->image) }}" class="img-sm rounded-2 fit" style="height: 100px;">
                                    {!! $discountBadge !!}

                                </div>
                                <figcaption class="info">
                                    <a href="#" class="title text-dark" data-abc="true">{{ $item['book']->title }}</a>
                                    <p class="text-muted small">{{ $item['book']->author }}</p>
                                </figcaption>
                            </figure>
                            <div class="price-payment">
                                @if ($book->hasDiscount())
                                    <p>Rp {{ number_format($totalDiscounted, 0, ',', '.') }} x {{ $item['quantity'] }}</p>
                                @else
                                    <p>Rp {{ number_format($item['book']->price, 0, ',', '.') }} x {{ $item['quantity'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="methode-pembayaran ms-4 mt-2">
                        Pilih Pembayaran
                        @include('user.payment.modal-payment')
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-decoration-none">
                                    <div class="card border-0 shadow-sm mb-3" id="selectedPaymentMethodCard">
                                        <div class="card-body d-flex align-items-center">
                                            <img id="selectedPaymentMethodImage" src="" alt="" width="50" class="me-3" />
                                            <h5 id="selectedPaymentMethodName" class="mb-0 ">Select Payment Method</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <aside class="col-lg-3 py-5">
            <div class="card card-payment">
                <div class="card-header">
                    <h5 class="mb-0">Detail Pembayaran</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Methode Pembayaran
                            <p id="selectedPaymentMethod" class="mb-0">~</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Products
                            <div>Rp {{ number_format($totalPrice, 0, ',', '.') }}</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Discount
                            <span>Rp {{ number_format($totalDiscountAmount, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div>
                                <strong>Total amount</strong>
                            </div>
                            <span><strong>Rp {{ number_format($totalDiscountedPrice, 0, ',', '.') }}</strong></span>
                        </li>
                    </ul>
                    <hr>
                    <a class="btn btn-dark btn-square btn-main rounded-3" data-toggle="modal" data-target="#checkoutModal">Checkout</a>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
