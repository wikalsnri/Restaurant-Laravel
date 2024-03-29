<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Food;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $reservasi = Reservation::count();
        $menu = Food::count();
        $order = Order::count();

        return view("dashboard", compact('user', 'reservasi', 'menu','order'));
    }
}
