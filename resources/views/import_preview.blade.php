@extends('voyager::master')
@section('page_title', 'Import data confirmation')

@section('page_header')
<div class="container-fluid">
	<h1 class="page-title">
		<i class="voyager-upload"></i> Import data confirmation
	</h1>
	<a href="{{url('item-ledger-entries')}}" class="btn btn-warning btn-add-new">
		<i class="voyager-back"></i> <span>Back to Item Ledger Entries</span>
	</a>
	
</div>
@stop
@section('content')
<div class="page-content browse container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-bordered">
				<form action="import_item_ledger/confirm" method="post" enctype="multipart/form-data">
					<div class="panel-body">

						@csrf
						<input type="hidden" name="import_data" value="{{$data->toJson()}}">
						<input type="hidden" name="excel_name" value="{{$excel_name}}">
						<div class="table-responsive">
							<table id="dataTable" class="table table-hover">
								<thead>
									<tr>
										@foreach ($data as $key => $d)
										@if($loop->first)
										<?php foreach ($d as $key => $value): ?>
											<th>{{$key}}</th>

										<?php endforeach ?>
										@endif
										@endforeach
									</tr>
								</thead>
								<tbody>

									<?php foreach ($data as $key => $d): ?>
										<tr>
											<?php foreach ($d as $key => $value): ?>
												<td>{{$value}}</td>

											<?php endforeach ?>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="panel-footer">
						@section('submit-buttons')
						<button onclick="$('#voyager-loader').show();" type="submit" class="btn btn-primary save">Submit</button>
						@stop
						@yield('submit-buttons')
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
@stop

@push('javascript')
<script type="text/javascript">
	$('#dataTable').DataTable();
</script>
@endpush