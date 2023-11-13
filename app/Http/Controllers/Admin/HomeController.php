<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stock;

class HomeController
{
    public function index()
    {
        $stock = Stock::first();

        return view('home', compact('stock'));
    }
}
