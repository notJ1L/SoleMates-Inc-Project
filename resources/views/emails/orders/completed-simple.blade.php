@extends('layouts.email')

@section('content')
<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    
    <!-- Header -->
    <div style="background: linear-gradient(135deg, #C8A96E, #B8935F); padding: 40px 30px; text-align: center; color: #0C0C0C;">
        <h1 style="font-size: 28px; font-weight: 700; margin: 0 0 8px 0;">🎉 Order Completed!</h1>
        <p style="font-size: 16px; margin: 0;">Thank you for your purchase from SoleMates</p>
    </div>
    
    <!-- Content -->
    <div style="padding: 40px 30px;">
        <p style="font-size: 16px; margin-bottom: 20px;">Hi {{ $user->name }},</p>
        <p style="font-size: 16px; margin-bottom: 25px;">Great news! Your order has been successfully completed and is now being processed for delivery.</p>
        
        <!-- Order Info -->
        <div style="background: #f8f5f1; border-radius: 8px; padding: 20px; margin: 25px 0; border-left: 4px solid #C8A96E;">
            <h3 style="color: #C8A96E; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px;">Order Information</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div style="padding: 12px; background: white; border-radius: 6px; border: 1px solid #e6e0d8;">
                    <div style="font-size: 12px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 4px;">Order Number</div>
                    <div style="font-size: 16px; font-weight: 600; color: #0C0C0C;">#{{ $order->id }}</div>
                </div>
                <div style="padding: 12px; background: white; border-radius: 6px; border: 1px solid #e6e0d8;">
                    <div style="font-size: 12px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 4px;">Total Amount</div>
                    <div style="font-size: 16px; font-weight: 600; color: #0C0C0C;">₱{{ number_format($order->total, 2) }}</div>
                </div>
                <div style="padding: 12px; background: white; border-radius: 6px; border: 1px solid #e6e0d8;">
                    <div style="font-size: 12px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 4px;">Payment Status</div>
                    <div style="font-size: 16px; font-weight: 600; color: #0C0C0C;">{{ ucfirst($order->payment_status) }}</div>
                </div>
                <div style="padding: 12px; background: white; border-radius: 6px; border: 1px solid #e6e0d8;">
                    <div style="font-size: 12px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 4px;">Order Date</div>
                    <div style="font-size: 16px; font-weight: 600; color: #0C0C0C;">{{ $order->created_at->format('M d, Y') }}</div>
                </div>
            </div>
        </div>
        
        <p style="font-size: 16px; margin-bottom: 25px;">You can track your order status and view details by clicking the button below:</p>
        
        <div style="text-align: center;">
            <a href="{{ route('profile.orders.show', $order->id) }}" style="display: inline-block; background: #C8A96E; color: #0C0C0C; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 16px;">View Order Details</a>
        </div>
        
        <p style="font-size: 16px; margin-top: 25px;">If you have any questions about your order, please don't hesitate to contact our customer support team.</p>
        
        <p style="font-size: 16px; margin-top: 20px;">Best regards,<br>The SoleMates Team</p>
    </div>
    
    <!-- Footer -->
    <div style="background: #f8f5f1; padding: 30px; text-align: center; border-top: 1px solid #e6e0d8;">
        <p style="color: #6B6560; font-size: 14px; margin-bottom: 8px;">&copy; {{ date('Y') }} SoleMates Footwear. All rights reserved.</p>
        <p style="color: #6B6560; font-size: 14px; margin-bottom: 0;">Find your perfect pair with us</p>
    </div>
    
</div>
@endsection
