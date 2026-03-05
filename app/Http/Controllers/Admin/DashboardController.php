<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get dashboard statistics
        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_orders' => Order::count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total_amount'),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'active_users' => User::where('is_active', true)->count(),
        ];

        // Get recent orders
        $recentOrders = Order::with(['user', 'items.product'])
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        // Get recent users
        $recentUsers = User::orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();

        // Get top products
        $topProducts = Product::withCount(['orderItems' => function($query) {
                                $query->whereHas('order', function($orderQuery) {
                                    $orderQuery->where('status', 'completed');
                                });
                            }])
                            ->orderBy('order_items_count', 'desc')
                            ->take(5)
                            ->get();

        // Get monthly sales data for the last 6 months
        $monthlySales = Order::select(
                                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                                DB::raw('SUM(total_amount) as total'),
                                DB::raw('COUNT(*) as count')
                            )
                            ->where('status', 'completed')
                            ->where('created_at', '>=', now()->subMonths(6))
                            ->groupBy('month')
                            ->orderBy('month')
                            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'recentUsers', 'topProducts', 'monthlySales'));
    }
}
