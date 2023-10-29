@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customerDue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-dues.update", [$customerDue->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.customerDue.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $customerDue->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerDue.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer_dues">{{ trans('cruds.customerDue.fields.customer_dues') }}</label>
                <input class="form-control {{ $errors->has('customer_dues') ? 'is-invalid' : '' }}" type="number" name="customer_dues" id="customer_dues" value="{{ old('customer_dues', $customerDue->customer_dues) }}" step="0.01" required>
                @if($errors->has('customer_dues'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_dues') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerDue.fields.customer_dues_helper') }}</span>
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