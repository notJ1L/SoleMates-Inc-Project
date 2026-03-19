<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the shopping cart.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cart = $this->getCart();
        $cartTotal = 0;

        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'cartTotal'));
    }

    /**
     * Get cart items (from database for authenticated users, session for guests)
     */
    private function getCart()
    {
        if (Auth::check()) {
            // Get from database for authenticated users
            $cartItems = Cart::getUserCart(Auth::id());
            $cart = [];

            foreach ($cartItems as $item) {
                $cart[$item->product_id] = [
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'image' => $item->product->thumbnailUrl(),
                    'stock' => $item->product->stock
                ];
            }

            return $cart;
        } else {
            // Get from session for guests
            return session()->get('cart', []);
        }
    }

    /**
     * Add a product to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Check if product is in stock
        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'Product is out of stock.');
        }

        if (Auth::check()) {
            // Add to database for authenticated users
            $cartItem = Cart::where('user_id', Auth::id())
                            ->where('product_id', $id)
                            ->first();

            if ($cartItem) {
                // Check if adding more would exceed stock
                if ($cartItem->quantity >= $product->stock) {
                    return redirect()->back()->with('error', 'Cannot add more than available stock.');
                }
                Cart::addItem(Auth::id(), $id, 1);
            } else {
                Cart::addItem(Auth::id(), $id, 1);
            }
        } else {
            // Add to session for guests
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                // Check if adding more would exceed stock
                if ($cart[$id]['quantity'] >= $product->stock) {
                    return redirect()->back()->with('error', 'Cannot add more than available stock.');
                }
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'image' => $product->thumbnailUrl(),
                    'stock' => $product->stock
                ];
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Update cart item quantity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Auth::check()) {
            // Update in database for authenticated users
            $product = Product::findOrFail($productId);
            
            // Validate quantity
            if ($quantity <= 0) {
                Cart::removeItem(Auth::id(), $productId);
            } elseif ($quantity <= $product->stock) {
                Cart::updateItem(Auth::id(), $productId, $quantity);
            } else {
                return redirect()->back()->with('error', 'Quantity exceeds available stock.');
            }
        } else {
            // Update in session for guests
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $product = Product::findOrFail($productId);
                
                if ($quantity <= 0) {
                    unset($cart[$productId]);
                } elseif ($quantity <= $product->stock) {
                    $cart[$productId]['quantity'] = $quantity;
                } else {
                    return redirect()->back()->with('error', 'Quantity exceeds available stock.');
                }
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    /**
     * Remove an item from the cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        if (Auth::check()) {
            // Remove from database for authenticated users
            Cart::removeItem(Auth::id(), $id);
        } else {
            // Remove from session for guests
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    /**
     * Clear the entire cart.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        if (Auth::check()) {
            // Clear from database for authenticated users
            Cart::clearUserCart(Auth::id());
        } else {
            // Clear from session for guests
            session()->forget('cart');
        }

        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }
}
