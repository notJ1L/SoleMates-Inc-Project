<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Updated</title>
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
            padding: 40px 30px;
            text-align: center;
            color: #0C0C0C;
        }
        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }
        .header p {
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            padding: 40px 30px;
        }
        .status-update {
            background: linear-gradient(135deg, #f8f5f1, #fff);
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0;
            border-left: 4px solid #C8A96E;
            text-align: center;
        }
        .status-badge {
            display: inline-block;
            background: #C8A96E;
            color: #0C0C0C;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 15px 0;
        }
        .status-change {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
            font-size: 14px;
        }
        .old-status {
            color: #6B6560;
            text-decoration: line-through;
        }
        .new-status {
            color: #0C0C0C;
            font-weight: 600;
        }
        .order-info {
            background: #f8f5f1;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        .order-info h3 {
            color: #C8A96E;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }
        .order-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 20px;
        }
        .detail-item {
            padding: 12px;
            background: white;
            border-radius: 6px;
            border: 1px solid #e6e0d8;
        }
        .detail-label {
            font-size: 12px;
            color: #6B6560;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 4px;
        }
        .detail-value {
            font-size: 16px;
            font-weight: 600;
            color: #0C0C0C;
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
            margin: 25px 0;
            transition: all 0.2s ease;
        }
        .cta-button:hover {
            background: #B8935F;
            transform: translateY(-1px);
        }
        .footer {
            background: #f8f5f1;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e6e0d8;
        }
        .footer p {
            color: #6B6560;
            font-size: 14px;
            margin-bottom: 8px;
        }
        .social-links {
            margin-top: 15px;
        }
        .social-links a {
            display: inline-block;
            width: 32px;
            height: 32px;
            background: #C8A96E;
            color: #0C0C0C;
            text-align: center;
            line-height: 32px;
            border-radius: 50%;
            margin: 0 5px;
            text-decoration: none;
            font-size: 14px;
        }
        @media (max-width: 600px) {
            .email-container {
                margin: 20px 10px;
            }
            .header, .content, .footer {
                padding: 25px 20px;
            }
            .order-details {
                grid-template-columns: 1fr;
            }
            .status-change {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>📦 Order Status Updated</h1>
            <p>Your order status has changed</p>
        </div>
        
        <div class="content">
            <p>Hi <?php echo e($user->name); ?>,</p>
            <p>We wanted to let you know that there's been an update to your order status.</p>
            
            <div class="status-update">
                <h3>Current Status</h3>
                <div class="status-badge"><?php echo e(ucfirst($order->status)); ?></div>
                
                <?php if($oldStatus && $oldStatus !== $order->status): ?>
                    <div class="status-change">
                        <span class="old-status"><?php echo e(ucfirst($oldStatus)); ?></span>
                        <span>→</span>
                        <span class="new-status"><?php echo e(ucfirst($order->status)); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="order-info">
                <h3>Order Information</h3>
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
                        <div class="detail-label">Payment Status</div>
                        <div class="detail-value"><?php echo e(ucfirst($order->payment_status)); ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Last Updated</div>
                        <div class="detail-value"><?php echo e($order->updated_at->format('M d, Y H:i')); ?></div>
                    </div>
                </div>
            </div>
            
            <p>You can track your order and view all details by clicking the button below:</p>
            
            <div style="text-align: center;">
                <a href="<?php echo e(route('profile.orders.show', $order->id)); ?>" class="cta-button">
                    Track Your Order
                </a>
            </div>
            
            <p>If you have any questions about your order status, please don't hesitate to contact our customer support team.</p>
            
            <p>Best regards,<br>The SoleMates Team</p>
        </div>
        
        <div class="footer">
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
<?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/emails/orders/status-updated.blade.php ENDPATH**/ ?>