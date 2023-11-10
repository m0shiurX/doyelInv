@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card col-12 col-md-12 col-lg-12">
				<div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="">Customer Statement for <span class="text-muted"> {{ $customer->first_name }}</span>. </h4>
                        <button class="d-btn btn-info d-print-none" onclick="window.print()"> Print </button>
                    </div>
                </div>
                <div class="card-body">
					<table class="table table-bordered table-striped table-hover">
						<caption>Summaries of invoices and payments sort by date.</caption>
						<thead>
							<tr>
								<th>Date</th>
								<th>Description</th>
								<th>Debit</th>
								<th>Credit</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($mergedData as $item)
								<tr>
									<td>
										@if ($item instanceof \App\Models\Sell)
											{{ $item->invoice_date }}
										@elseif ($item instanceof \App\Models\Payment)
											{{ $item->payment_date }}
										@endif
									</td>
									<td>
										@if ($item instanceof \App\Models\Sell)
											Sale - #{{ $item->invoice_no }}
										@elseif ($item instanceof \App\Models\Payment)
											Payment
										@endif
									</td>
									<td>
										@if ($item instanceof \App\Models\Sell)
											{{-- Debit amount for sales --}}
											{{ $item->total_amount }}
										@endif
									</td>
									<td>
										@if ($item instanceof \App\Models\Payment)
											{{-- Credit amount for payments --}}
											{{ $item->amount }}
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<em class="font-weight-bold">
						Current due for {{ $customer->first_name }} is {{ $customer->customerCustomerDues()->first()->customer_dues }}
					</em>
                </div>
				<div class="card-footer">
					This statement is generated on {{now()->format('D, d M, Y')}}.
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection