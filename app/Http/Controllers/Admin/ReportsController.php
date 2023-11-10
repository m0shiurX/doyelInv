<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Production;
use App\Models\CrmCustomer;
use App\Models\Sell;
use Illuminate\Support\Facades\Validator;

class ReportsController extends Controller
{

    public function index(Request $request)
    {
        if ($request->isMethod('post') && $request->has('start_date') && $request->has('end_date')) {
            // Define the validation rules for the start_date and end_date
            $rules = [
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date', // End date must be after start date
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules);

            // Check if validation fails
            if ($validator->fails()) {
                // If validation fails, redirect back to the form with errors
                return redirect()->route('admin.reports')->withInput()->withErrors($validator);
            } else {
                $startDate = $request->input('start_date');
                $endDate = $request->input('end_date');

                // Query the sales table to fetch sales within the date range
                $sales = Sell::whereBetween('invoice_date', [$startDate, $endDate])->get();
                $payments = Payment::whereBetween('payment_date', [$startDate, $endDate])->get();
                $production = Production::whereBetween('production_date', [$startDate, $endDate])->get();

                // Invoice Summary
                $invoiceCount = Sell::whereBetween('invoice_date', [$startDate, $endDate])->count();
                $totalInvoiceQuantity = Sell::whereBetween('invoice_date', [$startDate, $endDate])->sum('quantity');
                $totalInvoiceWeight = Sell::whereBetween('invoice_date', [$startDate, $endDate])->sum('weight');
                $totalInvoiceAmount = Sell::whereBetween('invoice_date', [$startDate, $endDate])->sum('total_amount');
                $invoiceSummary = [
                    "type" => "Sales",
                    "invoices" => ($invoiceCount ?? '0'),
                    "quantity" => ($totalInvoiceQuantity ?? '0'),
                    'weight'   => ($totalInvoiceWeight ?? '0'),
                    'amount'   => ($totalInvoiceAmount ?? '0'),
                ];


                // Payment summary
                $paymentCount = Payment::whereBetween('payment_date', [$startDate, $endDate])->count();
                $totalPaymentAmount = Payment::whereBetween('payment_date', [$startDate, $endDate])->sum('amount');

                $paymentSummary = [
                    "type" => "Payment",
                    "invoices" => ($paymentCount ?? '0'),
                    "quantity" => '',
                    'weight'   => '',
                    'amount'   => ($totalPaymentAmount ?? '0'),
                ];

                // Production Summary
                $productionCount = Production::whereBetween('production_date', [$startDate, $endDate])->count();
                $totalProductionQuantity = Production::whereBetween('production_date', [$startDate, $endDate])->sum('quantity_produced');
                $totalProductionAmount = Production::whereBetween('production_date', [$startDate, $endDate])->sum('total_amount');
                $totalProductionWeight = Production::whereBetween('production_date', [$startDate, $endDate])->sum('weight_produced');

                $productionSummary = [
                    "type" => "Production",
                    "invoices" => ($productionCount ?? '0'),
                    "quantity" => ($totalProductionQuantity ?? '0'),
                    'weight'   => ($totalProductionWeight ?? '0'),
                    'amount'   => ($totalProductionAmount ?? '0'),
                ];
                $summaries = [
                    $invoiceSummary, $paymentSummary, $productionSummary
                ];

                // Return or display the sales report
                return view('admin.reports.show', ['sales' => $sales, 'payments' => $payments, 'production' => $production, 'summaries' => $summaries]);
            }
        } else {
            return view('admin.reports.index');
        }
    }

    public function getCustomerStatement($customerId)
    {
        // Query the database to get sales and payments for the specified customer
        $customer = CrmCustomer::find($customerId);

        // If the customer is not found, you can handle this accordingly (e.g., show an error view)
        if (!$customer) {
            abort(404, 'Customer not found');
        }

        // Get sales and payments for the customer, ordered by creation time
        $sales = Sell::where('customer_id', $customerId)->orderBy('invoice_date')->get();
        $payments = Payment::where('customer_id', $customerId)->orderBy('payment_date')->get();

        $mergedData = $sales->merge($payments)->sortBy(function ($item) {
            return $item instanceof \App\Models\Sell ? $item->invoice_date : $item->payment_date;
        });

        // dd($mergedData);

        return view('admin.reports.statement', [
            'customer' => $customer,
            'mergedData' => $mergedData,
            // 'payments' => $payments,
        ]);
    }
}
