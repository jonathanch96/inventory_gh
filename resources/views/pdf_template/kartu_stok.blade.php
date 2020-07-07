
<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="col-md-4">
						<span class="font-weight-bold">Kode Item : {{$item_data->item_code_w_variant}}</span><br>
						<span class="font-weight-bold">Nama Item : {{$item_data->item_name}}</span><br>
						<span class="font-weight-bold">Periode : {{\Carbon\Carbon::parse($date_1)->format('d F Y')}} - {{\Carbon\Carbon::parse($date_2)->format('d F Y')}}</span><br><br>
					</div>

					<div class="row p-5">
						<div class="col-md-12">
							<table class="table">
								<thead>
									<tr>
										<th class="border-0 text-uppercase small font-weight-bold">Tanggal</th>
										<th class="border-0 text-uppercase small font-weight-bold">Dokumen</th>
										<th class="border-0 text-uppercase small font-weight-bold">Masuk</th>
										<th class="border-0 text-uppercase small font-weight-bold">Keluar</th>
										<th class="border-0 text-uppercase small font-weight-bold">Saldo</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $key => $d): ?>
										<tr>
											<td>{{\Carbon\Carbon::parse($d->date)->format('d F Y')}}</td>
											<td><a target="_blank" href="{{url('')}}/{{$d->document_type_name}}/{{$d->document_id}}">{{$d->document_no}}</a></td>
											<td>{{$d->quantity>0?$d->quantity:'-'}}</td>
											<td>{{$d->quantity<0?$d->quantity:'-'}}</td>
											<td>{{$d->balance}}</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="d-flex flex-row-reverse bg-dark text-white p-4">
						<div class="py-3 px-5 text-right">
							<div class="mb-2">Grand Total</div>
							<div class="h2 font-weight-light">$234,234</div>
						</div>

						<div class="py-3 px-5 text-right">
							<div class="mb-2">Discount</div>
							<div class="h2 font-weight-light">10%</div>
						</div>

						<div class="py-3 px-5 text-right">
							<div class="mb-2">Sub - Total amount</div>
							<div class="h2 font-weight-light">$32,432</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>


