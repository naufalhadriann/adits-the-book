@extends('user.layouts.app')
@section('content')
<div class="container section-container-history">
        <h2 class="text-center mb-4">Purchase History</h2>

        <div class="order-item">
            <div class="order-item-title">Order #12345</div>
            <div class="order-item-date">Date: August 1, 2024</div>
            <div class="order-item-details">
                <p><strong>Items:</strong> Book Title 1, Book Title 2</p>
                <div class="order-item-details-status">
                <p ><strong>Status:</strong>
               
                Delivered</p>
                </div>
            </div>
            <div class="order-item-total">Total: $30.00</div>
        </div>
        <a href="/" class="btn btn-dark  btn-back-home">Back to Home</a>
    </div>


@endsection
        