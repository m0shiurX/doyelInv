@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sell.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sells.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.id') }}
                        </th>
                        <td>
                            {{ $sell->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.invoice_no') }}
                        </th>
                        <td>
                            {{ $sell->invoice_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $sell->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.customer') }}
                        </th>
                        <td>
                            {{ $sell->customer->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.quantity') }}
                        </th>
                        <td>
                            {{ $sell->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.weight') }}
                        </th>
                        <td>
                            {{ $sell->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.unit_price') }}
                        </th>
                        <td>
                            {{ $sell->unit_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $sell->total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sell.fields.paid_status') }}
                        </th>
                        <td>
                            {{ App\Models\Sell::PAID_STATUS_RADIO[$sell->paid_status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sells.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection