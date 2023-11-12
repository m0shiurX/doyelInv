<form id="dateRangeForm" method="POST" action="{{ route("admin.reports") }}" enctype="multipart/form-data">
	@csrf
	<div class="form-row">
		<div class="form-group col">
			<label for="dateRangeSelect">Select Date</label>
			<select class="form-control" id="dateRangeSelect" onchange="selectDateRange()">
				<option value="today">Today</option>
				<option value="yesterday">Yesterday</option>
				<option value="last_week">Last Week</option>
				<option value="last_month">Last Month</option>
				<option value="last_year">last Year</option>
			</select>
		</div>
		<div class="form-group col">
			<label for="start_date">Start Date</label>
			<input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', now()->format('Y-m-d')) }}">
				@if($errors->has('start_date'))
					<div class="invalid-feedback">
						{{ $errors->first('start_date') }}
					</div>
				@endif
			<span class="help-block"></span>
		</div>
		<div class="form-group col">
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

<script>
	function selectDateRange() {
		var select = document.getElementById("dateRangeSelect");
		var startDate = document.getElementById("start_date");
		var endDate = document.getElementById("end_date");

		var selectedValue = select.value;
		localStorage.setItem('selectedDateRange', select.value);

		var today = new Date();

		switch (selectedValue) {
			case "yesterday":
				var yesterday = new Date(today);
				yesterday.setDate(today.getDate() - 1);
				startDate.value = endDate.value = formatDate(yesterday);
				break;

			case "today":
				startDate.value = endDate.value = formatDate(today);
				break;

			case "last_week":
				var lastWeekStart = new Date(today);
				lastWeekStart.setDate(today.getDate() - 7);
				var lastWeekEnd = new Date(today);
				startDate.value = formatDate(lastWeekStart);
				endDate.value = formatDate(lastWeekEnd);
				break;

			case "last_month":
				var lastMonthStart = new Date(today);
				lastMonthStart.setDate(today.getDate() - 30);
				var lastWeekEnd = new Date(today);
				startDate.value = formatDate(lastMonthStart);
				endDate.value = formatDate(lastWeekEnd);
				break;

			case "last_year":
				var lastYearStart = new Date(today);
				lastYearStart.setDate(today.getDate() - 365);
				var lastWeekEnd = new Date(today);
				startDate.value = formatDate(lastYearStart);
				endDate.value = formatDate(lastWeekEnd);
				break;

			default:
				break;
		}
	}
	// Helper function to format date as yyyy-mm-dd
	function formatDate(date) {
		var year = date.getFullYear();
		var month = String(date.getMonth() + 1).padStart(2, '0');
		var day = String(date.getDate()).padStart(2, '0');
		return `${day}-${month}-${year}`;
	}

	document.addEventListener('DOMContentLoaded', function () {
		var select = document.getElementById("dateRangeSelect");
		var savedDateRange = localStorage.getItem('selectedDateRange');
		if (savedDateRange) {
			select.value = savedDateRange;
			selectDateRange();
		}
	});


</script>