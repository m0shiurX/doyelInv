@extends('layouts.admin')
@section('content')

<div class="card col-12 col-md-12 col-lg-10 offset-lg-1">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.production.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.productions.update", [$production->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="production_date">{{ trans('cruds.production.fields.production_date') }}</label>
                <input class="form-control date {{ $errors->has('production_date') ? 'is-invalid' : '' }}" type="text" name="production_date" id="production_date" value="{{ old('production_date', $production->production_date) }}" required>
                @if($errors->has('production_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('production_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.production.fields.production_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_no">{{ trans('cruds.production.fields.invoice_no') }}</label>
                <input class="form-control {{ $errors->has('invoice_no') ? 'is-invalid' : '' }}" type="number" name="invoice_no" id="invoice_no" value="{{ old('invoice_no', $production->invoice_no) }}" step="1" required>
                @if($errors->has('invoice_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.production.fields.invoice_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity_produced">{{ trans('cruds.production.fields.quantity_produced') }}</label>
                <input class="form-control {{ $errors->has('quantity_produced') ? 'is-invalid' : '' }}" type="number" name="quantity_produced" id="quantity_produced" value="{{ old('quantity_produced', $production->quantity_produced) }}" step="1" required>
                @if($errors->has('quantity_produced'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity_produced') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.production.fields.quantity_produced_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="weight_produced">{{ trans('cruds.production.fields.weight_produced') }}</label>
                <input class="form-control {{ $errors->has('weight_produced') ? 'is-invalid' : '' }}" type="number" name="weight_produced" id="weight_produced" value="{{ old('weight_produced', $production->weight_produced) }}" step="0.10" required>
                @if($errors->has('weight_produced'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight_produced') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.production.fields.weight_produced_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_amount">{{ trans('cruds.production.fields.total_amount') }}</label>
                <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $production->total_amount) }}" step="1" required>
                @if($errors->has('total_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.production.fields.total_amount_helper') }}</span>
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