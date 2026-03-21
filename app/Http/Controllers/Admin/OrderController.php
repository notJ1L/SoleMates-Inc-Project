<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\OrderCompleted;
use App\Notifications\OrderStatusUpdated;
use App\Notifications\OrderThankYou;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product']);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled'
        ]);

        $oldStatus = $order->status;
        $order->update(['status' => $request->status]);

        // Update payment status when order is marked as completed
        if ($request->status === 'completed') {
            $order->update(['payment_status' => 'paid']);
        }

        // Send email notification for status change
        if ($oldStatus !== $request->status) {
            if ($request->status === 'completed' && $oldStatus !== 'completed') {
                // Send thank you email instead of status update when completed
                $order->user->notify(new OrderThankYou($order));
            } else {
                // Send regular status update for other status changes
                $order->user->notify(new OrderStatusUpdated($order, $oldStatus));
            }
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
