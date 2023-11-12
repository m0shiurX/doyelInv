<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockHistory;
use Gate;
use App\Models\Stock;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

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
        Log::info('updateStockHistory function started.');
        // Get the current date
        $currentDate = now()->format('Y-m-d');


        // Check if an entry already exists for today
        $existingEntry = StockHistory::where('date', $currentDate)->first();

        $stock = Stock::first();

        if ($existingEntry === null) {
            $stockHistory = new StockHistory;
            $stockHistory->quantity = $stock->quantity;
            $stockHistory->weight = $stock->weight;
            $stockHistory->amount = $stock->amount;
            $stockHistory->date = now()->format('d-m-Y');
            $stockHistory->save();
        } else {
            $existingEntry->quantity = $stock->quantity;
            $existingEntry->weight = $stock->weight;
            $existingEntry->amount = $stock->amount;
            $existingEntry->save();
            
        }

        Log::info('updateStockHistory function completed.');
        return response()->noContent();
    }
}
