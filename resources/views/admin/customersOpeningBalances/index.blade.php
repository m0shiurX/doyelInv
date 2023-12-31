@extends('layouts.admin')
@section('content')
@can('customers_opening_balance_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.customers-opening-balances.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.customersOpeningBalance.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.customersOpeningBalance.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CustomersOpeningBalance">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.customersOpeningBalance.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.customersOpeningBalance.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.customersOpeningBalance.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.customersOpeningBalance.fields.calculation_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customersOpeningBalances as $key => $customersOpeningBalance)
                        <tr data-entry-id="{{ $customersOpeningBalance->id }}">
                            <td>
                            </td>
                            <td>
                                {{ $customersOpeningBalance->id ?? '' }}
                            </td>
                            <td>
                                {{ $customersOpeningBalance->customer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $customersOpeningBalance->amount ?? '' }}
                            </td>
                            <td>
                                {{ $customersOpeningBalance->calculation_date ?? '' }}
                            </td>
                            <td>



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-CustomersOpeningBalance:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection