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
        $rawYearly = DB::select(
            'SELECT MONTH(o.created_at) AS month_num, SUM(oi.quantity * oi.price) AS total'
            . ' FROM orders o'
            . ' JOIN order_items oi ON o.id = oi.order_id'
            . ' WHERE o.status = ? AND YEAR(o.created_at) = ?'
            . ' GROUP BY MONTH(o.created_at) ORDER BY month_num',
            ['completed', $currentYear]
        );

        $monthMap = [];
        foreach ($rawYearly as $row) {
            $monthMap[(int) $row->month_num] = (float) $row->total;
        }

        $monthNames = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $yearlyData = [];
        foreach (range(1, 12) as $m) {
            $yearlyData[] = isset($monthMap[$m]) ? round($monthMap[$m], 2) : 0;
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

        $rows = DB::select(
            "SELECT DATE_FORMAT(o.created_at, '{$format}') AS period,"
            . ' SUM(oi.quantity * oi.price) AS total'
            . ' FROM orders o'
            . ' JOIN order_items oi ON o.id = oi.order_id'
            . " WHERE o.status = 'completed'"
            . ' AND o.created_at BETWEEN ? AND ?'
            . " GROUP BY DATE_FORMAT(o.created_at, '{$format}')"
            . ' ORDER BY period',
            [$start, $end]
        );

        return response()->json([
            'labels' => array_column($rows, 'period'),
            'data'   => array_map(fn ($r) => round((float) $r->total, 2), $rows),
        ]);
    }
}
