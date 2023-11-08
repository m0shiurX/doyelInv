@extends('layouts.admin')
@section('content')

<div class="card col-12 col-md-12 col-lg-10 offset-lg-1">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-6">
                    <label class="required" for="customer_id">{{ trans('cruds.payment.fields.customer') }}</label>
                    <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                        <option value="">{{ __('global.pleaseSelect') }}</option>
                        @foreach($customers as $key => $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{$customer->account_no}} - {{ $customer->first_name }}</option>
                        @endforeach
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
                    <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date', now()->format('Y-m-d')) }}">
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
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="1" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }} Payment
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
