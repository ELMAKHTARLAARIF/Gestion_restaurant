<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Carbon\Carbon;

class AdminController
{
    public function dashboard()
    {
        $todayResevations = Reservation::whereDate('created_at', Carbon::today())->get();

        $todayCount = Reservation::whereDate('created_at', Carbon::today())->count();

        $yesterdayCount = Reservation::whereDate('created_at', Carbon::yesterday())->count();

        $pendingCount = Reservation::where('status', 'pending')->count();
        // Calculate trend percentage
        $trend = $yesterdayCount ? round((($todayCount - $yesterdayCount) / $yesterdayCount) * 100) : 100;
        // Get the last 10 reservations, newest first
        $reservations = \App\Models\Reservation::with('customer')
            ->latest()
            ->take(10)
            ->get();

        return view('Admin.dashboard', compact('todayResevations','reservations', 'todayCount', 'yesterdayCount', 'pendingCount', 'trend'));
    }
    public function ShowReservationsPage()
    {

        $reservations = Reservation::with('customer')->latest()->get();
        return view('Admin.Reservations', compact('reservations'));
    }
}
