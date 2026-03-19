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
            'total_revenue' => Order::where('status', 'completed')
                                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                                ->sum(DB::raw('order_items.quantity * order_items.price')),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'active_users' => User::where('is_active', true)->count(),
        ];

        // Get recent orders
        $recentOrders = Order::with(['user', 'orderItems.product'])
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
                                DB::raw('DATE_FORMAT(orders.created_at, "%Y-%m") as month'),
                                DB::raw('SUM(order_items.quantity * order_items.price) as total'),
                                DB::raw('COUNT(*) as count')
                            )
                            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                            ->where('orders.status', 'completed')
                            ->where('orders.created_at', '>=', now()->subMonths(6))
                            ->groupBy('month')
                            ->orderBy('month')
                            ->get();

        // Yearly sales: 12-month breakdown for current year (bar chart)
        $currentYear = now()->year;
        $rawYearly = Order::select(
                DB::raw('DATE_FORMAT(orders.created_at, "%m") as month_num'),
                DB::raw('SUM(order_items.quantity * order_items.price) as total')
            )
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('orders.status', 'completed')
            ->whereYear('orders.created_at', $currentYear)
            ->groupBy('month_num')
            ->orderBy('month_num')
            ->get()
            ->keyBy('month_num');

        $monthNames = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $yearlyData = [];
        foreach (range(1, 12) as $m) {
            $key = str_pad($m, 2, '0', STR_PAD_LEFT);
            $yearlyData[] = isset($rawYearly[$key]) ? round((float) $rawYearly[$key]->total, 2) : 0;
        }

        // Product sales breakdown (pie chart)
        $productSales = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.status', 'completed')
            ->select('products.name', DB::raw('SUM(order_items.quantity * order_items.price) as total'))
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total')
            ->get();

        return view('admin.dashboard', compact(
            'stats', 'recentOrders', 'recentUsers', 'topProducts', 'monthlySales',
            'monthNames', 'yearlyData', 'productSales', 'currentYear'
        ));
    }
}
