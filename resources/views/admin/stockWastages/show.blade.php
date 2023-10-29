@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stockWastage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stock-wastages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stockWastage.fields.id') }}
                        </th>
                        <td>
                            {{ $stockWastage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockWastage.fields.quantity_wasted') }}
                        </th>
                        <td>
                            {{ $stockWastage->quantity_wasted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockWastage.fields.weight_wasted') }}
                        </th>
                        <td>
                            {{ $stockWastage->weight_wasted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockWastage.fields.amount_wasted') }}
                        </th>
                        <td>
                            {{ $stockWastage->amount_wasted }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockWastage.fields.reason') }}
                        </th>
                        <td>
                            {{ $stockWastage->reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockWastage.fields.wastage_date') }}
                        </th>
                        <td>
                            {{ $stockWastage->wastage_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stock-wastages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection