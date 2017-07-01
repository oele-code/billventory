@extends('app')
@section('title')
	Proveedores
@endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">
						Proveedores
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
								@foreach($providers as $provider)
								<tr>
									<td>{{ $provider->id }}</td>
									<td>{{ $provider->number }}</td>
									<td>{{ $provider->fname }}</td>
									<td>{{ $provider->lname }}</td>
									<td>{{ $provider->mobile }}</td>
									<td>{{ $provider->email }}</td>
									<td>{{ $provider->address }}</td>
									<td>{{ $provider->created_at }}</td>
									<td>
										<div class="btn-group btn-group-sm">
											<a role="button" href="{{ url( 'providers/'.$provider->id.'/edit') }}" class="btn btn-primary">
												<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
											</a>
											@if( count($provider->products) == 0 )
					                    	<button role="button" type="submit" class="btn btn-danger" form="form-delete-{{ $provider->id }}">
					                    		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
					                    	</button>
					                    	@endif
										</div>
											@if( count($provider->products) == 0 )
												{!! Form::open(['method' => 'DELETE', 'route' => ['providers.destroy',$provider->id], 'id' => 'form-delete-'.$provider->id ]) !!} 
	                							{!! Form::close(); !!} 
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
	@include('providers.create')
	@include('providers.edit')
@endsection
@section('script')
	@if(!empty($providerEdit))
		<script>
		$(function() {
		    $('#edit-modal').modal('show');
		});
		</script>
	@endif
@endsection