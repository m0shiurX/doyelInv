<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrmCustomer;
use App\Models\CustomerDue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerDueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_due_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDues = CustomerDue::with(['customer'])->get();

        $crm_customers = CrmCustomer::get();

        return view('admin.customerDues.index', compact('crm_customers', 'customerDues'));
    }

    public function initial_due()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customerDues.initial', compact('customers'));
    }

    public function store_initial_due(Request $request)
    {
        $customerDue = CustomerDue::where('customer_id', '=', $request->customer_id)->first();
        $customerDue->customer_dues += $request->amount;
        $customerDue->save();

        return redirect()->route('admin.customer-dues.index');
    }
}
