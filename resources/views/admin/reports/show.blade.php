@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card col-12 col-md-12 col-lg-12">
                <div class="card-header">
                    Reports 
                </div>
                <div class="card-body">

                    @include('partials.search')

                    {{-- Sales table --}}
                    <div class="table-responsive">
                        <h4>Sales Table</h4>
                        <table class=" table table-bordered table-striped table-hover">
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
                                    <th>
                                        {{ trans('cruds.sell.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.sell.fields.weight') }}
                                    </th>
                                    <th>
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
                                        <td>
                                            {{ $sale->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sale->weight ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sale->total_amount ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Payments table --}}
                    <div class="table-responsive">
                        <h4>Payments Table</h4>
                        <table class=" table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.account_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.customer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.amount') }}
                                    </th>
                                    <th>
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
                                        <td>
                                            {{ $payment->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->payment_date ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Production table --}}
                    <div class="table-responsive">
                        <h4>Production Table</h4>
                        <table class=" table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.production.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.production.fields.production_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.production.fields.quantity_produced') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.production.fields.weight_produced') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.production.fields.total_amount') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($production as $key => $prod)
                                    <tr data-entry-id="{{ $prod->id }}">
                                        <td>
                                            {{ $prod->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prod->production_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prod->quantity_produced ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prod->weight_produced ?? '' }}
                                        </td>
                                        <td>
                                            {{ $prod->total_amount ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Summary table --}}
                    <div class="table-responsive">
                        <h4>Summary Table</h4>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Invoices</th>
                                    <th>Quantity</th>
                                    <th>Weight</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($summaries as $summary)
                                <tr>
                                    <td>{{ $summary['type'] }}</td>
                                    <td>{{ $summary['invoices'] }}</td>
                                    <td>{{ $summary['quantity'] }}</td>
                                    <td>{{ $summary['weight'] }}</td>
                                    <td>{{ $summary['amount'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection