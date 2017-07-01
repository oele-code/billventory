@extends('app')
@section('title')
	Clientes
@endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">
						Clientes
					</h3>
					<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#new-modal">
  						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo
					</button>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover datatable">
							<thead>
								<tr>
									<th>Id</th>
									<th>Identificación</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Teléfono</th>
									<th>Correo</th>
									<th>Dirección</th>
									<th>Creado</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($customers as $customer)
								<tr>
									<td>{{ $customer->id }}</td>
									<td>{{ $customer->number }}</td>
									<td>{{ $customer->fname }}</td>
									<td>{{ $customer->lname }}</td>
									<td>{{ $customer->mobile }}</td>
									<td>{{ $customer->email }}</td>
									<td>{{ $customer->address }}</td>
									<td>{{ $customer->created_at }}</td>
									<td>
										<div class="btn-group btn-group-sm">
											<a role="button" href="{{ url( 'customers/'.$customer->id.'/edit') }}" class="btn btn-primary">
												<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
											</a>
					                    	<button role="button" type="submit" class="btn btn-danger" form="form-delete-{{ $customer->id }}">
					                    		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
					                    	</button>
										</div>
											{!! Form::open(['method' => 'DELETE', 'route' => ['customers.destroy',$customer->id], 'id' => 'form-delete-'.$customer->id ]) !!} 
	                						{!! Form::close(); !!} 
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
	@include('customers.create')
	@include('customers.edit')
@endsection
@section('script')
	@if(!empty($customerEdit))
		<script>
		$(function() {
		    $('#edit-modal').modal('show');
		});
		</script>
	@endif
@endsection