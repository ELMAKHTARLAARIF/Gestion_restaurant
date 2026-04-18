<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ReservationController;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\RestaurantInformation;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;

class AdminController
{
    public function index()
    {

        $activeClients = User::where('status', 'active')->count();

        $inactiveClients = User::where('status', 'inactive')->count();

        $blockedClients = User::where('status', 'blocked')->count();
        $totalClients = User::count();
        $newClientsThisMonth = User::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $users = User::latest()->paginate(10);

        return view('Admin.Users', compact(
            'activeClients',
            'inactiveClients',
            'blockedClients',
            'users',
            'totalClients',
            'newClientsThisMonth'
        ));
    }
    public function chartData()
    {
        $last7Days = collect();
        $labels = collect();

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $labels->push($date->format('D'));

            $last7Days->push(
                Order::where('status', 'completed')
                    ->whereDate('order_date', $date)
                    ->sum('Total_Price')
            );
        }

        return response()->json([
            'labels' => $labels,
            'revenue' => $last7Days,
        ]);
    }
    public function dashboard()
    {

        $todayResevations = Reservation::whereDate('created_at', Carbon::today())->get();

        $todayCount = Reservation::whereDate('created_at', Carbon::today())->count();

        $yesterdayCount = Reservation::whereDate('created_at', Carbon::yesterday())->count();

        $pendingCount = Reservation::where('status', 'pending')->count();
        $Revenus = Order::where('status', 'completed')->sum('Total_Price');
        $DayBestPlats = MenuItem::withSum(['orders as total_quantity' => function ($query) {
            $query->whereDate('orders.created_at', Carbon::today());
        }], 'order_menu_item.quantity')
            ->orderByDesc('total_quantity')
            ->get();
        $trend = $yesterdayCount ? round((($todayCount - $yesterdayCount) / $yesterdayCount) * 100) : 100;
        // Get the last 10 reservations, newest first
        $reservations = \App\Models\Reservation::with('customer')
            ->latest()
            ->take(10)
            ->get();

        return view('Admin.dashboard', compact(
            'todayResevations',
            'reservations',
            'todayCount',
            'yesterdayCount',
            'pendingCount',
            'trend',
            'DayBestPlats',
            'Revenus'
        ));
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

    public function delete($id)
    {
        $delete = Reservation::find($id);
        $delete->delete();
        if (!$delete) {
            return redirect()->route('admin.reservations')->with('error', 'Failed to delete reservation');
        }
        return redirect()->route('admin.reservations')->with('success', 'Reservation deleted');
    }


    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();
    }

    public function inactive($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'blocked';
        $user->save();
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
    }
}
