<?php

namespace App\Services;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderReceiptService
{
    public function generateReceipt(Order $order)
    {
        $data = [
            'order' => $order,
            'user' => $order->user,
            'orderItems' => $order->orderItems->load('product'),
            'subtotal' => $order->orderItems->sum('subtotal'),
            'shipping' => $order->shipping ?? 0,
            'total' => $order->total,
            'orderDate' => $order->created_at->format('F d, Y'),
            'orderNumber' => $order->order_number,
        ];

        $pdf = Pdf::loadView('pdfs.order-receipt', $data);
        
        return $pdf->download('receipt-' . $order->order_number . '.pdf');
    }

    public function generateReceiptForAttachment(Order $order)
    {
        $data = [
            'order' => $order,
            'user' => $order->user,
            'orderItems' => $order->orderItems->load('product'),
            'subtotal' => $order->orderItems->sum('subtotal'),
            'shipping' => $order->shipping ?? 0,
            'total' => $order->total,
            'orderDate' => $order->created_at->format('F d, Y'),
            'orderNumber' => $order->order_number,
        ];

        return Pdf::loadView('pdfs.order-receipt', $data);
    }
}
