<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $orders = Order::with('pet')->get();

        // Pass orders to the dashboard view
        return view('dashboard', compact('orders'));
    }
}
