@extends('layouts.app')

@section('title', 'Order Success — SoleMates Footwear')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                    </div>
                    
                    <h2 class="mb-3">Order Placed Successfully!</h2>
                    <p class="text-muted mb-4">
                        Thank you for your order. We've received your order and will process it shortly.
                    </p>
                    
                    <div class="alert alert-info">
                        <h6 class="alert-heading">Order Details</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Order Number:</strong> {{ $order->order_number }}<br>
                                <strong>Date:</strong> {{ $order->created_at->format('F d, Y') }}<br>
                                <strong>Status:</strong> 
                                <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                            </div>
                            <div class="col-md-6">
                                <strong>Total Amount:</strong> ₱{{ number_format($order->total, 2) }}<br>
                                <strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}<br>
                                <strong>Payment Status:</strong> 
                                <span class="badge bg-secondary">{{ ucfirst($order->payment_status) }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="text-start">
                        <h6 class="mb-3">Order Items:</h6>
                        @foreach($order->orderItems as $item)
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                <div>
                                    <strong>{{ $item->product->name }}</strong><br>
                                    <small class="text-muted">₱{{ number_format($item->price, 2) }} × {{ $item->quantity }}</small>
                                </div>
                                <strong>₱{{ number_format($item->subtotal, 2) }}</strong>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Shipping Information -->
                    <div class="text-start mt-4">
                        <h6 class="mb-3">Shipping Information:</h6>
                        <p class="mb-1"><strong>Name:</strong> {{ $order->user->name }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $order->phone }}</p>
                        <p class="mb-1"><strong>Address:</strong> {{ $order->shipping_address }}</p>
                    </div>
                    
                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                            <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home me-2"></i>Back to Home
                        </a>
                    </div>
                    
                    <div class="mt-4">
                        <small class="text-muted">
                            <i class="fas fa-envelope me-1"></i>
                            You will receive an email confirmation at {{ $order->user->email }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
