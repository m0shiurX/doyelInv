<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrmCustomer;
use App\Models\CustomerDue;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CustomerDueController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_due_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDues = CustomerDue::with(['customer'])->get();
        $totalDues = CustomerDue::sum('customer_dues');

        $crm_customers = CrmCustomer::get();

        return view('admin.customerDues.index', compact('crm_customers', 'customerDues', 'totalDues'));
    }
}
