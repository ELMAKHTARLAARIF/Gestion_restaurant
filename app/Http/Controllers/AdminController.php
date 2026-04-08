<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ReservationController;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\RestaurantInformation;
use Carbon\Carbon;

class AdminController
{
    public function dashboard()
    {
        $todayResevations = Reservation::whereDate('created_at', Carbon::today())->get();

        $todayCount = Reservation::whereDate('created_at', Carbon::today())->count();

        $yesterdayCount = Reservation::whereDate('created_at', Carbon::yesterday())->count();

        $pendingCount = Reservation::where('status', 'pending')->count();
        $Revenus = Order::where('status', 'completed')->sum('Total_Price');
        $DayBestPlats = MenuItem::withSum(['orders as total_quantity' => function ($query) {
            $query->whereDate('Order.created_at', Carbon::today());
        }], 'order_menu_item.quantity')
            ->orderByDesc('total_quantity')
            ->get();
        $trend = $yesterdayCount ? round((($todayCount - $yesterdayCount) / $yesterdayCount) * 100) : 100;
        // Get the last 10 reservations, newest first
        $reservations = \App\Models\Reservation::with('customer')
            ->latest()
            ->take(10)
            ->get();

        return view('Admin.dashboard', compact('todayResevations', 'reservations', 'todayCount', 'yesterdayCount', 'pendingCount', 'trend', 'DayBestPlats', 'Revenus'));
    }
    public function ShowReservationsPage()
    {

        $reservations = Reservation::with('customer')->latest()->get();
        $TotalDays = Reservation::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderByDesc('date')
            ->get();
        $acceptedCount = Reservation::where('status', 'accepted')->count();
        $pendingCount = Reservation::where('status', 'pending')->count();
        $cancelledCount = Reservation::where('status', 'cancelled')->count();
        $allCount = Reservation::count();
        return view('Admin.Reservations', compact('reservations', 'TotalDays', 'acceptedCount', 'pendingCount', 'cancelledCount', 'allCount'));
    }
    public function ShowRestaurantInfo()
    {
        return view('Admin.Info_Rest');
    }
}
