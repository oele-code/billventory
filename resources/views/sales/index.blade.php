@extends('app')
@section('title')
	Ventas
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
			
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#tab_1" aria-controls="home" role="tab" data-toggle="tab">Ventas general</a>
					</li>
					<li role="presentation">
						<a href="#tab_2" aria-controls="tab" role="tab" data-toggle="tab">Ventas detallado</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="tab_1">
						<br>
						<div class="table-responsive">
							<table class="table table-hover table-striped datatable">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>Cliente</th>
										<th>Total</th>
										<th>Por</th>
										<th>Vendido</th>
										<th>Factura</th>
									</tr>
								</thead>
								<tbody>
									@foreach($sales as $sale)
									<tr class="text-center">
										<td>{{ $sale->id }}</td>
										<td>{{ $sale->customer->fname.' '.$sale->customer->lname }}</td>
										<td>{{ $sale->total }}</td>
										<td>{{ $sale->user->email }}</td>
										<td>{{ $sale->created_at->format('d/m/Y h:i a') }}</td>
										<td>
										<a href="{{ url('sales').'/'.$sale->id }}" class="btn btn-default btn-sm">
											<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
										</a>
										<a target="_blank" href="{{ url('sales').'/'.$sale->id.'/invoice'}}" class="btn btn-sm btn-primary">
											<span class="glyphicon glyphicon-download" aria-hidden="true"></span> PDF
										</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- table -->
					</div>
					<div role="tabpanel" class="tab-pane" id="tab_2">
						<br>
						<div class="table-responsive">
							<table class="table table-hover table-striped datatable">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>Cliente</th>
										<th>Factura</th>
										<th>Referencia</th>
										<th>Cantidad</th>
										<th>Costo</th>
										<th>Valor</th>
										<th>Precio</th>
										<th>Descuento</th>
										<th>Total</th>
										<th>Ganancia</th>
										<th>Por</th>
										<th>Vendido</th>
									</tr>
								</thead>
								<tbody>
									@foreach($details as $k=>$detail)
										<tr>
											<td>{{ $k + 1 }}</td>
											<td>{{ $detail['customer'] }}</td>
											<td>{{ $detail['invoice'] }}</td>
											<td>{{ $detail['reference'] }}</td>
											<td>{{ $detail['qty'] }}</td>
											<td>{{ $detail['cost'] }}</td>
											<td>{{ $detail['value'] }}</td>
											<td>{{ $detail['price'] }}</td>
											<td>{{ $detail['desc'] }}</td>
											<td>{{ $detail['total'] }}</td>
											<td>{{ $detail['profit'] }}</td>
											<td>{{ $detail['by'] }}</td>
											<td>{{ $detail['created_at'] }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- table -->
						
					</div>
				</div>
			</div>

			

		</div>
	</div>
@endsection
@section('script')
<script>
$(function() {    
});
</script>
@endsection