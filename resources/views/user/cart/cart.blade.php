@extends('user.layouts.app')

@section('content')

<div class="container-fluid" id="cart">
    <div class="row">

        <div class="cart-header-title">Cart <span> ({{ $totalBooks }} Product)</span></div>

        <aside class="col-md-7">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <div class="form-check form-check-inline d-flex justify-content-between align">
               
                    <label>
                        <input type="checkbox" id="select-all" class="ms-3 "/>
                    Select<span class="text-secondary ms-1">({{$totalBooks}})</span>
                    </label>
                    <input type="hidden" name="status" value="selected" id="status-field" />
                    <button type="submit" id="select-all-button" style="display: none;"></button>              
                    </div>

  
      

    <form id="remove-all-form" action="{{ route('cart.removeAll') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" id="status-field" name="status">
        <button type="submit" class="btn text-danger fw-bold btn-sm ms-2">Remove All</button>
    </form>

   

                </div>
                <div class="card-body">
                    <form action="{{ route('cart.update') }}" method="POST" class="cart-items-form">
                        @csrf
                        <div class="row">
                            @foreach ($cart as $bookId => $item)
                                @php
                                    $book = $item['book'];
                                    $quantity = $item['quantity'];
                                    $discountedPrice = $book->discounted_price;
                                    $hasDiscount = $book->hasDiscount();
                                    $totalPrice = $book->price * $quantity;
                                    $totalDiscountedPrice = $discountedPrice *$quantity;
                        
                                    $discountBadge = $hasDiscount ? '<span class="badge badge-discount-cart">30%</span>' : '';
                                
                                @endphp


                                <div class="col-md-12 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start">
                                                <div class="form-check me-3">
                                                <input type="checkbox" class="cart-item-checkbox"
                                               data-book-id="{{ $item->book_id }}"
                                                data-book-price="{{ $item->book->price }}"
                                                data-book-discounted-price="{{ $discountedPrice }}"
                                                data-book-quantity="{{ $item->quantity }}"
                                                data-book-discount ="{{ $item->discount}}"
                                                data-book-has-discount="{{ $hasDiscount ? 'true' : 'false' }}">
                                                <label class="form-check-label" for="book-{{ $bookId }}"></label>
                                                </div>
                                                
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
                        
                    </form>
                </div>
            </div>
            <a href="/" class="btn btn-dark "> <- Back to Shop</a>

        </aside>

        <aside class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Products
                            <div id="total-price-product"> Rp 0.00</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Discount
                            <span id="total-discount">Rp {{ number_format($totalDiscountAmount, 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>Total amount</strong>
                            </div>
                            <span id="total-price"><strong>Rp </strong></span>
                        </li>
                    </ul>
                    <hr>
                    <a href="#" class="btn btn-dark btn-square btn-main rounded-3" data-abc="true" data-toggle="modal" data-target="#checkoutModal">Checkout</a>
                </div>
            </div>
        </aside>
    </div>
</div>

@endsection
