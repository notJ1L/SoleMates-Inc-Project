<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Receipt - {{ $orderNumber }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: DejaVu Sans, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            font-size: 13px;
            color: #0C0C0C;
        }
        .receipt-container { width: 100%; background: white; }
        .header {
            background-color: #C8A96E;
            color: #0C0C0C;
            padding: 30px 40px;
            text-align: center;
        }
        .header h1 { font-size: 26px; font-weight: 800; margin-bottom: 6px; letter-spacing: 1px; }
        .header p  { font-size: 15px; margin: 0; }
        .receipt-body { padding: 30px 40px; }
        .section { margin-bottom: 28px; }
        .section-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #C8A96E;
            padding-bottom: 6px;
            border-bottom: 2px solid #C8A96E;
            margin-bottom: 14px;
        }
        .info-table { width: 100%; border-collapse: separate; border-spacing: 8px; }
        .info-cell {
            width: 50%;
            background: #f8f5f1;
            border: 1px solid #e6e0d8;
            padding: 12px;
            vertical-align: top;
        }
        .info-label { font-size: 10px; color: #6B6560; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        .info-value { font-size: 14px; font-weight: 700; color: #0C0C0C; }
        .items-table { width: 100%; border-collapse: collapse; }
        .items-table th {
            background: #f8f5f1;
            color: #6B6560;
            font-weight: 700;
            text-align: left;
            padding: 10px 12px;
            border-bottom: 2px solid #C8A96E;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .items-table th.right  { text-align: right; }
        .items-table th.center { text-align: center; }
        .items-table td { padding: 14px 12px; border-bottom: 1px solid #e6e0d8; vertical-align: middle; }
        .items-table tr:last-child td { border-bottom: none; }
        .product-name  { font-weight: 700; color: #0C0C0C; margin-bottom: 3px; }
        .product-brand { font-size: 11px; color: #6B6560; }
        .td-center { text-align: center; font-weight: 600; }
        .td-right  { text-align: right;  font-weight: 600; color: #C8A96E; }
        .totals-box { background: #f8f5f1; border: 1px solid #e6e0d8; padding: 16px 20px; }
        .totals-table { width: 100%; border-collapse: collapse; }
        .totals-table td { padding: 5px 0; font-size: 13px; }
        .totals-table .lbl { color: #6B6560; }
        .totals-table .val { text-align: right; font-weight: 600; }
        .totals-table .grand td {
            padding-top: 10px;
            border-top: 2px solid #C8A96E;
            font-size: 16px;
            font-weight: 700;
            color: #C8A96E;
        }
        .footer { background: #f8f5f1; padding: 24px 40px; text-align: center; border-top: 1px solid #e6e0d8; }
        .thank-you { font-size: 16px; font-weight: 700; color: #C8A96E; margin-bottom: 10px; }
        .footer p  { color: #6B6560; font-size: 12px; margin-bottom: 4px; }
    </style>
</head>
<body>
<div class="receipt-container">

    <div class="header">
        <h1>ORDER RECEIPT</h1>
        <p>{{ $orderNumber }}</p>
    </div>

    <div class="receipt-body">

        <div class="section">
            <div class="section-title">Customer Information</div>
            <table class="info-table">
                <tr>
                    <td class="info-cell">
                        <div class="info-label">Customer Name</div>
                        <div class="info-value">{{ $user->name }}</div>
                    </td>
                    <td class="info-cell">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $user->email }}</div>
                    </td>
                </tr>
                <tr>
                    <td class="info-cell">
                        <div class="info-label">Phone</div>
                        <div class="info-value">{{ $order->phone }}</div>
                    </td>
                    <td class="info-cell">
                        <div class="info-label">Shipping Address</div>
                        <div class="info-value">{{ $order->shipping_address }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Order Information</div>
            <table class="info-table">
                <tr>
                    <td class="info-cell">
                        <div class="info-label">Order Date</div>
                        <div class="info-value">{{ $orderDate }}</div>
                    </td>
                    <td class="info-cell">
                        <div class="info-label">Payment Method</div>
                        <div class="info-value">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</div>
                    </td>
                </tr>
                <tr>
                    <td class="info-cell">
                        <div class="info-label">Payment Status</div>
                        <div class="info-value">{{ ucfirst($order->payment_status) }}</div>
                    </td>
                    <td class="info-cell">
                        <div class="info-label">Order Status</div>
                        <div class="info-value">{{ ucfirst($order->status) }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Order Items</div>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="center">Qty</th>
                        <th class="right">Unit Price</th>
                        <th class="right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderItems as $item)
                    <tr>
                        <td>
                            <div class="product-name">{{ $item->product->name }}</div>
                            <div class="product-brand">{{ $item->product->brand->name ?? '' }}</div>
                        </td>
                        <td class="td-center">{{ $item->quantity }}</td>
                        <td class="td-right">P{{ number_format($item->price, 2) }}</td>
                        <td class="td-right">P{{ number_format($item->subtotal, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="section">
            <div class="totals-box">
                <table class="totals-table">
                    <tr>
                        <td class="lbl">Subtotal</td>
                        <td class="val">P{{ number_format($subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="lbl">Shipping</td>
                        <td class="val">P{{ number_format($shipping, 2) }}</td>
                    </tr>
                    <tr class="grand">
                        <td class="lbl">Total</td>
                        <td class="val">P{{ number_format($total, 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <div class="footer">
        <div class="thank-you">Thank you for shopping at SoleMates!</div>
        <p>This receipt serves as proof of purchase.</p>
        <p>&copy; {{ date('Y') }} SoleMates Footwear. All rights reserved.</p>
    </div>

</div>
</body>
</html>

