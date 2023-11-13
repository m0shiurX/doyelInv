<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;
use App\Models\CustomerDue;

class HomeController
{
    public function index()
    {
        $stock = Stock::first();
        $totalDues = CustomerDue::sum('customer_dues');
        $paymentsToday = 0;
        $salesToday = 0;

        return view('home', compact('stock', 'totalDues', 'paymentsToday', 'salesToday'));
    }
}
