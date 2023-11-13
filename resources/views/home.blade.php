@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Hi, {{ auth()->user()->name}}
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Today is {{now()->format('D, d M, Y')}}.
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <span class="text-muted">Stock</span> Quantity (PCS)
                </div>

                <div class="card-body">
                    <div class="big_number text-nowrap text-truncate">{{ number_format($stock->quantity,0) ?? '' }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <span class="text-muted">Stock</span> Weight (KG)
                </div>

                <div class="card-body">
                    <div class="big_number text-nowrap text-truncate">{{ number_format($stock->weight,0) ?? '' }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <span class="text-muted">Stock</span> Price (BDT)
                </div>

                <div class="card-body">
                    
                    <div class="big_number text-nowrap text-truncate">{{ number_format($stock->amount, 0) ?? '' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection