<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomersOpeningBalanceRequest;
use Illuminate\Support\Facades\DB;
use App\Models\CrmCustomer;
use App\Models\CustomersOpeningBalance;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\CustomerDue;

class CustomersOpeningBalanceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customers_opening_balance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customersOpeningBalances = CustomersOpeningBalance::with(['customer'])->get();

        return view('admin.customersOpeningBalances.index', compact('customersOpeningBalances'));
    }

    public function create()
    {
        abort_if(Gate::denies('customers_opening_balance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customersOpeningBalances.create', compact('customers'));
    }

    public function store(StoreCustomersOpeningBalanceRequest $request)
    {
        DB::transaction(
            function () use ($request) {
                $customerDue = CustomerDue::where('customer_id', '=', $request->customer_id)->first();
                $customerDue->customer_dues += $request->amount;
                $customerDue->save();
                $customersOpeningBalance = CustomersOpeningBalance::create($request->all());
            }
        );

        return redirect()->route('admin.customers-opening-balances.index');
    }
}
