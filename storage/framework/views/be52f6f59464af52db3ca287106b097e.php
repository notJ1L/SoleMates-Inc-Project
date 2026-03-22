<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Receipt - <?php echo e($orderNumber); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #1C1A14;
            background: #EAE6D9;
            line-height: 1.5;
        }

        /* ── NAVBAR ── */
        .navbar {
            background: #FFFFFF;
            border-bottom: 1px solid #DDD9CE;
            padding: 14px 48px;
        }
        .navbar-table {
            width: 100%;
            border-collapse: collapse;
        }
        .logo {
            font-size: 18px;
            font-weight: bold;
            color: #1C1A14;
        }
        .logo-gold {
            color: #C8963C;
        }
        .receipt-tag {
            text-align: right;
            vertical-align: middle;
        }
        .receipt-tag-inner {
            border: 1.5px solid #1C1A14;
            color: #1C1A14;
            font-size: 7px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 14px;
        }

        /* ── ORDER STRIP ── */
        .order-strip {
            background: #EAE6D9;
            padding: 18px 48px;
            border-bottom: 1px solid #D4CFC0;
        }
        .order-strip-table {
            width: 100%;
            border-collapse: collapse;
        }
        .os-label {
            font-size: 7px;
            font-weight: bold;
            color: #9A9486;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding-bottom: 4px;
        }
        .os-val {
            font-size: 14px;
            font-weight: bold;
            color: #1C1A14;
        }
        .status-badge {
            background: #1C1A14;
            color: #FFFFFF;
            font-size: 7px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 5px 12px;
        }

        /* ── SPACER ── */
        .spacer {
            height: 16px;
            background: #EAE6D9;
        }

        /* ── WHITE CARD ── */
        .card {
            background: #FFFFFF;
            margin: 0 48px;
            border: 1px solid #DDD9CE;
        }

        .card-gap {
            height: 14px;
            background: #EAE6D9;
        }

        /* ── SECTION ── */
        .section {
            padding: 20px 24px;
        }
        .section-divider {
            height: 1px;
            background: #EAE6D9;
            margin: 0 24px;
        }
        .section-label {
            font-size: 7px;
            font-weight: bold;
            color: #C8963C;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding-bottom: 2px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #1C1A14;
            padding-bottom: 16px;
        }

        /* ── DETAIL GRID ── */
        .detail-table {
            width: 100%;
            border-collapse: collapse;
        }
        .detail-row td {
            padding-bottom: 14px;
            vertical-align: top;
        }
        .detail-row:last-child td {
            padding-bottom: 0;
        }
        .dt-left {
            width: 50%;
            padding-right: 20px;
        }
        .dt-right {
            width: 50%;
            padding-left: 20px;
            border-left: 1px solid #EAE6D9;
        }
        .dt-label {
            font-size: 7px;
            font-weight: bold;
            color: #9A9486;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            padding-bottom: 3px;
        }
        .dt-val {
            font-size: 11px;
            color: #1C1A14;
        }

        /* ── ITEMS TABLE ── */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            border-top: 1px solid #DDD9CE;
        }
        .items-head td {
            background: #F4F1E8;
            font-size: 7px;
            font-weight: bold;
            color: #9A9486;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 9px 14px;
            border-bottom: 1px solid #DDD9CE;
        }
        .items-body td {
            padding: 14px 14px;
            border-bottom: 1px solid #F0EDE4;
            font-size: 10px;
            vertical-align: middle;
        }
        .items-body:last-child td {
            border-bottom: none;
        }
        .new-badge {
            background: #1C1A14;
            color: #FFFFFF;
            font-size: 6px;
            font-weight: bold;
            letter-spacing: 1px;
            padding: 2px 5px;
        }
        .item-name {
            font-size: 11px;
            font-weight: bold;
            color: #1C1A14;
            padding-top: 3px;
        }
        .item-sub {
            font-size: 8px;
            color: #9A9486;
            padding-top: 2px;
        }
        .qty-chip {
            border: 1.5px solid #DDD9CE;
            background: #F4F1E8;
            color: #1C1A14;
            font-weight: bold;
            font-size: 10px;
            padding: 3px 10px;
        }

        /* ── TOTALS ── */
        .totals-table {
            width: 100%;
            border-collapse: collapse;
            border-top: 1px solid #DDD9CE;
        }
        .totals-spacer {
            width: 55%;
        }
        .totals-col {
            width: 45%;
            vertical-align: top;
        }
        .totals-row td {
            padding: 8px 14px;
            font-size: 10px;
            border-bottom: 1px solid #F0EDE4;
        }
        .totals-row:last-of-type td {
            border-bottom: none;
        }
        .t-lbl {
            color: #9A9486;
        }
        .t-val {
            text-align: right;
            font-weight: bold;
            color: #1C1A14;
        }
        .total-final-row td {
            background: #1C1A14;
            padding: 12px 14px;
        }
        .total-final-lbl {
            font-size: 7px;
            font-weight: bold;
            color: #9A9486;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .total-final-val {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            color: #C8963C;
        }

        /* ── FOOTER ── */
        .footer {
            background: #EAE6D9;
            padding: 20px 48px 28px;
            text-align: center;
        }
        .footer-brand {
            font-size: 13px;
            font-weight: bold;
            color: #1C1A14;
            padding-bottom: 6px;
        }
        .footer-brand-gold {
            color: #C8963C;
        }
        .footer-line {
            width: 32px;
            height: 2px;
            background: #C8963C;
            margin: 6px auto 10px;
        }
        .footer-text {
            font-size: 8.5px;
            color: #9A9486;
            line-height: 1.9;
        }
    </style>
</head>
<body>

    
    <div class="navbar">
        <table class="navbar-table">
            <tr>
                <td style="vertical-align: middle;">
                    <span class="logo">Sole<span class="logo-gold">Mates</span></span>
                </td>
                <td class="receipt-tag">
                    <span class="receipt-tag-inner">Purchase Receipt</span>
                </td>
            </tr>
        </table>
    </div>

    
    <div class="order-strip">
        <table class="order-strip-table">
            <tr>
                <td style="width: 36%; vertical-align: top;">
                    <div class="os-label">Receipt No.</div>
                    <div class="os-val"><?php echo e($orderNumber); ?></div>
                </td>
                <td style="width: 30%; vertical-align: top;">
                    <div class="os-label">Date Issued</div>
                    <div class="os-val"><?php echo e($orderDate); ?></div>
                </td>
                <td style="width: 34%; vertical-align: top; text-align: right;">
                    <div class="os-label">Order Status</div>
                    <div style="padding-top: 5px;">
                        <span class="status-badge">&#10003; <?php echo e(ucfirst($order->status)); ?></span>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="spacer"></div>

    
    <div class="card">

        
        <div class="section">
            <div class="section-label">Customer</div>
            <div class="section-title">Customer Details</div>
            <table class="detail-table">
                <tr class="detail-row">
                    <td class="dt-left">
                        <div class="dt-label">Full Name</div>
                        <div class="dt-val"><?php echo e($user->name); ?></div>
                    </td>
                    <td class="dt-right">
                        <div class="dt-label">Email Address</div>
                        <div class="dt-val"><?php echo e($user->email); ?></div>
                    </td>
                </tr>
                <tr class="detail-row">
                    <td class="dt-left">
                        <div class="dt-label">Phone Number</div>
                        <div class="dt-val"><?php echo e($order->phone); ?></div>
                    </td>
                    <td class="dt-right">
                        <div class="dt-label">Shipping Address</div>
                        <div class="dt-val"><?php echo e($order->shipping_address); ?></div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section-divider"></div>

        
        <div class="section">
            <div class="section-label">Billing</div>
            <div class="section-title">Payment Details</div>
            <table class="detail-table">
                <tr class="detail-row">
                    <td class="dt-left">
                        <div class="dt-label">Payment Method</div>
                        <div class="dt-val"><?php echo e(ucfirst(str_replace('_', ' ', $order->payment_method))); ?></div>
                    </td>
                    <td class="dt-right">
                        <div class="dt-label">Payment Status</div>
                        <div class="dt-val" style="color: #2A7A4B; font-weight: bold;">
                            &#10003; <?php echo e(ucfirst($order->payment_status)); ?>

                        </div>
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <div class="card-gap"></div>

    
    <div class="card">
        <div class="section" style="padding-bottom: 14px;">
            <div class="section-label">Order</div>
            <div class="section-title" style="padding-bottom: 0;">Items Ordered</div>
        </div>

        <table class="items-table">
            <tr class="items-head">
                <td style="width: 46%;">Product</td>
                <td style="width: 10%; text-align: center;">Qty</td>
                <td style="width: 22%; text-align: right;">Unit Price</td>
                <td style="width: 22%; text-align: right;">Subtotal</td>
            </tr>
            <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="items-body">
                <td>
                    <span class="new-badge">NEW</span>
                    <div class="item-name"><?php echo e($item->product->name); ?></div>
                    <div class="item-sub"><?php echo e($item->product->brand->name ?? 'SoleMates'); ?> &nbsp;&#183;&nbsp; Sneakers</div>
                </td>
                <td style="text-align: center;">
                    <span class="qty-chip"><?php echo e($item->quantity); ?></span>
                </td>
                <td style="text-align: right; color: #9A9486;">&#8369;<?php echo e(number_format($item->price, 2)); ?></td>
                <td style="text-align: right; font-weight: bold;">&#8369;<?php echo e(number_format($item->subtotal, 2)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

        
        <table class="totals-table">
            <tr>
                <td class="totals-spacer"></td>
                <td class="totals-col">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr class="totals-row">
                            <td class="t-lbl">Subtotal</td>
                            <td class="t-val">&#8369;<?php echo e(number_format($subtotal, 2)); ?></td>
                        </tr>
                        <tr class="totals-row">
                            <td class="t-lbl">Shipping</td>
                            <td class="t-val" style="color: #2A7A4B;">
                                <?php if($shipping == 0): ?> Free <?php else: ?> &#8369;<?php echo e(number_format($shipping, 2)); ?> <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="total-final-row">
                            <td class="total-final-lbl">Total</td>
                            <td class="total-final-val">&#8369;<?php echo e(number_format($total, 2)); ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>

    <div class="card-gap"></div>

    
    <div class="footer">
        <div class="footer-brand">Sole<span class="footer-brand-gold">Mates</span></div>
        <div class="footer-line"></div>
        <div class="footer-text">
            Thank you for shopping with us. This is your official proof of purchase.<br>
            &copy; <?php echo e(date('Y')); ?> SoleMates Footwear. All rights reserved.
        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/pdfs/order-receipt.blade.php ENDPATH**/ ?>