@extends('layouts.admin')
@section('content')
@can('stock_wastage_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.stock-wastages.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.stockWastage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.stockWastage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-StockWastage">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.stockWastage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.stockWastage.fields.quantity_wasted') }}
                        </th>
                        <th>
                            {{ trans('cruds.stockWastage.fields.weight_wasted') }}
                        </th>
                        <th>
                            {{ trans('cruds.stockWastage.fields.amount_wasted') }}
                        </th>
                        <th>
                            {{ trans('cruds.stockWastage.fields.wastage_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockWastages as $key => $stockWastage)
                        <tr data-entry-id="{{ $stockWastage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $stockWastage->id ?? '' }}
                            </td>
                            <td>
                                {{ $stockWastage->quantity_wasted ?? '' }}
                            </td>
                            <td>
                                {{ $stockWastage->weight_wasted ?? '' }}
                            </td>
                            <td>
                                {{ $stockWastage->amount_wasted ?? '' }}
                            </td>
                            <td>
                                {{ $stockWastage->wastage_date ?? '' }}
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-StockWastage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection