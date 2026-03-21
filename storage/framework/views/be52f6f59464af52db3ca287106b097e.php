<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Receipt - ORD-QHVBSKR2</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        @page { margin: 0; size: A4; }
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', 'DejaVu Sans', sans-serif;
            font-size: 10px;
            color: #1C1A14;
            background: #EAE6D9;
            line-height: 1.5;
        }

        /* ─────────────────────────────
           NAV BAR — mirrors the site nav
           white bg, logo left, tag right
        ───────────────────────────────*/
        .navbar {
            background: #FFFFFF;
            border-bottom: 1px solid #DDD9CE;
            padding: 0 48px;
        }
        .navbar-inner {
            width: 100%;
            border-collapse: collapse;
            height: 56px;
        }
        .navbar-inner td { vertical-align: middle; }

        .logo {
            font-size: 17px;
            font-weight: 800;
            color: #1C1A14;
            letter-spacing: -0.3px;
        }
        .logo span { color: #C8963C; }

        .nav-tag {
            text-align: right;
        }
        .nav-tag-pill {
            display: inline-block;
            border: 1.5px solid #1C1A14;
            color: #1C1A14;
            font-size: 7.5px;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            padding: 6px 16px 5px;
            border-radius: 100px;
        }

        /* ─────────────────────────────
           ORDER STRIP — cream bg like
           the hero section of the site
        ───────────────────────────────*/
        .order-strip {
            background: #EAE6D9;
            padding: 24px 48px 22px;
            border-bottom: 1px solid #D4CFC0;
        }
        .os-table { width: 100%; border-collapse: collapse; }
        .os-label {
            font-size: 7px;
            font-weight: 700;
            color: #9A9486;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding-bottom: 4px;
        }
        .os-val {
            font-size: 14px;
            font-weight: 800;
            color: #1C1A14;
            letter-spacing: -0.2px;
        }
        .os-cell   { vertical-align: top; }
        .os-cell-r { vertical-align: top; text-align: right; }

        /* status pill — like the "View All →" button on the site */
        .status-pill {
            display: inline-block;
            background: #1C1A14;
            color: #FFFFFF;
            font-size: 7px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 6px 14px 5px;
            border-radius: 100px;
        }

        /* ─────────────────────────────
           MAIN CARD — white card on
           the cream bg, like the product
           section card feel
        ───────────────────────────────*/
        .card {
            background: #FFFFFF;
            margin: 20px 48px;
            border-radius: 4px;
            border: 1px solid #DDD9CE;
            overflow: hidden;
        }

        /* ─────────────────────────────
           SECTION — matches "HANDPICKED
           / Featured Picks" pattern
        ───────────────────────────────*/
        .section { padding: 24px 28px; }
        .section + .section {
            border-top: 1px solid #EAE6D9;
        }
        .section-label {
            font-size: 7px;
            font-weight: 700;
            color: #C8963C;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding-bottom: 3px;
        }
        .section-title {
            font-size: 15px;
            font-weight: 800;
            color: #1C1A14;
            letter-spacing: -0.2px;
            padding-bottom: 18px;
        }

        /* ─────────────────────────────
           DETAIL GRID
        ───────────────────────────────*/
        .detail-table { width: 100%; border-collapse: collapse; }
        .detail-row td { padding-bottom: 14px; vertical-align: top; }
        .detail-row:last-child td { padding-bottom: 0; }
        .dt-left  { width: 50%; padding-right: 20px; }
        .dt-right { width: 50%; padding-left: 20px; border-left: 1px solid #EAE6D9; }
        .dt-label {
            font-size: 7px;
            font-weight: 700;
            color: #9A9486;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            padding-bottom: 4px;
        }
        .dt-val {
            font-size: 11px;
            font-weight: 600;
            color: #1C1A14;
        }

        /* ─────────────────────────────
           ITEMS TABLE
        ───────────────────────────────*/
        .items-table { width: 100%; border-collapse: collapse; }
        .items-table thead tr {
            background: #F4F1E8;
            border-bottom: 1px solid #DDD9CE;
        }
        .items-table th {
            font-size: 7px;
            font-weight: 700;
            color: #9A9486;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-align: left;
            padding: 10px 14px;
        }
        .items-table th.ar { text-align: right; }
        .items-table th.ac { text-align: center; }
        .items-table td {
            padding: 14px 14px;
            border-bottom: 1px solid #F0EDE4;
            font-size: 10px;
            vertical-align: middle;
        }
        .items-table tr:last-child td { border-bottom: none; }

        /* NEW badge — exactly like site product card badge */
        .new-badge {
            display: inline-block;
            background: #1C1A14;
            color: #FFFFFF;
            font-size: 6px;
            font-weight: 800;
            letter-spacing: 1px;
            padding: 2px 6px 1px;
            margin-bottom: 4px;
        }
        .item-name {
            font-size: 11px;
            font-weight: 700;
            color: #1C1A14;
        }
        .item-sub {
            font-size: 8.5px;
            font-weight: 500;
            color: #9A9486;
            padding-top: 2px;
        }

        .qty-chip {
            display: inline-block;
            border: 1.5px solid #DDD9CE;
            background: #F4F1E8;
            color: #1C1A14;
            font-weight: 700;
            font-size: 10px;
            padding: 3px 10px;
            border-radius: 100px;
        }

        .ar { text-align: right; }
        .ac { text-align: center; }
        .bold { font-weight: 700; }

        /* ─────────────────────────────
           TOTALS — bottom of items card
        ───────────────────────────────*/
        .totals-wrap { width: 100%; border-collapse: collapse; }
        .totals-spacer { width: 55%; }
        .totals-col { width: 45%; vertical-align: top; }
        .totals-box {
            border-top: 1px solid #DDD9CE;
        }
        .totals-inner { width: 100%; border-collapse: collapse; }
        .totals-inner td { padding: 9px 14px; }
        .t-lbl { font-size: 10px; color: #9A9486; font-weight: 500; }
        .t-val { text-align: right; font-size: 10px; font-weight: 600; color: #1C1A14; }

        /* grand total — dark card with gold, like the dark promo card on site */
        .total-row { background: #1C1A14; }
        .total-row td { padding: 14px; }
        .total-lbl {
            font-size: 7px;
            font-weight: 700;
            color: #9A9486;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .total-val {
            text-align: right;
            font-size: 18px;
            font-weight: 800;
            color: #C8963C;
            letter-spacing: -0.5px;
        }

        /* ─────────────────────────────
           FOOTER — same cream bg + small
           text like site footer style
        ───────────────────────────────*/
        .footer {
            padding: 20px 48px 28px;
            text-align: center;
        }
        .footer-text {
            font-size: 9px;
            font-weight: 500;
            color: #9A9486;
            line-height: 2;
        }
        .footer-brand {
            font-size: 11px;
            font-weight: 800;
            color: #1C1A14;
            padding-bottom: 6px;
        }
        .footer-brand span { color: #C8963C; }
        .footer-divider {
            width: 32px;
            height: 2px;
            background: #C8963C;
            margin: 10px auto 12px;
            border-radius: 2px;
        }
    </style>
</head>
<body>

    <!-- NAV BAR -->
    <div class="navbar">
        <table class="navbar-inner">
            <tr>
                <td>
                    <span class="logo">Sole<span>Mates</span></span>
                </td>
                <td class="nav-tag">
                    <span class="nav-tag-pill">Purchase Receipt</span>
                </td>
            </tr>
        </table>
    </div>

    <!-- ORDER STRIP -->
    <div class="order-strip">
        <table class="os-table">
            <tr>
                <td class="os-cell" style="width:36%;">
                    <div class="os-label">Receipt No.</div>
                    <div class="os-val">ORD-QHVBSKR2</div>
                </td>
                <td class="os-cell" style="width:30%;">
                    <div class="os-label">Date Issued</div>
                    <div class="os-val">March 21, 2026</div>
                </td>
                <td class="os-cell-r" style="width:34%;">
                    <div class="os-label">Order Status</div>
                    <div style="padding-top:5px;">
                        <span class="status-pill">&#10003;&nbsp; Completed</span>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- CUSTOMER DETAILS CARD -->
    <div class="card">
        <div class="section">
            <div class="section-label">Customer</div>
            <div class="section-title">Customer Details</div>
            <table class="detail-table">
                <tr class="detail-row">
                    <td class="dt-left">
                        <div class="dt-label">Full Name</div>
                        <div class="dt-val">Test User</div>
                    </td>
                    <td class="dt-right">
                        <div class="dt-label">Email Address</div>
                        <div class="dt-val">test@example.com</div>
                    </td>
                </tr>
                <tr class="detail-row">
                    <td class="dt-left">
                        <div class="dt-label">Phone Number</div>
                        <div class="dt-val">1232412421125125</div>
                    </td>
                    <td class="dt-right">
                        <div class="dt-label">Shipping Address</div>
                        <div class="dt-val">1232412421125125</div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- PAYMENT DETAILS -->
        <div class="section">
            <div class="section-label">Billing</div>
            <div class="section-title">Payment Details</div>
            <table class="detail-table">
                <tr class="detail-row">
                    <td class="dt-left">
                        <div class="dt-label">Payment Method</div>
                        <div class="dt-val">Cash On Delivery</div>
                    </td>
                    <td class="dt-right">
                        <div class="dt-label">Payment Status</div>
                        <div class="dt-val" style="color:#2A7A4B;">&#10003;&nbsp; Paid</div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- ITEMS CARD -->
    <div class="card">
        <div class="section" style="padding-bottom:0;">
            <div class="section-label">Order</div>
            <div class="section-title" style="padding-bottom:16px;">Items Ordered</div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th style="width:46%;">Product</th>
                    <th class="ac" style="width:10%;">Qty</th>
                    <th class="ar" style="width:22%;">Unit Price</th>
                    <th class="ar" style="width:22%;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="new-badge">NEW</div>
                        <div class="item-name">Nike Dunk Low Retro (Panda)</div>
                        <div class="item-sub">Nike &nbsp;&#183;&nbsp; Sneakers</div>
                    </td>
                    <td class="ac"><span class="qty-chip">1</span></td>
                    <td class="ar" style="color:#9A9486;">&#8369;6,495.00</td>
                    <td class="ar bold">&#8369;6,495.00</td>
                </tr>
            </tbody>
        </table>

        <!-- TOTALS -->
        <table class="totals-wrap">
            <tr>
                <td class="totals-spacer"></td>
                <td class="totals-col">
                    <div class="totals-box">
                        <table class="totals-inner">
                            <tr>
                                <td class="t-lbl">Subtotal</td>
                                <td class="t-val">&#8369;6,495.00</td>
                            </tr>
                            <tr>
                                <td class="t-lbl">Shipping</td>
                                <td class="t-val" style="color:#2A7A4B; font-weight:700;">Free</td>
                            </tr>
                            <tr class="total-row">
                                <td class="total-lbl">Total</td>
                                <td class="total-val">&#8369;6,495.00</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="footer-brand">Sole<span>Mates</span></div>
        <div class="footer-divider"></div>
        <div class="footer-text">
            Thank you for shopping with us. This is your official proof of purchase.<br>
            &copy; 2026 SoleMates Footwear. All rights reserved.
        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/pdfs/order-receipt.blade.php ENDPATH**/ ?>