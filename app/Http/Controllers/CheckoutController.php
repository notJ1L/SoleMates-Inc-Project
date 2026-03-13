<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the checkout page.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $cartItems = Cart::getUserCart(Auth::id());

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Convert cart items to array format for view
        $cart = [];
        $cartTotal = 0;

        foreach ($cartItems as $item) {
            $cart[$item->product_id] = [
                'name' => $item->product->name,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'image' => $item->product->photos->first()?->image_path,
                'stock' => $item->product->stock
            ];
            $cartTotal += $item->product->price * $item->quantity;
        }

        $user = Auth::user();

        return view('checkout.index', compact('cart', 'cartTotal', 'user'));
    }

    /**
     * Process the checkout and create an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(Request $request)
    {
        $cartItems = Cart::getUserCart(Auth::id());

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'shipping_address' => 'required|string|min:10',
            'phone' => 'required|string|min:10',
            'payment_method' => 'required|in:cod,gcash,bank_transfer'
        ]);

        try {
            DB::beginTransaction();

            // Calculate total
            $totalAmount = 0;
            foreach ($cartItems as $item) {
                $totalAmount += $item->product->price * $item->quantity;
            }

            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-' . strtoupper(Str::random(8)),
                'status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'phone' => $request->phone,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending'
            ]);

            // Create order items and update stock
            foreach ($cartItems as $item) {
                // Check stock availability
                if ($item->product->stock < $item->quantity) {
                    DB::rollBack();
                    return redirect()->back()->with('error', "Product '{$item->product->name}' is out of stock or insufficient quantity.");
                }

                // Create order item
                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'subtotal' => $item->product->price * $item->quantity,
                ]);

                // Update product stock
                $item->product->decrement('stock', $item->quantity);
            }

            DB::commit();

            // Clear cart from database
            Cart::clearUserCart(Auth::id());

            return redirect()->route('checkout.success', $order->id)->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }

    /**
     * Display order confirmation page.
     *
     * @param  int  $orderId
     * @return \Illuminate\View\View
     */
    public function success($orderId)
    {
        $order = Order::with(['orderItems.product', 'user'])
                     ->where('id', $orderId)
                     ->where('user_id', Auth::id())
                     ->firstOrFail();

        return view('checkout.success', compact('order'));
    }
}
