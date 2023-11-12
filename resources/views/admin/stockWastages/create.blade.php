@extends('layouts.admin')
@section('content')

<div class="card col-12 col-md-12 col-lg-10 offset-lg-1">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.stockWastage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stock-wastages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="wastage_date">{{ trans('cruds.stockWastage.fields.wastage_date') }}</label>
                <input class="form-control date {{ $errors->has('wastage_date') ? 'is-invalid' : '' }}" type="text" name="wastage_date" id="wastage_date" value="{{ old('wastage_date', now()->format('d-m-Y')) }}">
                @if($errors->has('wastage_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wastage_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockWastage.fields.wastage_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity_wasted">{{ trans('cruds.stockWastage.fields.quantity_wasted') }}</label>
                <input class="form-control {{ $errors->has('quantity_wasted') ? 'is-invalid' : '' }}" type="number" name="quantity_wasted" id="quantity_wasted" value="{{ old('quantity_wasted', '') }}" step="1" required>
                @if($errors->has('quantity_wasted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity_wasted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockWastage.fields.quantity_wasted_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="weight_wasted">{{ trans('cruds.stockWastage.fields.weight_wasted') }}</label>
                <input class="form-control {{ $errors->has('weight_wasted') ? 'is-invalid' : '' }}" type="number" name="weight_wasted" id="weight_wasted" value="{{ old('weight_wasted', '') }}" step="0.10" required>
                @if($errors->has('weight_wasted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight_wasted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockWastage.fields.weight_wasted_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount_wasted">{{ trans('cruds.stockWastage.fields.amount_wasted') }}</label>
                <input class="form-control {{ $errors->has('amount_wasted') ? 'is-invalid' : '' }}" type="number" name="amount_wasted" id="amount_wasted" value="{{ old('amount_wasted', '') }}" step="1" required>
                @if($errors->has('amount_wasted'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_wasted') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockWastage.fields.amount_wasted_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason">{{ trans('cruds.stockWastage.fields.reason') }}</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', '') }}">
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stockWastage.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection