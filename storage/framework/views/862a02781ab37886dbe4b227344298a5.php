<?php $__env->startSection('content'); ?>
<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
    
    <!-- Header -->
    <div style="background: linear-gradient(135deg, #C8A96E, #B8935F); padding: 50px 30px; text-align: center; color: #0C0C0C;">
        <h1 style="font-size: 32px; font-weight: 800; margin: 0 0 12px 0;">🎉 Thank You!</h1>
        <p style="font-size: 18px; margin: 0;">Your order has been successfully completed</p>
    </div>
    
    <!-- Thank You Message -->
    <div style="padding: 40px 30px; text-align: center;">
        <h2 style="font-size: 24px; font-weight: 700; color: #C8A96E; margin-bottom: 15px;">Dear <?php echo e($user->name); ?>,</h2>
        <p style="font-size: 16px; color: #6B6560; line-height: 1.7; margin-bottom: 20px;">We're absolutely delighted that you chose SoleMates for your footwear needs! Your order has been completed and is on its way to you.</p>
        <p style="font-size: 16px; color: #6B6560; line-height: 1.7; margin-bottom: 20px;">Thank you for trusting us with your purchase. We hope your new shoes bring you comfort, style, and countless happy steps!</p>
    </div>
    
    <!-- Order Summary -->
    <div style="margin: 0 30px 30px; padding: 25px; background: #f8f5f1; border-radius: 12px; border: 1px solid #e6e0d8;">
        <h3 style="color: #C8A96E; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 20px;">📦 Your Order Summary</h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div style="padding: 15px; background: white; border-radius: 8px; border: 1px solid #e6e0d8;">
                <div style="font-size: 12px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 6px;">Order Number</div>
                <div style="font-size: 16px; font-weight: 600; color: #0C0C0C;">#<?php echo e($order->id); ?></div>
            </div>
            <div style="padding: 15px; background: white; border-radius: 8px; border: 1px solid #e6e0d8;">
                <div style="font-size: 12px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 6px;">Total Amount</div>
                <div style="font-size: 16px; font-weight: 600; color: #0C0C0C;">₱<?php echo e(number_format($order->total, 2)); ?></div>
            </div>
            <div style="padding: 15px; background: white; border-radius: 8px; border: 1px solid #e6e0d8;">
                <div style="font-size: 12px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 6px;">Completed Date</div>
                <div style="font-size: 16px; font-weight: 600; color: #0C0C0C;"><?php echo e($order->updated_at->format('M d, Y')); ?></div>
            </div>
            <div style="padding: 15px; background: white; border-radius: 8px; border: 1px solid #e6e0d8;">
                <div style="font-size: 12px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 6px;">Payment Method</div>
                <div style="font-size: 16px; font-weight: 600; color: #0C0C0C;"><?php echo e(ucfirst($order->payment_method)); ?></div>
            </div>
        </div>
    </div>
    
    <!-- Buttons -->
    <div style="display: flex; gap: 15px; justify-content: center; margin: 30px; flex-wrap: wrap;">
        <a href="<?php echo e(route('profile.orders.receipt', $order->id)); ?>" style="display: inline-block; background: #C8A96E; color: #0C0C0C; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 16px; text-align: center; min-width: 150px;">📄 Download Receipt</a>
        <a href="<?php echo e(route('profile.orders.show', $order->id)); ?>" style="display: inline-block; background: transparent; border: 2px solid #C8A96E; color: #C8A96E; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 16px; text-align: center; min-width: 150px;">View Order</a>
    </div>
    
    <!-- Footer -->
    <div style="background: #f8f5f1; padding: 40px 30px; text-align: center; border-top: 1px solid #e6e0d8;">
        <h3 style="color: #C8A96E; font-size: 18px; margin-bottom: 15px;">Shop With Us Again!</h3>
        <p style="color: #6B6560; font-size: 14px; margin-bottom: 8px;">We'd love to see you back soon. Check out our latest collections and exclusive offers!</p>
        <p style="color: #6B6560; font-size: 14px; margin-bottom: 20px;">&copy; <?php echo e(date('Y')); ?> SoleMates Footwear. All rights reserved.</p>
        <p style="color: #6B6560; font-size: 14px; margin-bottom: 0;">Find your perfect pair with us</p>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.email', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/emails/orders/thank-you-simple.blade.php ENDPATH**/ ?>