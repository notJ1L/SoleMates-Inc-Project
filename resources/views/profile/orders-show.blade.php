@extends('layouts.app')

@section('title', 'Order ' . $order->order_number . ' — SoulMates Inc.')

@section('content')
<div class="container py-5" style="max-width: 760px;">

    <a href="{{ route('profile.orders') }}" class="text-muted d-inline-flex align-items-center gap-1 mb-4" style="font-size:0.88rem; text-decoration:none;">
        &larr; Back to My Orders
    </a>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0" style="font-family: var(--font-display); font-weight: 800;">
            {{ $order->order_number }}
        </h2>
        <span class="badge rounded-pill fs-6
            @if($order->status === 'completed') bg-success
            @elseif($order->status === 'cancelled') bg-danger
            @elseif($order->status === 'shipped') bg-info text-dark
            @elseif($order->status === 'processing') bg-primary
            @else bg-warning text-dark
            @endif">
            {{ ucfirst($order->status) }}
        </span>
    </div>

    {{-- Order Items --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3"><strong>Items</strong></div>
        <div class="card-body p-3">
            @foreach($order->orderItems as $item)
                <div class="d-flex justify-content-between align-items-center py-2 {{ !$loop->last ? 'border-bottom' : '' }}">
                    <div class="d-flex align-items-center gap-3">
@php $thumb = $item->product ? $item->product->thumbnailUrl() : null; @endphp
                        @if($thumb)
                            <img src="{{ $thumb }}"
                                 style="width:60px; height:60px; object-fit:cover; border-radius:4px;">
                        @else
                            <div style="width:60px; height:60px; background:#f3f0ea; border-radius:4px;
                                        display:flex; align-items:center; justify-content:center; font-size:1.5rem;">👟</div>
                        @endif
                        <div>
                            <div style="font-weight:600;">{{ $item->product->name ?? 'Product unavailable' }}</div>
                            <div class="text-muted" style="font-size:0.82rem;">
                                ₱{{ number_format($item->price, 2) }} &times; {{ $item->quantity }}
                            </div>
                        </div>
                    </div>
                    <div style="font-family: var(--font-mono); font-weight:700;">
                        ₱{{ number_format($item->subtotal, 2) }}
                    </div>
                </div>
            @endforeach

            <div class="mt-3 pt-2 border-top d-flex flex-column align-items-end gap-1">
                <div class="text-muted" style="font-size:0.88rem;">
                    Subtotal: ₱{{ number_format($order->orderItems->sum('subtotal'), 2) }}
                </div>
                @if($order->shipping > 0)
                    <div class="text-muted" style="font-size:0.88rem;">
                        Shipping: ₱{{ number_format($order->shipping, 2) }}
                    </div>
                @endif
                <div style="font-weight:800; font-size:1.1rem;">
                    Total: ₱{{ number_format($order->orderItems->sum('subtotal') + ($order->shipping ?? 0), 2) }}
                </div>
            </div>
        </div>
    </div>

    {{-- Order Info --}}
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3"><strong>Shipping Details</strong></div>
                <div class="card-body" style="font-size:0.9rem;">
                    <p class="mb-1">{{ $order->shipping_address }}</p>
                    @if($order->shipping_city)
                        <p class="mb-1">{{ $order->shipping_city }}@if($order->shipping_postcode), {{ $order->shipping_postcode }}@endif</p>
                    @endif
                    @if($order->shipping_country)
                        <p class="mb-1">{{ $order->shipping_country }}</p>
                    @endif
                    @if($order->phone)
                        <p class="mb-0 text-muted">📞 {{ $order->phone }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3"><strong>Payment</strong></div>
                <div class="card-body" style="font-size:0.9rem;">
                    <p class="mb-1">Method: <strong>{{ ucfirst($order->payment_method ?? '—') }}</strong></p>
                    <p class="mb-1">Status:
                        <span class="badge {{ $order->payment_status === 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ ucfirst($order->payment_status ?? 'pending') }}
                        </span>
                    </p>
                    <p class="mb-0 text-muted" style="font-size:0.82rem;">Placed on {{ $order->created_at->format('M d, Y \a\t h:i A') }}</p>
                </div>
            </div>
        </div>
    </div>

    @if($order->notes)
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white py-3"><strong>Notes</strong></div>
            <div class="card-body" style="font-size:0.9rem;">{{ $order->notes }}</div>
        </div>
    @endif

</div>
@endsection