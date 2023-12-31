@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stock.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.id') }}
                        </th>
                        <td>
                            {{ $stock->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.quantity') }}
                        </th>
                        <td>
                            {{ $stock->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.weight') }}
                        </th>
                        <td>
                            {{ $stock->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stock.fields.amount') }}
                        </th>
                        <td>
                            {{ $stock->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection