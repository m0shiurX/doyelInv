@extends('layouts.admin')
@section('content')

<div class="card col-12 col-md-12 col-lg-10 offset-lg-1">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-6">
                    <label class="required" for="customer_id">{{ trans('cruds.payment.fields.customer') }}</label>
                    <select class="form-control {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                        <option value="{{$payment->customer->id}}">{{$payment->customer->account_no}} - {{$payment->customer->first_name}}</option>
                    </select>
                    @if($errors->has('customer'))
                        <div class="invalid-feedback">
                            {{ $errors->first('customer') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.customer_helper') }}</span>
                </div>
                <div class="form-group col-6">
                    <label for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
                    <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date', $payment->payment_date) }}">
                    @if($errors->has('payment_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('payment_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.payment_date_helper') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" step="1" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.update') }} Payment
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
