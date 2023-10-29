@extends('layouts.admin')
@section('content')
@can('production_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.productions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.production.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.production.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Production">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.production.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.production.fields.quantity_produced') }}
                        </th>
                        <th>
                            {{ trans('cruds.production.fields.weight_produced') }}
                        </th>
                        <th>
                            {{ trans('cruds.production.fields.production_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.production.fields.total_amount') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productions as $key => $production)
                        <tr data-entry-id="{{ $production->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $production->id ?? '' }}
                            </td>
                            <td>
                                {{ $production->quantity_produced ?? '' }}
                            </td>
                            <td>
                                {{ $production->weight_produced ?? '' }}
                            </td>
                            <td>
                                {{ $production->production_date ?? '' }}
                            </td>
                            <td>
                                {{ $production->total_amount ?? '' }}
                            </td>
                            <td>
                                @can('production_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.productions.show', $production->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('production_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.productions.edit', $production->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('production_delete')
                                    <form action="{{ route('admin.productions.destroy', $production->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('production_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.productions.massDestroy') }}",
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
  let table = $('.datatable-Production:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection