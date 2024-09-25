@extends('user.layouts.app')
@section('content')

<h2 class="text-center mt-3">Riwayat Pembelian</h2>
<div class="container section-container-history">
    <div class="history-filter">
<form class=" mb-4" role="search">
<i class="bx bx-search"></i>
      <input class="search-history form-control rounded-3 " type="search" placeholder="Cari Pembelianmu.." aria-label="Search">
    </form>

    <div class="sort-history">
         <form action="{{route('history', ['sort'=>$sort])}}">
                <select class="form-select rounded-3 " name="short" onchange="this.form.submit()">
                <option value="" >Sesuai</option>
                <option value="1" {{ request('sort') == '1' ? 'selected' : '' }}>Terbaru</option>
                <option value="2" {{ request('sort') == '2' ? 'selected' : ''}}>Terlama</option>
                <option value="3" {{ request('sort') == '3' ? 'selected' : ''}}>Harga Tertinggi</option>
                <option value="4" {{ request('sort') == '4' ? 'selected' : ''}}>Harga Terendah</option>
               
                </select>
         </form>
     </div>


    <div class="date-history">
      <form>
         <input type="date" id="datepicker" class="form-control rounded-3"  placeholder="KOCAOK"/>
      </form>
    </div>

    </div>
    @if($orders->isEmpty())
    <h5 class="d-flex justify-content-center">Maaf, kami tidak dapat menemukan daftar riwayat pembelian </h5>
    <dotlottie-player src="https://lottie.host/7fabf068-60c1-4747-8241-7d65222d3590/YHJ0zGvIHG.json" background="transparent" speed="1" style="width: 300px; height: 300px; margin-left:300px;" loop autoplay></dotlottie-player>

    @else
    @foreach($orders  as $order)
    <div class="card history-card mb-4">

        <div class="history-card-header ms-3 mt-2">
            <p>{{ $order->created_at->format('d F Y') }}  
                @if($order->status == 1)
            <span class="text-secondary fw-bold mt-2">Pending</span></p>
            @elseif($order->status == 2)
            <span class="  text-success fw-bold mt-2">Selesai</span></p>
            @elseif($order->status == 3)
            <span class=" text-danger fw-bold mt-2">Failed</span></p>

            @endif
        </div>
        @foreach($order->orderItems as $item)
            <div class="d-flex align-items-start">
                            <figure class="itemside ">
                                <div class="aside">
                                    <img src="{{ asset('storage/' . $item->book->image) }}" class="img-sm rounded-2 fit" style="height: 100px;">
                                </div>
                                <figcaption class="info">
                                    <a href="#" class="title text-dark" data-abc="true">{{$item->book->title}}</a>
                                    <p class="text-muted small">{{$item->book->author}}</p>
                                    <p>Rp {{number_format($item->book->price,0 ,'','.')}} x {{$item->quantity}}</p>
                                </figcaption>
                            </figure>
                            </div>
                            @endforeach

                            
                            
                          <div class="total py-4 d-flex align-items-start1">
                            <div class="total-history ">
                            <h6 class="text-secondary ms-4">Total Transaksi</h6>
                            <h6 class="fw-bold ms-4">Rp {{number_format($order->total_amount,0 ,'','.')}}</h6>
                            </div>

                            <div class="total-button">
                            @if($order->status == 1)
                           
                              <a href="{{route('payment.page', $order->id )}}" class="button-pending btn btn-danger ">Bayar</a>
                            

                                @elseif($order->status == 2)
                                <button type="button" class="btn btn-sm "  data-bs-toggle="modal" data-bs-target="#modalTransaction">Lihat detail</button>
                                  <button type="button" class="btn btn-dark  ">Beli lagi</button>

                                @elseif($order->status == 3)
                                <form action="{{route('cart')}}" method="POST">
                                    @csrf
                                  <input type="hidden" name="action" value="add">

                                <input type="hidden" name="book_id" value="{{ $order->id }}">
    
                                <button type="submit" class="btn btn-success  ">Beli</button>
                                 </form>

                            @endif
                            </div>
                            </div>
                          
                        </div>

    @endforeach
    @endif

                
                    
                
          
    </div>

    

@endsection
        