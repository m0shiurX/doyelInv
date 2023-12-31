@extends('layouts.admin')
@section('content')

<div class="card col-12 col-md-12 col-lg-10 offset-lg-1">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sell.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sells.update", [$sell->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label class="required" for="invoice_no">{{ trans('cruds.sell.fields.invoice_no') }}</label>
                    <input class="form-control {{ $errors->has('invoice_no') ? 'is-invalid' : '' }}" type="number" name="invoice_no" id="invoice_no" value="{{ old('invoice_no', $sell->invoice_no) }}" step="1" required>
                    @if($errors->has('invoice_no'))
                        <div class="invalid-feedback">
                            {{ $errors->first('invoice_no') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sell.fields.invoice_no_helper') }}</span>
                </div>
                <div class="form-group col">
                    <label for="invoice_date">{{ trans('cruds.sell.fields.invoice_date') }}</label>
                    <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $sell->invoice_date) }}">
                    @if($errors->has('invoice_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('invoice_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sell.fields.invoice_date_helper') }}</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="required" for="customer_id">{{ trans('cruds.sell.fields.customer') }}</label>
                    <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                        @foreach($customers as $id => $entry)
                            <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $sell->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('customer'))
                        <div class="invalid-feedback">
                            {{ $errors->first('customer') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sell.fields.customer_helper') }}</span>
                </div>
                <div class="form-group col">
                    <label class="required" for="quantity">{{ trans('cruds.sell.fields.quantity') }}</label>
                    <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $sell->quantity) }}" step="1" required>
                    @if($errors->has('quantity'))
                        <div class="invalid-feedback">
                            {{ $errors->first('quantity') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.sell.fields.quantity_helper') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="weight">{{ trans('cruds.sell.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="number" name="weight" id="weight" value="{{ old('weight', $sell->weight) }}" step="0.10" required>
                @if($errors->has('weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sell.fields.weight_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="total_amount">{{ trans('cruds.sell.fields.total_amount') }}</label>
                <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $sell->total_amount) }}" step="1" required>
                @if($errors->has('total_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sell.fields.total_amount_helper') }}</span>
            </div>
            {{-- Default status set to unpaid --}}
            <input type="hidden" name="paid_status" value="unpaid">
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
