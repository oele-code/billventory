@extends('app')
@section('title')
	Factura #{{ $sale->id }}
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">

			<div class="panel panel-default">
				<div class="panel-body">

					<div class="col-sm-5">
						<table class="table text-left">
							<tbody>
								<tr><th>Cliente :</th><td>{{ $sale->customer->fname.' '.$sale->customer->lname }}</td></tr>
								<tr><th>Documento :</th><td>{{ $sale->customer->number }}</td></tr>
								<tr><th>Telefono :</th><td>{{ $sale->customer->mobile }}</td></tr>
								<tr><th>Dirección :</th><td>{{ $sale->customer->address }}</td></tr>
								<tr><th>Correo :</th><td>{{ $sale->customer->email }}</td></tr>
								<tr><th>Por :</th><td>{{ $sale->user->email }}</td></tr>
							</tbody>
						</table>

						<div class="form-group has-success">
							<label class="col-sm-2 control-label"><h4>Total</h4></label>
							<div class="col-sm-10">
								<div class="input-group">
									<div class="input-group-addon">$</div>
									<span class="form-control input-lg text-right">{{ number_format( $sale->total , 0,',','.') }}</span>
								</div>
							</div>
						</div>
						<!-- /form-group -->
					</div>
					<!-- col-sm-5 -->

					<div class="col-sm-7">

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Detalles de factura #{{ $sale->id }}</h3>
							</div>
							<div class="panel-body">
								
								<div class="table-responsive">
									<table class="table table-condensed">
										<thead>
											<tr>
												<th>Producto</th>
												<th class="active">Costo</th>
												<th class="active">Valor</th>
												<th>Precio</th>
												<th>Cantidad</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											@foreach($sale->products as $prod)
											<tr>
												<td>{{ $prod->reference.' '.$prod->name  }}</td>
												<td class="active">{{ number_format( $prod->cost, 0,',','.')  }}</td>
												<td class="active">{{ number_format( $prod->cost * $prod->pivot->qty , 0,',','.') }}</td>
												
												<td>{{ number_format($prod->price, 0,',','.') }}</td>
												<td>{{ $prod->pivot->qty }}</td>
												<td>{{ number_format( $prod->price * $prod->pivot->qty , 0,',','.') }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>

							</div>
						</div>
						
						<a target="_blank" href="{{ url('sales').'/'.$sale->id.'/invoice' }}" class="btn btn-primary pull-right">
							<span class="glyphicon glyphicon-file" aria-hidden="true"></span> PDF
						</a>
					</div>
					<!-- col-sm-6 -->


				</div>
				<!-- panel-body -->
			</div>
			<!-- panel -->

		</div>
	</div>
@endsection
@section('script')
<script>
$(function() {
    
});
</script>
@endsection