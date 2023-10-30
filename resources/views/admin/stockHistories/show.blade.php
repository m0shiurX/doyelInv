@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stockHistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stock-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stockHistory.fields.id') }}
                        </th>
                        <td>
                            {{ $stockHistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockHistory.fields.date') }}
                        </th>
                        <td>
                            {{ $stockHistory->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockHistory.fields.quantity') }}
                        </th>
                        <td>
                            {{ $stockHistory->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockHistory.fields.weight') }}
                        </th>
                        <td>
                            {{ $stockHistory->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stockHistory.fields.amount') }}
                        </th>
                        <td>
                            {{ $stockHistory->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stock-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection