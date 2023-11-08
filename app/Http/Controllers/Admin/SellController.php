<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySellRequest;
use App\Http\Requests\StoreSellRequest;
use App\Http\Requests\UpdateSellRequest;
use App\Models\CrmCustomer;
use App\Models\CustomerDue;
use App\Models\Sell;
use App\Models\Stock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sell_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sells = Sell::with(['customer'])->get();

        $crm_customers = CrmCustomer::get();

        return view('admin.sells.index', compact('crm_customers', 'sells'));
    }

    public function create()
    {
        abort_if(Gate::denies('sell_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::select('first_name', 'account_no', 'id')->get();

        return view('admin.sells.create', compact('customers'));
    }

    public function store(StoreSellRequest $request)
    {


        DB::transaction(function () use ($request) {

            $productStock = Stock::latest()->first();
            $productStock->quantity -= $request->quantity;
            $productStock->weight -= $request->weight;
            $productStock->amount -= $request->total_amount;
            $productStock->save();

            $customerDue = CustomerDue::where('customer_id', '=', $request->customer_id)->first();
            $customerDue->customer_dues += $request->total_amount;
            $customerDue->save();

            $sell = Sell::create($request->validated());
        });

        return redirect()->route('admin.sells.index');
    }

    public function edit(Sell $sell)
    {
        abort_if(Gate::denies('sell_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sell->load('customer');

        return view('admin.sells.edit', compact('customers', 'sell'));
    }

    public function update(UpdateSellRequest $request, Sell $sell)
    {
        $sell->update($request->all());

        return redirect()->route('admin.sells.index');
    }

    public function show(Sell $sell)
    {
        abort_if(Gate::denies('sell_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sell->load('customer');

        return view('admin.sells.show', compact('sell'));
    }

    public function destroy(Sell $sell)
    {
        abort_if(Gate::denies('sell_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sell->delete();

        return back();
    }

    public function massDestroy(MassDestroySellRequest $request)
    {
        $sells = Sell::find(request('ids'));

        foreach ($sells as $sell) {
            $sell->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
