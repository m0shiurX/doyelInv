<form method="POST" action="{{ route("admin.reports") }}" enctype="multipart/form-data">
	@csrf
	<div class="form-row">
		<div class="form-group col-3">
			<label for="start_date">Start Date</label>
			<input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', now()->format('Y-m-d')) }}">
				@if($errors->has('start_date'))
					<div class="invalid-feedback">
						{{ $errors->first('start_date') }}
					</div>
				@endif
			<span class="help-block"></span>
		</div>
		<div class="form-group col-3">
			<label for="end_date">End Date</label>
			<input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', now()->format('Y-m-d')) }}">
			@if($errors->has('end_date'))
				<div class="invalid-feedback">
					{{ $errors->first('end_date') }}
				</div>
			@endif
			<span class="help-block"></span>
		</div>
		<div class="form-group ml-3 col-3 mt-4 pt-1">
			<button class="btn btn-success" type="submit">
				Fetch Report
			</button>
		</div>
	</div>
</form>