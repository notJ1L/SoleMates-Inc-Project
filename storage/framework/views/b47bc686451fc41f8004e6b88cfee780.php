<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Order Completed</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f8f5f1;
            color: #0C0C0C;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .header {
            background: linear-gradient(135deg, #C8A96E, #B8935F);
            padding: 50px 30px;
            text-align: center;
            color: #0C0C0C;
            position: relative;
        }
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.15)"/><circle cx="20" cy="60" r="0.5" fill="rgba(255,255,255,0.15)"/><circle cx="80" cy="40" r="0.5" fill="rgba(255,255,255,0.15)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        .header h1 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
            position: relative;
            z-index: 1;
        }
        .header p {
            font-size: 18px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }
        .thank-you-message {
            text-align: center;
            padding: 40px 30px;
            background: linear-gradient(135deg, #fff9f0, #ffffff);
        }
        .thank-you-message h2 {
            font-size: 24px;
            font-weight: 700;
            color: #C8A96E;
            margin-bottom: 15px;
        }
        .thank-you-message p {
            font-size: 16px;
            color: #6B6560;
            margin-bottom: 20px;
            line-height: 1.7;
        }
        .order-summary {
            background: white;
            margin: 0 30px 30px;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border: 1px solid #e6e0d8;
        }
        .order-summary h3 {
            color: #C8A96E;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .order-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .detail-item {
            padding: 15px;
            background: #f8f5f1;
            border-radius: 8px;
            border: 1px solid #e6e0d8;
        }
        .detail-label {
            font-size: 12px;
            color: #6B6560;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 6px;
        }
        .detail-value {
            font-size: 16px;
            font-weight: 600;
            color: #0C0C0C;
        }
        .special-offer {
            background: linear-gradient(135deg, #C8A96E, #B8935F);
            color: #0C0C0C;
            padding: 25px;
            margin: 0 30px 30px;
            border-radius: 12px;
            text-align: center;
        }
        .special-offer h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .discount-code {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 18px;
            margin: 15px 0;
            border: 2px dashed rgba(255,255,255,0.3);
        }
        .cta-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin: 30px;
            flex-wrap: wrap;
        }
        .cta-button {
            display: inline-block;
            background: #C8A96E;
            color: #0C0C0C;
            padding: 14px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            transition: all 0.2s ease;
            min-width: 150px;
        }
        .cta-button:hover {
            background: #B8935F;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(200,169,110,0.3);
        }
        .cta-button.secondary {
            background: transparent;
            border: 2px solid #C8A96E;
            color: #C8A96E;
        }
        .cta-button.secondary:hover {
            background: #C8A96E;
            color: #0C0C0C;
        }
        .footer {
            background: #f8f5f1;
            padding: 40px 30px;
            text-align: center;
            border-top: 1px solid #e6e0d8;
        }
        .footer h3 {
            color: #C8A96E;
            font-size: 18px;
            margin-bottom: 15px;
        }
        .footer p {
            color: #6B6560;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .social-links {
            margin-top: 20px;
        }
        .social-links a {
            display: inline-block;
            width: 36px;
            height: 36px;
            background: #C8A96E;
            color: #0C0C0C;
            text-align: center;
            line-height: 36px;
            border-radius: 50%;
            margin: 0 8px;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.2s ease;
        }
        .social-links a:hover {
            background: #B8935F;
            transform: translateY(-2px);
        }
        .testimonial {
            background: #f8f5f1;
            margin: 30px;
            padding: 25px;
            border-radius: 12px;
            border-left: 4px solid #C8A96E;
            font-style: italic;
            color: #6B6560;
        }
        .stars {
            color: #C8A96E;
            font-size: 18px;
            margin-bottom: 10px;
        }
        @media (max-width: 600px) {
            .email-container {
                margin: 20px 10px;
            }
            .header, .thank-you-message, .footer {
                padding: 30px 20px;
            }
            .order-summary, .special-offer, .testimonial {
                margin: 20px;
            }
            .order-details {
                grid-template-columns: 1fr;
            }
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            .cta-button {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>🎉 Thank You!</h1>
            <p>Your order has been successfully completed</p>
        </div>
        
        <div class="thank-you-message">
            <h2>Dear <?php echo e($user->name); ?>,</h2>
            <p>We're absolutely delighted that you chose SoleMates for your footwear needs! Your order has been completed and is on its way to you.</p>
            <p>Thank you for trusting us with your purchase. We hope your new shoes bring you comfort, style, and countless happy steps!</p>
        </div>
        
        <div class="order-summary">
            <h3>📦 Your Order Summary</h3>
            <div class="order-details">
                <div class="detail-item">
                    <div class="detail-label">Order Number</div>
                    <div class="detail-value">#<?php echo e($order->id); ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Total Amount</div>
                    <div class="detail-value">₱<?php echo e(number_format($order->total, 2)); ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Completed Date</div>
                    <div class="detail-value"><?php echo e($order->updated_at->format('M d, Y')); ?></div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Payment Method</div>
                    <div class="detail-value"><?php echo e(ucfirst($order->payment_method)); ?></div>
                </div>
            </div>
        </div>
        
        <div class="special-offer">
            <h3>🎁 A Special Thank You Gift!</h3>
            <p>As a token of our appreciation, here's a discount for your next purchase:</p>
            <div class="discount-code">THANKYOU15</div>
            <p>Use this code for 15% off your next order</p>
            <p><small>Valid for 30 days • One-time use</small></p>
        </div>
        
        <div class="testimonial">
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p>"The quality exceeded my expectations! Fast delivery and amazing customer service. I'll definitely shop again!"</p>
            <p><small>- Maria S., Manila</small></p>
        </div>
        
        <div class="cta-buttons">
            <a href="<?php echo e(route('home')); ?>" class="cta-button">
                Shop Again
            </a>
            <a href="<?php echo e(route('profile.orders.show', $order->id)); ?>" class="cta-button secondary">
                View Order
            </a>
        </div>
        
        <div class="footer">
            <h3>Shop With Us Again!</h3>
            <p>We'd love to see you back soon. Check out our latest collections and exclusive offers!</p>
            <p>&copy; <?php echo e(date('Y')); ?> SoleMates Footwear. All rights reserved.</p>
            <p>Find your perfect pair with us</p>
            <div class="social-links">
                <a href="#">f</a>
                <a href="#">t</a>
                <a href="#">i</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views\emails\orders\thank-you.blade.php ENDPATH**/ ?>