@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card col-12 col-md-12 col-lg-12">
                <div class="card-header">
                    Reports
                </div>
                <div class="card-body">
                    @include('partials.search')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection