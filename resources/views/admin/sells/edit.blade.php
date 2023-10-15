@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sell.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sells.update", [$sell->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="invoice_no">{{ trans('cruds.sell.fields.invoice_no') }}</label>
                <input class="form-control {{ $errors->has('invoice_no') ? 'is-invalid' : '' }}" type="number" name="invoice_no" id="invoice_no" value="{{ old('invoice_no', $sell->invoice_no) }}" step="1" required>
                @if($errors->has('invoice_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sell.fields.invoice_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invoice_date">{{ trans('cruds.sell.fields.invoice_date') }}</label>
                <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $sell->invoice_date) }}">
                @if($errors->has('invoice_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sell.fields.invoice_date_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.sell.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $sell->quantity) }}" step="1" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sell.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="weight">{{ trans('cruds.sell.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="number" name="weight" id="weight" value="{{ old('weight', $sell->weight) }}" step="0.01" required>
                @if($errors->has('weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sell.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="unit_price">{{ trans('cruds.sell.fields.unit_price') }}</label>
                <input class="form-control {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" type="number" name="unit_price" id="unit_price" value="{{ old('unit_price', $sell->unit_price) }}" step="0.01" required>
                @if($errors->has('unit_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sell.fields.unit_price_helper') }}</span>
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
            <div class="form-group">
                <div class="form-check {{ $errors->has('paid_status') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="paid_status" id="paid_status" value="1" {{ $sell->paid_status || old('paid_status', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="paid_status">{{ trans('cruds.sell.fields.paid_status') }}</label>
                </div>
                @if($errors->has('paid_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sell.fields.paid_status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", () => {
        var weight = document.querySelector("#weight");
        var unitPrice = document.querySelector("#unit_price");
        var totalAmount = document.querySelector("#total_amount");

        unit_price.addEventListener('change', () => {
                calculateTotal(totalAmount, weight.value, unitPrice.value);
        });

        weight.addEventListener('change', () => {
                calculateTotal(totalAmount, weight.value, unitPrice.value);
        });

        const calculateTotal = (selector, weight, unitPrice) => {
            if ( unitPrice != "" || weight != "")
                return selector.value = (parseInt(weight) * parseFloat(unitPrice)).toFixed(2);
        }
    });

</script>


@endsection
