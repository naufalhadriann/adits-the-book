@extends('user.layouts.app')
@section('title')

@section('content')
@include('components.user.greetings')

<div class="container">
    <div class="row">
        <div class="col-md-4 mt-3">
            <img src="{{asset('images/promo2.png')}}" alt="Image beside container" class="img-fluid">
        </div>
        
        <div class="col-md-8  ">
            <div class="container section-container">
               @include('user.product.discount')
                </div>
             </div>
         </div>
        </div>

    
    <div class="container">
    <div class="row">
        <div class="col-md-4 mt-4">
            <img src="{{asset('images/recomend.png')}}" alt="Image beside container" class="img-fluid ">
        </div>
        
        <div class="col-md-8 mt-2">
            <div class="container section-container">
               @include('user.product.recomend')
               </div>
             </div>
         </div>
        </div>
    
    <div class="container mt-5">

       @include('user.product.new')

    </div>
    <div class="container  mt-5">
        @include('user.product.manga')
    </div>
    @include('components.user.footer')
@endsection