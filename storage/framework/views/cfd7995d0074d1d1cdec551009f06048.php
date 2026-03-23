<?php $__env->startSection('content'); ?>
<table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="padding: 24px 12px; background-color: #f9f8f5;">
    <tr>
        <td align="center">
            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width: 640px; background-color: #ffffff; border: 1px solid #e4e2dc; border-radius: 14px; overflow: hidden;">
                <tr>
                    <td style="padding: 18px 24px; border-bottom: 1px solid #ece8df; background-color: #ffffff;">
                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="font-family: Montserrat, Arial, sans-serif; font-size: 21px; font-weight: 800; color: #0A0A0A; letter-spacing: -0.2px;">
                                    <span style="display: inline-block; width: 20px; height: 20px; line-height: 20px; text-align: center; border-radius: 6px; background: #C8A96E; color: #0A0A0A; font-size: 12px; font-weight: 900; margin-right: 8px;">S</span>Sole<span style="color:#A8893E;">Mates</span>
                                </td>
                                <td align="right" style="font-family: 'Courier New', monospace; font-size: 11px; color: #999994; letter-spacing: 1.2px; text-transform: uppercase;">
                                    Password Reset
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 28px 24px 16px; background: linear-gradient(140deg, #fffdf8 0%, #f9f6ef 55%, #f1ede3 100%); border-bottom: 1px solid #ece8df;">
                        <div style="font-family: 'Courier New', monospace; font-size: 11px; letter-spacing: 1.8px; text-transform: uppercase; color: #999994; margin-bottom: 12px;">
                            <span style="display:inline-block; width:16px; height:2px; background:#C8A96E; vertical-align:middle; margin-right:7px;"></span>
                            Security Notification
                        </div>
                        <h1 style="margin: 0; font-family: Montserrat, Arial, sans-serif; font-size: 38px; line-height: 1.03; color: #0A0A0A; font-weight: 900; letter-spacing: -0.04em;">
                            Password Reset<br>
                            <span style="display:inline-block; background:#0A0A0A; color:#FFE9B0; padding:2px 9px; border-radius:4px;">Request</span>
                        </h1>
                        <p style="margin: 14px 0 0; max-width: 500px; font-family: Inter, Arial, sans-serif; font-size: 15px; line-height: 1.7; color: #6A6A6A;">
                            Hi <?php echo e($user->name); ?>,<br>
                            We received a request to reset your password for your SoleMates account. Click the button below to reset your password.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 32px 24px 16px; text-align: center;">
                        <a href="<?php echo e($resetUrl); ?>" style="display: inline-block; background: #C8A96E; color: #0C0C0C; padding: 16px 36px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 18px; letter-spacing: 0.5px;">Reset Password</a>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0 24px 24px;">
                        <p style="font-size: 14px; color: #6B6560; margin-bottom: 20px;">If you didn't request this password reset, please ignore this email. Your password will remain unchanged.</p>
                        <p style="font-size: 16px; margin-top: 25px;">Best regards,<br>The SoleMates Team</p>
                    </td>
                </tr>

                <tr>
                    <td style="background: #f8f5f1; padding: 30px; text-align: center; border-top: 1px solid #e6e0d8;">
                        <p style="color: #6B6560; font-size: 14px; margin-bottom: 8px;">&copy; <?php echo e(date('Y')); ?> SoleMates Footwear. All rights reserved.</p>
                        <p style="color: #6B6560; font-size: 14px; margin-bottom: 0;">Find your perfect pair with us</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.email', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views/emails/passwords/reset.blade.php ENDPATH**/ ?>