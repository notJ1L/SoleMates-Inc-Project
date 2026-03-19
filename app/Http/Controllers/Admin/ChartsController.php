<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $currentYear = now()->year;

        // Yearly sales: all 12 months for the current year
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

        // Product pie chart: total sales per product (all time, completed orders)
        $productSales = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.status', 'completed')
            ->select(
                'products.name',
                DB::raw('SUM(order_items.quantity * order_items.price) as total')
            )
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total')
            ->get();

        return view('admin.charts.index', compact('monthNames', 'yearlyData', 'productSales', 'currentYear'));
    }

    public function salesByRange(Request $request)
    {
        $request->validate([
            'start' => 'required|date',
            'end'   => 'required|date|after_or_equal:start',
        ]);

        $start = now()->parse($request->input('start'))->startOfDay();
        $end   = now()->parse($request->input('end'))->endOfDay();

        // Group by day when range ≤ 60 days, else by month
        $diffDays = $start->diffInDays($end);
        $format   = $diffDays <= 60 ? '%Y-%m-%d' : '%Y-%m';

        $rows = Order::select(
                DB::raw("DATE_FORMAT(orders.created_at, '{$format}') as period"),
                DB::raw('SUM(order_items.quantity * order_items.price) as total')
            )
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('orders.status', 'completed')
            ->whereBetween('orders.created_at', [$start, $end])
            ->groupBy('period')
            ->orderBy('period')
            ->get();

        return response()->json([
            'labels' => $rows->pluck('period'),
            'data'   => $rows->map(fn ($r) => round((float) $r->total, 2))->values(),
        ]);
    }
}
