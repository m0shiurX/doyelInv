@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card col-12 col-md-12 col-lg-12">
                <div class="card-header">
                    <h2>Customer Statement for {{ $customer->first_name }}</h2>
                </div>
                <div class="card-body">
					<table class="table table-bordered table-striped table-hover">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection