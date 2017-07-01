@extends('app')
@section('title')
	Empleados
@endsection
@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title pull-left">
						Empleados
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
									<th>Teléfono</th>
									<th>Correo</th>
									<th>Creado</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->number }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->mobile }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->created_at }}</td>
									<td>
										<div class="btn-group btn-group-sm">
											<a role="button" href="{{ url( 'users/'.$user->id.'/edit') }}" class="btn btn-primary">
												<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
											</a>
											@if($user->type != 1 && count($user->products) == 0 ) )
					                    	<button role="button" type="submit" class="btn btn-danger" form="form-delete-{{ $user->id }}">
					                    		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
					                    	</button>
					                    	@endif
										</div>
										@if( $user->type != 1 && count($user->products) == 0 ) )
											{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy',$user->id], 'id' => 'form-delete-'.$user->id ]) !!} 
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
	@include('users.create')
	@include('users.edit')
@endsection
@section('script')
	@if(!empty($userEdit))
		<script>
		$(function() {
		    $('#edit-modal').modal('show');
		});
		</script>
	@endif
@endsection