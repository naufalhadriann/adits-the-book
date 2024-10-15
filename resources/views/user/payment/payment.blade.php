@extends('user.layouts.app')

@section('content')

<div class="container d-flex justify-content-center ">
    
    <div class="row">
        <div class="col-md-12 py-5">
        <div class="payment-timer ms-5">
      
        <h5>Waktu untuk membayar: <span id="countdown"></span></h5>
        <input type="hidden" id="order-date" value="{{$orders->first()->created_at}}">
        <input type="hidden" id="order-id" value="{{ $orders->first()->id }}">


        </div>
            <div class="card border-0">
            <div class="card-body">
          
                    @foreach ($orders as $order)
                    @foreach ($order->orderItems as $item )
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
                                @if ($item->book->hasDiscount())
                                    <p>Rp {{ number_format($item->book->discountedPrice, 0, ',', '.') }} x {{ $item['quantity'] }}</p>
                                @else
                                    <p>Rp {{ number_format($item->book->price, 0, ',', '.') }} x {{ $item['quantity'] }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach

                    @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.payment.countdown')
@endsection