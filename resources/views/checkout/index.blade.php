@extends('layouts.app')

@section('title', 'Checkout — SoleMates Footwear')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">
                <i class="fas fa-credit-card me-2"></i>Checkout
            </h2>
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                
                <!-- Order Summary -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Order Summary</h6>
                    </div>
                    <div class="card-body">
                        @foreach($cart as $productId => $item)
                            <div class="row align-items-center mb-3 pb-3 border-bottom">
                                <div class="col-md-2">
                                    @if($item['image'])
                                        <img src="{{ $item['image'] }}" 
                                             alt="{{ $item['name'] }}" 
                                             class="img-fluid rounded">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 60px;">
                                            <i class="fas fa-shoe-prints fa-lg text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-1">{{ $item['name'] }}</h6>
                                    <p class="text-muted mb-0">₱{{ number_format($item['price'], 2) }} × {{ $item['quantity'] }}</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <strong>₱{{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <strong>Subtotal:</strong>
                            </div>
                            <div class="col-md-4 text-end">
                                <strong>₱{{ number_format($cartTotal, 2) }}</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <span>Shipping:</span>
                            </div>
                            <div class="col-md-4 text-end">
                                <span>Free</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <h5>Total:</h5>
                            </div>
                            <div class="col-md-4 text-end">
                                <h5>₱{{ number_format($cartTotal, 2) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Shipping Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" value="{{ old('phone', $user->phone) }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="shipping_address" class="form-label">Shipping Address</label>
                            <textarea class="form-control @error('shipping_address') is-invalid @enderror" 
                                      id="shipping_address" name="shipping_address" rows="3" required>{{ old('shipping_address', $user->address) }}</textarea>
                            @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Payment Method</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="cod" value="cod" checked>
                                <label class="form-check-label" for="cod">
                                    <i class="fas fa-money-bill-wave me-2"></i>Cash on Delivery (COD)
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="gcash" value="gcash">
                                <label class="form-check-label" for="gcash">
                                    <i class="fas fa-mobile-alt me-2"></i>GCash
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" 
                                       id="bank_transfer" value="bank_transfer">
                                <label class="form-check-label" for="bank_transfer">
                                    <i class="fas fa-university me-2"></i>Bank Transfer
                                </label>
                            </div>
                        </div>
                        @error('payment_method')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Cart
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check-circle me-2"></i>Place Order
                    </button>
                </div>
            </form>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Order Total</h6>
                </div>
                <div class="card-body text-center">
                    <h3 class="text-primary">₱{{ number_format($cartTotal, 2) }}</h3>
                    <p class="text-muted">Including tax and free shipping</p>
                    
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="fas fa-lock me-1"></i>Secure checkout powered by SoleMates Footwear
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
