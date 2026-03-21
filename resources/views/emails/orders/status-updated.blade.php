@extends('layouts.email')

@section('content')
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
                                    Status Updated
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 28px 24px 16px; background: linear-gradient(140deg, #fffdf8 0%, #f9f6ef 55%, #f1ede3 100%); border-bottom: 1px solid #ece8df;">
                        <div style="font-family: 'Courier New', monospace; font-size: 11px; letter-spacing: 1.8px; text-transform: uppercase; color: #999994; margin-bottom: 12px;">
                            <span style="display:inline-block; width:16px; height:2px; background:#C8A96E; vertical-align:middle; margin-right:7px;"></span>
                            Order Notification
                        </div>
                        <h1 style="margin: 0; font-family: Montserrat, Arial, sans-serif; font-size: 38px; line-height: 1.03; color: #0A0A0A; font-weight: 900; letter-spacing: -0.04em;">
                            Your order status has<br>
                            <span style="display:inline-block; background:#0A0A0A; color:#FFE9B0; padding:2px 9px; border-radius:4px;">been updated.</span>
                        </h1>
                        <p style="margin: 14px 0 0; max-width: 500px; font-family: Inter, Arial, sans-serif; font-size: 15px; line-height: 1.7; color: #6A6A6A;">
                            We are keeping you informed at every step so you always know exactly where your order stands.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 24px;">
                        <p style="margin: 0 0 12px; font-family: Inter, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #0A0A0A;">
                            Hi {{ $user->name }},
                        </p>
                        <p style="margin: 0 0 18px; font-family: Inter, Arial, sans-serif; font-size: 15px; line-height: 1.7; color: #3A3A3A;">
                            We wanted to let you know that your order status just changed.
                        </p>

                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin: 0 0 18px; background: #0A0A0A; border-radius: 12px; overflow: hidden;">
                            <tr>
                                <td align="center" style="padding: 16px 16px 8px; font-family: 'Courier New', monospace; font-size: 10px; text-transform: uppercase; letter-spacing: 1.7px; color: rgba(255,255,255,0.45);">
                                    Current Status
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 0 16px 10px;">
                                    <span style="display: inline-block; background: #C8A96E; color: #0A0A0A; padding: 7px 16px; border-radius: 999px; font-family: Montserrat, Arial, sans-serif; font-size: 11px; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                            @if($oldStatus && $oldStatus !== $order->status)
                                <tr>
                                    <td align="center" style="padding: 0 16px 16px; font-family: Inter, Arial, sans-serif; font-size: 13px; color: rgba(255,255,255,0.8);">
                                        <span style="text-decoration: line-through; color: rgba(255,255,255,0.45);">{{ ucfirst($oldStatus) }}</span>
                                        <span style="display:inline-block; margin: 0 7px; color: #C8A96E;">&rarr;</span>
                                        <span style="font-weight: 700; color: #FFFFFF;">{{ ucfirst($order->status) }}</span>
                                    </td>
                                </tr>
                            @endif
                        </table>

                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background: #F9F8F5; border: 1px solid #E4E2DC; border-radius: 12px;">
                            <tr>
                                <td style="padding: 15px 16px; font-family: Montserrat, Arial, sans-serif; font-size: 11px; color: #A8893E; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 800;">
                                    Order Information
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 10px 10px;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td width="50%" valign="top" style="padding: 6px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background: #FFFFFF; border: 1px solid #E4E2DC; border-radius: 8px;">
                                                    <tr><td style="padding: 11px 12px 5px; font-family: 'Courier New', monospace; font-size: 10px; color: #999994; text-transform: uppercase; letter-spacing: 1px;">Order Number</td></tr>
                                                    <tr><td style="padding: 0 12px 12px; font-family: Montserrat, Arial, sans-serif; font-size: 18px; line-height: 1.2; color: #0A0A0A; font-weight: 800;">#{{ $order->id }}</td></tr>
                                                </table>
                                            </td>
                                            <td width="50%" valign="top" style="padding: 6px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background: #FFFFFF; border: 1px solid #E4E2DC; border-radius: 8px;">
                                                    <tr><td style="padding: 11px 12px 5px; font-family: 'Courier New', monospace; font-size: 10px; color: #999994; text-transform: uppercase; letter-spacing: 1px;">Total Amount</td></tr>
                                                    <tr><td style="padding: 0 12px 12px; font-family: Montserrat, Arial, sans-serif; font-size: 18px; line-height: 1.2; color: #0A0A0A; font-weight: 800;"><span style="font-family: Montserrat, Arial, sans-serif; font-weight: 800;">&#8369;</span>{{ number_format($order->total, 2) }}</td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50%" valign="top" style="padding: 6px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background: #FFFFFF; border: 1px solid #E4E2DC; border-radius: 8px;">
                                                    <tr><td style="padding: 11px 12px 5px; font-family: 'Courier New', monospace; font-size: 10px; color: #999994; text-transform: uppercase; letter-spacing: 1px;">Payment Status</td></tr>
                                                    <tr><td style="padding: 0 12px 12px; font-family: Montserrat, Arial, sans-serif; font-size: 18px; line-height: 1.2; color: #0A0A0A; font-weight: 800;">{{ ucfirst($order->payment_status) }}</td></tr>
                                                </table>
                                            </td>
                                            <td width="50%" valign="top" style="padding: 6px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background: #FFFFFF; border: 1px solid #E4E2DC; border-radius: 8px;">
                                                    <tr><td style="padding: 11px 12px 5px; font-family: 'Courier New', monospace; font-size: 10px; color: #999994; text-transform: uppercase; letter-spacing: 1px;">Last Updated</td></tr>
                                                    <tr><td style="padding: 0 12px 12px; font-family: Montserrat, Arial, sans-serif; font-size: 18px; line-height: 1.2; color: #0A0A0A; font-weight: 800;">{{ $order->updated_at->format('M d, Y H:i') }}</td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px;">
                            <tr>
                                <td align="center" style="padding-bottom: 10px;">
                                    <a href="{{ route('profile.orders.show', $order->id) }}" style="display: inline-block; background: #0A0A0A; color: #FFFFFF; text-decoration: none; font-family: Montserrat, Arial, sans-serif; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; padding: 13px 22px; border-radius: 8px;">
                                        Track Your Order
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <p style="margin: 18px 0 0; font-family: Inter, Arial, sans-serif; font-size: 14px; line-height: 1.7; color: #6A6A6A;">
                            If you have any questions about your order status, just reply to this email and our support team will assist you.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 16px 24px 22px; border-top: 1px solid #ece8df; background-color: #FFFFFF;">
                        <p style="margin: 0; text-align: center; font-family: Inter, Arial, sans-serif; font-size: 12px; line-height: 1.7; color: #999994;">
                            &copy; {{ date('Y') }} SoleMates Footwear. Find your perfect pair.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endsection
