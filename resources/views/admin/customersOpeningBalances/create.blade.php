@extends('layouts.admin')
@section('content')

<div class="card col-12 col-md-12 col-lg-10 offset-lg-1">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.customersOpeningBalance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers-opening-balances.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-6">
                    <label class="required" for="customer_id">{{ trans('cruds.customersOpeningBalance.fields.customer') }}</label>
                    <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                        @foreach($customers as $id => $entry)
                            <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('customer'))
                        <div class="invalid-feedback">
                            {{ $errors->first('customer') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.customersOpeningBalance.fields.customer_helper') }}</span>
                </div>
                <div class="form-group col-6">
                <label for="calculation_date">{{ trans('cruds.customersOpeningBalance.fields.calculation_date') }}</label>
                <input class="form-control date {{ $errors->has('calculation_date') ? 'is-invalid' : '' }}" type="text" name="calculation_date" id="calculation_date" value="{{ old('calculation_date', now()->format('d-m-Y')) }}">
                @if($errors->has('calculation_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('calculation_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customersOpeningBalance.fields.calculation_date_helper') }}</span>
            </div>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.customersOpeningBalance.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="1" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customersOpeningBalance.fields.amount_helper') }}</span>
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