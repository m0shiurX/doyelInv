@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.stock.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Stock">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $key => $stock)
                        <tr data-entry-id="{{ $stock->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $stock->id ?? '' }}
                            </td>
                            <td>
                                {{ $stock->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $stock->weight ?? '' }}
                            </td>
                            <td>
                                {{ $stock->amount ?? '' }}
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
  let table = $('.datatable-Stock:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection