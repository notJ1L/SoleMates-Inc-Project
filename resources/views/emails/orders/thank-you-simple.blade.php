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
                                    Thank You
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 28px 24px 16px; background: linear-gradient(140deg, #fffdf8 0%, #f9f6ef 55%, #f1ede3 100%); border-bottom: 1px solid #ece8df;">
                        <div style="font-family: 'Courier New', monospace; font-size: 11px; letter-spacing: 1.8px; text-transform: uppercase; color: #999994; margin-bottom: 12px;">
                            <span style="display:inline-block; width:16px; height:2px; background:#C8A96E; vertical-align:middle; margin-right:7px;"></span>
                            Purchase Complete
                        </div>
                        <h1 style="margin: 0; font-family: Montserrat, Arial, sans-serif; font-size: 38px; line-height: 1.03; color: #0A0A0A; font-weight: 900; letter-spacing: -0.04em;">
                            Thank you for choosing SoleMates.
                        </h1>
                        <p style="margin: 14px 0 0; max-width: 500px; font-family: Inter, Arial, sans-serif; font-size: 15px; line-height: 1.7; color: #6A6A6A;">
                            Your order has been completed and your receipt is ready whenever you need it.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 24px;">
                        <p style="margin: 0 0 12px; font-family: Inter, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #0A0A0A;">
                            Hi {{ $user->name }},
                        </p>
                        <p style="margin: 0 0 20px; font-family: Inter, Arial, sans-serif; font-size: 15px; line-height: 1.7; color: #3A3A3A;">
                            We appreciate your order and your trust in our brand. We hope your new pair gives you comfort, confidence, and style every day.
                        </p>

                        <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background: #F9F8F5; border: 1px solid #E4E2DC; border-radius: 12px;">
                            <tr>
                                <td style="padding: 15px 16px; font-family: Montserrat, Arial, sans-serif; font-size: 11px; color: #A8893E; text-transform: uppercase; letter-spacing: 1.2px; font-weight: 800;">
                                    Order Summary
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
                                                    <tr><td style="padding: 11px 12px 5px; font-family: 'Courier New', monospace; font-size: 10px; color: #999994; text-transform: uppercase; letter-spacing: 1px;">Completed Date</td></tr>
                                                    <tr><td style="padding: 0 12px 12px; font-family: Montserrat, Arial, sans-serif; font-size: 18px; line-height: 1.2; color: #0A0A0A; font-weight: 800;">{{ $order->updated_at->format('M d, Y') }}</td></tr>
                                                </table>
                                            </td>
                                            <td width="50%" valign="top" style="padding: 6px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background: #FFFFFF; border: 1px solid #E4E2DC; border-radius: 8px;">
                                                    <tr><td style="padding: 11px 12px 5px; font-family: 'Courier New', monospace; font-size: 10px; color: #999994; text-transform: uppercase; letter-spacing: 1px;">Payment Method</td></tr>
                                                    <tr><td style="padding: 0 12px 12px; font-family: Montserrat, Arial, sans-serif; font-size: 18px; line-height: 1.2; color: #0A0A0A; font-weight: 800;">{{ ucfirst($order->payment_method) }}</td></tr>
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
                                    <a href="{{ route('profile.orders.receipt', $order->id) }}" style="display: inline-block; background: #0A0A0A; color: #FFFFFF; text-decoration: none; font-family: Montserrat, Arial, sans-serif; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; padding: 13px 22px; border-radius: 8px;">
                                        Download Receipt
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <a href="{{ route('profile.orders.show', $order->id) }}" style="display: inline-block; color: #3A3A3A; text-decoration: none; font-family: Montserrat, Arial, sans-serif; font-size: 11px; font-weight: 700; letter-spacing: 0.6px; text-transform: uppercase;">
                                        View Order Details
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 16px 24px 22px; border-top: 1px solid #ece8df; background-color: #FFFFFF;">
                        <p style="margin: 0; text-align: center; font-family: Inter, Arial, sans-serif; font-size: 12px; line-height: 1.7; color: #999994;">
                            &copy; {{ date('Y') }} SoleMates Footwear. Crafted for comfort, designed for style.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endsection
