@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card  d-print-none col-12 col-md-12 col-lg-12">
                <div class="card-header">
                    Reports page
                </div>
                <div class="card-body">
                    @include('partials.search')
                </div>
            </div>
            <div class="card col-12 col-md-12 col-lg-12">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="font-lg">Reports generated for <br class="d-md-none"> <span class="text-muted"> {{ $date_range }}</span>. </h4>
                        <button class="d-btn btn-info d-print-none" onclick="window.print()"> Print </button>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Sales table --}}
                    @if (count($sales) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <caption>Sales Invoices</caption>
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sell.fields.invoice_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sell.fields.invoice_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sell.fields.customer') }}
                                    </th>
                                    <th  class="text-center">
                                        {{ trans('cruds.sell.fields.quantity') }}
                                    </th>
                                    <th  class="text-center">
                                        {{ trans('cruds.sell.fields.weight') }}
                                    </th>
                                    <th  class="text-center">
                                        {{ trans('cruds.sell.fields.total_amount') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $key => $sale)
                                    <tr data-entry-id="{{ $sale->id }}">
                                        <td>
                                            {{ $sale->invoice_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sale->invoice_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sale->customer->account_no ?? '' }} - 
                                            {{ $sale->customer->first_name ?? '' }}
                                        </td>
                                        <td class="text-right">
                                            {{ $sale->quantity ?? '' }}
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($sale->weight, 2) ?? '' }}
                                        </td>
                                        <td class="text-right">
                                            {{ $sale->total_amount ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th colspan="3">Total - {{ $invoice_summary['invoices'] }} Invoices </th>
                                <th class="text-right">{{ $invoice_summary['quantity']}}</th>
                                <th class="text-right">{{ number_format($invoice_summary['weight'], 2)}}</th>
                                <th class="text-right">{{ number_format($invoice_summary['amount'], 2)}}</th>
                            </tfoot>
                        </table>
                    </div>
                    @endif

                    @if (count($payments) > 0)
                    {{-- Payments table --}}
                    <div class="table-responsive mt-5">
                        <table class=" table table-bordered table-striped table-hover">
                            <caption>Payments Invoices</caption>
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.account_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.customer') }}
                                    </th>
                                    <th  class="text-center">
                                        {{ trans('cruds.payment.fields.amount') }}
                                    </th>
                                    <th  class="text-center">
                                        {{ trans('cruds.payment.fields.payment_date') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $key => $payment)
                                    <tr data-entry-id="{{ $payment->id }}">
                                        <td>
                                            {{ $payment->customer->account_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->customer->first_name ?? '' }}
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($payment->amount, 2) ?? '' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $payment->payment_date ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th colspan="2">Total - {{ $payment_summary['invoices'] }} Payments </th>
                                <th colspan="2"  class="text-center">BDT {{ number_format($payment_summary['amount'], 2)}}</th>
                            </tfoot>
                        </table>
                    </div>
                    @endif

                    @if (count($production) > 0)
                    {{-- Production table --}}
                    <div class="table-responsive mt-5">
                        <table class=" table table-bordered table-striped table-hover">
                         <caption>Production Invoices</caption>
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.production.fields.invoice_no') }}
                                    </th>
                                    <th class="text-center">
                                        {{ trans('cruds.production.fields.production_date') }}
                                    </th>
                                    <th class="text-center">
                                         {{ trans('cruds.production.fields.quantity_produced') }}
                                    </th>
                                    <th class="text-center">
                                        {{ trans('cruds.production.fields.weight_produced') }}
                                    </th>
                                    <th class="text-center">
                                        {{ trans('cruds.production.fields.total_amount') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($production as $key => $prod)
                                    <tr data-entry-id="{{ $prod->id }}">
                                        <td>
                                            {{ $prod->invoice_no ?? '' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $prod->production_date ?? '' }}
                                        </td>
                                        <td class="text-right">
                                            {{ $prod->quantity_produced ?? '' }}
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($prod->weight_produced, 2) ?? '' }}
                                        </td>
                                        <td class="text-right">
                                            {{ $prod->total_amount ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                             <tfoot>
                                <th colspan="2">Total - {{ $production_summary['invoices'] }} Invoices </th>
                                <th class="text-right">{{ $production_summary['quantity']}}</th>
                                <th class="text-right">{{ number_format($production_summary['weight'], 2)}}</th>
                                <th class="text-right">{{ number_format($production_summary['amount'], 2)}}</th>
                            </tfoot>
                        </table>
                    </div>
                    @endif

                    {{-- Summary table --}}
                    <div class="table-responsive mt-5">
                        
                        <table class="table table-bordered table-striped table-hover">
                            <caption>Summaries of sales, payments and production.</caption>
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th class="text-center">Invoices</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Weight</th>
                                    <th class="text-center">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($summaries as $summary)
                                <tr>
                                    <th>{{ $summary['type'] }}</th>
                                    <td class="text-right">{{ $summary['invoices'] }}</td>
                                    <td class="text-right">{{ $summary['quantity'] }}</td>
                                    <td class="text-right">{{ number_format($summary['weight'], 2) }}</td>
                                    <td class="text-right">{{ number_format($summary['amount'], 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
					This statement is generated on {{now()->format('D, d M, Y')}}.
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection