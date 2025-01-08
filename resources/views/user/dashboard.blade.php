@extends('user.layouts.app')
@section('title')
@section('content')
@include('components.user.greetings')

<div class="container buku">
    <div class="row">
        <div class="col-md-4 banner-book ">
            <img src="{{asset('images/Promo3.png')}}" alt="Image beside container" class="img-fluid">
        </div>
        
        <div class="col-md-8  rak-buku">
            <div class="container section-container">
               @include('user.product.discount')
                </div>
             </div>
         </div>
        </div>

    
    <div class="container buku">
    <div class="row">
        <div class="col-md-4 banner-book">
            <img src="{{asset('images/recomend.png')}}" alt="Image beside container" class="img-fluid">
        </div>
        
        <div class="col-md-8 rak-buku ">
            <div class="container section-container">
               @include('user.product.recomend')
               </div>
             </div>
         </div>
        </div>
    
    <div class="container buku ">
       @include('user.product.new')
    </div>
    <div class="container buku ">
        @include('user.product.manga')
    </div>

    @include('components.user.footer')
@endsection