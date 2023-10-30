<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockHistory;
use Gate;
use App\Models\Stock;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StockHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockHistories = StockHistory::all();

        return view('admin.stockHistories.index', compact('stockHistories'));
    }

    public function updateStockHistory()
    {
        // Get the current date
        $currentDate = now()->toDateString();

        // Check if an entry already exists for today
        $existingEntry = StockHistory::where('date', $currentDate)->first();

        if ($existingEntry) {
            // Update the existing entry based on the stock at that time
            $stock = Stock::first(); // Assuming you have only one product

            $existingEntry->quantity = $stock->quantity;
            $existingEntry->weight = $stock->weight;
            $existingEntry->amount = $stock->amount;


            $existingEntry->save();
        } else {
            // Create a new entry for today
            $stock = Stock::first(); // Assuming you have only one product

            $stockHistory = new StockHistory;
            $stockHistory->quantity = $stock->quantity;
            $stockHistory->weight = $stock->weight;
            $stockHistory->amount = $stock->amount;
            $stockHistory->date = $currentDate;
            $stockHistory->save();
        }
    }
}
