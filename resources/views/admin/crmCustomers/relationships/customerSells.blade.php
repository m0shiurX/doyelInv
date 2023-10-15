@can('sell_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sells.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sell.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.sell.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-customerSells">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.invoice_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.invoice_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.unit_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.total_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.sell.fields.paid_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sells as $key => $sell)
                        <tr data-entry-id="{{ $sell->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sell->id ?? '' }}
                            </td>
                            <td>
                                {{ $sell->invoice_no ?? '' }}
                            </td>
                            <td>
                                {{ $sell->invoice_date ?? '' }}
                            </td>
                            <td>
                                {{ $sell->customer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $sell->customer->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $sell->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $sell->weight ?? '' }}
                            </td>
                            <td>
                                {{ $sell->unit_price ?? '' }}
                            </td>
                            <td>
                                {{ $sell->total_amount ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Sell::PAID_STATUS_RADIO[$sell->paid_status] ?? '' }}
                            </td>
                            <td>
                                @can('sell_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sells.show', $sell->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sell_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sells.edit', $sell->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sell_delete')
                                    <form action="{{ route('admin.sells.destroy', $sell->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sell_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sells.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-customerSells:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection