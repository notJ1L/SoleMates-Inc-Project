<?php

namespace App\Notifications;

use App\Http\Controllers\Admin\OrderController;
use App\Models\Order;
use App\Services\OrderReceiptService;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCompleted extends Notification implements ShouldQueue
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $receiptService = new OrderReceiptService();
        $pdf = $receiptService->generateReceiptForAttachment($this->order);

        return (new MailMessage)
            ->subject('Order Placed - Thank you for your purchase!')
            ->view('emails.orders.completed-simple', [
                'order' => $this->order,
                'user' => $notifiable
            ])
            ->attachData($pdf->output(), 'receipt-' . $this->order->id . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
