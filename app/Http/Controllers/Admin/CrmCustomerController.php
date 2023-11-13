<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCrmCustomerRequest;
use App\Http\Requests\StoreCrmCustomerRequest;
use App\Http\Requests\UpdateCrmCustomerRequest;
use App\Models\CrmCustomer;
use App\Models\CrmStatus;
use App\Models\CustomerDue;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Events\CustomerCreated;

class CrmCustomerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crm_customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomers = CrmCustomer::with(['status'])->orderBy('account_no')->get();

        return view('admin.crmCustomers.index', compact('crmCustomers'));
    }

    public function create()
    {
        abort_if(Gate::denies('crm_customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crmCustomers.create');
    }

    public function store(StoreCrmCustomerRequest $request)
    {
        $crmCustomer = CrmCustomer::create($request->all());

        event(new CustomerCreated($crmCustomer)); // Dispatch the event

        return redirect()->route('admin.crm-customers.index');
    }

    public function edit(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = CrmStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmCustomer->load('status');

        return view('admin.crmCustomers.edit', compact('crmCustomer', 'statuses'));
    }

    public function update(UpdateCrmCustomerRequest $request, CrmCustomer $crmCustomer)
    {
        $crmCustomer->update($request->all());

        return redirect()->route('admin.crm-customers.index');
    }

    public function show(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->load('status', 'customerSells', 'customerPayments', 'customerCustomerDues');

        return view('admin.crmCustomers.show', compact('crmCustomer'));
    }

    public function destroy(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($crmCustomer->customerSells()->count() > 0 || $crmCustomer->customerPayments()->count() > 0) {
            return back()
                ->with('error', 'Cannot delete customer that has sales or payments invoice.');

            // Then, just show the session('error') in the Blade
        }

        CustomerDue::where('customer_id', $crmCustomer->id)->delete();
        $crmCustomer->delete();

        return back()->with('message', 'Successfully deleted.');;
    }

    public function massDestroy(MassDestroyCrmCustomerRequest $request)
    {
        $crmCustomers = CrmCustomer::find(request('ids'));

        foreach ($crmCustomers as $crmCustomer) {
            $crmCustomer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
