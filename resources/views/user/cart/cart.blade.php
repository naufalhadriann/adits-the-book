@extends('user.layouts.app')

@section('content')

<div class="container-fluid" id="cart">
    <div class="row">

        @if($cart->isEmpty())
        <div class="lottie-cart">
            <dotlottie-player src="https://lottie.host/96daed6e-5fa3-4cd7-ba9e-08d430d7c8ac/zbUaNeH1Mp.json" background="transparent" speed="1" style="width: 300px; height: 300px;" autoplay></dotlottie-player>
        </div>
        <div class="cart-empty-title">
            <p>Wah, keranjang kamu kosong</p>
            <h1>Mau beli apa hari ini? Masukin keranjang aja dulu daripada nanti lupa </h1>
            <a href="/" class="btn btn-dark btn-start">Mulai Belanja</a>
        </div>

        @else

        <div class="cart-header-title">Cart <span> ({{ $totalBooks }} Product)</span></div>

        <aside class="col-md-7">
            <div class="card  mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div class="form-check form-check-inline d-flex justify-content-between align">
                        <label>
                            <input type="checkbox" id="select-all" class="ms-4 "/>
                            Select<span class="text-secondary ms-1">({{ $totalBooks }})</span>
                        </label>
                        <button type="submit" id="select-all-button" style="display: none;"></button>
                    </div>
                </div>
                <div class="card-body">
                        <div class="row">
                            @foreach ($cart as $bookId => $item)
                                @php
                                    $book = $item['book'];
                                    $quantity = $item['quantity'];
                                    $discountedPrice = $book->discounted_price;
                                    $hasDiscount = $book->hasDiscount();
                                    $discountPercentage = ceil($item['book']->discount);
                                    $totalPrice = $book->price * $quantity;
                                    $totalDiscountedPrice = $discountedPrice * $quantity;
                                    $discountBadge = $hasDiscount ? "<span class=\"badge badge-discount-cart\">{$discountPercentage}%</span>" : '';
                                @endphp

                                <div class="col-md-12 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start">
                                                <div class="form-check me-3">
                                                    <input type="checkbox" class="cart-item-checkbox"
                                                        id="selected-book-ids"
                                                        name="selected_books" 
                                                        value="{{ $item['book']->id }}"
                                                        {{ $item['is_selected'] ? 'checked' : '' }}
                                                        data-book-id="{{ $item['book']->id }}"
                                                        data-book-price="{{ $item['book']->price }}"
                                                        data-book-discounted-price="{{ $discountedPrice }}"
                                                        data-book-quantity="{{ $item['quantity'] }}"
                                                        data-book-discount="{{ $item['discount'] }}"
                                                        data-book-has-discount="{{ $hasDiscount ? 'true' : 'false' }}">
                                                    <label class="form-check-label" for="book-{{ $bookId }}"></label>
                                            </div>
                                                <figure class="itemside">
                                                    <div class="aside">  
                                                            <a href="{{route('book.show', urldecode($item['book']->title))}}">                                                  
                                                        <img src="{{ asset('storage/' . $item['book']->image) }}" class="img-sm rounded-2 fit" style="height: 100px;">
                                                        {!! $discountBadge !!}
                                                        </a>
                                                    </div>
                                                    <figcaption class="info">
                                                        <a href="{{route('book.show', urldecode($item['book']->title))}}" class="title text-dark">{{ $item['book']->title }}</a>
                                                        <p class="text-muted small">{{ $book->author }}</p>
                                                    </figcaption>
                                                  
                                                </figure>
                                                <div class="ms-3 d-flex flex-column justify-content-between" style="flex: 1;">
                                                    <div class="price-wrap text-center mb-2 ms-4">
                                                        @if ($book->hasDiscount())
                                                            <var class="price">Rp {{ number_format($totalDiscountedPrice, 0, ',', '.') }}</var>
                                                            <br><span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                                        @else
                                                            <var class="price">Rp {{ number_format($totalPrice, 0, ',', '.') }}</var>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <form action="{{ route('cart.remove') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="book_id" value="{{ $item['book']->id }}">
                                                            <button type="submit" class="btn" style="background: none; color: #dc3545; border: none; font-size: 15px;">
                                                                <i class='bx bxs-trash'></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('cart.update') }}" method="POST" class="quantity-form me-2">
                                                            @csrf
                                                            <input type="hidden" name="book_id" value="{{ $item['book']->id }}">
                                                            <div class="quantity-input d-flex align-items-center">
                                                                <button type="submit" class="btn btn-dark btn-sm quantity-change" data-action="decrease">-</button>
                                                                <input id="quantity" name="quantity" type="number" class="form-control form-control-sm quantity-field" value="{{ $item['quantity'] }}" max="20" style="width: 60px;">
                                                                <button type="submit" class="btn btn-dark btn-sm quantity-change" data-action="increase">+</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
                                    <a href="/" class="btn btn-dark "> <- Back to Shop</a>

        </aside>

        <aside class="col-lg-3">
            <div class="card mb-4">
                <div class="card-body">
                    <li class="list-group-item d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <strong id="total-books"></strong>
                        </div>
                        <span id="total-price"><strong>Rp </strong></span>
                    </li>
                    <form id="checkout-form" action="{{ route('shipping') }}" method="post">
                        @csrf
                <input type="hidden" name="selected_books" id="selected-books">
               
                <button type="button" id="proceed-to-checkout" class="btn btn-dark btn-square btn-main rounded-3" disabled>Proceed to Checkout</button>    
                </form>    
        </div>
            </div>
        </aside>
        @endif
    </div>
    @include('sweetalert::alert')
    </div>

@endsection
