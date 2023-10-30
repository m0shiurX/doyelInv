@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.stockHistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-StockHistory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.stockHistory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.stockHistory.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.stockHistory.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.stockHistory.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.stockHistory.fields.amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockHistories as $key => $stockHistory)
                        <tr data-entry-id="{{ $stockHistory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $stockHistory->id ?? '' }}
                            </td>
                            <td>
                                {{ $stockHistory->date ?? '' }}
                            </td>
                            <td>
                                {{ $stockHistory->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $stockHistory->weight ?? '' }}
                            </td>
                            <td>
                                {{ $stockHistory->amount ?? '' }}
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
  let table = $('.datatable-StockHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection