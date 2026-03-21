@extends('layouts.email')

@section('content')
<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    
    <!-- Header -->
    <div style="background: linear-gradient(135deg, #C8A96E, #B8935F); padding: 40px 30px; text-align: center; color: #0C0C0C;">
        <h1 style="font-size: 28px; font-weight: 700; margin: 0 0 8px 0;">🔐 Password Reset</h1>
        <p style="font-size: 16px; margin: 0;">SoleMates Footwear</p>
    </div>
    
    <!-- Content -->
    <div style="padding: 40px 30px;">
        <p style="font-size: 16px; margin-bottom: 25px;">Hi {{ $user->name }},</p>
        
        <p style="font-size: 16px; margin-bottom: 25px;">We received a request to reset your password for your SoleMates account. Click the button below to reset your password:</p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $resetUrl }}" style="display: inline-block; background: #C8A96E; color: #0C0C0C; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 16px;">Reset Password</a>
        </div>
        
        <p style="font-size: 14px; color: #6B6560; margin-bottom: 20px;">If you didn't request this password reset, please ignore this email. Your password will remain unchanged.</p>
        
        <p style="font-size: 16px; margin-top: 25px;">Best regards,<br>The SoleMates Team</p>
    </div>
    
    <!-- Footer -->
    <div style="background: #f8f5f1; padding: 30px; text-align: center; border-top: 1px solid #e6e0d8;">
        <p style="color: #6B6560; font-size: 14px; margin-bottom: 8px;">&copy; {{ date('Y') }} SoleMates Footwear. All rights reserved.</p>
        <p style="color: #6B6560; font-size: 14px; margin-bottom: 0;">Find your perfect pair with us</p>
    </div>
    
</div>
@endsection
