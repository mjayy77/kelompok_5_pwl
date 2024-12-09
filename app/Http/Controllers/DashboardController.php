<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\TransaksiPenjualan;
use Carbon\Carbon;


class DashboardController extends Controller
{
    
    public function index()
    {
        // Overall
        $productCount = Product::count();
        $supplierCount = Supplier::count();
        $transactionCount = TransaksiPenjualan::count();
        $totalRevenue = TransaksiPenjualan::where('status_pemesanan_id', '!=', 4)
        ->sum('total');

        $transactionsByStatusOverall = TransaksiPenjualan::selectRaw('status_pemesanan_id, COUNT(*) as count')
            ->groupBy('status_pemesanan_id')
            ->pluck('count', 'status_pemesanan_id');

        $statusCountsOverall = [
            'On Process' => $transactionsByStatusOverall[1] ?? 0,
            'Delivered' => $transactionsByStatusOverall[2] ?? 0,
            'Arrived' => $transactionsByStatusOverall[3] ?? 0,
            'Canceled' => $transactionsByStatusOverall[4] ?? 0,
        ];

        // Monthly
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $transactionsByStatus = TransaksiPenjualan::whereBetween('tanggal_transaksi', [$startOfMonth, $endOfMonth])
            ->selectRaw('status_pemesanan_id, COUNT(*) as count')
            ->groupBy('status_pemesanan_id')
            ->pluck('count', 'status_pemesanan_id');

        $statusCounts = [
            'On Process' => $transactionsByStatus[1] ?? 0,
            'Delivered' => $transactionsByStatus[2] ?? 0,
            'Arrived' => $transactionsByStatus[3] ?? 0,
            'Canceled' => $transactionsByStatus[4] ?? 0,
        ];

        $monthlyRevenue = TransaksiPenjualan::whereBetween('tanggal_transaksi', [$startOfMonth, $endOfMonth])
        ->where('status_pemesanan_id', '!=', 4)
        ->sum('total');

        $newProducts = Product::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $newSuppliers = Supplier::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        // Past month
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        $lastMonthRevenue = TransaksiPenjualan::whereBetween('tanggal_transaksi', [$startOfLastMonth, $endOfLastMonth])
            ->where('status_pemesanan_id', '!=', 4)
            ->sum('total');

        $percentageChange = 0;
        if ($lastMonthRevenue > 0) {
            $percentageChange = (($monthlyRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
        }

        $revenueChangeClass = ($percentageChange >= 0) ? 'text-success' : 'text-danger';
        $formattedPercentage = number_format(abs($percentageChange), 2);
        $percentageSign = $percentageChange >= 0 ? '+' : '-';

        // Need attention
        $lowStockItems = Product::where('stock', '<', 10)
            ->orderBy('stock', 'asc')
            ->get(['id', 'title', 'stock']);


        return view('dashboard.index', compact(
            'productCount',
            'supplierCount',
            'transactionCount',
            'totalRevenue',
            'statusCounts',
            'statusCountsOverall',
            'monthlyRevenue',
            'newProducts',
            'newSuppliers',
            'lastMonthRevenue',
            'formattedPercentage',
            'percentageSign',
            'revenueChangeClass',
            'lowStockItems',
        ));
    }
}

