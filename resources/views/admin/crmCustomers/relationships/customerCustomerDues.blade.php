<div class="card">
    <div class="card-header">
        {{ trans('cruds.customerDue.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-customerCustomerDues">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.customerDue.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.customerDue.fields.customer') }}
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
                                {{ $customerDue->id ?? '' }}
                            </td>
                            <td>
                                {{ $customerDue->customer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $customerDue->customer_dues ?? '' }}
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
  let table = $('.datatable-customerCustomerDues:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection