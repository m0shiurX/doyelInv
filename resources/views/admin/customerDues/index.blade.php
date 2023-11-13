@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.customerDue.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CustomerDue">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.account_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerDue.fields.customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerDue.fields.customer_dues') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customerDues as $key => $customerDue)
                        <tr data-entry-id="{{ $customerDue->id }}">
                            <td>
                            </td>
                            <td>
                                {{ $customerDue->customer->account_no ?? '' }}
                            </td>
                            <td>
                                {{ $customerDue->customer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $customerDue->customer->phone ?? '' }}
                            </td>
                            <td>
                                {{ $customerDue->customer->address ?? '' }}
                            </td>
                            <td>
                                {{ $customerDue->customer_dues ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-success" href="{{ route('admin.reports.statement', $customerDue->customer_id) }}">
                                    Statement
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th colspan="4">Total Dues</th>
                        <th> {{ $totalDue ?? 0}}</th>
                        <th></th>
                    </tr>
                </tfoot>
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
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-CustomerDue:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
