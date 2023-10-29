<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockWastageRequest;
use App\Models\StockWastage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Stock;

class StockWastageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_wastage_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stockWastages = StockWastage::all();

        return view('admin.stockWastages.index', compact('stockWastages'));
    }

    public function create()
    {
        abort_if(Gate::denies('stock_wastage_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stockWastages.create');
    }

    public function store(StoreStockWastageRequest $request)
    {
        $productStock = Stock::latest()->first();

        $productStock->quantity -= $request->quantity_wasted;
        $productStock->weight -= $request->weight_wasted;
        $productStock->amount -= $request->amount_wasted;
        $productStock->save();

        $stockWastage = StockWastage::create($request->all());

        return redirect()->route('admin.stock-wastages.index');
    }
}
