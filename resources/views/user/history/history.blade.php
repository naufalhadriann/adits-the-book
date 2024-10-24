@extends('user.layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="profile-edit text-center">
                        <img src="{{ asset('/images/admin.png') }}" alt="Admin" class="rounded-circle p-2" width="50">
                        <h4>{{ Auth::user()->name }}</h4>
                    </div>

                    <ul class="profile-info">
                        <li>
                            <div class="accordion ms-1" id="accordionExample">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button bg-white" style="box-shadow: none;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class='bx bx-user px-2'></i> Akun Saya
                                    </button>
                                </h2>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <ul class="profile">
                                        <li><a href="{{ route('user.edit') }}">Profile</a></li>
                                        <li class="mt-3"><a href="#">Password</a></li>
                                        <li class="mt-3 mb-4"><a href="#">Alamat</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="ms-4 mb-2"><a href="{{ route('history') }}"><i class='bx bx-shopping-bag px-2'></i>Pembelian</a></li>
                        <li class="ms-4 mb-2"><a href="{{ route('history') }}"><i class='bx bx-support px-2'></i>Customer Service</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="section-history">
                <div class="history-filter mb-3 d-flex justify-content-between">
                    @include('user.history.partials.search')
                    <div class="sort-history">@include('user.history.partials.filter-latest')</div>
                    <div class="date-history">@include('user.history.partials.filter-date')</div>
                </div>

                <div class="status mb-3">@include('user.history.partials.status')</div>

                @if($orders->isEmpty())
                    <h5 class="text-center mt-4">Maaf, kami tidak dapat menemukan daftar riwayat pembelian</h5>
                    <dotlottie-player src="https://lottie.host/7fabf068-60c1-4747-8241-7d65222d3590/YHJ0zGvIHG.json" background="transparent" speed="1" style="width: 300px; height: 300px; margin:auto;" loop autoplay></dotlottie-player>
                @else
                    @foreach($orders as $order)
                        <div class="card history-card mb-4">
                            <div class="history-card-header ms-3 mt-2">
                                <p>{{ $order->created_at->format('d F Y') }}
                                    @if($order->status == 1)
                                        <span class="text-secondary fw-bold">Pending</span>
                                    @elseif($order->status == 2)
                                        <span class="text-success fw-bold">Selesai</span>
                                    @elseif($order->status == 3)
                                        <span class="text-danger fw-bold">Failed</span>
                                    @endif
                                </p>
                            </div>
                            @foreach($order->orderItems as $item)
                                <div class="d-flex align-items-start">
                                    <figure class="itemside">
                                        <div class="aside">
                                            <img src="{{ asset('storage/' . $item->book->image) }}" class="img-sm rounded-2 fit" style="height: 100px;">
                                        </div>
                                        <figcaption class="info">
                                            <a href="#" class="title text-dark" data-abc="true">{{ $item->book->title }}</a>
                                            <p class="text-muted small">{{ $item->book->author }}</p>
                                            <p>Rp {{ number_format($item->book->discounted_price, 0, ',', '.') }} x {{ $item->quantity }}</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            @endforeach

                            <div class="total py-4 ms-4 d-flex justify-content-between align-items-center">
                                <div class="total-history">
                                    <h6 class="text-secondary">Total Transaksi</h6>
                                    <h6 class="fw-bold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</h6>
                                </div>
                                
                                <div class="total-button">
                                    
                                    @if($order->status == 1)
                                        <a class="btn btn-danger" href="{{ route('order.canceled', $order->id) }}" >Batalkan</a>
                                        <a href="{{ route('payment.page', $order->id) }}" class="btn btn-dark">Bayar</a>
                                    @elseif($order->status == 2)
                                        <button type="button"  class="btn btn-sm" data-toggle="modal" data-target="#modalTransaction{{$order->id}}">Lihat detail</button>
                                        <button type="button" class="btn btn-dark">Beli lagi</button>
                                    @elseif($order->status == 3)
                                        <form action="{{ route('cart') }}" method="POST">
                                            @csrf
                                            @foreach($order->orderItems as $item)
                                                <input type="hidden" name="action" value="add">
                                                <input type="hidden" name="book_id[]" value="{{ $item->book->id }}">
                                            @endforeach
                                            <button type="submit" class="button-pending btn btn-dark">Beli lagi</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{{ $orders->links('pagination::bootstrap-5') }}}
                @include('sweetalert::alert')
                @include('user.history.modal-transaction')

            </div>
        </div>
    </div>
</div>

@endsection
